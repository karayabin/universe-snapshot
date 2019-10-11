<?php


namespace Ling\SimplePdoWrapper\Util;


use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;

/**
 * The MysqlInfoUtil class.
 */
class MysqlInfoUtil
{

    /**
     * This property holds the wrapper for this instance.
     * @var SimplePdoWrapperInterface
     */
    protected $wrapper;


    /**
     * Builds the MysqlInfoUtil instance.
     * @param SimplePdoWrapperInterface|null $wrapper
     */
    public function __construct(SimplePdoWrapperInterface $wrapper = null)
    {
        $this->wrapper = $wrapper;
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
     * @return array
     * @throws \Exception
     */
    public function getRic(string $table): array
    {
        $hasPrimary = false;
        $ric = $this->getPrimaryKey($table, true, $hasPrimary);
        if (false === $hasPrimary) {
            $uniqueIndexes = $this->getUniqueIndexes($table);
            if ($uniqueIndexes) {
                $ric = current($uniqueIndexes);
            }
            else{
                $ric = $this->getColumnNames($table);
            }
        }
        return $ric;
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
     * Return the name of the auto-incremented field, or false if there is none.
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
}