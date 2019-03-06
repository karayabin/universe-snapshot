<?php


namespace Ling\MethodInjector\Method;


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

    public function getInnerContent()
    {
        $s = $this->getContent();
        $s = trim($s);
        $s = substr($s, 0, -1);
        $p = explode('{', $s, 2);
        if (2 === count($p)) {
            return trim($p[1]);
        } else {
            return false;
        }
    }
}