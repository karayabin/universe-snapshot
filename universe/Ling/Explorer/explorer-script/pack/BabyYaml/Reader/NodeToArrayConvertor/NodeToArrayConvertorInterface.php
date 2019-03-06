<?php


namespace BabyYaml\Reader\NodeToArrayConvertor;
use Ling\BabyYaml\Reader\Node\NodeInterface;
use Ling\BabyYaml\Reader\ValueInterpreter\ValueInterpreterInterface;


/**
 * NodeToArrayConvertorInterface
 * @author Lingtalfi
 * 2015-02-27
 *
 */
interface NodeToArrayConvertorInterface
{

    /**
     * @return array
     */
    public function convert(NodeInterface $node, ValueInterpreterInterface $interpreter);
}
