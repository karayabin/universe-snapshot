<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Monitor;

use Komin\Component\Monitor\Listener\MonitorListenerInterface;



/**
 * Monitor
 * @author Lingtalfi
 * 2015-05-07
 *
 */
class LoggingMonitor extends Monitor implements LoggingMonitorInterface
{

    protected $listeners;

    public function __construct()
    {
        $this->listeners = [];
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS MonitorInterface
    //------------------------------------------------------------------------------/
    public function say($msg, $tags = null)
    {
        parent::say($msg, $tags);
        $this->log($msg, $tags);
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS LoggingMonitorInterface
    //------------------------------------------------------------------------------/
    public function addListener($listener)
    {
        $this->listeners[] = $listener;
    }

    public function setListeners(array $listeners)
    {
        $this->listeners = $listeners;
    }

    public function removeListeners()
    {
        $this->listeners = [];
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/    
    protected function log($msg, $tags)
    {
        foreach ($this->listeners as $listener) {
            if (null === $tags) {
                $tags = [];
            } elseif (!is_array($tags)) {
                $tags = [$tags];
            }
            if ($listener instanceof MonitorListenerInterface) {
                $listener->listen($msg, $tags);
            } elseif (is_callable($listener)) {
                call_user_func($listener, $msg, $tags);
            } else {
                throw new \InvalidArgumentException(sprintf("listener argument must be of type callable, %s given", gettype($listener)));
            }
        }
    }
}
