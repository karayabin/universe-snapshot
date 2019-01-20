<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Log\Logger;


/**
 * Logger
 * @author Lingtalfi
 * 2015-06-01
 *
 */
class Logger implements LoggerInterface
{

    private $listeners;

    public function __construct()
    {
        $this->listeners = [];
    }



    //------------------------------------------------------------------------------/
    // IMPLEMENTS SimpleSysLoggerInterface
    //------------------------------------------------------------------------------/
    /**
     * System is unusable.
     */
    public function emergency($message, $tags = null)
    {
        return $this->doLog('emergency', $message, $tags);
    }

    /**
     * Action must be taken immediately.
     *
     * Example: Entire website down, database unavailable, etc. This should
     * trigger the SMS alerts and wake you up.
     */
    public function alert($message, $tags = null)
    {
        return $this->doLog('alert', $message, $tags);
    }

    /**
     * Critical conditions.
     *
     * Example: Application component unavailable, unexpected exception.
     *
     */
    public function critical($message, $tags = null)
    {
        return $this->doLog('critical', $message, $tags);
    }

    /**
     * Runtime errors that do not require immediate action but should typically
     * be logged and monitored.
     *
     */
    public function error($message, $tags = null)
    {
        return $this->doLog('error', $message, $tags);
    }

    /**
     * Exceptional occurrences that are not errors.
     *
     * Example: Use of deprecated APIs, poor use of an API, undesirable things
     * that are not necessarily wrong.
     *
     */
    public function warning($message, $tags = null)
    {
        return $this->doLog('warning', $message, $tags);
    }

    /**
     * Normal but significant events.
     *
     */
    public function notice($message, $tags = null)
    {
        return $this->doLog('notice', $message, $tags);
    }

    /**
     * Interesting events.
     *
     * Example: User logs in, SQL logs.
     *
     */
    public function info($message, $tags = null)
    {
        return $this->doLog('info', $message, $tags);
    }

    /**
     * Detailed debug information.
     *
     */
    public function debug($message, $tags = null)
    {
        return $this->doLog('debug', $message, $tags);
    }

    /**
     * Logs with an arbitrary level.
     */
    public function log($message, $tags = null)
    {
        if (null === $tags) {
            $tags = [];
        }
        elseif (is_string($tags)) {
            $tags = [$tags];
        }
        $stopPropagation = false;
        foreach ($this->listeners as $listener) {
            call_user_func_array($listener, [$message, $tags, &$stopPropagation]);
            if (true === $stopPropagation) {
                break;
            }
        }
        return $this;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setListener(callable $listener, $index = null)
    {
        if (null === $index) {
            $this->listeners[] = $listener;
        }
        else {
            $this->listeners[$index] = $listener;
        }
        return $this;
    }

    public function setListeners(array $listeners)
    {
        foreach ($listeners as $k => $lis) {
            $this->setListener($lis, $k);
        }
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function doLog($level, $msg, $tags = null)
    {
        if (null === $tags) {
            $tags = [];
        }
        elseif (is_string($tags)) {
            $tags = [$tags];
        }
        if (is_array($tags)) {
            $tags['level'] = $level;
        }
        return $this->log($msg, $tags);
    }

}
