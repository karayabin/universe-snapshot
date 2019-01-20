<?php


namespace FileCleaner\FileKeeper;

abstract class AbstractFileKeeper implements FileKeeperInterface
{
    protected $keptFiles;
    protected $dir;

    public function __construct()
    {
        $this->keptFiles = [];
    }

    public static function create()
    {
        return new static();
    }


    public function getKeptFiles()
    {
        return $this->keptFiles;
    }

    public function setDir($dir)
    {
        $this->dir = $dir;
        return $this;
    }


}