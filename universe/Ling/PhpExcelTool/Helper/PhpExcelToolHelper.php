<?php


namespace Ling\PhpExcelTool\Helper;


/**
 * The PhpExcelToolHelper class.
 */
class PhpExcelToolHelper
{



    /**
     * Returns the given number of days as a date formatted with the given dateFormat.
     *
     *
     * https://stackoverflow.com/questions/25158969/read-xlsx-reading-dates-wrong-if-non-date-in-column
     *
     *
     * @param int $numberOfDays
     * @param string $origin
     * @param string $dateFormat
     * @return false|string
     */
    public static function asDate(int $numberOfDays, string $origin = "1900-01-01", $dateFormat = "Y-m-d")
    {
        $numberOfSeconds = $numberOfDays * 86400;
        $originTime = strtotime($origin);
        $time = $originTime + $numberOfSeconds;
        return date($dateFormat, $time);

    }

}