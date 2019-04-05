<?php


namespace Ling\Deploy\Helper;


/**
 * The OptionHelper class.
 */
class OptionHelper
{


    /**
     * Returns an array of trimmed components of the given csv string.
     *
     * @param string $csv
     * @return array
     */
    public static function csvToArray(string $csv)
    {
        return array_map(function ($v) {
            return trim($v);
        }, explode(',', $csv));
    }
}