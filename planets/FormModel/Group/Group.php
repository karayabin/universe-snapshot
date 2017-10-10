<?php


namespace FormModel\Group;


class Group implements GroupInterface
{

    private $_label;
    private $_children;


    public function __construct()
    {
        $this->_children = [];
    }

    public static function create()
    {
        return new static();
    }


    public function children(array $children)
    {
        $this->_children = $children;
        return $this;
    }

    public function label($label)
    {
        $this->_label = $label;
        return $this;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    public function getChildren()
    {
        return $this->_children;
    }

    public function getLabel()
    {
        return $this->_label;
    }

}