<?php


namespace FileCleaner;

use FileCleaner\FileKeeper\FileKeeperInterface;
use FileCleaner\FileKeeperAdapter\FileKeeperAdapterInterface;
use FileCleaner\FileKeeperAdapter\TimeBasedFileKeeperAdapter;

class SimpleFileCleaner extends FileCleaner
{

    public function __construct()
    {
        parent::__construct();
        $this->addAdapter(TimeBasedFileKeeperAdapter::create());
        $this->addAdapter(TimeBasedFileKeeperAdapter::create());
        $this->addAdapter(TimeBasedFileKeeperAdapter::create());
    }


}