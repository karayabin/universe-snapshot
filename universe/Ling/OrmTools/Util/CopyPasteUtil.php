<?php


namespace Ling\OrmTools\Util;


use Ling\OrmTools\Exception\OrmToolsException;
use Ling\OrmTools\Helper\OrmToolsHelper;
use Ling\QuickPdo\QuickPdoInfoTool;

class CopyPasteUtil
{

    private $tables;
    private $columnPrefixes;


    public function __construct()
    {
        $this->tables = null;
        $this->columnPrefixes = [];
        $this->database = null;
    }


    public static function create()
    {
        return new static();
    }


    /**
     * @param array $options
     *      - mode: string, one of:
     *              - default: $columnName
     *              - props: private $columnName;
     */
    public function renderColumns(array $options = [])
    {

        $options = array_merge([
            'mode' => 'default',
        ], $options);


        $mode = $options['mode'];

        $this->checkTables();
        foreach ($this->tables as $table) {
            $columns = QuickPdoInfoTool::getColumnNames($table);
            $this->renderTitle($table);

            $columnPrefix = "";
            if (array_key_exists($table, $this->columnPrefixes)) {
                $columnPrefix = $this->columnPrefixes[$table];
            }

            foreach ($columns as $column) {
                $column = $columnPrefix . $column;
                $this->renderColumnName($column, $mode);
            }
        }

    }


    public function renderConstructorDefaultValues()
    {
        $this->checkTables();
        $tables2DefaultValues = [];
        foreach ($this->tables as $table) {
            $columnPrefix = "";
            if (array_key_exists($table, $this->columnPrefixes)) {
                $columnPrefix = $this->columnPrefixes[$table];
            }
            $defaultValues = OrmToolsHelper::getPhpDefaultValuesByTables([$table]);
            $tables2DefaultValues[$table] = [
                'columnPrefix' => $columnPrefix,
                'defaultValues' => $defaultValues,
            ];
        }

        ?><h2>Constructor</h2><?php

        foreach ($tables2DefaultValues as $table => $info) {
            $columnPrefix = $info['columnPrefix'];
            $defaultValues = $info['defaultValues'];
            foreach ($defaultValues as $col => $val) {
                $col = $columnPrefix . $col;
                ?>
                $this-><?php echo $col; ?> = <?php echo var_export($val); ?>;<br>
                <?php
            }
        }
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @return mixed
     */
    public function getTables()
    {
        return $this->tables;
    }

    public function setTables($tables)
    {
        $this->tables = $tables;
        return $this;
    }


    public function setColumnPrefixes($columnPrefixes)
    {
        $this->columnPrefixes = $columnPrefixes;
        return $this;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    private function error($msg)
    {
        throw new OrmToolsException($msg);
    }

    private function checkTables()
    {
        if (null === $this->tables) {
            $this->error("table not set");
        }
    }


    private function renderTitle($title)
    {
        ?>
        <h2><?php echo $title; ?></h2>
        <?php
    }

    private function renderColumnName($columnName, $mode = 'default')
    {
        if ('props' === $mode): ?>
            private $<?php echo $columnName; ?>;<br>
        <?php else: ?>
            <?php echo $columnName; ?><br>
        <?php endif;
    }


}
