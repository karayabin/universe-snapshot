<?php


namespace FileCleaner\FileKeeper;


class XPerYearFileKeeper extends XPerYFileKeeper
{


    protected function dateListen($year, $month, $day, $file)
    {
        $this->periods[$year][] = $file;
    }
}