<?php


//--------------------------------------------
// GENERATOR, UNCOMMENT TO CREATE TIME BASED FILES
//--------------------------------------------
//require_once "path/to/planets/FileCleaner/tools/gen.php";
//exit;

use FileCleaner\FileCleaner;
use FileCleaner\FileKeeper\EveryXDaysFileKeeper;
use FileCleaner\FileKeeper\LastXDaysFileKeeper;
use FileCleaner\FileKeeper\OnePerMonthFileKeeper;
use FileCleaner\FileKeeper\XPerMonthFileKeeper;
use FileCleaner\FileKeeper\XPerWeekFileKeeper;
use FileCleaner\FileKeeper\XPerYearFileKeeper;
use FileCleaner\SimpleFileCleaner;
use FileCleaner\Util\ExtractorUtil;


//require "bigbang.php";
require __DIR__ . "/../init.php";


//--------------------------------------------
// THIS IS A PEDAGOGIC FILE
// It's actually the file that I used to create the planet, from the beginning to the end.
// All the examples were implemented in order, so there is a chronological continuity here,
// and one might understand how this planet work by reading from top to bottom.
//--------------------------------------------
$ex = 8;


if (1 === $ex) {

    FileCleaner::create()
        ->setDir("test")
        ->addKeeper(OnePerMonthFileKeeper::create()->setExtractor(function ($baseName) {
            $year = substr($baseName, 0, 4);
            $month = substr($baseName, 4, 2);
            $day = substr($baseName, 6, 2);
            return "$year-$month-$day";
        })->setMode('newest'))
        ->clean();

} elseif (2 === $ex) {
    FileCleaner::create()
        ->setDir("test")
        ->addKeeper(OnePerMonthFileKeeper::create()->setExtractor(ExtractorUtil::getDatePrefixExtractor())->setMode('newest'))
        ->clean();
} elseif (3 === $ex) {
    FileCleaner::create()
        ->setDir("test")
        ->addKeeper(XPerMonthFileKeeper::create()->setX(3)->setExtractor(ExtractorUtil::getDatePrefixExtractor()))
        ->clean();
} elseif (4 === $ex) {
    FileCleaner::create()
        ->setDir("test")
        ->addKeeper(EveryXDaysFileKeeper::create()->setX(10)->setExtractor(ExtractorUtil::getDatePrefixExtractor()))
        ->clean();
} elseif (5 === $ex) {
    FileCleaner::create()
        ->setDir("test")
        ->addKeeper(XPerWeekFileKeeper::create()->setX(3)->setExtractor(ExtractorUtil::getDatePrefixExtractor()))
        ->clean();
} elseif (6 === $ex) {
    FileCleaner::create()
        ->setDir("test")
        ->addKeeper(XPerYearFileKeeper::create()->setX(1)->setExtractor(ExtractorUtil::getDatePrefixExtractor()))
        ->clean();
}
elseif (7 === $ex) {
    FileCleaner::create()
        ->setTestMode(true)
        ->setDir("test")
        ->addKeeper(LastXDaysFileKeeper::create()->setX(7)->setExtractor(ExtractorUtil::getDatePrefixExtractor()))
        ->clean();
}


SimpleFileCleaner::create()
    ->setTestMode(true)// remove this line in prod
    ->setDir("test")
    ->keep('last 5 days')
    ->keep('1 per month')
    ->clean();


