<?php


namespace FileCleaner\FileKeeper;


class XPerWeekFileKeeper extends XPerYFileKeeper
{


    protected function dateListen($year, $month, $day, $file)
    {
        $index = $month . "-" . ceil($day / 7);
        $this->periods[$index][] = $file;
    }
}