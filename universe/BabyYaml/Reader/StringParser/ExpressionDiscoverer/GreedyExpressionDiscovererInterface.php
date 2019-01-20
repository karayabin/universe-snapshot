<?php

namespace BabyYaml\Reader\StringParser\ExpressionDiscoverer;


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
