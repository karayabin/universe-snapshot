<?php


namespace Ling\Light_Kit_Admin_UserData\Light_Kit_Admin\Duplicator;


use Ling\Light_Kit_Admin\Duplicator\LkaRowDuplicatorHooksInterface;

/**
 * The LightKitAdminUserDataDuplicator class.
 */
class LightKitAdminUserDataDuplicator implements LkaRowDuplicatorHooksInterface
{

    /**
     * @implementation
     */
    public function onInsertAfter(string $mainTable, string $table, array $oldRow, array $newRow, $lastInsertId = null)
    {
//        a("onInsertAfter:", [
//            'mainTable' => $mainTable,
//            'table' => $table,
//            'oldRow' => $oldRow,
//            'newRow' => $newRow,
//            'lastInsertId' => $lastInsertId,
//        ]);
    }


}