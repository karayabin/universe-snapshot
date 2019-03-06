<?php


namespace Ling\FileCleaner\FileKeeperAdapter;


use Ling\FileCleaner\FileKeeper\FileKeeperInterface;

interface FileKeeperAdapterInterface
{

    /**
     * @return false|FileKeeperInterface
     */
    public function getFileKeeper($string);

}