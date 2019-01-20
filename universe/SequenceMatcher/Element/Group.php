<?php


namespace SequenceMatcher\Element;


class Group implements GroupInterface
{

    private $elements;


    public function __construct()
    {
        $this->elements = [];
    }


    public static function create()
    {
        return new self();
    }

    public function addElement(ElementInterface $element, $modificator = null, $marker = null)
    {
        $this->elements[] = [$element, $modificator, $marker];
        return $this;
    }

    public function getElements()
    {
        return $this->elements;
    }


}