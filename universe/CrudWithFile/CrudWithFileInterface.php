<?php


namespace CrudWithFile;

use CrudWithFile\Exception\CrudWithFileException;

/**
 * Throws CrudWithFileException when something goes wrong
 */
interface CrudWithFileInterface
{


    /**
     * @param array $newRow
     * @return true
     * @throws CrudWithFileException
     */
    public function insert(array $newRow);

    /**
     * @param $ric
     * @param array $newRow
     * @return true
     * @throws CrudWithFileException
     */
    public function update($ric, array $newRow);

    /**
     * @return true
     * @throws CrudWithFileException
     */
    public function delete($ric);

    /**
     * @return array rows
     */
    public function getRows();

    /**
     * @return array|false
     */
    public function getRow($ric);
}