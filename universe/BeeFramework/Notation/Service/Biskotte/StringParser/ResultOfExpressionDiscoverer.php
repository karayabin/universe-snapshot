<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\Service\Biskotte\StringParser;

use BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\Miscellaneous\FunctionExpressionDiscoverer;


/**
 * ResultOfExpressionDiscoverer
 * @author Lingtalfi
 * 2015-05-26
 *
 */
class ResultOfExpressionDiscoverer extends FunctionExpressionDiscoverer
{
    public function __construct()
    {
        parent::__construct();
        $this->setPattern('!^(?:@([a-zA-Z0-9_.]+)\-\>([a-zA-Z0-9_]+)\s*\(|([a-zA-Z0-9_\\\]+)::([a-zA-Z0-9_]+)\s*\()!');
//        $this->setPattern('!
//        ^
//            (?:
//                \b
//                @
//                ([a-zA-Z0-9_.]+)\-\>([a-zA-Z0-9_]+)\s*\(
//                |
//                ([a-zA-Z0-9_\\\]+)::([a-zA-Z0-9_]+)\s*\(
//            )
//        !x');
    }
    
    

    
    

}
