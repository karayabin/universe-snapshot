<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Bat\Escaping\Backslash;

use BeeFramework\Bat\StringTool;


/**
 * SimpleBackslashEscapeTool
 * @author Lingtalfi
 * 2015-03-04
 *
 */
class SimpleBackslashEscapeTool
{

    /**
     * @return false|array
     *                  false is returned if the given value does not contain the unescaped symbol.
     *                  Returns an array of unescaped symbol mb positions (using mb functions) otherwise.
     */
    public static function getUnescapedSymbolPos($value, $symbol, $offset = 0)
    {
        $ret = false;
        $pos = StringTool::strPosAll($value, $symbol, $offset);
        if ($pos) {
            foreach ($pos as $p) {
                if (
                    0 === $p ||
                    '\\' !== mb_substr($value, $p - 1, 1)
                ) {
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
    public static function getNextUnescapedSymbolPos($value, $symbol, $offset = 0)
    {
        $ret = false;
        $len = mb_strlen($symbol);
        
        while (false !== $pos = mb_strpos($value, $symbol, $offset)) {
            if (
                0 === $pos ||
                '\\' !== mb_substr($value, $pos - 1, 1)
            ) {
                $ret = $pos;
                break;
            }
            $offset = $pos + $len;
        }
        return $ret;
    }

    public static function unescape($value, array $symbols)
    {
        $symbols = array_unique($symbols);
        foreach ($symbols as $symbol) {
            $value = str_replace('\\' . $symbol, $symbol, $value);
        }
        return $value;
    }

}
