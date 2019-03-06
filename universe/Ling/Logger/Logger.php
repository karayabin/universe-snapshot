<?php


namespace Ling\Logger;


use Ling\Logger\Listener\LoggerListenerInterface;

class Logger implements LoggerInterface
{
    /**
     * @var LoggerListenerInterface[]
     */
    private $listeners;

    public function __construct()
    {
        $this->listeners = [];
    }

    public static function create()
    {
        return new static();
    }

    public function log($msg, $identifier)
    {
        foreach ($this->listeners as $listener) {
            $listener->listen($msg, $identifier);
        }
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    public function addListener(LoggerListenerInterface $listener)
    {
        $this->listeners[] = $listener;
        return $this;
    }
}
