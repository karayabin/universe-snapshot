<?php


namespace FileCleaner\FileKeeper;

/**
 * This class assumes that backups are made every day.
 */
class EveryXDaysFileKeeper extends TimeBasedFileKeeper
{


    private $x;


    public function setX($x)
    {
        $this->x = $x;
        return $this;
    }


    protected function dateListen($year, $month, $day, $file)
    {
        $time = mktime(0, 0, 0, $month, $day, $year);
        $nbDays = (int)($time / 86400);
        if (0 === ($nbDays % $this->x)) {
            $this->keptFiles[] = $file;
        }
    }
}