<?php


namespace Kamille\Architecture\Registry;


use Kamille\Architecture\Registry\Exception\RegistryException;

class ApplicationRegistry
{


    private static $vars = [];


    public static function get($key, $default = null, $throwEx = false)
    {
        if (array_key_exists($key, self::$vars)) {
            return self::$vars[$key];
        }
        if (true === $throwEx) {
            throw new RegistryException("Key not found: $key");
        }
        return $default;
    }

    public static function set($key, $value)
    {
        self::$vars[$key] = $value;
    }

    public static function all()
    {
        return self::$vars;
    }

    public static function keys()
    {
        return array_keys(self::$vars);
    }

}


