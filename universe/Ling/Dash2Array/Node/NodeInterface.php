<?php


namespace Ling\Dash2Array\Node;


interface NodeInterface
{
    /**
     * @return NodeInterface[]
     */
    public function getChildren();

    public function addChild(NodeInterface $node);


    /**
     * @return string
     */
    public function getValue();

    public function setValue($value);
}
