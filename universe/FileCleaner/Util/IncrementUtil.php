<?php


namespace FileCleaner\Util;


class IncrementUtil
{
    /**
     *      fn( year, month, day )
     */
    public static function incrementInDays($startDate, $endDate, \Closure $fn)
    {
        // prevent infinite loop
        if ($startDate < $endDate) {
            $q = explode('-', $endDate);
            $date = $startDate;
            while (true) {
                $p = explode('-', $date);
                call_user_func($fn, $p[0], $p[1], $p[2]);
                if (
                    $p[0] === $q[0] &&
                    $p[1] === $q[1] &&
                    $p[2] === $q[2]
                ) {
                    break;
                }
                $date = date("Y-m-d", mktime(0, 0, 0, $p[1], $p[2], $p[0]) + 86400);
            }
        }
    }

    /**
     *      fn( year, month )
     */
    public static function incrementInMonths($startDate, $endDate, \Closure $fn)
    {
        // prevent infinite loop
        if ($startDate < $endDate) {
            $q = explode('-', $endDate);
            $date = $startDate;
            while (true) {
                $p = explode('-', $date);
                $year = $p[0];
                $month = $p[1];

                call_user_func($fn, $year, $month);
                if (
                    $p[0] === $q[0] &&
                    $p[1] === $q[1]
                ) {
                    break;
                }

                $month++;
                $month = ($month % 12);
                if (0 === $month) {
                    $month = 12;
                }
                $date = date("Y-m-d", mktime(0, 0, 0, $month, 1, $p[0]));
            }
        }
    }


}