<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Mail\SmtpMailer;

use BeeFramework\Chemical\Errors\Voles\VersatileErrorsTrait;
use BeeFramework\Component\Mail\SmtpMailer\Exception\SmtpMailerException;


/**
 * SmtpMailer
 * @author Lingtalfi
 * 2015-05-24
 *
 *
 * A toolkit to play with the smtp commands.
 *
 *
 *
 */
class SmtpMailer
{

    use VersatileErrorsTrait;

    private $verboseMode;


    private $host;
    private $port;
    private $scheme;
    private $user;
    private $password;


    private $recipientsAddresses;
    private $mailFromAddress;
    private $smtpSocket;
    //
    private $nonAcceptedRecipients;
    private $serverName;

    /**
     * @var callable $onAuthBefore
     *              This is a callable to give the opportunity to set up a tls connection
     *              void   callable ( SmtpMailer )
     */
    private $onAuthBefore;

    public function __construct($host, $port, $scheme, $user, $password)
    {
        $this->smtpSocket = SmtpSocket::create();
        $this->verboseMode = false;
        $this->host = $host;
        $this->port = $port;
        $this->scheme = $scheme;
        $this->user = $user;
        $this->password = $password;

        $this->recipientsAddresses = null;
        $this->mailFromAddress = null;
        $this->nonAcceptedRecipients = [];
        $this->serverName = null;
    }

    public static function create($host, $port, $scheme, $user, $password)
    {
        return new static($host, $port, $scheme, $user, $password);
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setServerName($name)
    {
        $this->serverName = $name;
        return $this;
    }

    public function setMailFromAddress($email)
    {
        $this->mailFromAddress = $email;
        return $this;
    }

    public function setRecipientsAddresses(array $emails)
    {
        $this->recipientsAddresses = $emails;
        return $this;
    }

    public function setOnAuthBefore(callable $onAuthBefore)
    {
        $this->onAuthBefore = $onAuthBefore;
        return $this;
    }

    /**
     * @return SmtpSocket
     */
    public function getSmtpSocket()
    {
        return $this->smtpSocket;
    }

    /**
     * One can use this method after a call to the send method
     * to investigate which emails couldn't be delivered.
     *
     *
     * @return array of email => smtp error message
     */
    public function getNonAcceptedRecipients()
    {
        return $this->nonAcceptedRecipients;
    }


    /**
     * @param $mimeMessage
     *              The mimeMessage is the whole mime message, including headers, and the final dot.
     *              In other words, this is what is sent after the smtp DATA command.
     *
     *
     * @return int, the number of recipients to which the message has been sent
     * @throws \Exception
     */
    public function send($mimeMessage)
    {
        if (null === $this->mailFromAddress) {
            throw new SmtpMailerException("Please set the mailFromAddress");
        }
        if (null === $this->recipientsAddresses) {
            throw new SmtpMailerException("Please set the recipientsAddresses");
        }

        $nbValidRcpt = 0;
        if (true === $this->verboseMode) {
            $this->smtpSocket->setOnCommandSentListener($this->getVerboseListener(), '_verboseMode');
        }


        $scheme = strtolower($this->scheme);
        if ('ssl' === $scheme && !extension_loaded('openssl')) {
            return $this->error("openssl not found, I cannot use ssl scheme");
        }
        if ('' === trim($mimeMessage)) {
            return $this->error("Message must not be empty");
        }


        // create socket
        if (false !== $this->prepareConnection()) {

            // Get server's initial response
            $this->command(null);

            // say hello
            $reply = $this->command('EHLO ' . $this->serverName);


            if (is_callable($this->onAuthBefore)) {
                call_user_func($this->onAuthBefore, $this);
            }


            // handling login
            if ($this->user && $this->password && preg_match('!AUTH!', $reply)) {
                $this->command('AUTH LOGIN');
                $this->command(base64_encode($this->user));
                $rep = $this->command(base64_encode($this->password));
                if ('5' === substr($rep, 0, 1)) {
                    return $this->error("Authentication problem: $rep");
                }
            }


            // Start message dialog
            $this->command('MAIL FROM: <' . $this->mailFromAddress . '>');


            foreach ($this->recipientsAddresses as $dst) {
                $rep = $this->command('RCPT TO: <' . $dst . '>');
                if ('250' === substr($rep, 0, 3)) {
                    $nbValidRcpt++;
                }
                else {
                    $this->nonAcceptedRecipients[$dst] = $rep;
                }
            }
            $this->command('DATA');


            // Send message
            $this->command($mimeMessage);

            $this->command('QUIT');
            $this->smtpSocket->closeConnexion();


        }
        return $nbValidRcpt;
    }

    /**
     * With this method we can issue extra smtp commands at any time.
     */
    public function command($cmd)
    {
        return $this->smtpSocket->sendCommand($cmd);
    }

    public function setVerboseMode($verboseMode)
    {
        $this->verboseMode = $verboseMode;
        return $this;
    }
    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function getServerName()
    {
        return $_SERVER['SERVER_NAME'];
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/


    private function getVerboseListener()
    {
        $br = ('cli' === PHP_SAPI) ? "\n" : '<br>';
        return function ($cmd, $reply) use ($br) {
            if (null === $cmd) {
                $cmd = '(initial connection)';
            }
            $msg = 'C: ' . $cmd;
            if ('<br>' === $br) {
                $msg = '<span style="color: blue">' . str_replace("\r\n", "<br>", str_replace('<', '&lt;', $msg)) . '</span>';
            }
            echo $msg . $br;
            echo 'S: ' . $reply . $br;
        };
    }

    private function prepareConnection()
    {
        $host = $this->host;
        if ('ssl' === $this->scheme) {
            $host = 'ssl://' . $host;
        }
        return $this->smtpSocket->openConnection($host, $this->port);
    }


}
