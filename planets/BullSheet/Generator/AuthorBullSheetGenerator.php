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
    public function boolean(int $chanceOfGettingTrue = 50): bool
    {
        return mt_rand(1, 100) <= $chanceOfGettingTrue ? true : false;
    }

    public function password(int $length = 10): string
    {
        return $this->asciiChars($length);
    }

    public function hexa(int $length = 3): string
    {
        return CharGeneratorTool::hexa($length);
    }

    public function numbers(int $length = 3): string
    {
        return CharGeneratorTool::numbers($length);
    }

    public function letters(int $length = 3): string
    {
        return CharGeneratorTool::letters($length);
    }

    public function alphaNumericChars(int $length = 3): string
    {
        return CharGeneratorTool::alphaNumericChars($length);
    }

    public function wordChars(int $length = 3): string
    {
        return CharGeneratorTool::wordChars($length);
    }

    public function asciiChars(int $length = 3): string
    {
        return CharGeneratorTool::asciiChars($length);
    }


    public function dateTimeBetween(string $min = '-1 month', string $max = '+1 month'): \DateTime
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