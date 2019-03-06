<?php


namespace Ling\FileCleaner\FileKeeper;

/**
 * This class assumes that backups are made every day.
 */
class LastXDaysFileKeeper extends TimeBasedFileKeeper
{


    private $x;
    private $startStamp;
    private $nowStamp;


    public function setX($x)
    {
        $this->x = $x;
        return $this;
    }

    protected function dateListen($year, $month, $day, $file)
    {
        if (null === $this->nowStamp) {
            $this->nowStamp = mktime(0, 0, 0);
            $this->startStamp = $this->nowStamp - $this->x * 86400;
        }

        $fileStamp = mktime(0, 0, 0, $month, $day, $year);


        if ($fileStamp <= $this->nowStamp && $fileStamp > $this->startStamp) {
            $this->keptFiles[] = $file;
        }
    }
}