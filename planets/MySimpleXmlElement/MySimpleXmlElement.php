<?php

namespace MySimpleXmlElement;

/*
 * LingTalfi 2015-10-24
 */
class MySimpleXmlElement
{

    private $name;
    private $value;

    /**
     * @var MySimpleXmlElement[]
     */
    private $elements;
    private $attributes;
    private $useCDATA;

    public function __construct($name)
    {
        $this->name = $name;
        $this->elements = [];
        $this->attributes = [];
        $this->useCDATA = false;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    public static function create($name)
    {
        return new static($name);
    }

    public function addElement(MySimpleXmlElement $x)
    {
        $this->elements[] = $x;
        return $this;
    }


    public function createChild($name, $value = null, $useCDATA = false)
    {
        $el = MySimpleXmlElement::create($name);
        if (null !== $value) {
            $el->setValue($value);
        }
        if (true === $useCDATA) {
            $el->setUseCDATA(true);
        }
        $this->elements[] = $el;
        return $el;
    }
    
    public function createChildReturn($name, $value = null, $useCDATA = false)
    {
        $this->createChild($name, $value, $useCDATA);
        return $this;
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }

    public function getElements()
    {
        return $this->elements;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getUseCDATA()
    {
        return $this->useCDATA;
    }

    public function setUseCDATA($useCDATA)
    {
        $this->useCDATA = $useCDATA;
        return $this;
    }


}
