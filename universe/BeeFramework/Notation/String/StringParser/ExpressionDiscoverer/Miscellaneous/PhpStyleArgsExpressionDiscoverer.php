<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\Miscellaneous;

use BeeFramework\Component\String\StringIterator\StringIterator;
use BeeFramework\Component\String\StringIterator\StringIteratorInterface;
use BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\Container\OptionalKeyContainerExpressionDiscoverer;
use BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\Container\ValueContainerExpressionDiscoverer;
use BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\HybridExpressionDiscoverer;
use BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\SimpleQuoteExpressionDiscoverer;
use BeeFramework\Notation\String\StringParser\ExpressionDiscovererModel\ExpressionDiscovererModel;


/**
 * PhpStyleArgsExpressionDiscoverer
 * @author Lingtalfi
 * 2015-05-14
 *
 * To emulate a line of args in the style of php (almost).
 *
 * - arguments are separated by a comma
 * - we can use quotes to escape special symbols (comma, square brackets, the => operator)
 * - however, we can also write scalar directly if they don't contain the special symbols
 *              mentioned above (THAT IS DIFFERENT FROM PHP WHICH DOES NOT ALLOW STRINGS TO BE UNQUOTED FOR INSTANCE)
 * - we can use arrays with the square bracket notation, and recursively.
 * - quotedString use simple escaping mechanism (THIS IS DIFFERENT FROM PHP WHICH USES RECURSIVE BACKSLASH ESCAPING MECHANISM)
 * - the trailing comma on the last element of an array is not permitted (THIS IS DIFFERENT FROM PHP WHICH ALLOWS THAT TRAILING COMMA)
 *
 *
 * Example of possible syntax:
 *
 *          hello world, bye
 *          1, a, b, ["hello"], [0 => pou, [a, b, [], c => "ap[p]le"]]
 *
 *
 *
 * Implicit values are not allowed.
 * With this implementation, it is assumed that the given str/pos combo IS actually a phpStyle args
 * (i.e. there is no checking on the string, and it is directly parsed AS a phpStyle args string)
 *
 *
 */
class PhpStyleArgsExpressionDiscoverer extends ValueContainerExpressionDiscoverer
{


    public function __construct()
    {
        parent::__construct();
        $arr = new OptionalKeyContainerExpressionDiscoverer();
        $arrModel = new ExpressionDiscovererModel($arr);
        $discoverers = [
            $arrModel,
            new SimpleQuoteExpressionDiscoverer(),
            new HybridExpressionDiscoverer(),
        ];
        $arr
            ->setBeginSep('[')
            ->setEndSep(']')
            ->setKeyValueSep('=>')
            ->setValueSep(',')
            ->setImplicitKeys(false)
            ->setImplicitValues(false)
            ->setImplicitEntries(false)
            ->setDiscoverers($discoverers)
            ->setKeyDiscoverers([
                new SimpleQuoteExpressionDiscoverer(),
                HybridExpressionDiscoverer::create(),
            ]);
        $this
//            ->setBeginSep('$$<')
//            ->setEndSep('>$$')
            ->setValueSep(',')
            ->setImplicitValues(false)
            ->setDiscoverers($discoverers);
    }

//    public function parse($string, $pos = 0)
//    {
//        /**
//         * Encapsulating trick
//         */
//        if (0 !== $pos) {
//            $len = mb_strlen($string);
//            if ($pos > 0) {
//                $pos += 3;
//                if ($pos >= $len) {
//                    $pos += 3;
//                }
//            }
//        }
//        $string = '$$<' . $string . '>$$';
//        return parent::parse($string, $pos);
//    }


    public function parse($string, $pos = 0)
    {
        // reset
        $this->pos = false;
        $this->value = null;

        $it = new StringIterator($string);
        $it->setPosition($pos);
        if (false !== $values = $this->parseContainer($it)) {
            $this->value = $values;
            $this->pos = $it->getPosition();
            return true;
        }
        return false;
    }

    protected function isContainerEnd(StringIteratorInterface $it)
    {
        return !$it->isValid();
    }
}
