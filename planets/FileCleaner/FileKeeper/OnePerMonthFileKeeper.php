<?php


namespace FileCleaner\FileKeeper;


class OnePerMonthFileKeeper extends TimeBasedFileKeeper
{

    private $mode;
    private $months;


    public function __construct()
    {
        parent::__construct();
        $this->mode = "oldest";
        $this->months = [];
    }


    public function setMode($mode)
    {
        $this->mode = $mode;
        return $this;
    }


    protected function dateListen($year, $month, $day, $file)
    {
        if (array_key_exists($month, $this->months)) {
            if ('newest' === $this->mode) {
                $this->months[$month] = $file;
            }
        } else {
            $this->months[$month] = $file;
        }
    }

    public function getKeptFiles()
    {
        $this->keptFiles = array_values($this->months);
        return parent::getKeptFiles();
    }


}