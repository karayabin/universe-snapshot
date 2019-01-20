<?php


namespace Notifier;

class Notifier
{


    private $handlers;


    public function __construct()
    {
        $this->handlers = [];
    }

    public function notify($eventName)
    {
        $args = func_get_args();
        array_shift($args);

        if (array_key_exists($eventName, $this->handlers)) {
            $handlers = $this->handlers[$eventName];
            foreach ($handlers as $handler) {
                call_user_func_array($handler, $args);
            }
        }
    }

    public function subscribe($eventName, callable $handler)
    {
        $this->handlers[$eventName][] = $handler;
        return $this;
    }
}