<?php


namespace MethodInjector\Method;


class Method
{

    private $name;
    private $content;


    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getContent()
    {
        return $this->content;
    }
}