<?php


namespace Ling\Logger\Listener;


interface LoggerListenerInterface
{
    public function listen($msg, $identifier);
}