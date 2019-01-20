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


/**
 * WrappedStringResolverTool
 * @author Lingtalfi
 * 2015-03-04
 *
 *
 */
class WrappedStringResolverTool
{

    /**
     * This method is used to resolve each entry of an array.
     * Recursion is not handled.
     */
    public static function resolveArray(array &$targetArray, $callback, $beginSymbol, $beginSymbolMbLen, $endSymbol, $endSymbolMbLen, $escapingMode, $onlyStandalone = false)
    {
        array_walk_recursive($targetArray, function (&$v) use ($callback, $beginSymbol, $beginSymbolMbLen, $endSymbol, $endSymbolMbLen, $escapingMode, $onlyStandalone) {
            self::resolve($v, $callback, $beginSymbol, $beginSymbolMbLen, $endSymbol, $endSymbolMbLen, $escapingMode, $onlyStandalone);
        });
    }


    /**
     * This method should be used to resolve a simple string.
     * Recursion is not handled (i.e. if a reference calls another reference).
     */
    public static function resolve(&$value, $callback, $beginSymbol, $beginSymbolMbLen, $endSymbol, $endSymbolMbLen, $escapingMode, $onlyStandalone = false)
    {
        if (is_string($value)) {


            $mbPos = 0;
            $c = 0;
            while (false !== $info = WrappedStringTool::getNextWrappedStringInfo($value, $mbPos, $beginSymbol, $beginSymbolMbLen, $endSymbol, $endSymbolMbLen, $escapingMode)) {

                // find the value to inject
                $wrappedString = mb_substr($value, $info[0], $info[1] - $info[0]);
                $unwrapped = WrappedStringTool::unwrap($wrappedString, $beginSymbol, $beginSymbolMbLen, $endSymbol, $endSymbolMbLen, $escapingMode);
                // is it possible to inject the value ? if yes, do inject
                $isStandalone = (0 === $info[0] && $info[1] === mb_strlen($value));
                $inject = call_user_func($callback, $unwrapped, $wrappedString, $isStandalone);
                $offset = 0;


                if (true === $isStandalone) {
                    $value = $inject;
                    break;
                }
                else {
                    if (true === $onlyStandalone) {
                        break;
                    }

                    // this is an inline type 
                    if (is_scalar($inject) || is_null($inject)) {
                        $inject = (string)$inject;
                        $offset = mb_strlen($inject) - mb_strlen($wrappedString);
                        $value = mb_substr($value, 0, $info[0]) . $inject . mb_substr($value, $info[1]);
                    }
                    else {
                        throw new \RuntimeException(sprintf("Cannot inject the resolved value of type %s in a string", gettype($inject)));
                    }
                }


                $mbPos = $info[1] + $offset;
                $c++;
            }
        }
    }

    


}
