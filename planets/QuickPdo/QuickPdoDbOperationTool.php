<?php

namespace QuickPdo;

/*
 * LingTalfi 2016-01-25
 */
class QuickPdoDbOperationTool
{


    public static function rebaseAutoIncrement($table, $autoIncrementField = 'id')
    {
        // http://stackoverflow.com/questions/8923114/how-to-reset-auto-increment-in-mysql
        $q = "set @num := 0;
update $table set $autoIncrementField = @num := (@num+1);
alter table $table AUTO_INCREMENT = 1;";

        return QuickPdo::freeExec($q);
    }


    public static function truncate($table)
    {
        // http://stackoverflow.com/questions/5452760/truncate-foreign-key-constrained-table
        QuickPdo::freeQuery("DELETE FROM $table");
        QuickPdo::freeQuery("ALTER TABLE $table AUTO_INCREMENT = 1");
    }
}