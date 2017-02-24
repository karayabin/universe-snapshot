<?php


namespace FileCleaner\FileKeeper;


class XPerMonthFileKeeper extends XPerYFileKeeper
{


    protected function dateListen($year, $month, $day, $file)
    {
        $this->periods[$month][] = $file;
    }
}