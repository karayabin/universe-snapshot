<?php


namespace MyAppTools\Application;


class Application
{

    private static $inst;
    private $vars;

    private function __construct()
    {
        $this->vars = [];
    }


    public static function inst()
    {
        if (null === self::$inst) {
            self::$inst = new static;
        }
        return self::$inst;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function set($key, $value)
    {
        $this->vars[$key] = $value;
        return $this;
    }

    public function get($key)
    {
        if (array_key_exists($key, $this->vars)) {
            return $this->vars[$key];
        }
        throw new \Exception("Unknown key: $key");
    }

    public function getOr($key, $default = false)
    {
        if (array_key_exists($key, $this->vars)) {
            return $this->vars[$key];
        }
        return $default;
    }

} 