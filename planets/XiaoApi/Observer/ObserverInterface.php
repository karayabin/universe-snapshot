<?php


namespace XiaoApi\Observer;


use XiaoApi\Observer\Listener\ListenerInterface;

interface ObserverInterface
{
    public function hook($hookType, $data);

    /**
     * @param $hookType, string|array, the hook type(s) the listener wants to listen to
     * @param ListenerInterface $listener
     */
    public function addListener($hookType, ListenerInterface $listener);
}