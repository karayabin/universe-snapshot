<?php


namespace Dispatcher\Basic;


interface BasicDispatcherInterface
{


    /**
     * listeners with the lowest position are executed first
     */
    public function on($eventIdentifier, callable $callable, $position = 0);


    /**
     * data can be anything
     */
    public function trigger($eventIdentifier, $data);
}