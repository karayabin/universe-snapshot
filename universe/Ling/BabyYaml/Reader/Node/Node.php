<?php


namespace Ling\BabyYaml\Reader\Node;

/**
 * Node
 * @author Lingtalfi
 * 2015-02-27 --> 2019-05-02
 *
 */
class Node implements NodeInterface
{

    protected $key;
    protected $value;
    protected $children;
    protected $isMultiline;

    function __construct($value = '', $key = null)
    {
        $this->isMultiline = false;
        if (is_string($value)) {
            $this->key = $key;
            $this->value = $value;
            $this->children = [];
        } else {
            throw new \InvalidArgumentException("The value argument must be a string");
        }
    }


    public function setIsMultiLine($isMultiline)
    {
        $this->isMultiline = $isMultiline;
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

    /**
     * @return bool
     */
    public function isMultiline()
    {
        return $this->isMultiline;
    }


}
