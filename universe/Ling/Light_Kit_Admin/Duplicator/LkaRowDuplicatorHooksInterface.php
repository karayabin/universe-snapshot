<?php


namespace Ling\Light_Kit_Admin\Duplicator;

/**
 * The LkaRowDuplicatorHooksInterface interface.
 */
interface LkaRowDuplicatorHooksInterface
{


    /**
     * Is executed after a row is duplicated.
     * It's a hook for devs.
     *
     *
     * @param string $mainTable
     * @param string $table
     * @param array $oldRow
     * @param array $newRow
     * @param null $lastInsertId
     */
    public function onInsertAfter(string $mainTable, string $table, array $oldRow, array $newRow, $lastInsertId = null);
}