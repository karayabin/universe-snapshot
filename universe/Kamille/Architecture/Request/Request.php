<?php


namespace Kamille\Architecture\Request;


class Request implements RequestInterface
{
    protected $params;


    public function __construct()
    {
        $this->params = [];
    }

    //--------------------------------------------
    // PARAMS
    //--------------------------------------------
    public function set($key, $value)
    {
        $this->params[$key] = $value;
        return $this;
    }

    public function get($key, $defaultValue = null)
    {
        if (array_key_exists($key, $this->params)) {
            return $this->params[$key];
        }
        return $defaultValue;
    }
}