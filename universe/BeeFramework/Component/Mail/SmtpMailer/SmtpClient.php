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

use BeeFramework\Bat\FileTool;
use BeeFramework\Bat\MimeTypeTool;
use BeeFramework\Bat\QuoteTool;
use BeeFramework\Chemical\Errors\Voles\VersatileErrorsTrait;


/**
 * SmtpClient
 * @author Lingtalfi
 * 2015-05-24
 *
 *
 * This implementation provides special methods for the following headers:
 *
 * - from
 * - to
 * - cc
 * - bcc
 *
 * All those methods accept a $recipients parameter which can be one of:
 *
 * - string: an emailAddress
 * - array: an array of either:
 *              - numericKey => emailAddress
 *              or
 *              - emailAddress => displayName
 *
 *
 * This class doesn't make checking on emailAddress syntax.
 *
 *
 * From
 * -------
 *
 * For the from header, if multiple recipients are specified, only the first of them
 * will be used as the sender (in the MAIL FROM: smtp command).
 *
 *
 *
 * Templates
 * ---------------
 * Also, rather than generating all the mime message from scratch,
 * this class use template to generate some of the mime message structure.
 * Templates are located in ./SmtpClient/mime-templates.
 *
 * Templates are quite simple to use, so it means that if you don't like
 * this implementation, or if you want to extend this class' capabilities,
 * you can simply create your own templates and see if it gets better.
 * You might have to recode some logic too.
 *
 *
 * Message acceptance
 * ----------------------
 * After a few tests on mac mail, I realized that:
 *
 * - a simple plain message will be refuted if the From: header doesn't have a display name.
 * - a simple plain message with an attachment will be refuted if the From: or the To: header
 *                  don't have a display name.
 *
 *
 * Therefore, my conclusion was that having displayName was always better.
 * In this implementation, if the user doesn't explicitly write a display name, it automatically makes one up.
 *
 *
 *
 *
 *
 *
 *
 *
 */
class SmtpClient implements SmtpClientInterface
{

    use VersatileErrorsTrait;

    private static $cpt = 0;

    private $headers;
    private $attachments;
    private $embedded;
    private $html;


    private $smtpMailer;
    private $recipientsAddresses;
    private $mailFromAddress;

    // per send call headers and message
    // this is use only to allow onAuthBefore to kick in
    private $_headers;
    private $_message;

    public function __construct($host, $port, $scheme, $user, $password)
    {
        $this->verboseMode = false;
        $this->headers = $this->getDefaultHeaders();
        $this->attachments = [];
        $this->embedded = [];
        $this->recipientsAddresses = [];
        $this->mailFromAddress = '';


        $this->smtpMailer = SmtpMailer::create($host, $port, $scheme, $user, $password);
        // handling tls
        if ('tls' === strtolower($scheme)) {
            $this->smtpMailer->setOnAuthBefore(function (SmtpMailer $m) {
                $this->onAuthBefore($m);
            });
        }

    }

