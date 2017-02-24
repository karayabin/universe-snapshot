<?php


namespace FileCleaner\Util;


class ExtractorUtil
{


    public static function getDatePrefixExtractor()
    {
        return function ($baseName) {
            $year = substr($baseName, 0, 4);
            $month = substr($baseName, 4, 2);
            $day = substr($baseName, 6, 2);
            return "$year-$month-$day";
        };
    }

}