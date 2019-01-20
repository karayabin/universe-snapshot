<?php



namespace BabyYaml\Reader\Node;


/**
 * NodeInterface
 * @author Lingtalfi
 * 2015-02-27
 *
 */
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

    /**
     * @return null|string
     *          Null to use php's native indexation system
     */
    public function getKey();

    public function setKey($key);
}
