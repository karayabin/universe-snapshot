<?php


namespace Ling\UniversalLogger;


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
     * @param mixed $message
     * @param string $channel
     */
    public function log($message, string $channel): void;
}