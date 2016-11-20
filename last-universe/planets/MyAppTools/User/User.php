<?php

namespace MyAppTools\User;

/*
 * LingTalfi 2016-01-05
 */
class User
{


    private static $inst;
    protected static $userKey = "_myAppUser";

    //
    private $vars;
    private $alive;

    protected function __construct()
    {
        $this->vars = [];
        $this->alive = false;
        $this->initSession();
    }

    public static function inst()
    {
        if (null === self::$inst) {
            self::$inst = new static;
        }
        return self::$inst;
    }


    public function all()
    {
        return $this->vars;
    }

    public function create(array $vars)
    {
        $this->vars = $vars;
        $_SESSION[self::$userKey] = $vars;
        return $this;
    }

    public function destroy()
    {
        $this->vars = [];
        unset($_SESSION[self::$userKey]);
        return $this;
    }

    public function isAlive()
    {
        return $this->alive;
    }

    public function set($k, $v)
    {
        $this->vars[$k] = $v;
        $_SESSION[self::$userKey][$k] = $v;
        return $this;
    }

    public function get($k)
    {
        if (array_key_exists($k, $this->vars)) {
            return $this->vars[$k];
        }
        throw new \RuntimeException("Unknown key: $k");
    }

    public function getOr($k, $default = null)
    {
        if (array_key_exists($k, $this->vars)) {
            return $this->vars[$k];
        }
        return $default;
    }


    private function initSession()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            if (array_key_exists(self::$userKey, $_SESSION)) {
                $this->vars = $_SESSION[self::$userKey];
                $this->alive = true;
            }
        }
    }
}
