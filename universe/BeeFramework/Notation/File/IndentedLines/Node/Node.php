<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\File\IndentedLines\Node;


/**
 * Node
 * @author Lingtalfi
 * 2015-02-27
 *
 */
class Node implements NodeInterface
{

    protected $key;
    protected $value;
    protected $children;

    function __construct($value = '', $key = null)
    {
        if (is_string($value)) {
            $this->key = $key;
            $this->value = $value;
            $this->children = [];
        }
        else {
            throw new \InvalidArgumentException("The value argument must be a string");
        }
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
