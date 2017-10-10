<?php


namespace Logger\Listener;


interface LoggerListenerInterface
{
    public function listen($msg, $identifier);
}