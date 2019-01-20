<?php


namespace Dispatcher\Basic;


class BasicDispatcher implements BasicDispatcherInterface
{

    private $listeners;

    public function __construct()
    {
        $this->listeners = [];
    }

    public static function create()
    {
        return new static();
    }


    public function on($eventIdentifier, callable $callable, $position = 0)
    {
        $this->listeners[$eventIdentifier][$position][] = $callable;
        return $this;
    }

    public function trigger($eventIdentifier, $data)
    {
        if (array_key_exists($eventIdentifier, $this->listeners)) {
            $listeners = $this->listeners[$eventIdentifier];
            asort($listeners);
            foreach ($listeners as $posListeners) {
                foreach ($posListeners as $listener) {
                    call_user_func($listener, $data);
                }
            }
        }
        return $this;
    }
}