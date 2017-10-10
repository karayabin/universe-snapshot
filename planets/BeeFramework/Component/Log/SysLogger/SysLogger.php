<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Log\SysLogger;


/**
 * SysLogger
 * @author Lingtalfi
 * 2015-05-29
 *
 * A listener is a callable:
 *
 *              void callable ( level, message, &stopPropagation )
 *
 */
class SysLogger implements SysLoggerInterface
{

    protected $listeners;

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
    public function emergency($message)
    {
        return $this->log('emergency', $message);
    }

    /**
     * Action must be taken immediately.
     *
     * Example: Entire website down, database unavailable, etc. This should
     * trigger the SMS alerts and wake you up.
     */
    public function alert($message)
    {
        return $this->log('alert', $message);
    }

    /**
     * Critical conditions.
     *
     * Example: Application component unavailable, unexpected exception.
     *
     */
    public function critical($message)
    {
        return $this->log('critical', $message);
    }

    /**
     * Runtime errors that do not require immediate action but should typically
     * be logged and monitored.
     *
     */
    public function error($message)
    {
        return $this->log('error', $message);
    }

    /**
     * Exceptional occurrences that are not errors.
     *
     * Example: Use of deprecated APIs, poor use of an API, undesirable things
     * that are not necessarily wrong.
     *
     */
    public function warning($message)
    {
        return $this->log('warning', $message);
    }

    /**
     * Normal but significant events.
     *
     */
    public function notice($message)
    {
        return $this->log('notice', $message);
    }

    /**
     * Interesting events.
     *
     * Example: User logs in, SQL logs.
     *
     */
    public function info($message)
    {
        return $this->log('info', $message);
    }

    /**
     * Detailed debug information.
     *
     */
    public function debug($message)
    {
        return $this->log('debug', $message);
    }

    /**
     * Logs with an arbitrary level.
     */
    public function log($level, $message)
    {
        $stopPropagation = false;
        foreach ($this->listeners as $listener) {
            call_user_func_array($listener, [$level, $message, &$stopPropagation]);
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

}
