<?php


namespace Explorer\Importer;


interface ImporterInterface
{
    /**
     * @throws \Exception in case of problems
     */
    public function import($planetIdentifier, $dstDir);
}