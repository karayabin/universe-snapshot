<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\File\IndentedLines\NodeToArrayConvertor;

use BeeFramework\Notation\File\IndentedLines\Node\NodeInterface;
use BeeFramework\Notation\File\IndentedLines\ValueInterpreter\ValueInterpreterInterface;


/**
 * NodeToArrayConvertor
 * @author Lingtalfi
 * 2015-02-27
 *
 */
class NodeToArrayConvertor implements NodeToArrayConvertorInterface
{


    //------------------------------------------------------------------------------/
    // IMPLEMENTS NodeToArrayConvertorInterface
    //------------------------------------------------------------------------------/
    /**
     * @return array
     */
    public function convert(NodeInterface $node, ValueInterpreterInterface $interpreter)
    {
        return $this->resolveChildren($node->getChildren(), $interpreter);
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
}
