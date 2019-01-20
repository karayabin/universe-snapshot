<?php


namespace PhpExcelTool\Helper;

class PhpExcelToolHelper
{


    /**
     * https://stackoverflow.com/questions/25158969/read-xlsx-reading-dates-wrong-if-non-date-in-column
     */
    public static function asDate(int $numberOfDays, string $origin = "1900-01-01", $dateFormat = "Y-m-d")
    {
        $numberOfSeconds = $numberOfDays * 86400;
        $originTime = strtotime($origin);
        $time = $originTime + $numberOfSeconds;
        return date($dateFormat, $time);

    }

}