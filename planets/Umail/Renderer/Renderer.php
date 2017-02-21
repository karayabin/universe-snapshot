<?php

namespace Umail\Renderer;

class Renderer extends AbstractRenderer
{


    protected $varRefWrapper;

    public function __construct()
    {
        parent::__construct();
        $this->varRefWrapper = function ($var) {
            return '{' . $var . '}';
        };
    }

    public function setVarRefWrapper(\Closure $func)
    {
        $this->varRefWrapper = $func;
        return $this;
    }


    public function render(array $vars)
    {
        /**
         * Remove nested array, since we will do a basic
         * string replacement
         */
        $vars = array_filter($vars, function ($v) {
            if (is_array($v)) {
                return false;
            }
            return true;
        });

        $keys = array_keys($vars);
        if (is_callable($this->varRefWrapper)) {
            $keys = array_map($this->varRefWrapper, $keys);
        }
        $values = array_values($vars);

        return str_replace($keys, $values, $this->tplContent);
    }
}