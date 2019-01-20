<?php

namespace BabyYaml\Reader\StringParser\ExpressionDiscoverer;


/**
 * SimpleQuoteExpressionDiscoverer
 * @author Lingtalfi
 * 2015-05-12
 *
 *
 * simple quote is a quoted string using simple escaping mode.
 *
 */
class SimpleQuoteExpressionDiscoverer extends QuoteExpressionDiscoverer
{
    public function __construct()
    {
        parent::__construct();
        $this->escapingMode = 1;
    }

}
