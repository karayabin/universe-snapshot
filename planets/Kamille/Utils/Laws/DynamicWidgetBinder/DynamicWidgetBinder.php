<?php


namespace Kamille\Utils\Laws\DynamicWidgetBinder;


use Kamille\Utils\Laws\DynamicWidgetBinder\Listener\DynamicWidgetBinderListenerInterface;

class DynamicWidgetBinder
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

    public function notify($context, $payload, array &$config)
    {
        if (array_key_exists($context, $this->listeners)) {
            $listeners = $this->listeners[$context];
            foreach ($listeners as $listener) {
                if (is_callable($listener)) {
                    call_user_func_array($listener, [&$config]);
                } elseif ($listener instanceof DynamicWidgetBinderListenerInterface) {
                    $listener->decorate($payload, $config);
                }
            }
        }
    }


    public function setListener($context, $listener)
    {
        $this->listeners[$context][] = $listener;
        return $this;
    }
}