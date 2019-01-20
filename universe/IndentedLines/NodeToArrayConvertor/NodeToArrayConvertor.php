<?php

namespace IndentedLines\NodeToArrayConvertor;

use IndentedLines\Node\NodeInterface;
use IndentedLines\ValueInterpreter\ValueInterpreter;
use IndentedLines\ValueInterpreter\ValueInterpreterInterface;


/**
 * NodeToArrayConvertor
 * @author Lingtalfi
 * 2015-12-15
 *
 */
class NodeToArrayConvertor implements NodeToArrayConvertorInterface
{

    /**
     * @var ValueInterpreterInterface
     */
    private $interpreter;


    public static function create()
    {
        return new static();
    }

    //------------------------------------------------------------------------------/
    // IMPLEMENTS NodeToArrayConvertorInterface
    //------------------------------------------------------------------------------/
    /**
     * @return array
     */
    public function convert(NodeInterface $node)
    {
        return $this->resolveChildren($node->getChildren(), $this->getInterpreter());
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setInterpreter(ValueInterpreterInterface $interpreter)
    {
        $this->interpreter = $interpreter;
        return $this;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function resolveChildren(array $children, ValueInterpreterInterface $interpreter)
    {
        $ret = [];
        foreach ($children as $node) {
            /**
             * @var NodeInterface $node
             */
            $k = $node->getKey();
            $v = $interpreter->getValue($node->getValue());

            $children2 = $node->getChildren();
            if ($children2) {
                if (null === $k) {
                    $ret[] = $this->resolveChildren($children2, $interpreter);
                }
                else {
                    $ret[$k] = $this->resolveChildren($children2, $interpreter);
                }
            }
            else {
                if (null === $k) {
                    $ret[] = $v;
                }
                else {
                    $ret[$k] = $v;
                }
            }
        }
        return $ret;
    }


    private function getInterpreter()
    {
        if (null === $this->interpreter) {
            $this->interpreter = new ValueInterpreter();
        }
        return $this->interpreter;
    }
}
