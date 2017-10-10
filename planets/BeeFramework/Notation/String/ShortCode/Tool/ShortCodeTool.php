<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\String\ShortCode\Tool;

use BeeFramework\Component\Error\CodifiedErrors\Tools\CodifiedErrorsTool;
use BeeFramework\Notation\String\ShortCode\LineParser\ShortCodeLineParser;
use BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\Miscellaneous\ShortCodeExpressionDiscoverer;


/**
 * ShortCodeTool
 * @author Lingtalfi
 * 2015-05-09
 *
 *
 *
 *
 *
 * 2017-05-22
 * Example
 * --------------
 *
 * az(ShortCodeTool::parse("hello=6, pou=[a, [b, c]], e='po=po', f='[pou]', g=[po => 4, go => [1,2,3], mo]"));
 *
 * array(5) {
 *      ["hello"] => int(6)
 *      ["pou"] => array(2) {
 *          [0] => string(1) "a"
 *          [1] => array(2) {
 *              [0] => string(1) "b"
 *              [1] => string(1) "c"
 *          }
 *      }
 *      ["e"] => string(5) "po=po"
 *      ["f"] => string(5) "[pou]"
 *      ["g"] => array(3) {
 *          ["po"] => int(4)
 *          ["go"] => array(3) {
 *               [0] => int(1)
 *              [1] => int(2)
 *              [2] => int(3)
 *          }
 *          [0] => string(2) "mo"
 *      }
 * }
 *
 *
 * Shortcode notation
 * ---------------
 * The shortcode notation is composed of key/value pairs separated by comma.
 * The double quotes and or single quotes can be used to escape special characters, such as the comma for instance
 * (if the comma needs to be used as a value and not a key/value pair separator).
 *
 * The key is separated from the value by the equal symbol (=).
 * Spaces around the equal symbol don't matter.
 *
 * So for instance, you would write key=value, key2=value2, key3 = value3, ...
 *
 * ### Arrays
 * Shortcode notation let you write array, and even nested array.
 *
 * the array is a sequence of items separated by a comma.
 * Each item can be in one of the following form:
 *
 * - itemKey => itemValue
 * - itemValue
 *
 * Note that the "equal-greater than" symbols combo (=>) is used to separate the itemKey from the itemValue.
 * An itemValue can also be an array.
 *
 * So, now you know the shortcode notation, enjoy!
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 */
class ShortCodeTool
{


    private static $inst = null;

    /**
     * @return array of params
     */
    public static function parse($string)
    {
        if (true === self::getInst()->parse($string)) {
            return self::getInst()->getValue();
        }
        throw new \RuntimeException("The shortCode syntax is not valid");
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private static function getInst()
    {
        if (null === self::$inst) {
            self::$inst = new ShortCodeExpressionDiscoverer();
        }
        return self::$inst;
    }
}
