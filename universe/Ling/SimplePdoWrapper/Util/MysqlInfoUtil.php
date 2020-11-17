<?php


namespace Ling\SimplePdoWrapper\Util;


use Ling\SimplePdoWrapper\Exception\MysqlInfoUtilException;
use Ling\SimplePdoWrapper\Exception\SimplePdoWrapperException;
use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;

/**
 * The MysqlInfoUtil class.
 * Inspired from my older @page(QuickPdoInfoTool).
 *
 */
class MysqlInfoUtil
{

    /**
     * This property holds the wrapper for this instance.
     * @var SimplePdoWrapperInterface
     */
    protected $wrapper;

    /**
     * This property holds the defaultHasKeywords for this instance.
     * @var array
     */
    protected $defaultHasKeywords;

    /**
     * This property holds the defaultHandleLabels for this instance.
     * @var array
     */
    protected $defaultHandleLabels;


    /**
     * Builds the MysqlInfoUtil instance.
     * @param SimplePdoWrapperInterface|null $wrapper
     */
    public function __construct(SimplePdoWrapperInterface $wrapper = null)
    {
        $this->wrapper = $wrapper;
        $this->defaultHasKeywords = [
            "has",
        ];
        $this->defaultHandleLabels = [
            "name",
            "label",
            "identifier",
        ];
    }

    /**
     * Sets the wrapper.
     *
     * @param SimplePdoWrapperInterface $wrapper
     */
    public function setWrapper(SimplePdoWrapperInterface $wrapper)
    {
        $this->wrapper = $wrapper;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Changes the current database.
     *
     * @param string $database
     * @return void
     */
    public function changeDatabase(string $database)
    {
        $this->wrapper->executeStatement("use `$database`;");
    }


    /**
     * Returns the name of the current database.
     *
     * @return string
     */
    public function getDatabase(): string
    {
        // http://stackoverflow.com/questions/9322302/how-to-get-database-name-in-pdo
        $res = $this->wrapper->fetch("select database()");
        return current($res);
    }


    /**
     * Returns the array of databases.
     * By default, the mysql tables are (mysql, performance_schema, information_schema) filtered .
     *
     *
     * @param bool $filterMysql
     * @return array
     * @throws \Exception
     */
    public function getDatabases(bool $filterMysql = true): array
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
        return array_filter($this->wrapper->fetchAll('show databases', [], \PDO::FETCH_COLUMN), $filter);
    }

