<?php


namespace BabyYaml\Reader\NodeToArrayConvertor;
use BabyYaml\Reader\Node\NodeInterface;
use BabyYaml\Reader\ValueInterpreter\ValueInterpreterInterface;


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
