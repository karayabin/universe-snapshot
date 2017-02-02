<?php

namespace BabyYaml\Reader\StringParser\ExpressionDiscoverer\Tool;


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
