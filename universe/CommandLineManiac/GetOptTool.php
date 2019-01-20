<?php

namespace CommandLineManiac;

/*
 * LingTalfi 2015-10-04
 */
use CommandLineManiac\Exception\SilentException;

class GetOptTool
{

    public static function getOptionAsString($optName, array $options)
    {
        if (array_key_exists($optName, $options)) {
            $val = $options[$optName];
            if (is_array($val)) {
                $val = array_shift($val);
            }
            return (string)$val;
        }
        throw new SilentException();
    }

    public static function getOptionAsArray($optName, array $options, $sep = ',')
    {
        if (array_key_exists($optName, $options)) {
            $val = $options[$optName];
            if (is_array($val)) {
                return $val;
            }
            elseif (is_string($val)) {
                $val = explode($sep, $val);
                array_walk($val, function (&$v) {
                    $v = trim($v);
                });
            }
            else {
                throw new \Exception(sprintf("Unknown val type: %s", gettype($val)));
            }
            return $val;
        }
        throw new SilentException();
    }
}
