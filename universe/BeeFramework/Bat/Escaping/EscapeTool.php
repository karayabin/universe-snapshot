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

use BeeFramework\Bat\Escaping\Backslash\RecursiveBackslashEscapeTool;
use BeeFramework\Bat\Escaping\Backslash\SimpleBackslashEscapeTool;
use BeeFramework\Bat\IntTool;


/**
 * EscapeTool
 * @author Lingtalfi
 * 2015-05-12
 *
 *
 * This tool works with the following escape modes:
 *
 * 0: no escape
 * 1: simple escape
 * 2: recursive escape
 *
 *
 */
class EscapeTool
{


    /**
     * @return false|int
     */
    public static function getNextUnescapedSymbolPos($string, $symbol, $startPos = 0, $escapeMode = 2)
    {
        $ret = false;
        if (0 === $escapeMode) {
            $ret = mb_strpos($string, $symbol, $startPos);
        }
        elseif (1 === $escapeMode) {
            $ret = SimpleBackslashEscapeTool::getNextUnescapedSymbolPos($string, $symbol, $startPos);
        }
        elseif (2 === $escapeMode) {
            $ret = RecursiveBackslashEscapeTool::getNextUnescapedSymbolPos($string, $symbol, $startPos);
        }
        else {
            throw new \InvalidArgumentException("Invalid escape mode: $escapeMode");
        }
        return $ret;
    }


    public static function isPositionEscaped($string, $pos, $escapeMode = 2)
    {
        if (0 !== $escapeMode) {
            $n = 0;
            while ('\\' === mb_substr($string, $pos - 1, 1)) {
                $n++;
                if (1 === $escapeMode) {
                    return true;
                }
                $pos--;
            }
            // assume escapeMode is 2
            if (false === IntTool::isEven($n)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param string|array $symbols
     * @return string
     */
    public static function unescape($innerString, $symbols, $escapeMode = 2)
    {
        $ret = $innerString;
        if (!is_array($symbols)) {
            $symbols = [$symbols];
        }
        if (0 === $escapeMode) {
        }
        elseif (1 === $escapeMode) {
            $ret = SimpleBackslashEscapeTool::unescape($ret, $symbols);
        }
        elseif (2 === $escapeMode) {
            $ret = RecursiveBackslashEscapeTool::unescape($ret, $symbols);
        }
        else {
            throw new \InvalidArgumentException("Invalid escape mode: $escapeMode");
        }
        return $ret;
    }
}
