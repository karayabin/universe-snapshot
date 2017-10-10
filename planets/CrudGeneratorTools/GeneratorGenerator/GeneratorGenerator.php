<?php


namespace CrudGeneratorTools\GeneratorGenerator;


use CrudGeneratorTools\Helper\CrudGeneratorToolsHelper;
use QuickPdo\QuickPdoInfoTool;

class GeneratorGenerator
{

    public static function generateForeignKeysPreferredColumnsByDatabase($db)
    {
        $ret = [];
        $tables = CrudGeneratorToolsHelper::getTables($db, false);
        foreach ($tables as $table) {
            $f = self::generateForeignKeysPreferredColumnsByTable($table);
            $ret = array_merge($ret, $f);
        }

        return $ret;
    }


    public static function generateForeignKeysPreferredColumnsByTable($table)
    {
        $ret = [];
        list($schema, $table) = CrudGeneratorToolsHelper::getDbAndTable($table);
        $fkInfos = QuickPdoInfoTool::getForeignKeysInfo($table, $schema);
        foreach ($fkInfos as $fkInfo) {

            $fkTable = $fkInfo[1];
            if (!array_key_exists($fkTable, $ret)) {
                $types = QuickPdoInfoTool::getColumnDataTypes($fkTable, false);
                foreach ($types as $column => $type) {
                    if ('varchar' === $type) {
                        break;
                    }
                }
                $ret[$fkTable] = $column;
            }
        }
        return $ret;
    }

}