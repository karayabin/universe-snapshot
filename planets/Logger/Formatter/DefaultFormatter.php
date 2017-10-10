<?php


namespace Logger\Formatter;


class DefaultFormatter implements FormatterInterface
{


    public static function create()
    {
        return new static();
    }

    public function format($msg, $identifier)
    {
        return "[$identifier]: $msg";
    }

}