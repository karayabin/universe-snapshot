<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\Tool;


/**
 * ExpressionDiscovererTool
 * @author Lingtalfi
 * 2015-05-16
 *
 */
class ExpressionDiscovererTool
{

    public static function getLastCharRealPosition($lastPos, $len)
    {
        return ($lastPos + $len - 1);
    }
}
