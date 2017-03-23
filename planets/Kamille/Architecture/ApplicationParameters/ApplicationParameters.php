<?php


namespace Kamille\Architecture\ApplicationParameters;

use Kamille\Architecture\ApplicationParameters\Exception\ApplicationParametersException;


class ApplicationParameters
{
    protected static $params;


    public static function set($key, $value)
    {
        self::$params[$key] = $value;
    }

    public static function get($key, $defaultValue = null, $throwEx = false)
    {
        if (array_key_exists($key, self::$params)) {
            return self::$params[$key];
        }
        if (true === $throwEx) {
            throw new ApplicationParametersException("Parameter not set: $key");
        }
        return $defaultValue;
    }


    public static function all()
    {
        return self::$params;
    }


}