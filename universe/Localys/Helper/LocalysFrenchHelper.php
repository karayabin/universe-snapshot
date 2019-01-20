<?php


namespace Localys\Helper;

class LocalysFrenchHelper
{


    private static $month2Number = [
        "janvier" => "01",
        "février" => "02",
        "mars" => "03",
        "avril" => "04",
        "mai" => "05",
        "juin" => "06",
        "juillet" => "07",
        "août" => "08",
        "septembre" => "09",
        "octobre" => "10",
        "novembre" => "11",
        "décembre" => "12",
    ];


    public static function getStartDateByDateRange(string $dateRange)
    {


        /**
         * reminder: dateRange example
         *
         * - du 07 au 11 juillet 2018
         * - du 29 septembre au 03 octobre 2018
         */

        $p = explode(" ", $dateRange);
        array_shift($p); // du

        $startDay = $p[0];
        if ('au' === $p[1]) {
            $startMonth = $p[3];
        } else {
            $startMonth = $p[1];
        }
        $startYear = array_pop($p);

        $startMonthNum = self::$month2Number[$startMonth];
        return "$startYear-$startMonthNum-$startDay";
    }


}