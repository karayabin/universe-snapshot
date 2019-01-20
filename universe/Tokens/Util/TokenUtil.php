<?php


namespace Tokens\Util;

/**
 * tools that apply to one token
 */
class TokenUtil
{


    public static function deEncapsulate($string)
    {
        $quoteType = substr($string, 0, 1);
        $inner = substr($string, 1, -1);
        return str_replace('\\' . $quoteType, $quoteType, $inner);
    }

    public static function encapsulate($string, $quoteType = '"')
    {
        return $quoteType . str_replace($quoteType, '\\' . $quoteType, $string) . $quoteType;
    }


}