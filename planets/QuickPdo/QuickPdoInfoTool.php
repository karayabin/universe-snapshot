<?php

namespace QuickPdo;

use QuickPdo\Exception\QuickPdoException;


/**
 * QuickPdoInfoTool
 * @author Lingtalfi
 * 2015-12-28
 *
 * A companion tool for QuickPdo to retrieve basic information on database, tables, columns, ...
 *
 */
class QuickPdoInfoTool
{


    /**
     * Return the name of the auto-incremented field, or false if there is none.
     *
     *
     * @return false|string
     */
    public static function getAutoIncrementedField($table, $schema = null)
    {
        if (null !== $schema) {
            $table = $schema . '.' . $table;
        }

        if (false !== ($rows = QuickPdo::fetchAll("show columns from $table where extra='auto_increment'"))) {
            if (array_key_exists(0, $rows)) {
                return $rows[0]['Field'];
            }
        }
        return false;
    }


    public static function getColumnDataTypes($table, $precision = false)
    {
        $types = [];
        $info = QuickPdo::fetchAll("SHOW COLUMNS FROM $table");
        if (false !== $info) {
            foreach ($info as $_info) {
                $type = $_info['Type'];
                if (false === $precision) {
                    $type = explode('(', $type, 2)[0];
                }
                $types[$_info['Field']] = $type;
            }
            return $types;
        }
        return false;
    }


    public static function getColumnDefaultValues($table)
    {
        $defaults = [];
        $info = QuickPdo::fetchAll("SHOW COLUMNS FROM $table");
        if (false !== $info) {
            foreach ($info as $_info) {
                $defaults[$_info['Field']] = $_info['Default'];
            }
            return $defaults;
        }
        return false;
    }



    public static function getColumnNames($table, $schema = null)
    {
        /**
         * http://stackoverflow.com/questions/4165195/mysql-query-to-get-column-names
         */
        if (null === $schema) {
            $schema = self::getDatabase();
        }

        if ('mysql' === self::getDriver()) {
            // faster execution...
            // https://www.percona.com/blog/2011/12/23/solving-information_schema-slowness/
            QuickPdo::freeExec("set global innodb_stats_on_metadata=0;");
        }

        $stmt = "
SELECT COLUMN_NAME
FROM INFORMATION_SCHEMA.COLUMNS
WHERE TABLE_SCHEMA=:schema
AND TABLE_NAME=:table;
";
        if (false !== $rows = QuickPdo::fetchAll($stmt, [
                'schema' => $schema,
                'table' => $table,
            ])
        ) {
            $ret = [];
            foreach ($rows as $row) {
                $ret[] = $row['COLUMN_NAME'];
            }
            return $ret;
        }
        return false;

    }


    public static function getColumnNullabilities($table)
    {
        $defaults = [];
        $info = QuickPdo::fetchAll("SHOW COLUMNS FROM $table");
        if (false !== $info) {
            foreach ($info as $_info) {
                $defaults[$_info['Field']] = ('YES' === $_info['Null']) ? true : false;
            }
            return $defaults;
        }
        return false;
    }



    public static function getDatabase()
    {
        if ('mysql' === self::getDriver()) {
            // http://stackoverflow.com/questions/9322302/how-to-get-database-name-in-pdo
            return QuickPdo::freeQuery("select database()")->fetchColumn();
        } else {
            throw new QuickPdoException("The getDatabase method doesn't support the " . self::getDriver() . " driver");
        }
    }


    public static function getDriver()
    {
        return QuickPdo::getConnection()->getAttribute(\PDO::ATTR_DRIVER_NAME);
    }


    /**
     * Return an array of
     *
     *  foreignKey => [ referencedDb, referencedTable, referencedColumn ]
     *
     */
    public static function getForeignKeysInfo($table, $schema = null)
    {
        $ret = [];
        if (null === $schema) {
            $schema = self::getDatabase();
        }
        if (false !== ($rows = QuickPdo::fetchAll("
select 
COLUMN_NAME,
REFERENCED_TABLE_SCHEMA, 
REFERENCED_TABLE_NAME,
REFERENCED_COLUMN_NAME
 
from information_schema.KEY_COLUMN_USAGE k 
inner join information_schema.TABLE_CONSTRAINTS t on t.CONSTRAINT_NAME=k.CONSTRAINT_NAME
where k.TABLE_SCHEMA = '$schema'
and k.TABLE_NAME = '$table'
and CONSTRAINT_TYPE = 'FOREIGN KEY'
"))
        ) {
            foreach ($rows as $row) {
                $ret[$row['COLUMN_NAME']] = [$row['REFERENCED_TABLE_SCHEMA'], $row['REFERENCED_TABLE_NAME'], $row['REFERENCED_COLUMN_NAME']];
            }
        }
        return $ret;
    }


    public static function getPrimaryKey($table, $schema = null)
    {
        if (null === $schema) {
            $schema = self::getDatabase();
        }
        $rows = QuickPdo::fetchAll("SHOW KEYS FROM $schema.$table WHERE Key_name = 'PRIMARY'");
        $ret = [];
        if (false !== $rows) {
            foreach ($rows as $info) {
                $ret[] = $info['Column_name'];
            }
        }
        return $ret;
    }


    public static function getTables($db)
    {
        QuickPdo::freeExec("use $db;");
        $query = QuickPdo::getConnection()->query('show tables');
        return $query->fetchAll(\PDO::FETCH_COLUMN);
    }


    public static function isEmptyTable($table)
    {
        if (false !== ($info = QuickPdo::fetch("select count(*) as count from $table"))) {
            if (0 === (int)$info['count']) {
                return true;
            }
        }
        return false;
    }


}
