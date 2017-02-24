<?php


namespace FileCleaner\FileKeeperAdapter;


use FileCleaner\FileKeeper\EveryXDaysFileKeeper;
use FileCleaner\FileKeeper\FileKeeperInterface;
use FileCleaner\FileKeeper\XPerMonthFileKeeper;
use FileCleaner\FileKeeper\XPerWeekFileKeeper;
use FileCleaner\FileKeeper\XPerYearFileKeeper;
use FileCleaner\Util\ExtractorUtil;


/**
 * This is the basic adapter, adapting the classes in this planet.
 * So far it interprets the following:
 *
 *
 * every $x days
 * $x per week
 * $x per month
 * $x per year
 *
 *
 */
class TimeBasedFileKeeperAdapter implements FileKeeperAdapterInterface
{

    private $extractor;



    public static function create(){
        return new static();
    }


    public function setExtractor(\Closure $extractor)
    {
        $this->extractor = $extractor;
    }


    /**
     * @return false|FileKeeperInterface
     */
    public function getFileKeeper($string)
    {
        if (null === $this->extractor) {
            $this->extractor = ExtractorUtil::getDatePrefixExtractor();
        }
        $object = false;
        $string = trim(strtolower($string));

        $p = explode('per', $string, 2);
        if (2 === count($p)) {
            $period = trim($p[1]);
            switch ($period) {
                case 'week':
                    $object = XPerWeekFileKeeper::create();
                    break;
                case 'month':
                    $object = XPerMonthFileKeeper::create();
                    break;
                case 'year':
                    $object = XPerYearFileKeeper::create();
                    break;
            }
            $x = (int)$p[0];
            $object->setX($x);
            $object->setExtractor($this->extractor);


        } else {
            if (preg_match('!every\s+([0-9]+)\s+days!', $string, $match)) {
                $object = EveryXDaysFileKeeper::create();
                $object->setX((int)$match[1]);
                $object->setExtractor($this->extractor);
            }
        }
        return $object;
    }

}