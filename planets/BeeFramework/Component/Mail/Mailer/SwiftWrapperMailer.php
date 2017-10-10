<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Mail\Mailer;


use BeeFramework\Bat\ArrayTool;


/**
 * SwiftMailer.
 *
 * Depends from SwiftMailer (use composer).
 *
 *
 *
 * In this implementation:
 * --------
 *
 * - plain & html: if an html version only is provided, this service will NOT automatically generate
 *              the plain version, since the developer may want to "force" (at least try) the
 *              html version.
 *
 * - smtpParams:
 * ----- port
 * ----- host
 * ----- protocol
 * ----- userName
 * ----- password
 *
 *
 * message: if the message is a string, it is always considered text/plain
 *
 *
 *
 *
 *
 * @author Lingtalfi
 *
 *
 */
class SwiftWrapperMailer implements MailerInterface
{

    protected $debug;
    protected $smtpParams;
    protected $defaultFrom;


    public function __construct(array $params = [])
    {
        if (array_key_exists('debug', $params)) {
            $this->debug = (bool)$params['debug'];
        }
        else {
            $this->debug = false;
        }

        if (array_key_exists('from', $params)) {
            $this->defaultFrom = $params['from'];
        }

        if (array_key_exists('smtpParams', $params)) {
            $this->smtpParams = $params['smtpParams'];
        }
        else {
            $this->smtpParams = [];
        }
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS MailerInterface
    //------------------------------------------------------------------------------/
    /**
     * @see MailerInterface
     * @inheritDoc
     */
    public function sendMail($to, $subject, $message, $from = null, array $options = array())
    {
        $ret = false;
        try {
            if (class_exists("Swift_Message")) {

                // workaround for internal encoding
                // http://swiftmailer.org/docs/installing.html
                if (function_exists('mb_internal_encoding') && ((int)ini_get('mbstring.func_overload')) & 2) {
                    $mbEncoding = mb_internal_encoding();
                    mb_internal_encoding('ASCII');
                }

                // get the message
                list($plain, $html) = $this->getMessage($message);


                //------------------------------------------------------------------------------/
                // SWIFT MESSAGE
                //------------------------------------------------------------------------------/
                $message = \Swift_Message::newInstance();
                $message->setSubject($subject);
                $message->setBody($plain, 'text/plain');
                if ($html) {
                    if (array_key_exists('embed', $options)) {
                        $this->prepareEmbeddedFiles($html, $options['embed'], $message);
                    }
                    $message->addPart($html, 'text/html');
                }

                $message->setTo($to);
                if (array_key_exists('cc', $options)) {
                    $message->setCc($options['cc']);
                }
                if (array_key_exists('bcc', $options)) {
                    $message->setBcc($options['bcc']);
                }
                if (null === $from) {
                    $from = $this->defaultFrom;
                }

                $message->setFrom($from);
                if (array_key_exists('sender', $options)) {
                    $message->setSender($options['sender']);
                }
                else {
                    $message->setSender($from);
                }
                if (array_key_exists('returnPath', $options)) {
                    $message->setReturnPath($options['returnPath']);
                }
                else {
                    $message->setReturnPath($from);
                }

                if (array_key_exists('attach', $options)) {
                    $this->attachFile($options['attach'], $message);
                }


                //------------------------------------------------------------------------------/
                // TRANSPORT
                //------------------------------------------------------------------------------/
                $transport = $this->getSwiftTransport();
                $mailer = \Swift_Mailer::newInstance($transport);


                if (false === $this->debug) {
                    $ret = $mailer->send($message);
                }
                else {
                    $ret = count($to);
                }


                // end of workaround for internal encoding
                if (isset($mbEncoding)) {
                    mb_internal_encoding($mbEncoding);
                }

            }
            else {
                trigger_error("SwiftLibrary is not loaded", E_USER_WARNING);
                $ret = false;
            }
        } catch (\Exception $e) {
            trigger_error($e->getMessage(), E_USER_WARNING);
            $ret = false;
        }
        return $ret;
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    private function getSwiftTransport()
    {
        $type = 'smtp';
        switch ($type) {
            case 'smtp':
                $missing = ArrayTool::getMissingKeys($this->smtpParams, array(
                    'port',
                    'host',
                    'protocol',
                    'userName',
                    'password',
                ));
                if ($missing) {
                    throw new \RuntimeException(sprintf("Invalid smtp config, missing following keys: %s", implode($missing)));
                }
                else {
                    $transport = \Swift_SmtpTransport::newInstance($this->smtpParams['host'], $this->smtpParams['port'])
                        ->setUsername($this->smtpParams['userName'])
                        ->setPassword($this->smtpParams['password'])
                        ->setEncryption($this->smtpParams['protocol']);
                }

                break;
            default:
                throw new \LogicException(sprintf("Unknown type: %s", $type));
                break;
        }
        return $transport;
    }

    private function attachFile(array $attachNodes, \Swift_Message $message)
    {
        foreach ($attachNodes as $attach) {
            if (array_key_exists('path', $attach) || array_key_exists('data', $attach)) {
                $contentType = (array_key_exists('mimeType', $attach)) ? $attach["mimeType"] : null;
                if (array_key_exists('path', $attach)) {
                    $attachment = \Swift_Attachment::fromPath($attach['path'], $contentType);
                }
                else {
                    $attachment = \Swift_Attachment::newInstance($attach['data'], null, $contentType);
                }

                if (array_key_exists('name', $attach)) {
                    $attachment->setFilename($attach['name']);
                }
                if (array_key_exists('inline', $attach) && true === (bool)$attach['inline']) {
                    $attachment->setDisposition('inline');
                }
                $message->attach($attachment);
            }
            else {
                throw new \RuntimeException("Invalid attach syntax, either path or data must be specified");
            }
        }
    }


    private function prepareEmbeddedFiles(&$html, array $embedNodes, \Swift_Message $message)
    {
        foreach ($embedNodes as $tag => $embed) {
            if (array_key_exists('path', $embed) || array_key_exists('data', $embed)) {
                $contentType = (array_key_exists('mimeType', $embed)) ? $embed["mimeType"] : null;
                if (array_key_exists('path', $embed)) {
                    $swImage = \Swift_Image::fromPath($embed['path'], $contentType);
                }
                else {
                    $swImage = \Swift_Image::newInstance($embed['data'], null, $contentType);
                }

                if (array_key_exists('name', $embed)) {
                    $swImage->setFilename($embed['name']);
                }
                $cid = $message->embed($swImage);
                $html = str_replace($tag, $cid, $html);
            }
            else {
                throw new \InvalidArgumentException("Invalid embed syntax, either path or data must be specified");
            }
        }
    }


    private function getMessage($message)
    {
        $plain = null;
        $html = null;
        if (is_string($message)) {
            $plain = $message;
        }
        elseif (is_array($message)) {
            if (array_key_exists('plain', $message)) {
                $plain = $message['plain'];

            }
            if (array_key_exists('html', $message)) {
                $html = $message['html'];
            }
        }
        if (null === $plain && null === $html) {
            throw new \RuntimeException("Invalid message");
        }
        return array($plain, $html);
    }

}
