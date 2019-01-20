<?php


namespace Kamille\Utils\Session;


use Bat\SessionTool;

class KamilleSession
{


    public static function set($k, $v)
    {
        SessionTool::start();
        if (false === array_key_exists(static::getSessionName(), $_SESSION)) {
            $_SESSION[static::getSessionName()] = [];
        }
        $_SESSION[static::getSessionName()][$k] = $v;
    }

    public static function get($k, $default = null)
    {
        SessionTool::start();
        if (array_key_exists(static::getSessionName(), $_SESSION)) {
            if (array_key_exists($k, $_SESSION[static::getSessionName()])) {
                return $_SESSION[static::getSessionName()][$k];
            }
        }
        return $default;
    }

    public static function all()
    {
        SessionTool::start();
        if (array_key_exists(static::getSessionName(), $_SESSION)) {
            return $_SESSION[static::getSessionName()];
        }
        return [];
    }


    public static function has($k)
    {
        SessionTool::start();
        if (array_key_exists(static::getSessionName(), $_SESSION)) {
            return array_key_exists($k, $_SESSION[static::getSessionName()]);
        }
        return false;
    }

    public static function remove($k)
    {
        SessionTool::start();
        if (array_key_exists(static::getSessionName(), $_SESSION)) {
            unset($_SESSION[static::getSessionName()][$k]);
        }
        return false;
    }


    public static function pick($k, $default = null)
    {
        SessionTool::start();
        if (array_key_exists(static::getSessionName(), $_SESSION)) {
            if (array_key_exists($k, $_SESSION[static::getSessionName()])) {
                $value = $_SESSION[static::getSessionName()];
                unset($_SESSION[static::getSessionName()][$k]);
                return $value;
            }
        }
        return $default;
    }


    //--------------------------------------------
    // 
    //--------------------------------------------
    protected static function getSessionName()
    {
        return "kamille";
    }
}