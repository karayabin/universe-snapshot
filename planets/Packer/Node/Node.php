<?php


namespace Packer\Node;


class Node
{


    private $parents;
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }


    public function bindParent(Node $node)
    {
        $this->parents[$node->getName()] = $node;
        return $this;
    }

    public function unbindParent($name)
    {
        unset($this->parents[$name]);
        return $this;
    }


    public function getParents()
    {
        return $this->parents;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }


}