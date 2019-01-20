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
use BeeFramework\Bat\StringTool;
use BeeFramework\Bat\VarTool;
use BeeFramework\Bat\BdotTool;
use BeeFramework\Notation\WrappedString\Util\WrappedStringResolverUtil;

/**
 * CandyResolverTool
 * @author Lingtalfi
 * 2015-04-14
 *
 * - escapingMode:
 * ----- 0: no escaping
 * ----- 1: backslash simple
 * ----- 2: backslash recursive
 *
 *
 *
 */
class CandyResolverTool
{


    /**
     * This methods takes a target array and replaces its candy references (wrapped string having the same opening and closing symbol)
     *              using an array of candy (generally already resolved) references.
     *
     * @throws \RuntimeException if a reference couldn't be resolved
     * @param $inlineValueAdaptor ,
     *              if the wrapped string is used in an inline context, you might want to process special values like bool, or null.
     *              The inlineValueAdaptor does just that.
     *
     *                      string  callback ( mixed )
     *
     *              By default, $inlineValueAdaptor is null, which means that the callback transforms false, true and null values into
     *              their respective string versions.
     *              Set $inlineValueAdaptor to false to abort this behaviour.
     *
     */
    public static function applyCandy(array &$targetArray, array $candyRefs, $symbol = '§', $escapingMode = 1, $onlyStandalone = false, $inlineValueAdaptor = null)
    {
        $symbolLen = mb_strlen($symbol);
        if (null === $inlineValueAdaptor) {
            $inlineValueAdaptor = function ($v) {
                return StringTool::boolNullToString($v);
            };
        }
        WrappedStringResolverTool::resolveArray($targetArray, function ($unwrapped, $wrappedString, $isStandalone) use ($candyRefs, $inlineValueAdaptor) {
            $found = false;
            $v = BdotTool::getDotValue($unwrapped, $candyRefs, null, $found);

            if (false === $isStandalone && is_callable($inlineValueAdaptor)) {
                $v = call_user_func($inlineValueAdaptor, $v);
            }

            if (true === $found) {
                return $v;
            }
            throw new \RuntimeException(sprintf("Unresolved reference: %s", $unwrapped));
        }, $symbol, $symbolLen, $symbol, $symbolLen, $escapingMode, $onlyStandalone);
    }


    /**
     * @return false|string,
     *                  returns false if the value is not a valid standalone reference,
     *                  or returns the standalone reference content otherwise.
     *
     *                  A valid standalone reference:
     *                          - its very first char being the symbol (independently of the escaping mode).
     *                          - its last char being a non escaped symbol
     *                          - its inner string does not contain any unescaped symbol.
     *
     */
    public static function getStandaloneReferenceValue($value, $symbol, $escapingMode = 1)
    {
        $ret = false;
        $symbolLen = mb_strlen($symbol);

        if (
            0 === strpos($value, $symbol) &&
            $symbol === substr($value, -$symbolLen)
        ) {
            $inner = substr($value, $symbolLen, -$symbolLen);


            /**
             * A valid standalone reference doesn't contain a non escaped refSymbol
             */
            if (0 === $escapingMode) {
                if (false === strpos($inner, $symbol)) {
                    $ret = $inner;
                }
            }
            elseif (1 === $escapingMode) {
                if (false === SimpleBackslashEscapeTool::getNextUnescapedSymbolPos($inner, $symbol)) {
                    $ret = $inner;
                }
            }
            elseif (2 === $escapingMode) {
                if (false === RecursiveBackslashEscapeTool::getNextUnescapedSymbolPos($inner, $symbol)) {
                    $ret = $inner;
                }
            }
            else {
                throw new \RuntimeException(sprintf("Not implemented yet, with escapingMode: %s", $escapingMode));
            }
        }
        return $ret;
    }


    public static function selfResolve(array &$targetArray, $symbol = '§', $escapingMode = 1)
    {
        $o = new WrappedStringResolverUtil([
            'beginSymbol' => $symbol,
            'endSymbol' => $symbol,
            'useInline' => true,
            'errorMode' => 0,
            'escapingMode' => $escapingMode,
        ]);
        $o->dereferenceArray($targetArray);
    }


}
