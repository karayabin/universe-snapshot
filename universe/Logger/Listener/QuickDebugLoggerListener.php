<?php


namespace Logger\Listener;


class QuickDebugLoggerListener implements LoggerListenerInterface
{
    private $callback;


    public function __construct()
    {
        $this->callback = function ($msg, $identifier) {
            if ("error" === $identifier) {
                az("QuickDebugLoggerListener: $msg");
            }
        };
    }

    public static function create()
    {
        return new static();
    }

    public function listen($msg, $identifier)
    {
        call_user_func($this->callback, $msg, $identifier);
    }

    public function setCallback(callable $callback)
    {
        $this->callback = $callback;
        return $this;
    }


}