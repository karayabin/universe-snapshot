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
     * @param string $table
     * @param array $newRow
     * @param null $lastInsertId
     */
    public function onInsertAfter(string $table, array $newRow, $lastInsertId = null);
}