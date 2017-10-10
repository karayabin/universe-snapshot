<?php


namespace CrudGeneratorTools\Helper;


use QuickPdo\QuickPdoInfoTool;

class CrudGeneratorToolsHelper
{


    public static function getDbAndTable($table)
    {
        $p = explode('.', $table, 2);
        $schema = null;
        if (2 === count($p)) {
            return $p;
        }
        return [QuickPdoInfoTool::getDatabase(), $table];
    }


    public static function getTables($db = null, $useDbPrefix = true)
    {
        $ret = [];
        $db = self::getDatabases($db);
        foreach ($db as $d) {
            $tables = QuickPdoInfoTool::getTables($d);
            if (true === $useDbPrefix) {
                $tables = array_map(function ($v) use ($d) {
                    return $d . '.' . $v;
                }, $tables);
            }
            $ret = array_merge($ret, $tables);
        }
        return $ret;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    public static function getColumns($table)
    {
        list($schema, $table) = CrudGeneratorToolsHelper::getDbAndTable($table);
        return QuickPdoInfoTool::getColumnNames($table, $schema);
    }

    public static function getForeignKeysInfo($table)
    {
        list($schema, $table) = CrudGeneratorToolsHelper::getDbAndTable($table);
        return QuickPdoInfoTool::getForeignKeysInfo($table, $schema);
    }

    public static function getDatabases($db = null)
    {
        if (null === $db) {
            $db = QuickPdoInfoTool::getDatabases();
        } elseif (!is_array($db)) {
            $db = [$db];
        }
        return $db;
    }

    public static function getRic($table)
    {
        list($db, $table) = self::getDbAndTable($table);
        $columnNames = QuickPdoInfoTool::getColumnNames($table, $db);
        $primaryKey = QuickPdoInfoTool::getPrimaryKey($table, $db);
        if (0 === count($primaryKey)) {
            $primaryKey = $columnNames;
        }
        return $primaryKey;
    }
}