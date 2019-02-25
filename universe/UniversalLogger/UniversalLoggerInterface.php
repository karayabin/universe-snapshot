<?php


namespace UniversalLogger;


/**
 * The UniversalLoggerInterface interface.
 *
 * A logger will send log messages to some channels.
 *
 */
interface UniversalLoggerInterface
{
    /**
     * Sends a the log $message to the given $channel.
     *
     * @param string $message
     * @param string $channel
     */
    public function log(string $message, string $channel): void;
}