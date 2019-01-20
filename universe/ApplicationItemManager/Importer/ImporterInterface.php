<?php


namespace ApplicationItemManager\Importer;


use ApplicationItemManager\Importer\Exception\ImporterException;

interface ImporterInterface
{
    /**
     * force: if true, will remove the possibly already existing item before importing
     *
     * @throws ImporterException if the import can not be achieved successfully
     */
    public function import($item, $importDirectory, $force = false);

}