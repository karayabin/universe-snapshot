<?php


namespace Ling\MysqlCreateTableUtil\Column;


/**
 * The PrimaryKeyAutoIncrementedColumn class.
 */
class PrimaryKeyAutoIncrementedColumn extends Column
{

    /**
     * Builds the PrimaryKeyAutoIncrementedColumn instance.
     */
    protected function __construct()
    {
        parent::__construct();
        $this->type("int")->typeSize(11)->notNullable()->autoIncrement()->primaryKey();
    }


}