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
