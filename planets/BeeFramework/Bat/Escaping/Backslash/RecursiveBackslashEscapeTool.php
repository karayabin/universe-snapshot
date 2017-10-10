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

use BeeFramework\Bat\Escaping\RecursiveEscapeTool;
use BeeFramework\Bat\StringTool;


/**
 * RecursiveEscapeTool
 * @author Lingtalfi
 * 2015-02-28
 *
 */
class RecursiveBackslashEscapeTool
{


    /**
     * @return false|array
     *                  false is returned if the given value does not contain the unescaped symbol.
     *                  Returns an array of unescaped symbol mb positions (using mb functions) otherwise.
     */
    public static function getUnescapedSymbolPos($value, $symbol, $offset = 0)
    {
        return RecursiveEscapeTool::getUnescapedSymbolPos($value, $symbol, $offset, '\\');
    }

    /**
     * @return false|int
     *                  false is returned if the given value does not contain the unescaped symbol.
     *                  Returns the mb position of the next unescaped symbol otherwise.
     */
    public static function getNextUnescapedSymbolPos($value, $symbol, $offset = 0)
    {
        return RecursiveEscapeTool::getNextUnescapedSymbolPos($value, $symbol, $offset, '\\');
    }


    public static function isEscapedPos($pos, $haystack)
    {
        return RecursiveEscapeTool::isEscapedPos($pos, $haystack, '\\');
    }

    public static function unescape($value, array $symbols)
    {
        return RecursiveEscapeTool::unescape($value, $symbols, '\\');
    }

}
