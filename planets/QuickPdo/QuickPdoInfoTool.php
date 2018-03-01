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
            $table = '`' . $schema . '`.`' . $table . '`';
        } else {
            $table = '`' . $table . '`';
        }

        $q = "show columns from $table where extra='auto_increment'";
        if (false !== ($rows = QuickPdo::fetchAll($q))) {
            if (array_key_exists(0, $rows)) {
                return $rows[0]['Field'];
            }
        }
        return false;
    }


    public static function getColumnDataTypes($table, $precision = false)
    {
        $types = [];
        $table = self::escapeTable($table);
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
        $table = self::escapeTable($table);
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
        $table = self::escapeTable($table);
        $info = QuickPdo::fetchAll("SHOW COLUMNS FROM $table");
        if (false !== $info) {
            foreach ($info as $_info) {
                $defaults[$_info['Field']] = ('YES' === $_info['Null']) ? true : false;
            }
            return $defaults;
        }
        return false;
    }


    public static function getCreateTable($table)
    {
        $table = self::escapeTable($table);
        $info = QuickPdo::fetch("SHOW CREATE TABLE $table");
        if (false !== $info) {
            return [
                'table' => $info['Table'],
                'create' => $info['Create Table'],
            ];
        }
        return false;
    }


    /**
     * @param $table
     * @return array of indexName => indexes
     *                      With: indexes is an array of column names ordered by ascending index sequence
     */
    public static function getUniqueIndexes($table)
    {
        $ret = [];
        $table = self::escapeTable($table);
        $info = QuickPdo::fetchAll("SHOW INDEX FROM $table");
        if (false !== $info) {
            $indexes = [];
            foreach ($info as $_info) {
                if (
                    '0' === $_info['Non_unique'] &&
                    'PRIMARY' !== $_info['Key_name']
                ) {
                    $indexes[$_info['Key_name']][$_info['Seq_in_index']] = $_info['Column_name'];
                }
            }
            foreach ($indexes as $name => $keys) {
                $keys = array_merge($keys);
                $ret[$name] = $keys;
            };
        }
        return $ret;
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


    public static function getDatabases($filterMysql = true)
    {
        if (true === $filterMysql) {
            $filter = function ($v) {
                if (
                    'mysql' === $v ||
                    'performance_schema' === $v ||
                    'information_schema' === $v
                ) {
                    return false;
                }
                return true;
            };
        } else {
            $filter = function () {
                return true;
            };
        }
        $query = QuickPdo::getConnection()->query('show databases');
        return array_filter($query->fetchAll(\PDO::FETCH_COLUMN), $filter);
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
    public static function getForeignKeysInfo($table, $schema = null, $resolve = false)
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


        if (true === $resolve) {
            foreach ($ret as $col => $info) {
                $db = $info[0];
                $table = $info[1];
                $column = $info[2];
                self::getResolvedForeignKeyInfo($db, $table, $column);
                $ret[$col] = [
                    $db,
                    $table,
                    $column,
                ];
            }
        }

        return $ret;
    }


    public static function getPrimaryKey($table, $schema = null, $returnAllIfEmpty = false, &$hasPrimaryKey = true)
    {
        if (null === $schema) {
            $schema = self::getDatabase();
        }
        $rows = QuickPdo::fetchAll("SHOW KEYS FROM `$schema`.`$table` WHERE Key_name = 'PRIMARY'");
        $ret = [];
        if (false !== $rows) {
            foreach ($rows as $info) {
                $ret[] = $info['Column_name'];
            }
        }
        if (true === $returnAllIfEmpty && 0 === count($ret)) {
            $hasPrimaryKey = false;
            $ret = QuickPdoInfoTool::getColumnNames($table, $schema);
        } else {
            $hasPrimaryKey = true;
        }
        return $ret;
    }


    /**
     * Return an array of entries referencing the given schema.table.
     * Each entry has the following structure:
     * - 0: database
     * - 1: table
     * - 2: array of referenced column => foreign key column
     *
     */
    public static function getReferencedKeysInfo($table, $schema = null)
    {
        $ret = [];
        if (null === $schema) {
            $schema = self::getDatabase();
        }
        $ric = QuickPdoInfoTool::getPrimaryKey($table, $schema, true);


        foreach ($ric as $col) {

            $all = QuickPdo::fetchAll("
SELECT TABLE_SCHEMA, TABLE_NAME, COLUMN_NAME 
FROM information_schema.`KEY_COLUMN_USAGE` WHERE 
`REFERENCED_TABLE_SCHEMA` LIKE '$schema' 
AND `REFERENCED_TABLE_NAME` LIKE '$table' 
AND `REFERENCED_COLUMN_NAME` LIKE '$col'            
            ");


            foreach ($all as $info) {
                $info = array_values($info);
                $id = $info[0] . '.' . $info[1];
                if (!array_key_exists($id, $ret)) {
                    $ret[$id] = [
                        $info[0],
                        $info[1],
                        [$col => $info[2]],
                    ];
                } else {
                    $ret[$id][2][$col] = $info[2];
                }
            }
        }
        return $ret;

    }


    public static function getTables($db, $prefix = null)
    {
        QuickPdo::freeExec("use $db;");
        $query = QuickPdo::getConnection()->query('show tables');
        $tables = $query->fetchAll(\PDO::FETCH_COLUMN);
        if (null !== $prefix) {
            $tables = array_filter($tables, function ($v) use ($prefix) {
                if (0 === strpos($v, $prefix)) {
                    return true;
                }
                return false;
            });
        }
        return $tables;
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


    //--------------------------------------------
    //
    //--------------------------------------------
    protected static function getResolvedForeignKeyInfo(&$db = null, &$table = null, &$column = null)
    {
        $foreignKeys = self::getForeignKeysInfo($table, $db);
        $max = 10;
        $c = 0;
        while (array_key_exists($column, $foreignKeys)) {
            if ($c > $max) {
                throw new QuickPdoException("Too much occurence");
            }
            $info = $foreignKeys[$column];
            $db = $info[0];
            $table = $info[1];
            $column = $info[2];
            $foreignKeys = self::getForeignKeysInfo($table, $db);
            $c++;
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------

    private static function escapeTable($table)
    {
        $p = explode('.', $table, 2);
        if (2 === count($p)) {
            return '`' . $p[0] . '`.`' . $p[1] . '`';
        }
        return '`' . $table . '`';
    }
}
