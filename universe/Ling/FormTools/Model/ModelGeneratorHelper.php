<?php


namespace Ling\FormTools\Model;


use Ling\FormTools\Exception\FormToolsException;

class ModelGeneratorHelper
{
    public static function generateYears($startYear, $endYear)
    {
        if ($startYear > $endYear) {
            throw new FormToolsException("startYear cannot be greater than endYear: ($startYear, $endYear)");
        }
        $ret = [];

        // uncomment for asc
//        for ($i = $startYear; $i <= $endYear; $i++) {
//            $ret[$i] = $i;
//        }

        for ($i = $endYear; $i >= $startYear; $i--) {
            $ret[$i] = $i;
        }
        return $ret;
    }


    public static function generateMonths(callable $monthNamesFn = null)
    {
        $ret = [];
        for ($i = 1; $i <= 12; $i++) {
            $month = $i;
            if (null !== $monthNamesFn) {
                $month = call_user_func($monthNamesFn, $i);
            }
            $ret[$i] = $month;
        }
        return $ret;
    }


    public static function generateDays()
    {
        $ret = [];
        for ($i = 1; $i <= 31; $i++) {
            $ret[$i] = $i;
        }
        return $ret;
    }


    public static function compileBirthday($year, $month, $day)
    {
        return "$year-" . sprintf('%02s', $month) . "-" . sprintf('%02s', $day);
    }

}