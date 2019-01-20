<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\WrappedString\Tool;


use BeeFramework\Bat\Escaping\Backslash\RecursiveBackslashEscapeTool;
use BeeFramework\Bat\Escaping\Backslash\SimpleBackslashEscapeTool;
use BeeFramework\Bat\Escaping\EscapeTool;


/**
 * WrappedStringTool
 * @author Lingtalfi
 * 2015-05-12
 *
 *
 * A wrapped string is a string which is wrapped by a begin and an end symbols.
 * It uses one of the following escape mode:
 *
 *      0: no escaping
 *      1: simple escaping
 *              backslash only escapes a begin|end symbol
 *      2: recursive escaping
 *              backslash escapes itself or a begin|end symbol
 *
 *
 * A wrapped string which begin and end symbols are identical is called a candy string.
 *
 *
 *
 *
 */
class WrappedStringTool
{


    /**
     * @param $mbPos , the mb position in value to start from
     * @return false|array of
     *                      0: mb position of the begin symbol
     *                      1: mb position of the char just after the end symbol
     *
     */
    public static function getNextWrappedStringInfo($value, $mbPos, $beginSymbol, $beginSymbolMbLen, $endSymbol, $endSymbolMbLen, $escapingMode)
    {
        $ret = false;
        if (false !== $bPos = EscapeTool::getNextUnescapedSymbolPos($value, $beginSymbol, $mbPos, $escapingMode)) {
            if (false !== $ePos = EscapeTool::getNextUnescapedSymbolPos($value, $endSymbol, $bPos + $beginSymbolMbLen, $escapingMode)) {
                $ret = [$bPos, $ePos + $endSymbolMbLen];
            }
        }
        return $ret;
    }


    public static function isCandyString($string, $symbol, $escapingMode)
    {
        if (0 === strpos($string, $symbol)) {
            $symbolLen = mb_strlen($symbol);
            if (false !== $pos = EscapeTool::getNextUnescapedSymbolPos($string, $symbol, $symbolLen, $escapingMode)) {
                $len = mb_strlen($string);
                if ($len - 1 === $pos) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Tries to find a valid candy string starting from the given pos,
     * and returns the position of the end symbol in case of success.
     *
     *
     * @return false|int,
     *                      false in case of failure
     *                      the position of the last symbol in case of success
     */
    public static function findCandyStringEndPos($string, $symbol, $pos = 0, $escapingMode = 1)
    {
        if ($pos === mb_strpos($string, $symbol)) {
            $symbolLen = mb_strlen($symbol);
            if (false !== $endPos = EscapeTool::getNextUnescapedSymbolPos($string, $symbol, $pos + $symbolLen, $escapingMode)) {
                return $endPos;
            }
        }
        return false;
    }


    /**
     * @param string $wrappedString a well formed wrapped string (this method doesn't do any checking on that)
     * @return string, the unwrapped string
     *
     * This method returns the unwrapped content of a valid wrappedString.
     * There is no extra checking that the wrappedString is valid.
     *
     */
    public static function unwrap($wrappedString, $beginSymbol, $beginSymbolMbLen, $endSymbol, $endSymbolMbLen, $escapingMode)
    {
        $ret = mb_substr($wrappedString, $beginSymbolMbLen, -$endSymbolMbLen);
        $ret = EscapeTool::unescape($ret, [$beginSymbol, $endSymbol], $escapingMode);
        return $ret;
    }


}
