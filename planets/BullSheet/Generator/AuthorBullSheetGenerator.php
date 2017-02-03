<?php

namespace BullSheet\Generator;

/*
 * LingTalfi 2016-02-10
 */
use Bat\LocalHostTool;
use BullSheet\Exception\BullSheetException;
use BullSheet\Tool\CharGeneratorTool;
use DirScanner\YorgDirScannerTool;

class AuthorBullSheetGenerator extends BullSheetGenerator
{

    //------------------------------------------------------------------------------/
    // GENERATED DATA
    //------------------------------------------------------------------------------/
    public function boolean($chanceOfGettingTrue = 50)
    {
        return mt_rand(1, 100) <= $chanceOfGettingTrue ? true : false;
    }

    public function password($length = 10)
    {
        return $this->asciiChars($length);
    }

    public function hexa($length = 3)
    {
        return CharGeneratorTool::hexa($length);
    }

    public function numbers($length = 3)
    {
        return CharGeneratorTool::numbers($length);
    }

    public function float($length = 3, $decimal = 2)
    {
        return CharGeneratorTool::numbers($length) . '.' . CharGeneratorTool::numbers($decimal);
    }

    public function letters($length = 3)
    {
        return CharGeneratorTool::letters($length);
    }

    public function alphaNumericChars($length = 3)
    {
        return CharGeneratorTool::alphaNumericChars($length);
    }

    public function wordChars($length = 3)
    {
        return CharGeneratorTool::wordChars($length);
    }

    public function asciiChars($length = 3)
    {
        return CharGeneratorTool::asciiChars($length);
    }


    public function dateTimeBetween($min = '-1 month', $max = '+1 month')
    {
        $startTimestamp = strtotime($min);
        $endTimestamp = strtotime($max);

        if ($startTimestamp > $endTimestamp) {
            throw new BullSheetException('Start date must be anterior to end date');
        }

        $timestamp = mt_rand($startTimestamp, $endTimestamp);
        $d = new \DateTime('@' . $timestamp);
        $d->setTimezone(new \DateTimeZone(date_default_timezone_get()));
        return $d;
    }

}
