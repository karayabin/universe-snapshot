<?php


namespace Ling\Deploy\Helper;


/**
 * The OptionHelper class.
 */
class OptionHelper
{

    public static function csvToArray(string $csv)
    {
        return array_map(function ($v) {
            return trim($v);
        }, explode(',', $csv));
    }
}