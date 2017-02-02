<?php

namespace Installer\Report\ReportMessage;


class ReportMessage implements ReportMessageInterface
{
    private $message;

    /**
     * msg can be anything:
     * - string
     * - exception
     *
     */
    public function __construct($msg)
    {
        $this->message = $msg;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function __toString()
    {
        if ($this->message instanceof \Exception) {
            return $this->message->getMessage();
        }
        return (string)$this->message;
    }
}