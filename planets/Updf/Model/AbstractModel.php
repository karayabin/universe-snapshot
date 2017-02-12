<?php


namespace Updf\Model;


abstract class AbstractModel implements ModelInterface
{
    protected $vars;


    public static function create()
    {
        return new static();
    }


    public function getVariables()
    {
        if (null === $this->vars) {
            $this->vars = [];
        }
        return $this->vars;
    }

    public function setVar($name, $value)
    {
        $this->vars[$name] = $value;
        return $this;
    }

    public function getFont()
    {
        return 'helvetica';
    }


}