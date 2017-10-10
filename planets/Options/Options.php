<?php


namespace Options;


class Options implements OptionsInterface
{

    private $vars;

    public function __construct()
    {
        $this->vars = [];
    }

    public static function create()
    {
        return new static();
    }

    public function get($k, $default = null, $throwEx = false)
    {
        if (array_key_exists($k, $this->vars)) {
            return $this->vars[$k];
        }

        /**
         * Allows you to extend this class, and
         * then search the protected/public properties of this class
         */
        $props = get_object_vars($this);
        if (array_key_exists($k, $props)) {
            return $props[$k];
        }


        if (true === $throwEx) {
            $this->throwException("Key not found: $k");
        }
        return $default;
    }

    public function setVar($k, $v)
    {
        $this->vars[$k] = $v;
        return $this;
    }

    public function setVars($vars)
    {
        $this->vars = $vars;
        return $this;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    protected function throwException($msg) // override me
    {
        throw new \Exception($msg);
    }
}