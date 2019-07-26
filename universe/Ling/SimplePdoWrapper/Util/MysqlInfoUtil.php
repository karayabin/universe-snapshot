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
        $this->wrapper->executeStatement("use $database;");
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