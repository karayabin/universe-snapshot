<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Log\ExceptionLogger\Listener;

use BeeFramework\Bat\DateTool;
use BeeFramework\Component\Mail\SmtpMailer\SmtpClientInterface;
use Komin\Component\Log\ExceptionLogger\Listener\Tool\ExceptionTagsFormatterTool;


/**
 * BaseMailAlertExceptionListener
 * @author Lingtalfi
 * 2015-25-05
 *
 * This class is designed to send a simple alert mail to the maintainer of an application
 * when something goes wrong.
 *
 *
 *
 */
class BaseMailAlertExceptionListener implements ExceptionListenerInterface
{

    /**
     * @var SmtpClientInterface
     */
    private $smtpClient;
    private $from;
    private $recipients;
    private $subject;
    private $format;

    public function __construct()
    {
        $this->subject = "A problem occurred in the application";
        $this->format = "{message}";
    }




    //------------------------------------------------------------------------------/
    // IMPLEMENTS ExceptionListenerInterface
    //------------------------------------------------------------------------------/
    public function listen(\Exception $e, &$stopPropagation = false)
    {
        if (null === $this->recipients) {
            throw new \RuntimeException("undefined recipients");
        }

        if (null === $this->smtpClient) {
            throw new \RuntimeException("undefined smtpClient");
        }

        $subject = ExceptionTagsFormatterTool::formatString($this->subject, $e);
        $message = ExceptionTagsFormatterTool::formatString($this->format, $e);

        $this->smtpClient
            ->from($this->from)
            ->to($this->recipients)
            ->subject($subject)
            ->send($message);
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setSmtpClient(SmtpClientInterface $smtpClient)
    {
        $this->smtpClient = $smtpClient;
        return $this;
    }

    public function setFormat($format)
    {
        $this->format = $format;
        return $this;
    }

    public function setRecipients($recipients)
    {
        $this->recipients = $recipients;
        return $this;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    public function getFrom()
    {
        return $this->from;
    }

    public function setFrom($from)
    {
        $this->from = $from;
        return $this;
    }
    

}
