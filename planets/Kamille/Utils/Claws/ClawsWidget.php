<?php

namespace Kamille\Utils\Claws;


use Kamille\Utils\Claws\Exception\ClawsException;

class ClawsWidget
{

    private $template;
    private $conf;
    private $class;

    public function __construct()
    {
        $this->conf = [];
        $this->class = "Kamille\Mvc\Widget\Widget";
    }


    public static function create()
    {
        return new static();
    }

    /**
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }

    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }

    /**
     * @return array
     */
    public function getConf()
    {
        $this->prepareConfArray();
        return $this->conf;
    }

    /**
     * @param $conf , array or callable returning an array.
     *      That's because sometimes you need to defer the retrieving of the conf
     *      at a later time.
     *
     * @return $this
     */
    public function setConf($conf)
    {
        $this->conf = $conf;
        return $this;
    }

    public function setConfVariable($key, $value)
    {
        $this->prepareConfArray();
        $this->conf[$key] = $value;
        return $this;
    }

    public function removeConfVariable($key)
    {
        $this->prepareConfArray();
        unset($this->conf[$key]);
        return $this;
    }

    public function getConfVariable($key, $default = null, $throwEx = false)
    {
        $this->prepareConfArray();
        if (array_key_exists($key, $this->conf)) {
            return $this->conf[$key];
        }
        if (true === $throwEx) {
            throw new ClawsException("Undefined conf variable: $key");
        }
        return $default;
    }

    /**
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    public function setClass($class)
    {
        $this->class = $class;
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    private function prepareConfArray()
    {
        if (!is_array($this->conf)) {
            $this->conf = call_user_func($this->conf);
            if (!is_array($this->conf)) {
                throw new ClawsException("The deferred conf callable must return an array, " . gettype($this->conf) . " given, template is " . $this->template);
            }
        }
        return $this->conf;
    }


}