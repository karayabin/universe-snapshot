<?php


namespace Ling\IndentedLines\NodeToArrayConvertor;
use Ling\IndentedLines\Node\NodeInterface;


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
