<?php


namespace Ling\Jin\Log\Listener;


/**
 * @info The LoggerListenerInterface interface is the interface for all logger listeners.
 * A logger listener first subscribes to the Jin\Log\Logger class for a given channel.
 *
 * Then when the Logger emits messages on that channel, the logger listener reacts to those message.
 * The behaviour of the logger listener (how the logger listener reacts to the message)
 * is defined in concrete classes.
 *
 */
interface LoggerListenerInterface
{

    /**
     * @info Reacts to the given logger message in a specific way.
     * @param $msg
     * @param $channel
     * @return void
     */
    public function listen($msg, $channel);

}