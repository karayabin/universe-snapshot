<?php

namespace Quoter;

use Bat\StringTool;
use Escaper\EscapeTool;
use WrappedString\WrappedStringTool;


/**
 * QuoteTool
 * @author Lingtalfi
 * 2015-11-24
 *
 * There are two types of quotes:
 *  - single quote
 *  - double quote
 *
 *
 * A quoted string is a string wrapped with the same type of quote.
 * Those quotes must be non escaped.
 * And the wrapped content must not contain non escaped quote of the same type.
 *
 *
 * There are two escaping modes described here: https://github.com/lingtalfi/universe/blob/master/planets/ConventionGuy/convention.quotesEscapingModes.eng.md
 *
 *
 * All methods here use php multi-bytes functions (mb_): http://php.net/manual/en/ref.mbstring.php
 *
 *
 */
class QuoteTool
{

    private static $quoteTypes = ['"', "'"];

    /**
     *
     * Check that the char at the given position of the given string is a quote,
     * then returns an array containing:
     *              - 0: quotedString
     *              - 1: pos of the end quote
     *
     * If it fails, it returns false
     *
     *
     * @return false|array (0: quotedString, 1: position of lastQuote)
     *
     *
     */
    public static function getCorrespondingEndQuoteInfo($string, $pos = 0, $escapeRecursiveMode = true)
    {
        if (false !== $lastP = self::getCorrespondingEndQuotePos($string, $pos, $escapeRecursiveMode)) {
            $quoted = mb_substr($string, $pos, $lastP - $pos + 1);
            return [
                $quoted,
                $lastP,
            ];
        }
        return false;
    }


    /**
     *
     * Check that the char at the given position of the given string is a quote,
     * then returns the position (from the beginning of the string) of the next unescaped quote of the same type.
     *
     * Returns false in case of failure, or the position of the next unescaped quote otherwise.
     *
     * Note: whether the quote at the given position is escaped or not is irrelevant.
     *
     * @return int|false
     *
     */
    public static function getCorrespondingEndQuotePos($string, $pos = 0, $escapeRecursiveMode = true)
    {
        $quote = mb_substr($string, $pos, 1);
        if (in_array($quote, self::$quoteTypes)) {
            if (false !== $pos = EscapeTool::getNextUnescapedSymbolPos($string, $quote, $pos + 1, $escapeRecursiveMode)) {
                return $pos;
            }
        }
        return false;
    }

    /**
     * Returns whether or not the given string is a valid quoted string.
     * 
     * @param null|string $quoteType , the quote type, null (by default) means both types of quote
     * @return bool
     */
    public static function isQuotedString($string, $quoteType = null, $escapeRecursiveMode = true)
    {

        if (null === $quoteType) {
            $quoteType = self::$quoteTypes;
        }
        elseif (is_string($quoteType)) {
            if (!in_array($quoteType, self::$quoteTypes)) {
                throw new \InvalidArgumentException("unauthorized quote type: $quoteType");
            }
            $quoteType = [$quoteType];
        }
        else {
            throw new \InvalidArgumentException(sprintf("quoteType argument must be of type string or null, %s given", gettype($quoteType)));
        }
        foreach ($quoteType as $q) {
            if (true === WrappedStringTool::isCandyString($string, $q, $escapeRecursiveMode)) {
                return true;
            }
        }
        return false;
    }


    /**
     * Quotes a quotable unquoted string.
     *
     * Returns false if the given string is unquotable.
     * An unquotable string is only possible if escapeRecursiveMode is false and the last character
     * of the string is the backslash (\).
     *
     *
     * Returns false|string,
     *              the quoted string, or false if the given string is unquotable,
     *              in which case a warning is generated.
     *
     */
    public static function quote($unquotedString, $quoteType = '"', $escapeRecursiveMode = true)
    {

        if (false === $escapeRecursiveMode && '\\' === substr($unquotedString, -1)) {
            trigger_error("Unquotable string given. Using simple escape mode, a quotable string must not end with the backslash character", E_USER_WARNING);
            return false;
        }

        $pos = 0;
        while (false !== $qPos = mb_strpos($unquotedString, $quoteType, $pos)) {
            if ($quoteType === mb_substr($unquotedString, $qPos, 1) && false === EscapeTool::isEscapedPos($unquotedString, $qPos, $escapeRecursiveMode)) {
                $unquotedString = StringTool::replacePortion($unquotedString, $qPos, 0, '\\');
                $pos = $qPos + 2;
            }
            else {
                $pos = $qPos + 1;
            }
        }

        // if in recursive escape mode, if the last char is backslash, we ensure that it is escaped.
        if (true === $escapeRecursiveMode && '\\' === substr($unquotedString, -1)) {
            $lastPos = mb_strlen($unquotedString) - 1;
            if (false === EscapeTool::isEscapedPos($unquotedString, $lastPos, $escapeRecursiveMode)) {
                $unquotedString .= '\\';
            }
        }
        return $quoteType . $unquotedString . $quoteType;
    }


    /**
     * Unquotes the given valid quoted string and returns the result.
     * If the given string is not a valid quoted string, it return false.
     * 
     * 
     * @return false|string
     */
    public static function unquote($quotedString, $escapeRecursiveMode = true)
    {
        $ret = false;
        if (true === self::isQuotedString($quotedString, null, $escapeRecursiveMode)) {
            $inner = substr($quotedString, 1, -1);
            $quote = substr($quotedString, 0, 1);
            return EscapeTool::unescape($inner, [$quote], $escapeRecursiveMode);
        }
        return $ret;
    }


}
