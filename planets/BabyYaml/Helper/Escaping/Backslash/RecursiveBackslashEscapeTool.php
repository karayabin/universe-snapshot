<?php



namespace BabyYaml\Helper\Escaping\Backslash;
use BabyYaml\Helper\Escaping\RecursiveEscapeTool;


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
