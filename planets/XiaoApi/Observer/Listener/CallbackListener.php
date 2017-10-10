<?php


namespace XiaoApi\Observer\Listener;


class CallbackListener implements ListenerInterface
{

    private $callback;

    public function __construct(callable $fn)
    {
        $this->callback = $fn;
    }

    public static function create(callable $fn)
    {
        return new static($fn);
    }

    public function listen($data)
    {
        call_user_func($this->callback, $data);
    }
}