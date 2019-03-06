<?php


namespace Ling\XiaoApi\Object;


class CrudObject
{

    private static $inst = [];
    private $listeners;

    public function __construct()
    {
        $this->listeners = [];
    }

    /**
     * @return static
     */
    public static function getInst()
    {
        $class = get_called_class();
        if (false === array_key_exists($class, self::$inst)) {
            self::$inst[$class] = new static();

        }
        return self::$inst[$class];
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    public function trigger($eventName)
    {
        $listeners = $this->listeners[$eventName] ?? [];
        if ($listeners) {
            foreach ($listeners as $listener) {
                call_user_func_array($listener, func_get_args());
            }
        }
        return $this;
    }

    public function addListener($eventName, callable $listener)
    {
        if (!is_array($eventName)) {
            $eventName = [$eventName];
        }
        foreach ($eventName as $evName) {
            $this->listeners[$evName][] = $listener;
        }
        return $this;
    }

}