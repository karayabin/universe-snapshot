<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Bat\Escaping;

use BeeFramework\Bat\StringTool;


/**
 * RecursiveEscapeTool
 * @author Lingtalfi
 * 2015-02-28
 *
 */
class RecursiveEscapeTool
{


    /**
     * @return false|array
     *                  false is returned if the given value does not contain the unescaped symbol.
     *                  Returns an array of unescaped symbol positions (using mb functions) otherwise.
     */
    public static function getUnescapedSymbolPos($value, $symbol, $offset = 0, $escSymbol = '\\')
    {
        $ret = false;
        $pos = StringTool::strPosAll($value, $symbol, $offset);
        if ($pos) {
            foreach ($pos as $p) {
                if (false === self::isEscapedPos($p, $value, $escSymbol)) {
                    $ret[] = $p;
                }
            }
        }
        return $ret;
    }


    /**
     * @return false|int
     *                  false is returned if the given value does not contain the unescaped symbol.
     *                  Returns the mb position of the next unescaped symbol otherwise.
     */
    public static function getNextUnescapedSymbolPos($value, $symbol, $offset = 0, $escSymbol = '\\')
    {
        $ret = false;
        $len = mb_strlen($symbol);
        while (false !== $pos = mb_strpos($value, $symbol, $offset)) {
            if (false === self::isEscapedPos($pos, $value, $escSymbol)) {
                $ret = $pos;
                break;
            }
            $offset = $pos + $len;
        }
        return $ret;
    }

    /**
     * @return false|array
     *                  false is returned if the given value does not contain an escaped symbol.
     *                  Returns an array of escaped symbol positions (using mb functions) otherwise.
     */
    public static function getEscapedSymbolPos($value, $symbol, $offset = 0, $escSymbol = '\\')
    {
        $ret = false;
        $pos = StringTool::strPosAll($value, $symbol, $offset);
        if ($pos) {
            foreach ($pos as $p) {
                if (true === self::isEscapedPos($p, $value, $escSymbol)) {
                    $ret[] = $p;
                }
            }
        }
        return $ret;
    }


    public static function isEscapedPos($pos, $haystack, $escSymbol = '\\')
    {
        $ret = false;
        if (is_string($haystack)) {

            /**
             * The first position can never be escaped
             */
            if (0 !== $pos) {
                // count the number of consecutive escSymbols directly preceding the position
                $nbEscSym = 0;
                $symLen = mb_strlen($escSymbol);
                while (
                    (isset($haystack[$pos - $symLen])) &&
                    $escSymbol === mb_substr($haystack, $pos - $symLen, $symLen)
                ) {
                    $nbEscSym++;
                    $pos -= $symLen;
                }
                $ret = (1 === $nbEscSym % 2);
            }
        }
        else {
            throw new \InvalidArgumentException(sprintf("haystack must be of type string, %s given", gettype($haystack)));
        }
        return $ret;
    }


    /**
     * It unescapes the symbols first,
     * then it resolve consecutive escSymbols, because the escSymbol escapes itself.
     *              To do so, for every x consecutive backslashes detected:
     *                      if x is even, the x backslashes are replaced by x/2 backslashes
     *                      if x is odd, the x backslashes are replaced by (x+1)/2 backslashes
     *
     *
     */
    public static function unescape($value, array $symbols, $escSymbol = '\\')
    {
        $symbols = array_unique($symbols);
        $escLen = mb_strlen($escSymbol);
        /**
         * Unescaping symbols first
         */
        foreach ($symbols as $symbol) {
            if (false !== $pos = self::getEscapedSymbolPos($value, $symbol, 0, $escSymbol)) {
                $offset = 0;
                // removing one preceding escSymbol
                foreach ($pos as $p) {
                    $p = $p - $offset;
                    $value = mb_substr($value, 0, $p - $escLen) . mb_substr($value, $p);
                    $offset += $escLen;
                }
            }
        }

        /**
         * Now unescape the escSymbol itself
         */
        if (false !== strpos($value, $escSymbol . $escSymbol)) {
            $len = strlen($escSymbol);
            $value = preg_replace_callback('!(?:' . preg_quote($escSymbol, '!') . ')+!', function ($match) use ($len, $escSymbol) {
                $escSymbols = $match[0];
                $nbSymbols = strlen($escSymbols) / $len;
                if (1 === $nbSymbols % 2) {
                    $nbSymbols++;
                }
                if ($nbSymbols > 1) {
                    $nbSymbols /= 2;
                }
                return str_repeat($escSymbol, $nbSymbols);
            }, $value);
        }


        return $value;
    }
}
