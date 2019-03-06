<?php


namespace Ling\FileCleaner\FileKeeper;

interface FileKeeperInterface
{
    public function setDir($dir);

    public function listen($baseName, $absolutePath);

    public function getKeptFiles();
}