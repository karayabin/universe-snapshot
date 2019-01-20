<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\String\StringParser\ExpressionDiscoverer;


/**
 * GreedyExpressionDiscovererInterface
 * @author Lingtalfi
 * 2015-05-12
 *
 */
interface GreedyExpressionDiscovererInterface extends ExpressionDiscovererInterface
{

    public function setBoundarySymbols(array $symbols);
}
