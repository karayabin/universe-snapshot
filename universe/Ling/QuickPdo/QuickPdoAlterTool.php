<?php

namespace Ling\QuickPdo;


/**
 * QuickPdoAlterTool
 * @author Lingtalfi
 * 2018-04-14
 *
 * A wrapper for alter operations
 *
 */
class QuickPdoAlterTool
{


    public static function addColumn(string $table, string $column, string $columnType = null, string $after = null): bool
    {
        if (null === $columnType) {
            $columnType = "varchar";
        }
        $q = "
alter table $table 
add column $column $columnType        
        ";
        if ($after) {
            $q .= " after $after";
        }


        return (false !== QuickPdo::freeExec($q));
    }
}
