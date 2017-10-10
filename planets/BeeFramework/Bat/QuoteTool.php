<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Bat;

use BeeFramework\Bat\Escaping\Backslash\RecursiveBackslashEscapeTool;
use BeeFramework\Bat\Escaping\EscapeTool;
use BeeFramework\Notation\WrappedString\Tool\WrappedStringTool;


/**
 * QuoteTool
 * @author Lingtalfi
 * 2015-05-12
 *
 * There are two types of quotes:
 *  - single quote
 *  - double quote
 *
 *
 * A quoted string is a string wrapped with the same type of quote.
 * Those quotes must be non escaped.
 *
 *
 * There are three escaping modes:
 *
 * - no escaping (0)
 *      it's not possible to escape a quote
 * - simple      (1)
 *      the backslash char is only used to escape a quote
 * - recursive   (2)
 *      the backslash char is used to escape a quote or itself
 *      Basically in this mode,
 *      the following quotes are escaped:
 *      \"
 *      \\\"
 *      and the following aren't:
 *      "
 *      \\"
 *      \\\\"
 *
 *
 *
 */
class QuoteTool
{

    /**
     * Works like php explode function, but ignore protected content.
     *
     *
     * @param int $limit ,
     *                      if -1, returns all elements
     *                      else, return at most $limit elements.
     *
     * @param null|string (default is ") $quoteType
     *                          either the single quote (')
     *                          or the double quote (")
     *                          or null, in which case both types of quotes will be used
     * @return array
     */
    public static function explodeUnprotected($delimiter, $string, $limit = -1, $escapeMode = 2, $quoteType = '"')
    {
        throw new \RuntimeException("Not implemented yet"); // 2015-05-23
        $ret = [];
        $delLen = mb_strlen($delimiter);
        $strLen = mb_strlen($string);
        for ($i = 0; $i < $strLen; $i++) {

        }

        return $ret;
    }


    /**
     *
     * Tries to find a valid quotedString from the given position.
     *
     * If it succeeds, it returns an array containing:
     *              - 0: quotedString
     *              - 1: pos of the end quote
     *
     * If it fails, it returns false
     *
     *
     * @return array|false (0: quotedString, 1: position of lastQuote)
     *
     *
     */
    public static function getCorrespondingEndQuoteInfo($string, $escapeMode = 2, $pos = 0)
    {
        if (false !== $lastP = self::getCorrespondingEndQuotePos($string, $escapeMode, $pos)) {
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
     * Tries to find a valid quotedString from the given position.
     * If it succeeds, it returns the position of the ending quote.
     * If it fails, it returns false.
     *
     * @return int|false
     *
     */
    public static function getCorrespondingEndQuotePos($string, $escapeMode = 2, $pos = 0)
    {
        $quote = mb_substr($string, $pos, 1);
        if (in_array($quote, ['"', "'"])) {
            if (false !== $pos = EscapeTool::getNextUnescapedSymbolPos($string, $quote, $pos + 1, $escapeMode)) {
                return $pos;
            }
        }
        return false;
    }

    /**
     * @param null|string $quoteType , the quote type, null (by default) means both types of quote
     * @return bool
     */
    public static function isQuotedString($string, $quoteType = null, $escapeMode = 2)
    {
        $quoteTypes = ['"', "'"];
        if (null === $quoteType) {
            $quoteType = $quoteTypes;
        }
        elseif (is_string($quoteType)) {
            if (!in_array($quoteType, $quoteTypes)) {
                throw new \InvalidArgumentException("unauthorized quote type: $quoteType");
            }
            $quoteType = [$quoteType];
        }
        else {
            throw new \InvalidArgumentException(sprintf("quoteType argument must be of type string or null, %s given", gettype($quoteType)));
        }
        foreach ($quoteType as $q) {
            if (true === WrappedStringTool::isCandyString($string, $q, $escapeMode)) {
                return true;
            }
        }
        return false;
    }


    public static function quote($unquotedString, $escapeMode = 2, $quoteType = '"')
    {
        if (2 === $escapeMode) {
            if ('\\' === substr($unquotedString, -1)) {
                $lastPos = strlen($unquotedString) - 1;
                if (false === EscapeTool::isPositionEscaped($unquotedString, $lastPos, $escapeMode)) {
                    $unquotedString .= '\\';
                }
            }
            $pos = 0;
            while (false !== $qPos = strpos($unquotedString, $quoteType, $pos)) {
                if ($quoteType === substr($unquotedString, $qPos, 1) && false === EscapeTool::isPositionEscaped($unquotedString, $qPos, $escapeMode)) {
                    $unquotedString = StringTool::insertAt($unquotedString, $qPos, '\\');
                    $pos = $qPos + 2;
                }
                else {
                    $pos = $qPos + 1;
                }
            }
            return $quoteType . $unquotedString . $quoteType;
        }
        elseif (1 === $escapeMode) {
            if ('\\' === substr($unquotedString, -1)) {
                throw new \RuntimeException("Invalid quotedString argument: using escapeMode=1, a string must not end with the backslash char");
            }
            return $quoteType . str_replace($quoteType, '\\' . $quoteType, $unquotedString) . $quoteType;
        }
        elseif (0 === $escapeMode) {
            return $quoteType . $unquotedString . $quoteType;
        }
    }


    /**
     * @return false|string, returns false if the given string is not a valid quotedString
     */
    public static function unquote($quotedString, $escapeMode = 2)
    {
        $ret = false;
        if (true === self::isQuotedString($quotedString)) {
            $inner = substr($quotedString, 1, -1);
            $quote = substr($quotedString, 0, 1);
            return EscapeTool::unescape($inner, $quote, $escapeMode);
        }
        return $ret;
    }


}
