<?php


namespace IndentedLines\NodeToArrayConvertor;
use IndentedLines\Node\NodeInterface;


/**
 * NodeToArrayConvertorInterface
 * @author Lingtalfi
 * 2015-12-15
 *
 */
interface NodeToArrayConvertorInterface
{

    /**
     * @return array
     */
    public function convert(NodeInterface $node);
}
