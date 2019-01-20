<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Mail\XMail\XMailer;


/**
 * SwiftXMailer
 * @author Lingtalfi
 * 2014-12-07
 *
 * Params for SwiftXMailer are:
 *
 * - (all of the BaseSmtpXMailer params)
 * - test: false    (if true, prints a message instead of actually sending the email)
 *
 *
 *
 * Notes
 * -------
 * I had some issues with attach.inline: not working very well with 5.0.1, probably my fault?
 *
 */
class SwiftXMailer extends BaseSmtpXMailer
{

    protected function doSendMail(array $params)
    {
        $ret = 0;
        $test = (array_key_exists('test', $params) && true === $params['test']) ? true : false;
        try {

            // workaround for internal encoding
            // http://swiftmailer.org/docs/installing.html
            if (function_exists('mb_internal_encoding') && ((int)ini_get('mbstring.func_overload')) & 2) {
                $mbEncoding = mb_internal_encoding();
                mb_internal_encoding('ASCII');
            }


            //------------------------------------------------------------------------------/
            // SWIFT MESSAGE
            //------------------------------------------------------------------------------/
            $message = \Swift_Message::newInstance();

            // get the message
            $plain = null;
            $html = null;
            if (array_key_exists('plain', $params)) {
                $plain = $params['plain'];
            }
            if (array_key_exists('html', $params)) {
                $html = $params['html'];
                if (array_key_exists('embed', $params)) {
                    $this->prepareEmbeddedFiles($html, $params['embed'], $message);
                }
            }
            if (null !== $plain || null !== $html) {


                $message->setSubject($params['subject']);
                if (null !== $plain) {
                    $message->setBody($plain, 'text/plain');
                    if (null !== $html) {
                        $message->addPart($html, 'text/html');
                    }
                }
                elseif (null !== $html) {
                    $message->setBody($plain, 'text/html');
                }


                $message->setTo($params['to']);

                if (array_key_exists('cc', $params)) {
                    $message->setCc($params['cc']);
                }
                if (array_key_exists('bcc', $params)) {
                    $message->setBcc($params['bcc']);
                }
                if (array_key_exists('from', $params)) {
                    $message->setFrom($params['from']);
                }
                if (array_key_exists('sender', $params)) {
                    $message->setSender($params['sender']);
                }
                elseif (array_key_exists('from', $params)) {
                    $message->setSender($params['from']);
                }
                if (array_key_exists('returnPath', $params)) {
                    $message->setReturnPath($params['returnPath']);
                }
                elseif (array_key_exists('from', $params)) {
                    $message->setReturnPath($params['from']);
                }
                if (array_key_exists('attach', $params)) {
                    $this->attachFile($params['attach'], $message);
                }


                //------------------------------------------------------------------------------/
                // TRANSPORT
                //------------------------------------------------------------------------------/
                $transport = $this->getSwiftTransport($params);
                $mailer = \Swift_Mailer::newInstance($transport);
                if (false === $test) {
                    $ret = $mailer->send($message);
                }
                else {
                    $ret = count($params['to']);
                    echo sprintf("SwiftXMailer-test: %s message(s) sent", $ret);
                }


                // end of workaround for internal encoding
                if (isset($mbEncoding)) {
                    mb_internal_encoding($mbEncoding);
                }
            }
            else {
                trigger_error("Neither plain nor html key found: undefined body", E_USER_WARNING);
            }


        } catch (\Exception $e) {
            trigger_error($e->getMessage(), E_USER_WARNING);
            $ret = 0;
        }
        return $ret;
    }


    private function getSwiftTransport(array $params)
    {
        // assert: smtp is used (because we extend BaseSmtpXMailer)
        $smtpParams = $params['smtpParams'];
        $transport = \Swift_SmtpTransport::newInstance($smtpParams['host'], $smtpParams['port']);
        if (array_key_exists('user', $smtpParams) && array_key_exists('pass', $smtpParams)) {
            $transport->setUsername($smtpParams['user']);
            $transport->setPassword($smtpParams['pass']);
        }
        if (array_key_exists('protocol', $smtpParams)) {
            $transport->setEncryption($smtpParams['protocol']);
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
}
