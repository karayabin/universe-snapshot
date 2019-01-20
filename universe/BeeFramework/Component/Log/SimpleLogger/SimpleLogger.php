<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Log\SimpleLogger;

use BeeFramework\Component\Log\SimpleLogger\Listener\LoggerListenerInterface;


/**
 * SimpleLogger
 * @author Lingtalfi
 * 2015-05-05
 *
 */
class SimpleLogger implements SimpleLoggerInterface
{

    protected $listeners;

    public function __construct()
    {
        $this->listeners = [];
    }



    //------------------------------------------------------------------------------/
    // IMPLEMENTS SimpleLoggerInterface
    //------------------------------------------------------------------------------/
    public function log($msg, $tags = null)
    {
        foreach ($this->listeners as $listener) {
            if (null === $tags) {
                $tags = [];
            }
            elseif (!is_array($tags)) {
                $tags = [$tags];
            }
            if ($listener instanceof LoggerListenerInterface) {
                $listener->listen($msg, $tags);
            }
            elseif (is_callable($listener)) {
                call_user_func($listener, $msg, $tags);
            }
            else {
                throw new \InvalidArgumentException(sprintf("listener argument must be of type callable, %s given", gettype($listener)));
            }
        }
    }

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

}
