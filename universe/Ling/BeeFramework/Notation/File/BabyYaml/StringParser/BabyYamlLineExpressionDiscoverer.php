<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ling\BeeFramework\Notation\File\BabyYaml\StringParser;

use Ling\BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\Container\MappingContainerExpressionDiscoverer;
use Ling\BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\Container\SequenceContainerExpressionDiscoverer;
use Ling\BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\HybridExpressionDiscoverer;
use Ling\BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\Miscellaneous\PolyExpressionDiscoverer;
use Ling\BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\SimpleQuoteExpressionDiscoverer;
use Ling\BeeFramework\Notation\String\StringParser\ExpressionDiscovererModel\ExpressionDiscovererModel;


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
            ->setGreedyDiscoverersSymbols([' #'])
            ->setValidatorSymbols([' #']);
    }


}
