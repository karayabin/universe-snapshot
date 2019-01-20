<?php


namespace ListModifier\Circle;


use ListModifier\RequestModifier\RequestModifier;
use ListModifier\RequestModifier\RequestModifierInterface;

class ListModifierCircle
{

    private $listModifiers;


    public function __construct()
    {
        $this->listModifiers = [];
    }


    /**
     * @param $name , string|array
     *
     * @param callable|null $requestModifier ( RequestModifierInterface $modifier )
     * @return $this
     */
    public function setListModifier($name, callable $requestModifier = null)
    {
        if (is_array($name)) {
            $c = 0;
            foreach ($name as $nam) {
                if (0 === $c++) {
                    $this->listModifiers[$nam] = $requestModifier;
                } else {
                    // we don't want to execute the callback more than once
                    $this->listModifiers[$nam] = null;
                }
            }
        } else {
            $this->listModifiers[$name] = $requestModifier;
        }
        return $this;
    }


    /**
     * @return RequestModifierInterface
     */
    public function getRequestModifier()
    {
        $m = new RequestModifier();
        foreach ($this->listModifiers as $name => $cb) {
            if (is_callable($cb)) {
                call_user_func($cb, $m);
            }
        }
        return $m;
    }

    /**
     * @return array
     */
    public function getListModifierNames()
    {
        return array_keys($this->listModifiers);
    }

    public function clean()
    {
        $this->listModifiers = [];
    }



    public function __toString()
    {
        $s = '';
        $keys = array_keys($this->listModifiers);
        sort($keys);
        $c = 0;
        foreach ($keys as $name) {
            if (0 !== $c++) {
                $s .= '-';
            }
            $value = "";
            if (array_key_exists($name, $_GET)) {
                $value = $_GET[$name];
                if (is_array($value)) {
                    $value = implode('_', $value);
                }
            }
            $s .= $name . "." . $value;
        }
        return $s;
    }


}