<?php


namespace Ling\Localys;


/**
 * This class exist only so that if you implement it, you don't
 * need to implement all the methods yourself.
 *
 * Note: some methods might be added to the LocalysInterface in the future,
 * and in this class as well.
 *
 */
abstract class BaseLocalys implements LocalysInterface
{
    /**
     * @param $n , int, the number of the month (starting at 1)
     * @return string, the name of the month
     */
    public function getMonth($n)
    {

    }

    public function getLongDate($timestamp)
    {

    }

    public function getLongDateWithTime($timestamp)
    {

    }

    public function getLongerDate($timestamp)
    {

    }

    public function getLongDateRange($timestampStart, $timestampEnd)
    {

    }

    public function getLongDateRangeBits($timestampStart, $timestampEnd)
    {

    }

    public function getGenderAbbreviation($gender)
    {

    }

    public function getDayNameLong($dayNumber)
    {

    }

    public function getDayNameAbbr($dayNumber)
    {

    }

    public function getTimeElapsedString(string $dateTime, array $options = [])
    {

    }
}