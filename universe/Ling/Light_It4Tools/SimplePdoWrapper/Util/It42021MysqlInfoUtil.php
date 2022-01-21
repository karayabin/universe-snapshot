<?php

namespace Ling\Light_It4Tools\SimplePdoWrapper\Util;

use Ling\Light_It4Tools\Service\LightIt4ToolsService;
use Ling\SimplePdoWrapper\Util\MysqlInfoUtil;


/**
 * The It42021MysqlInfoUtil class.
 */
class It42021MysqlInfoUtil extends MysqlInfoUtil
{

    /**
     * This property holds the it4ToolService for this instance.
     * @var LightIt4ToolsService
     */
    private LightIt4ToolsService $it4ToolService;

    /**
     * The root dir of the dbKeys system of this planet.
     * @var string
     */
    private string $dbKeysRootDir;


    /**
     * Sets the dbKeysRootDir.
     *
     * @param string $dbKeysRootDir
     */
    public function setDbKeysRootDir(string $dbKeysRootDir)
    {
        $this->dbKeysRootDir = $dbKeysRootDir;
    }


    /**
     * Sets the it4 tool service instance
     * @param LightIt4ToolsService $service
     */
    public function setIt4ToolService(LightIt4ToolsService $service)
    {
        $this->it4ToolService = $service;
    }

    /**
     * Returns an array of  foreignKey => [ referencedDb, referencedTable, referencedColumn ] for the given table.
     *
     * It's assumed that the given table exists.
     *
     *
     * @param string $table
     * @return array
     * @throws \Exception
     */
    public function getForeignKeysInfo(string $table): array
    {
        $ret = [];
        list($db, $table) = $this->splitTableName($table);
        $parser = $this->it4ToolService->getDatabaseParser();
        $arr = $parser->getForeignKeys($this->dbKeysRootDir, $table);
        foreach ($arr as $fkName => $info) {
            list($table, $col) = $info;
            $ret[$fkName] = [
                $db,
                $table,
                $col,
            ];
        }
        return $ret;
    }




    /**
     * Returns an array of "has items".
     * See more details in @page(the conception notes about has table information).
     *
     * Each "has item" has the following structure:
     *
     * - owns_the_has: bool, whether the current table owns the **has** table or is owned by it.
     * - has_table: string, the name of the **has** table
     * - left_table: string, the name of the owner table
     * - right_table: string, the name of the owned table
     * - left_fk: string, the name of the foreign key column of the **has** table pointing to the left table
     * - right_fk: string, the name of the foreign key column of the **has** table pointing to the right table
     * - referenced_by_left: string, the name of the column of the **left** table referencing the **has** table's foreign key
     * - referenced_by_right: string, the name of the column of the **right** table referencing the **has** table's foreign key
     * - left_handles: array of potential handles. Each handle is an array representing a set of columns that this method consider should be used as a handle related to the **left** table.
     *      - the column of the **left** table referencing the **has** table's foreign key (same value as the **referenced_by_left** property)
     *      This method will list the following handles:
     *      - the unique indexes of the **left** table
     *
     * - right_handles: array of potential handles. Each handle is an array representing a set of columns that this method consider should be used as a handle related to the **right** table.
     *      This method will list the following handles:
     *      - the column of the **right** table referencing the **has** table's foreign key (same value as the **referenced_by_right** property).
     *      - a "natural" column that has a common name for a handle, based on a list which the developer can provide, and which defaults to:
     *          - name
     *          - label
     *          - identifier
     *
     *      - the unique indexes of the **right** table that have only one column (i.e not the unique indexes with multiple columns).
     *          If the unique index column contains only the aforementioned "natural" column, this particular index is discarded (as to avoid redundancy).
     *
     *
     *
     * The available options are:
     * - hasKeywords: array of potential has keywords. Defaults to an array containing the "has" keyword.
     * - naturalHandleLabels: array of potential column names for the handles. Defaults to the following array:
     *      - name
     *      - label
     *      - identifier
     *
     *
     * @param string $table
     * @param array $options
     * @return array
     * @throws \Exception
     */
    public function getHasItems(string $table, array $options = []): array
    {
        // for now, let's not go into this...
        return [];
    }
}