<?php


namespace Ling\Light_DatabaseInfo\Service;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Database\Service\LightDatabaseService;
use Ling\SimplePdoWrapper\Util\MysqlInfoUtil;
use Ling\SimplePdoWrapper\Util\SimpleTypeHelper;

/**
 * The LightDatabaseInfoService class.
 */
class LightDatabaseInfoService
{


    /**
     * This property holds the cacheDir for this instance.
     * @var string
     */
    protected $cacheDir;

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the LightDatabaseInfoService instance.
     */
    public function __construct()
    {
        $this->cacheDir = null;
        $this->container = null;
    }


    /**
     * Returns the info array for the given table.
     * The info array contains the following entries:
     *
     * - database: the name of the database containing the table
     * - columns: an array of the column names
     * - primary: an array of the column names of the primary key (empty if no primary key)
     * - types: an array of columnName => type
     *          Type is a string representing the mysql type ( ex: int(11), or varchar(128), ... ).
     *          List of mysql types here: https://dev.mysql.com/doc/refman/8.0/en/data-types.html
     * - simpleTypes: an array of columnName => simpleType.
     *          A simple type is a string amongst:
     *              - str
     *              - int
     *              - date
     *          See the @page(TypeHelper::getSimpleTypes) method for more info.
     *
     * - ric: the @page(ric) array
     * - ricStrict: the @page(ric strict) array
     * - autoIncrementedKey: the name of the auto-incremented column, or false (if there is no auto-incremented column)
     * - uniqueIndexes: It's an array of indexName => indexes. With indexes being an array of column names ordered by ascending index sequence.
     * - foreignKeysInfo: It's an array of foreignKey => [ referencedDb, referencedTable, referencedColumn ].
     * - referencedByTables: the array of tables having a foreign key referencing the given table.
     *      It's an array of full table names (i.e. $db.$table notation).
     * - hasItems: an array of "has items".
     *      See more details in @page(the has table information conception notes).
     *
     *      Each "has item" has the following structure:
     *
     *      - owns_the_has: bool, whether the current table owns the **has** table or is owned by it.
     *      - has_table: string, the name of the **has** table
     *      - left_table: string, the name of the owner table
     *      - right_table: string, the name of the owned table
     *      - left_fk: string, the name of the foreign key column of the **has** table pointing to the left table
     *      - right_fk: string, the name of the foreign key column of the **has** table pointing to the right table
     *      - referenced_by_left: string, the name of the column of the **left** table referencing the **has** table's foreign key
     *      - referenced_by_right: string, the name of the column of the **right** table referencing the **has** table's foreign key
     *      - left_handles: array of potential handles. Each handle is an array representing a set of columns that this method consider should be used as a handle related to the **left** table.
     *           This method will list the following handles:
     *      - the column of the **left** table referencing the **has** table's foreign key (same value as the **referenced_by_left** property)
     *      - the unique indexes of the **left** table
     *
     *      - right_handles: array of potential handles. Each handle is an array representing a set of columns that this method consider should be used as a handle related to the **right** table.
     *           This method will list the following handles:
     *           - the column of the **right** table referencing the **has** table's foreign key (same value as the **referenced_by_right** property).
     *           - a "natural" column that has a common name for a handle, based on a list which the developer can provide, and which defaults to:
     *               - name
     *               - label
     *               - identifier
     *
     *      - the unique indexes of the **right** table that have only one column (i.e not the unique indexes with multiple columns).
     *           If the unique index column contains only the aforementioned "natural" column, this particular index is discarded (as to avoid redundancy).
     *
     *
     *
     * If the reload flag is set to true, the cache will be refreshed before the result is returned.
     * Otherwise, if reload=false, the cached result will be returned.
     *
     *
     * @param string $table
     * @param string|null $database
     * @param bool $reload
     * @return array
     * @throws \Exception
     */
    public function getTableInfo(string $table, string $database = null, bool $reload = false): array
    {
        $ret = [];
        $util = $this->prepareMysqlInfoUtil($database);


        $dbName = $util->getDatabase();
        $ret['database'] = $dbName;

        $colNames = $util->getColumnNames($table);
        $ret['columns'] = $colNames;

        $primary = $util->getPrimaryKey($table);
        $ret['primary'] = $primary;

        $ric = $util->getRic($table);
        $ret['ric'] = $ric;


        $ricStrict = $util->getRic($table, true);
        $ret['ricStrict'] = $ricStrict;


        $types = $util->getColumnTypes($table, true);
        $ret['types'] = $types;

        $simpleTypes = SimpleTypeHelper::getSimpleTypes($types);
        $ret['simpleTypes'] = $simpleTypes;


        $autoIncrementedKey = $util->getAutoIncrementedKey($table);
        $ret['autoIncrementedKey'] = $autoIncrementedKey;

        $ret['uniqueIndexes'] = $util->getUniqueIndexes($table);

        $ret['foreignKeysInfo'] = $util->getForeignKeysInfo($table);


        $databases = null;
        if (null !== $database) {
            $databases = [$database];
        }
        $ret['referencedByTables'] = $util->getReferencedByTables($table, $databases);

        $ret['hasItems'] = $util->getHasItems($table);


        /**
         * Note: as for now, I didn't implement cache, because the perfs didn't ask for it.
         * But to implement it, just add the cache layer exactly here (i.e. cache the ret array)
         */
        return $ret;
    }


    /**
     * Returns the array of tables for the given database.
     * If the database is null, the default database will be used.
     *
     * @param string|null $database
     * @return array
     * @throws \Exception
     */
    public function getTables(string $database = null): array
    {
        $util = $this->prepareMysqlInfoUtil($database);
        $tables = $util->getTables();
        return $tables;
    }

    /**
     * Returns the array of tables which prefix match the given prefix.
     *
     * @param string $prefix
     * @param string|null $database
     * @return array
     * @throws \Exception
     */
    public function getTablesByPrefix(string $prefix, string $database = null): array
    {

        $util = $this->prepareMysqlInfoUtil($database);
        $tables = $util->getTables($prefix);
        return $tables;
    }

    /**
     * Returns whether the given database contains the given table.
     * If the database is null, it will be guessed.
     *
     * @param string $table
     * @param string|null $database
     * @return bool
     */
    public function hasTable(string $table, string $database = null): bool
    {
        $util = $this->prepareMysqlInfoUtil($database);
        return $util->hasTable($table);
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the cacheDir.
     *
     * @param string $cacheDir
     */
    public function setCacheDir(string $cacheDir)
    {
        $this->cacheDir = $cacheDir;
    }

    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns a MysqlInfoUtil instance,
     * and changes the database if the database is specified.
     *
     * @param string|null $database
     * @return MysqlInfoUtil
     * @throws \Exception
     */
    protected function prepareMysqlInfoUtil(string $database = null): MysqlInfoUtil
    {
        /**
         * @var $db LightDatabaseService
         */
        $pdoWrapper = $this->container->get("database");
        $util = new MysqlInfoUtil($pdoWrapper);
        if (null !== $database) {
            $util->changeDatabase($database);
        }
        return $util;
    }


}