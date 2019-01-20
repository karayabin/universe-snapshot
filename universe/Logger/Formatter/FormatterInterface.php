<?php


namespace Logger\Formatter;


interface FormatterInterface
{

    /**
     * @return string, the formatted message to use
     *
     * The returned message can/should be trimmed (i.e. you don't need
     * to add any extra carriage return at the end of the message).
     *
     * For carriage returns, use the PHP_EOL constant if you're not sure.
     *
     */
    public function format($msg, $identifier);

}