    /**
     * Returns the tables of the current database.
     *
     *
     * @param string|null $prefix
     * @return array
     * @throws \Exception
     */
    public function getTables(string $prefix = null): array
    {
        $tables = $this->wrapper->fetchAll('show tables', [], \PDO::FETCH_COLUMN);
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

    /**
     * Returns an array containing the potential table prefixes.
     * A prefix is just the string before the first underscore if any.
     * So for instance if the table name is lud_user, then the prefix is lud.
     *
     * @return array
     */
    public function getPotentialTablePrefixes(): array
    {
        $ret = [];
        $tables = $this->getTables();
        foreach ($tables as $table) {
            if (false !== ($pos = strpos($table, '_'))) {
                $ret[] = substr($table, 0, $pos);
            }
        }
        $ret = array_unique($ret);
        return $ret;
    }


    /**
     * Returns whether the current database contains the given table.
     *
     * @param string $table
     * @return bool
     */
    public function hasTable(string $table): bool
    {
        $db = $this->getDatabase();

        $query = <<<EEE
SELECT * 
FROM information_schema.tables
WHERE table_schema = '$db' 
AND table_name = '$table'
LIMIT 1;
EEE;
        $res = $this->wrapper->fetch($query);
        return ($res !== false);
    }


    /**
     * Get the columns for the given table of the current database.
     *
     * @param string $table
     * @return array
     * @throws \Exception
     */
    public function getColumnNames(string $table): array
    {
        $ret = [];
        $cols = $this->wrapper->fetchAll("describe `$table`;");
        foreach ($cols as $col) {
            $ret[] = $col['Field'];
        }
        return $ret;
    }


    /**
     * Returns the engine used for the given table.
     *
     *
     * @param string $table
     * @return string
     */
    public function getEngine(string $table): string
    {
        list($db, $table) = $this->splitTableName($table);
        $row = $this->wrapper->fetch("SHOW TABLE STATUS FROM `$db` WHERE Name='$table'");
        if (false !== $row) {
            return $row['Engine'];
        }
        throw new SimplePdoWrapperException("Could not get the create statement for table $table.");
    }

    /**
     * Returns the create statement for the given table.
     *
     * @param string $table
     * @return string
     * @throws \Exception
     */
    public function getCreateStatement(string $table): string
    {

        $row = $this->wrapper->fetch("SHOW CREATE TABLE `$table`");
        if (false !== $row) {
            return $row['Create Table'];
        }
        throw new SimplePdoWrapperException("Could not get the create statement for table $table.");
    }

    /**
     * Returns the array of columns composing the primary key.
     * If there is no primary key:
     * - it returns an empty array if the $returnAllIfEmpty is set to false (default)
     * - it returns all the columns of the table if the $returnAllIfEmpty is set to true
     *
     * The flag $hasPrimaryKey is set to whether the table has a primary key.
     *
     *
     *
     * @param string $table
     * @param bool $returnAllIfEmpty
     * @param bool $hasPrimaryKey
     * @return array
     * @throws  \Exception
     */
    public function getPrimaryKey(string $table, bool $returnAllIfEmpty = false, bool &$hasPrimaryKey = true): array
    {
        $rows = $this->wrapper->fetchAll("SHOW INDEX FROM `$table` WHERE Key_name = 'PRIMARY'");
        $ret = [];
        if (false !== $rows) {
            foreach ($rows as $info) {
                $ret[] = $info['Column_name'];
            }
        }
        if (true === $returnAllIfEmpty && 0 === count($ret)) {
            $hasPrimaryKey = false;
            $ret = $this->getColumnNames($table);
        } else {
            $hasPrimaryKey = true;
        }
        return $ret;
    }


    /**
     * Returns the @page(ric) array for the given table.
     *
     * @param string $table
     * @param bool $useStrictRic
     * @return array
     * @throws \Exception
     */
    public function getRic(string $table, bool $useStrictRic = false): array
    {
        $hasPrimary = false;
        $ric = $this->getPrimaryKey($table, true, $hasPrimary);
        if (false === $hasPrimary) {

            if (true === $useStrictRic) {
                $ric = $this->getColumnNames($table);
            } else {
                $uniqueIndexes = $this->getUniqueIndexes($table);
                if ($uniqueIndexes) {
                    $ric = current($uniqueIndexes);
                } else {
                    $ric = $this->getColumnNames($table);
                }
            }
        }
        return $ric;
    }


    /**
     * Returns an array containing the name of all columns that are part of an unique index.
     * @param string $table
     * @return array
     */
    public function getUniqueIndexColumnsOnly(string $table): array
    {
        $ret = [];
        $ukeys = $this->getUniqueIndexes($table);
        foreach ($ukeys as $keys) {
            $ret = array_merge($ret, $keys);
        }
        $ret = array_unique($ret);
        return $ret;
    }


    /**
     * Returns the array of unique indexes for the given table.
     * It's an array of indexName => indexes
     * With indexes being an array of column names ordered by ascending index sequence.
     *
     * @param string $table
     *
     * @return array
     * @throws \Exception
     */
    public function getUniqueIndexes(string $table): array
    {
        $ret = [];
        $info = $this->wrapper->fetchAll("SHOW INDEX FROM `$table`");
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


    /**
     * Returns an information array about the unique indexes of the given table.
     * It's an array of indexName => indexDetails
     * The indexDetails item are ordered by ascending index number.
     * Each indexDetails item has the following structure:
     *      - colName: the name of the column
     *      - ascDesc: null | ASC | DESC, the direction of the unique index column.
     *
     *
     *
     *
     *
     * @param string $table
     * @return array
     * @throws \Exception
     */
    public function getUniqueIndexesDetails(string $table): array
    {
        return $this->getIndexesDetails($table, ['unique' => true]);
    }


    /**
     * Returns an information array about the regular indexes (i.e. not unique, and not the index for the primary key) of the given table.
     *
     * It's an array of indexName => indexDetails
     * The indexDetails item are ordered by ascending index number.
     * Each indexDetails item has the following structure:
     *      - colName: the name of the column
     *      - ascDesc: null | ASC | DESC, the direction of the index column.
     *
     *
     *
     * The available options are:
     *
     * - unique: bool=false. If true, the method returns info about the unique indexes only.
     *
     *
     *
     * @param string $table
     * @param array $options
     * @return array
     * @throws \Exception
     */
    public function getIndexesDetails(string $table, array $options = []): array
    {

        $unique = $options['unique'] ?? false;
        if (true === $unique) {
            $uniqueValue = "0";
        } else {
            $uniqueValue = "1";
        }

        $ret = [];
        $info = $this->wrapper->fetchAll("SHOW INDEX FROM `$table`");
        if (false !== $info) {
            $indexes = [];
            foreach ($info as $_info) {
                if (
                    $uniqueValue === $_info['Non_unique'] &&
                    'PRIMARY' !== $_info['Key_name']
                ) {
                    $dir = $_info['Collation'];
                    if (null === $dir || 'NULL' === $dir) { // which one is it?
                        $dir = null;
                    } else {
                        switch ($dir) {
                            case "A":
                                $dir = 'ASC';
                                break;
                            case "D":
                                $dir = 'DESC';
                                break;
                            default:
                                $this->error("Unknown collation case with \"$dir\".");
                                break;
                        }
                    }


                    $indexes[$_info['Key_name']][$_info['Seq_in_index']] = [
                        'colName' => $_info['Column_name'],
                        'ascDesc' => $dir,
                    ];
                }
            }
            foreach ($indexes as $name => $keys) {
                $keys = array_merge($keys);
                $ret[$name] = $keys;
            };
        }
        return $ret;
    }


    /**
     * Returns an array of columnName => type.
     *
     * The type is the string returned by mysql (such as int(11) or varchar(128) for instance).
     * If the precision tag is set to false, then the information in parenthesis is dropped.
     *
     *
     *
     * @param string $table
     * @param bool $precision
     * @return array
     * @throws \Exception
     */
    public function getColumnTypes(string $table, bool $precision = false)
    {
        $types = [];
        $info = $this->wrapper->fetchAll("SHOW COLUMNS FROM `$table`");
        if (false === $info) {
            $this->error("Problem with the show columns query.");
        }

        foreach ($info as $_info) {
            $type = $_info['Type'];
            if (false === $precision) {
                $type = explode('(', $type, 2)[0];
            }
            $types[$_info['Field']] = $type;
        }
        return $types;
    }


    /**
     * Returns an array of columnName => isNullable (a boolean).
     *
     *
     * @param $table
     * @return array
     * @throws \Exception
     */
    public function getColumnNullabilities($table): array
    {
        $defaults = [];
        $info = $this->wrapper->fetchAll("SHOW COLUMNS FROM `$table`");
        if (false === $info) {
            $this->error("Problem with the show columns query.");
        }
        foreach ($info as $_info) {
            $defaults[$_info['Field']] = ('YES' === $_info['Null']) ? true : false;
        }
        return $defaults;
    }


    /**
     * Returns the name of the auto-incremented field, or false if there is none.
     *
     * @param string $table
     * @return false|string
     * @throws \Exception
     */
    public function getAutoIncrementedKey(string $table)
    {
        $q = "show columns from `$table` where extra='auto_increment'";
        if (false !== ($rows = $this->wrapper->fetchAll($q))) {
            if (array_key_exists(0, $rows)) {
                return $rows[0]['Field'];
            }
        }
        return false;
    }


//    /**
//     * Returns the name of the auto-incremented field, if it's also a primary key, or false otherwise.
//     *
//     * @param string $table
//     * @return false|string
//     * @throws \Exception
//     */
//    public function getAutoIncrementedPrimaryKey(string $table)
//    {
//        $ai = $this->getAutoIncrementedKey($table);
//        if (false !== $ai) {
//            $pkey = $this->getPrimaryKey($table);
//            if (false === empty($pkey) && in_array($ai, $pkey, true)) {
//                return $ai;
//            }
//        }
//        return false;
//    }


    /**
     * Returns an array of  foreignKey => [ referencedDb, referencedTable, referencedColumn ] for the given table.
     *
     * It's assumed that the given table exists.
     *
     *
     *
     *
     * @param string $table
     * @return array
     * @throws \Exception
     */
    public function getForeignKeysInfo(string $table)
    {
        $ret = [];
        list($schema, $table) = $this->splitTableName($table);
        if (false !== ($rows = $this->wrapper->fetchAll("
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


    /**
     * Returns an array of tableId  => referencedByTableIds for the given databases.
     * If no database is given, the current database will be used.
     *
     * With:
     *
     * - tableId: string, the full table name, using the notation $db.$table
     * - referencedByTableIds: array of referencedByTableId items, each of which being a full table name using the notation $db.$table.
     *
     * Available options are:
     *
     * - useDbPrefix: bool=true. Whether to prefix the table names with the database name.
     *
     *
     *
     * @param array|null $databases
     * @param array $options
     * @return array
     * @throws \Exception
     */
    public function getReverseForeignKeyMap(array $databases = null, array $options = []): array
    {
        $useDbPrefix = $options['useDbPrefix'] ?? true;
        $currentDb = $this->getDatabase();
        if (null === $databases) {
            $databases = [$currentDb];
        }
        $ret = [];
        foreach ($databases as $database) {
            $this->changeDatabase($database);
            $tables = $this->getTables();
            foreach ($tables as $table) {
                $fks = $this->getForeignKeysInfo($database . "." . $table);
                foreach ($fks as $col => $fkInfo) {
                    list($fdb, $ftable, $fcol) = $fkInfo;
                    if (true === $useDbPrefix) {
                        $ret["$fdb.$ftable"][] = "$database.$table";
                    } else {
                        $ret[$ftable][] = $table;
                    }
                }
            }
        }
        $this->changeDatabase($currentDb);
        return $ret;
    }


    /**
     * Returns the array of tables having a foreign key referencing the given table.
     * It's an array of full table names (i.e. $db.$table notation).
     *
     * The databases argument is the set of databases to search inside of.
     * If null (by default), the current database only will be used.
     *
     * The table argument can use the full notation (i.e. $db.$table) or be just the single table name.
     * If it uses the full notation, make sure to pass the database of the table to the databases argument.
     *
     *
     *
     * @param string $table
     * @param array|null $databases
     * @return array
     * @throws \Exception
     */
    public function getReferencedByTables(string $table, array $databases = null): array
    {
        if (null === $databases) {
            $databases = [$this->getDatabase()];
        }
        list($schema, $table) = $this->splitTableName($table);
        $fullTableName = $schema . "." . $table;
        $rfkMap = $this->getReverseForeignKeyMap($databases);
        if (array_key_exists($fullTableName, $rfkMap)) {
            return $rfkMap[$fullTableName];
        }
        return [];

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
     *      This method will list the following handles:
     * - the column of the **left** table referencing the **has** table's foreign key (same value as the **referenced_by_left** property)
     * - the unique indexes of the **left** table
     *
     * - right_handles: array of potential handles. Each handle is an array representing a set of columns that this method consider should be used as a handle related to the **right** table.
     *      This method will list the following handles:
     *      - the column of the **right** table referencing the **has** table's foreign key (same value as the **referenced_by_right** property).
     *      - a "natural" column that has a common name for a handle, based on a list which the developer can provide, and which defaults to:
     *          - name
     *          - label
     *          - identifier
     *
     * - the unique indexes of the **right** table that have only one column (i.e not the unique indexes with multiple columns).
     *      If the unique index column contains only the aforementioned "natural" column, this particular index is discarded (as to avoid redundancy).
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

        /**
         * Need help? follow me...
         *
         * Example of 3 tables from the jindemo database:
         *
         * - luda_resource
         * - luda_resource_has_tag
         * - luda_tag
         *
         * Analyzing of the luda_resource table below (for instance).
         *
         */

        $ret = [];
        list($db, $table) = $this->splitTableName($table);

        $fullTable = $db . "." . $table;
        $reverseFkeyMap = $this->getReverseForeignKeyMap([$db]);

        if (array_key_exists($fullTable, $reverseFkeyMap)) {
            /**
             * Will contain the jindemo.luda_resource_has_tag table,
             * which is the only has table in our example.
             */
            $rfkTables = $reverseFkeyMap[$fullTable];
            foreach ($rfkTables as $referenceByFullTable) {

                if (true === $this->isHasTable($referenceByFullTable, $options)) {
                    $p = explode(".", $referenceByFullTable, 2);
                    $referenceByTable = array_pop($p);
                    $leftInfo = null;
                    $rightInfo = null;
                    $leftKey = null;
                    $rightKey = null;
                    /**
                     * Here we've gor the foreign keys of the resource_has_tag table:
                     *
                     * - resource_id:
                     *      0: jindemo
                     *      1: luda_resource
                     *      2: id
                     * - tag_id:
                     *      0: jindemo
                     *      1: luda_tag
                     *      2: id
                     *
                     * We want to find which one is the right, and which one is the left.
                     * Logic (at least european logic) will tend to put the left member first.
                     * This logic is not absolute though, and so the code below might be reworked later.
                     * todo: rework this part, not very reliable.
                     *
                     */
                    $fkeys = $this->getForeignKeysInfo($referenceByTable);
                    if (2 === count($fkeys)) {

                        reset($fkeys);
                        $leftKey = key($fkeys);
                        $leftInfo = array_shift($fkeys);
                        $rightKey = key($fkeys);
                        $rightInfo = array_shift($fkeys);

                    } else {
                        throw new MysqlInfoUtilException("Not implemented yet with count fkeys > 2.");
                    }


                    $isOwner = ($leftInfo[1] === $table);

                    /**
                     * Handles.
                     * See my conception notes ("The has table information" section) for the technical guide behind this code.
                     * https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/pages/conception-notes.md#the-has-table-information
                     */
                    $leftUniqueIndexes = $this->getUniqueIndexes($leftInfo[1]);
                    $leftHandles = [
                        [$leftInfo[2]],
                    ];
                    foreach ($leftUniqueIndexes as $index) {
                        $leftHandles[] = $index;
                    }
                    $rightUniqueIndexes = $this->getUniqueIndexes($rightInfo[1]);
                    $rightHandles = [
                        [$rightInfo[2]],
                    ];
                    $handleLabels = $options['naturalHandleLabels'] ?? null;
                    $naturalHandle = $this->getNaturalHandle($rightInfo[1], $handleLabels);
                    if (false !== $naturalHandle) {
                        $rightHandles[] = [$naturalHandle];
                    }

                    foreach ($rightUniqueIndexes as $index) {
                        if (1 === count($index)) {
                            $indexColumn = array_shift($index);
                            if ($naturalHandle !== $indexColumn) {
                                $rightHandles[] = $index;
                            }
                        }
                    }


                    $ret[] = [
                        "is_owner" => $isOwner,
                        "has_table" => $referenceByTable,
                        "left_table" => $leftInfo[1],
                        "right_table" => $rightInfo[1],
                        "left_fk" => $leftKey,
                        "right_fk" => $rightKey,
                        "referenced_by_left" => $leftInfo[2],
                        "referenced_by_right" => $rightInfo[2],
                        "left_handles" => $leftHandles,
                        "right_handles" => $rightHandles,
                    ];
                }
            }
        }
        return $ret;
    }


    /**
     * Returns whether the given table is a **has** table, based on the table name.
     * See more details in @page(the conception notes about has table information).
     *
     * The available options are:
     * - hasKeywords: array of potential has keywords. Defaults to an array containing the "has" keyword.
     *
     *
     *
     * @param string $table
     * @param array $options
     * @return bool
     * @throws \Exception
     */
    public function isHasTable(string $table, array $options = []): bool
    {
        list($db, $table) = $this->splitTableName($table);


        $hasKeywords = $options['hasKeywords'] ?? $this->defaultHasKeywords;
        foreach ($hasKeywords as $hasKeyword) {
            $hasKeyword = "_" . $hasKeyword . "_";
            if (false !== strpos($table, $hasKeyword)) {
                $fk = $this->getForeignKeysInfo($table);
                if (count($fk) >= 2) {
                    return true;
                }
            }
        }
        return false;
    }


    /**
     * Returns whether the given table is considered a manyToMany table.
     *
     * We consider that a table is a manyToMany only if all the columns of its primary key are foreign keys.
     * If there is no primary key at all, it's not a manyToMany table.
     *
     *
     * @param string $table
     * @return bool
     */
    public function isManyToManyTable(string $table): bool
    {
        $pk = $this->getPrimaryKey($table);
        if ($pk) {
            $fk = $this->getForeignKeysInfo($table);
            foreach ($pk as $primary) {
                if (false === array_key_exists($primary, $fk)) {
                    return false;
                }
            }
            return true;
        }
        return false;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the double quote protected full version of the given table.
     * The result is meant to be used inside an sql query wrapped with double quotes.
     *
     *
     * @param string $table
     * @return string
     */
    protected function dQuoteTable(string $table): string
    {
        $table = '`' . $table . '`';
        return $table;
    }

//    protected function getResolvedForeignKeyInfo(&$db = null, &$table = null, &$column = null)
//    {
//        $foreignKeys = $this->getForeignKeysInfo($table, $db);
//        $max = 10;
//        $c = 0;
//        while (array_key_exists($column, $foreignKeys)) {
//            if ($c > $max) {
//                throw new SimplePdoWrapperException("Too much occurence");
//            }
//            $info = $foreignKeys[$column];
//            $db = $info[0];
//            $table = $info[1];
//            $column = $info[2];
//            $foreignKeys = $this->getForeignKeysInfo($table, $db);
//            $c++;
//        }
//    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns an array with the following info:
     * - database: string
     * - table: string
     *
     * Those information are extracted from the given table name, which might use the db.table notation,
     * or just be a single table name. In case of a single table name, the database returned is the current database.
     *
     *
     *
     * @param string $table
     * @return array
     */
    private function splitTableName(string $table): array
    {
        $schema = null;
        $p = explode('.', $table, 2);
        if (2 === count($p)) {
            list($schema, $table) = $p;
        }
        if (null === $schema) {
            $schema = $this->getDatabase();
        }
        return [$schema, $table];
    }

    /**
     * Returns the natural handle for the given table, based on the given handleLabels.
     * Returns false if no natural handle was found.
     *
     *
     * @param string $table
     * @param array|null $handleLabels
     * @return string|false
     * @throws \Exception
     */
    private function getNaturalHandle(string $table, array $handleLabels = null)
    {
        list($db, $table) = $this->splitTableName($table);

        if (null === $handleLabels) {
            $handleLabels = $this->defaultHandleLabels;
        }

        $columnNames = $this->getColumnNames($table);
        foreach ($columnNames as $columnName) {
            if (in_array($columnName, $handleLabels, true)) {
                return $columnName;
            }
        }

        return false;

    }


    /**
     * Throws an exception.
     *
     * @param string $msg
     * @throws \Exception
     */
    private function error(string $msg)
    {
        throw new MysqlInfoUtilException($msg);
    }

}