    public static function create($host, $port, $scheme, $user, $password)
    {
        return new static($host, $port, $scheme, $user, $password);
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * @param $plainMsg
     * @return int, the number of recipients to which the message has been sent
     * @throws Exception\SmtpMailerException
     */
    public function send($plainMsg)
    {
        $this->_message = $plainMsg;
        $this->_headers = $this->headers;
        $ret = 0;
        if (false !== $this->checkHeaders($this->_headers)) {


            $this->smtpMailer->setServerName($this->getServerName());


            $mimeMessage = $this->prepareMimeMessage();
            $ret = $this->smtpMailer
                ->setMailFromAddress($this->mailFromAddress)
                ->setRecipientsAddresses($this->recipientsAddresses)
                ->send($mimeMessage);

        }
        return $ret;
    }


    public function set($name, $value)
    {
        if (in_array(strtolower($name), ['to', 'from', 'bcc', 'cc'])) {
            throw new \RuntimeException("To set one of the following headers: To, From, Bcc, Cc, please use the corresponding methods");
        }
        $this->headers[$this->fixHeader($name)] = $value;
        return $this;
    }

    public function to($recipients)
    {
        $this->parseRecipients($recipients, 'To', $this->recipientsAddresses);
        return $this;
    }

    public function bcc($recipients)
    {
        $this->parseRecipients($recipients, 'Bcc', $this->recipientsAddresses);
        return $this;
    }

    public function cc($recipients)
    {
        $this->parseRecipients($recipients, 'Cc', $this->recipientsAddresses);
        return $this;
    }


    public function from($recipients)
    {
        $from = [];
        $this->parseRecipients($recipients, 'From', $from);
        if ($from) {
            $this->mailFromAddress = array_shift($from);
        }
        else {
            throw new \RuntimeException("You must specify at least one recipient");
        }
        return $this;
    }

    public function subject($subject)
    {
        $this->headers['Subject'] = $subject;
        return $this;
    }

    public function html($html)
    {
        $this->html = $html;
        return $this;
    }


    /**
     * @param $file ,
     *              this can be either a file path, or a base64 encoded string
     *              in php, use this:
     *                      $base64 = base64_encode($file);
     *
     *              If you use the base64 form, you must specify the mime type (third argument).
     *
     *
     * @param $cid
     * @param null $mimeType
     * @return $this
     *
     *
     * To use an embed image,
     * use the syntax <img src="cid:whatever">
     * The "src=cid:" part is required for the email client to recognize the <img> tag as an embedded image
     * while the "whatever" part is the actual Content-Id (argument $cid of this method)
     */
    public function embed($file, $cid, $mimeType = null)
    {
        if (file_exists($file)) {
            $this->embedded[] = [$file, $cid, $mimeType, false];
        }
        elseif (false !== base64_decode($file, true)) {
            $this->embedded[] = [$file, $cid, $mimeType, true];
        }
        else {
            throw new \RuntimeException("Embed file not found or invalid base64 string: $file");
        }
        return $this;
    }


    /**
     * @param $file
     *              this can be either a file path, or a base64 encoded string
     *              in php, use this:
     *                      $base64 = base64_encode($file);
     *
     * @param null|string $displayName
     * @return $this
     */
    public function attach($file, $displayName = null, $mimeType = null)
    {
        if (file_exists($file)) {
            $this->attachments[] = [$file, $displayName, $mimeType, false];
        }
        elseif (false !== base64_decode($file, true)) {
            $this->embedded[] = [$file, $displayName, $mimeType, true];
        }
        else {
            throw new \RuntimeException("Attachment file not found or invalid base64 string: $file");
        }
        return $this;
    }


    public function setVerboseMode($verboseMode)
    {
        $this->smtpMailer->setVerboseMode($verboseMode);
        return $this;
    }

    /**
     *          void    callable ( cmd, response )
     */
    public function setOnCommandSentListener(callable $listener, $index = null)
    {
        $this->smtpMailer->getSmtpSocket()->setOnCommandSentListener($listener, $index);
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function getDefaultHeaders()
    {
        return [
//            'MIME-Version' => '1.0',
        ];
    }

    protected function getServerName()
    {
        return $_SERVER['SERVER_NAME'];
    }

    protected function prepareMimeMessage()
    {
        $s = '';
        // we will convert those to \r\n later, but for now we are dealing with files...
        $eol = PHP_EOL;

        $plain = true;
        $html = false;
        $attach = false;
        $embed = false;

        if ($this->html) {
            $html = true;
        }
        if ($this->attachments) {
            $attach = true;
        }
        if ($this->embedded) {
            $embed = true;
        }


        // write top level headers
        foreach ($this->_headers as $key => $val) {
            // todo: test if Bcc works as expected
//            if ($key === 'Bcc') {
//                continue;
//            }
            $s .= $key . ': ' . $val . $eol;
        }


        // now prepare the body using templates
        if (true === $attach) {
            $template = 'attachment';
            $s .= $this->getTemplate($template);
            $att = '';
            foreach ($this->attachments as $info) {
                list($file, $displayName, $mimeType, $isBase64) = $info;
                $att .= $this->getAttachmentCode($file, $displayName, $mimeType, $isBase64);
            }
            $s = str_replace('{attachments}', $att, $s);

            $body = $this->getMainBodyCode($html, $embed);
            $s = str_replace('{attachmentBody}', $body, $s);
        }
        else {
            $s .= $this->getMainBodyCode($html, $embed);
        }

        $data = str_replace(PHP_EOL, "\r\n", $s);
        $data .= "\r\n.";
        return $data;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function getAttachmentCode($file, $displayName, $mimeType, $isBase64)
    {
        if (null === $mimeType) {
            if (false === $isBase64) {
                $mimeType = MimeTypeTool::getMimeType($file);
            }
            else {
                $mimeType = 'application/octet-stream';
            }
        }

        if (null === $displayName) {
            if (false === $isBase64) {
                $displayName = basename($file);
            }
            else {
                // should get the extension maybe?
                $displayName = 'attachment' . self::$cpt++;
            }
        }
        $displayName = str_replace(['"', '\\'], '', $displayName);
        $model = '
--attachment-boundary
Content-Type: ' . $mimeType . '
Content-Transfer-Encoding: base64
Content-Disposition: attachment; filename="' . $displayName . '"

{base64}        
        ';
        if (false === $isBase64) {
            $file = base64_encode(file_get_contents($file));
        }
        return str_replace('{base64}', chunk_split($file), $model);
    }

    private function getMainBodyCode($html, $embed)
    {
        if ($html) {
            $body = $this->getTemplate('mixed');
            $body = str_replace('{textPlain}', $this->_message, $body);
            if (true === $embed) {
                $htmlBody = $this->getTemplate('embed');
                $em = '';
                foreach ($this->embedded as $info) {
                    list($file, $cid, $mimeType, $isBase64) = $info;
                    $em .= $this->getEmbedCode($file, $cid, $mimeType, $isBase64);
                }
                $htmlBody = str_replace('{embedded}', $em, $htmlBody);
            }
            else {
                $htmlBody = $this->getTemplate('html');
            }
            $body = str_replace('{htmlBody}', $htmlBody, $body);
            $body = str_replace('{textHtml}', $this->html, $body);
        }
        else {
            $body = $this->getTemplate('plain');
            $body = str_replace('{textPlain}', $this->_message, $body);
        }
        return $body;
    }

    private function getEmbedCode($file, $cid, $mimeType, $isBase64)
    {

        if (null === $mimeType) {
            if (false === $isBase64) {
                $mimeType = MimeTypeTool::getMimeType($file);
            }
            else {
                $mimeType = 'application/octet-stream';
            }
        }
        $model = '
--embed-boundary
Content-Type: ' . $mimeType . '
Content-Disposition: inline
Content-Transfer-Encoding: base64
Content-ID: <' . $cid . '>

{base64}        
        ';
        if (false === $isBase64) {
            $file = base64_encode(file_get_contents($file));
        }
        return str_replace('{base64}', chunk_split($file), $model);

    }


    private function parseRecipients($recipients, $header, array &$store)
    {
        $h = [];
        if (is_string($recipients)) {
            // display names are good (required) for mail acceptation
            $store[] = $recipients;
            $h[$recipients] = $this->guessDisplayName($recipients, $header);
        }
        elseif (is_array($recipients)) {
            foreach ($recipients as $k => $v) {
                if (is_string($v)) {
                    if (is_numeric($k)) {
                        $store[] = $v;
                        $h[$v] = $this->guessDisplayName($v, $header);;
                    }
                    else {
                        $store[] = $k;
                        $h[$k] = $v;
                    }
                }
                else {
                    throw new \InvalidArgumentException(sprintf("recipients values must be of type string, one was found with type %s", gettype($v)));
                }
            }
        }
        else {
            throw new \InvalidArgumentException(sprintf("recipients argument must be either of type string or array, %s given", gettype($recipients)));
        }

        // prepare headers
        $n = 0;
        $s = '';
        foreach ($h as $email => $name) {
            if (0 !== $n) {
                $s .= ',';
            }
            if (null === $name) {
                $s .= '<' . $email . '>';
            }
            else {
                $s .= QuoteTool::quote($name, 2, '"') . ' <' . $email . '>';
            }
            $n++;
        }
        $this->headers[$header] = $s;
    }

    private function guessDisplayName($address, $header)
    {
        if ('From' === $header) {
            $ret = ucfirst(substr($address, strpos($address, '@') + 1));
            if (false !== $pos = strpos($ret, '.')) {
                $ret = substr($ret, 0, $pos);
            }
        }
        else {
            $ret = ucfirst(substr($address, 0, strpos($address, '@')));
        }
        return $ret;
    }

    private function fixHeader($key)
    {
        return str_replace(' ', '-', ucwords(preg_replace('/[_-]/', ' ', strtolower($key))));
    }


    private function checkHeaders(array $headers)
    {
        $req = ['From', 'To', 'Subject'];
        $missing = [];
        foreach ($req as $header) {
            if (
                !array_key_exists($header, $headers) ||
                empty($headers[$header])
            ) {
                $missing[] = $header;
            }
        }
        if ($missing) {
            return $this->error("The following headers are missing or empty: " . implode(', ', $missing));
        }
    }

    private function onAuthBefore(SmtpMailer $m)
    {
        $m->command('STARTTLS');

        stream_socket_enable_crypto($m->getSmtpSocket()->getSocket(), true, \STREAM_CRYPTO_METHOD_TLS_CLIENT);

        $reply = $m->command('EHLO ' . $this->getServerName());

        if (preg_match('!8BITMIME!', $reply)) {
            $this->_headers['Content-Transfer-Encoding'] = '8bit';
        }
        else {
            $this->_headers['Content-Transfer-Encoding'] = 'quoted-printable';
            $this->_message = quoted_printable_encode($this->_message);
        }
    }


    private function getTemplate($name)
    {
        $file = __DIR__ . "/SmtpClient/mime-templates/$name.txt";
        if (!file_exists($file)) {
            throw new \RuntimeException("Template not found: $file");
        }
        return file_get_contents($file);
    }


}
