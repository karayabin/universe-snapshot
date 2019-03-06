<?php


namespace Ling\BabyYaml\Reader\StringParser;
use Ling\BabyYaml\Reader\StringParser\ExpressionDiscoverer\Container\MappingContainerExpressionDiscoverer;
use Ling\BabyYaml\Reader\StringParser\ExpressionDiscoverer\Container\SequenceContainerExpressionDiscoverer;
use Ling\BabyYaml\Reader\StringParser\ExpressionDiscoverer\HybridExpressionDiscoverer;
use Ling\BabyYaml\Reader\StringParser\ExpressionDiscoverer\Miscellaneous\PolyExpressionDiscoverer;
use Ling\BabyYaml\Reader\StringParser\ExpressionDiscoverer\SimpleQuoteExpressionDiscoverer;
use Ling\BabyYaml\Reader\StringParser\ExpressionDiscovererModel\ExpressionDiscovererModel;


/**
 * BabyYamlLineExpressionDiscoverer
 * @author Lingtalfi
 * 2015-05-15
 *
 *
 * - recognizes the following expressions, recursively:
 *          - mapping
 *          - sequence
 *          - quoted strings
 *          - hybrid
 *
 * - comments are possible with the sharp symbol preceded by a space (but only at the end of an expression, not inside)
 * - quoting uses simple escaping mechanism
 *
 */
class BabyYamlLineExpressionDiscoverer extends PolyExpressionDiscoverer
{


    public function __construct()
    {
        parent::__construct();
        $seq = new SequenceContainerExpressionDiscoverer();
        $map = new MappingContainerExpressionDiscoverer();
        $disco = [
            new ExpressionDiscovererModel($map),
            new ExpressionDiscovererModel($seq),
            new SimpleQuoteExpressionDiscoverer(),
            HybridExpressionDiscoverer::create(),
        ];
        $seq->setDiscoverers($disco);
        $map->setDiscoverers($disco);
        $this
            ->setDiscoverers($disco)
            ->setGreedyDiscoverersSymbols([' #']) // there was a bug, no time for that sorry...
            ->setValidatorSymbols([' #'])
        ;
    }


}
