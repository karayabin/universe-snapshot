<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Abstractive\EventDispatcher;


/**
 * EventDispatcher.
 * @author LingTalfi
 */
class EventDispatcher implements EventDispatcherInterface
{


    private $listeners;

    public function __construct()
    {
        $this->listeners = [];
    }

    //------------------------------------------------------------------------------/
    // IMPLEMENTS EventDispatcherInterface
    //------------------------------------------------------------------------------/
    /**
     * @see EventDispatcherInterface
     * @inheritDoc
     */
    public function dispatch($eventName, Event $event = null)
    {
        if (array_key_exists($eventName, $this->listeners)) {
            $listeners = $this->listeners[$eventName];
            if (null === $event) {
                $event = new Event();
            }
            foreach ($listeners as $listener) {
                call_user_func($listener, $event);
                if ($event->isPropagationStopped()) {
                    break;
                }
            }
        }
    }

    /**
     * @return int, listener index
     */
    public function addListener($eventName, $listener)
    {
        if (!array_key_exists($eventName, $this->listeners)) {
            $this->listeners[$eventName] = [];
        }
        $index = count($this->listeners[$eventName]);
        $this->listeners[$eventName][$index] = $eventName;
        return $index;
    }

    /**
     * @return bool, false if the listener wasn't found
     */
    public function removeListener($eventName, $listenerIndex)
    {
        if (array_key_exists($eventName, $this->listeners)) {
            if (array_key_exists($listenerIndex, $this->listeners[$eventName])) {
                unset($this->listeners[$eventName][$listenerIndex]);
                return true;
            }
        }
        return false;
    }

    /**
     * @return array of indexes
     */
    public function getIndexes()
    {
        return array_keys($this->listeners);
    }


}
