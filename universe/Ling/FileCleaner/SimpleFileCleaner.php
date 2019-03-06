<?php


namespace Ling\FileCleaner;

use Ling\FileCleaner\FileKeeper\FileKeeperInterface;
use Ling\FileCleaner\FileKeeperAdapter\FileKeeperAdapterInterface;
use Ling\FileCleaner\FileKeeperAdapter\TimeBasedFileKeeperAdapter;

class SimpleFileCleaner extends FileCleaner
{

    public function __construct()
    {
        parent::__construct();
        $this->addAdapter(TimeBasedFileKeeperAdapter::create());
    }


}