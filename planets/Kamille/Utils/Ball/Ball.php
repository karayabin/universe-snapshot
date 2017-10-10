<?php


namespace Kamille\Utils\Ball;

/**
 * The kamille ball was created to overcome the difficulty of having only
 * one available argument in hooks.
 *
 * With the ball, not only the pusher (the one pushing the ball into the hooks)
 * can add as many arguments as she wants, but she also can push useful context information
 * for the pullers.
 *
 * You see, when you are subscribing to a hook, you will obviously push data to the ball,
 * but sometimes you need to pull contextual information before you decide which
 * data is pushed.
 * So, the ball allows us to go both ways: push and pull.
 *
 */
class Ball
{
    private $data;

    public function __construct()
    {
        $this->data = [];
    }

    public static function create()
    {
        return new static();
    }

    public function push($k, $v)
    {
        $this->data[$k] = $v;
        return $this;
    }

    public function arrayMerge($arrayName, array $fragment)
    {
        if (true === array_key_exists($arrayName, $this->data)) {
            $this->data[$arrayName] = array_merge($this->data[$arrayName], $fragment);
        } else {
            $this->data[$arrayName] = $fragment;
        }
        return $this;
    }

//    public function arrayPush($arrName, $v)
//    {
//        $this->data[$arrName][] = $v;
//        return $this;
//    }
//
//    public function assocArrayPush($arrName, $k, $v)
//    {
//        $this->data[$arrName][$k] = $v;
//        return $this;
//    }

    public function pull($k, $default = null)
    {
        if (array_key_exists($k, $this->data)) {
            return $this->data[$k];
        }
        return $default;
    }
}