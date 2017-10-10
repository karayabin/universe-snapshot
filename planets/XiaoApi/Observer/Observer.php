<?php


namespace XiaoApi\Observer;


use XiaoApi\Observer\Listener\ListenerInterface;


class Observer implements ObserverInterface
{

    private $listeners;

    public function __construct()
    {
        $this->listeners = [];
    }

    public function hook($hookType, $data)
    {
        if (array_key_exists($hookType, $this->listeners)) {
            foreach ($this->listeners[$hookType] as $listener) {
                /**
                 * @var $listener ListenerInterface
                 */
                $listener->listen($data);
            }
        }
    }

    public function addListener($hookType, ListenerInterface $listener)
    {
        if (is_array($hookType)) {
            foreach ($hookType as $type) {
                $this->listeners[$type][] = $listener;
            }
        } else {
            $this->listeners[$hookType][] = $listener;
        }
    }
}