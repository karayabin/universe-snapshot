<?php


namespace IndentedLines\Node;


/**
 * Node
 * @author Lingtalfi
 * 2015-12-14
 *
 */
class Node implements NodeInterface
{

    protected $key;
    protected $value;
    protected $children;

    /**
     * Value must be a string
     */
    function __construct($value = '', $key = null)
    {
        $this->key = $key;
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

    /**
     * @return null|string
     *          Null to use php's native indexation system
     */
    public function getKey()
    {
        return $this->key;
    }

    public function addChild(NodeInterface $node)
    {
        $this->children[] = $node;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function setKey($key)
    {
        $this->key = $key;
    }


}
