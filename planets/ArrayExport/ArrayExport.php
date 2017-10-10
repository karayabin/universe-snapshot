<?php

namespace ArrayExport;


use ArrayToString\ArrayToStringUtil;
use ArrayToString\SymbolManager\PhpArrayToStringSymbolManager;

class ArrayExport
{


    /**
     * Exports an array as php code.
     * - can also handle closures (not like the default php var_export function)
     *
     * Known issues:
     * - closures and instances's indentation is "unpredictable"
     *
     */
    public static function export($mixed, $floatPrecision = null)
    {
        $manager = new PhpArrayToStringSymbolManager();
        $storedValue = ini_get('serialize_precision');
        if (null === $floatPrecision) {
            $floatPrecision = $storedValue;
        }
        ini_set('serialize_precision', $floatPrecision); // http://stackoverflow.com/questions/32149340/php-var-export-fails-with-float

        $ret = ArrayToStringUtil::create()
            ->setValueFormatter(function ($value, $level) {
                if ($value instanceof \Closure) {
                    return self::getClosureAsString($value, $level);
                }
                return var_export($value, true);
            })
            ->setSymbolManager($manager)->toString($mixed);
        ini_set('serialize_precision', $storedValue);
        return $ret;
    }





    //--------------------------------------------
    //
    //--------------------------------------------
    private static function getClosureAsString(\Closure $closure, $level)
    {
        $func = new \ReflectionFunction($closure);
        $filename = $func->getFileName();
        $start_line = $func->getStartLine() - 1; // it's actually - 1, otherwise you wont get the function() block
        $end_line = $func->getEndLine();
        $length = $end_line - $start_line;
        $source = file($filename);
        $body = implode("", array_slice($source, $start_line, $length));
        $p = preg_split('!\s?function\s?\(!i', $body, 2);
        if (2 === count($p)) {
            $body = 'function (' . trim($p[1]);

            /**
             * We will detect the first occurrence of a closing curly brace "}",
             * on the last line,
             * as the signal for the end of the function.
             *
             *
             */
            $q = explode(PHP_EOL, $body);
            $lastLine = array_pop($q);
            $r = explode('}', $lastLine, 2);
            $level--;
            if ($level < 0) {
                $level = 0;
            }
            $tab = str_repeat("\t", $level);
            $body = implode(PHP_EOL . $tab, $q) . PHP_EOL . $tab . $r[0] . "}";


        } else {
            // unknown case
            throw new \Exception("Don't know how to handle this case yet");
        }
        return $body;
    }


}