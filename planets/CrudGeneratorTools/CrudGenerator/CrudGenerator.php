<?php


namespace CrudGeneratorTools\CrudGenerator;


use CrudGeneratorTools\Helper\CrudGeneratorToolsHelper;
use QuickPdo\QuickPdoInfoTool;

class CrudGenerator implements CrudGeneratorInterface
{

    protected $databases;
    protected $table2foreignKeyPreferredColumn;
    protected $table2FormForeignKeySelectorFormat;

    public function __construct()
    {
        $this->databases = [];
    }


    public static function create()
    {
        return new static();
    }

    public function setDatabases(array $databases)
    {
        $this->databases = $databases;
        return $this;
    }


    public function generate()
    {
        $this->generateMenu();
        $this->generateItems();
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    public function getSqlQuery($table)
    {
        $prefixedColumns = $this->getPrefixedColumns($table);
        $joins = $this->getJoinsList($table);
        return [
            $prefixedColumns,
            $joins,
        ];
    }

    public function getSqlQueryAsString($table)
    {
        list($prefixedColumns, $joins) = $this->getSqlQuery($table);
        $q = "SELECT\n";
        $q .= implode(",\n", $prefixedColumns) . "\n";
        $q .= "FROM $table\n";
        $q .= implode("\n", $joins[0]) . "\n";
        $q .= implode("\n", $joins[1]) . "\n";
        return $q;
    }


//    public function setTable2foreignKeyPreferredColumn(array $table2foreignKeyPreferredColumn)
//    {
//        $this->table2foreignKeyPreferredColumn = $table2foreignKeyPreferredColumn;
//        return $this;
//    }
//
//    public function setTable2FormForeignKeySelectorFormat($table2FormForeignKeySelectorFormat)
//    {
//        $this->table2FormForeignKeySelectorFormat = $table2FormForeignKeySelectorFormat;
//        return $this;
//    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function generateMenu()
    {
        $db2Tables = [];
        foreach ($this->databases as $db) {
            $tables = CrudGeneratorToolsHelper::getTables($db, false);
            $db2Tables[$db] = $tables;
        }
        $this->doGenerateMenu($db2Tables);
    }

    protected function doGenerateMenu(array $db2Tables)
    {
        foreach ($db2Tables as $db => $table) {
            a("generating menu: $db.$table");
        }
    }

    protected function generateItems()
    {
        $db2Tables = [];
        foreach ($this->databases as $db) {
            $tables = CrudGeneratorToolsHelper::getTables($db, false);
            $db2Tables[$db] = $tables;
        }
        $this->doGenerateItems($db2Tables);
    }


    protected function doGenerateItems(array $db2Tables)
    {
        foreach ($db2Tables as $db => $table) {
            a("generating item: $db.$table");
        }
    }


    protected function getPrefixedColumns($table)
    {
        $prefixedColumns = [];
        list($schema, $tableOnly) = CrudGeneratorToolsHelper::getDbAndTable($table);
        $foreignKeysInfo = CrudGeneratorToolsHelper::getForeignKeysInfo($table);
        $columns = CrudGeneratorToolsHelper::getColumns($table);
        foreach ($columns as $col) {
            if (array_key_exists($col, $foreignKeysInfo)) {
                $info = $foreignKeysInfo[$col];
                $prefixedColumns[] = $this->getForeignKeyPreferredColumn($info[0], $info[1], $info[2], $schema, $tableOnly, $col);
            } else {
                $prefixedColumns[] = $tableOnly . "." . $col;
            }
        }

        // ensuring that all ric fields are present
        $ric = CrudGeneratorToolsHelper::getRic($table);
        $ric = array_map(function ($v) use ($tableOnly) {
            return $tableOnly . "." . $v;
        }, $ric);
        $prefixedColumns = array_merge($ric, $prefixedColumns);
        $prefixedColumns = array_unique($prefixedColumns);

        return $prefixedColumns;
    }


    protected function getForeignKeyPreferredColumn($foreignSchema, $foreignTable, $foreignColumn, $hostSchema, $hostTable, $hostColumn)
    {
        return $foreignTable . "." . $foreignColumn;
    }


    protected function getJoinsList($table)
    {
        $inner = [];
        $left = [];

        $col2Nullable = QuickPdoInfoTool::getColumnNullabilities($table);
        list($db, $tableOnly) = CrudGeneratorToolsHelper::getDbAndTable($table);
        $fkInfo = QuickPdoInfoTool::getForeignKeysInfo($tableOnly, $db);
        foreach ($fkInfo as $column => $info) {
            $ftable = $info[0] . '.' . $info[1];
            $fcol = $info[2];
            $join = "join $ftable on $ftable.$fcol=$tableOnly.$column";
            if (array_key_exists($column, $col2Nullable) && true === $col2Nullable[$column]) {
                $left[] = "left $join";
            } else {
                $inner[] = "inner $join";
            }
        }

        return [
            $inner,
            $left,
        ];
    }


}