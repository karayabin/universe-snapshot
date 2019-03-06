<?php


namespace Ling\DatePickerHelper;

/**
 *
 * Datepicker date format
 * ---------------
 * http://api.jqueryui.com/datepicker/#utility-formatDate
 *
 *      - d - day of month (no leading zero)
 *      - dd - day of month (two digit)
 *      - o - day of the year (no leading zeros)
 *      - oo - day of the year (three digit)
 *      - D - day name short
 *      - DD - day name long
 *      - m - month of year (no leading zero)
 *      - mm - month of year (two digit)
 *      - M - month name short
 *      - MM - month name long
 *      - y - year (two digit)
 *      - yy - year (four digit)
 *
 *
 *
 *
 * Php date format
 * ---------------
 * http://php.net/manual/fr/function.date.php
 *
 *
 */
class DatePickerHelper
{


    private static $map = [
        "yy" => "<1>",
        "y" => "<2>",
        "MM" => "<3>",
        "M" => "<4>",
        "mm" => "<5>",
        "m" => "<6>",
        "DD" => "<7>",
        "D" => "<8>",
        "oo" => "<9>",
        "o" => "<10>",
        "dd" => "<11>",
        "d" => "<12>",
    ];

    private static $map2 = [
        "<1>" => 'Y',
        "<2>" => 'y',
        "<3>" => 'F',
        "<4>" => 'M',
        "<5>" => 'm',
        "<6>" => 'n',
        "<7>" => 'l',
        "<8>" => 'D',
        "<9>" => 'z', // note: php doesn't have "day of the year with three digits", but this is the closest
        "<10>" => 'z',
        "<11>" => 'd',
        "<12>" => 'j',
    ];


    private static $mapRegex = [
        'Y' => '<1>',
        'y' => '<2>',
        'm' => '<3>',
        'n' => '<4>',
        'd' => '<5>',
        'j' => '<6>',
    ];

    private static $mapRegex2 = [
        '<1>' => '(?P<year4>[0-9]{4})',
        '<2>' => '(?P<year2>[0-9]{2})',
        '<3>' => '(?P<month_leading>[0-9]{2})',
        '<4>' => '(?P<month_no_leading>[0-9]{1,2})',
        '<5>' => '(?P<day_leading>[0-9]{2})',
        '<6>' => '(?P<day_no_leading>[0-9]{1,2})',
    ];


    public static function convertFromDatePickerToPhpDate(string $datePickerFormat): string
    {
        $map = self::$map;
        $map2 = self::$map2;
        $first = str_replace(array_keys($map), array_values($map), $datePickerFormat);
        return str_replace(array_keys($map2), array_values($map2), $first);
    }

    public static function convertFromPhpDateToDatePicker(string $phpDate): string
    {
        $map2 = array_flip(self::$map2);
        $map = array_flip(self::$map);
        $first = str_replace(array_keys($map2), array_values($map2), $phpDate);
        return str_replace(array_keys($map), array_values($map), $first);
    }


    /**
     * @param string $input , the string to convert, the format of this string should match the given phpFormat
     *                  Plus, it must contain exactly:
     *                          - one day component
     *                          - one month component
     *                          - one year component
     *
     * @param string $phpFormat , all components of the phpFormat  have to be one of those:
     *          - Y: year, four digits
     *          - y: year, two digits
     *          - m: numeric month, with leading zeros
     *          - n: numeric month, without leading zeros
     *          - d: numeric day of the month, with leading zeros
     *          - j: numeric day of the month, without leading zeros
     */
    public static function convertFromNumericInputToMysqlDate(string $input, string $phpFormat)
    {
        $map = self::$mapRegex;
        $map2 = self::$mapRegex2;
        $first = str_replace(array_keys($map), array_values($map), $phpFormat);
        $pattern = str_replace(array_keys($map2), array_values($map2), $first);

        if (preg_match('!' . $pattern . '!', $input, $match)) {
            $day = $match['day_leading'] ?? $match['day_no_leading'] ?? null;
            if (null !== $day) {
                $day = (int)$day;
                $month = $match['month_leading'] ?? $match['month_no_leading'] ?? null;
                if (null !== $month) {
                    if (
                        array_key_exists("year4", $match) ||
                        array_key_exists("year2", $match)
                    ) {
                        // a component of each type is there, we will be able to return a result
                        if (array_key_exists("year4", $match)) {
                            $year = (int)$match['year4'];
                        } else {
                            // assumed it's 20, but we don't know really, that sucks.
                            // That's why you should use year4 instead...
                            $year = "20" . $match['year2'];
                            $year = (int)$year;
                        }

                        return $year . "-" . sprintf('%02s', $month) . "-" . sprintf("%02s", $day);
                    }
                }
            }
        }
        return false;
    }

}