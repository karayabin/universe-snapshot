<?php


namespace Dash2Array\Node;


class Node implements NodeInterface
{

    protected $value;
    protected $children;

    function __construct($value = '')
    {
        $this->value = $value;
        $this->children = [];
    }





    //------------------------------------------------------------------------------/
    // IMPLEMENTS NodeInterface
    //------------------------------------------------------------------------------/
    /**
     * @return NodeInterface[]
     */
    public function getChildren()
    {
        return $this->children;
    }


    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    public function addChild(NodeInterface $node)
    {
        $this->children[] = $node;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

}
