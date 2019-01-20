<?php


namespace FileCleaner\FileKeeperAdapter;


use FileCleaner\FileKeeper\FileKeeperInterface;

interface FileKeeperAdapterInterface
{

    /**
     * @return false|FileKeeperInterface
     */
    public function getFileKeeper($string);

}