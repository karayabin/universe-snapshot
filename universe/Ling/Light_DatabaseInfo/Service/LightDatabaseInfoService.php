<?php


namespace Ling\Light_DatabaseInfo\Service;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;
use Ling\SimplePdoWrapper\Util\MysqlInfoUtil;

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
     * - columns: an array of the column names
     * - primary: an array of the column names of the primary key (empty if no primary key)
     * - types: an array of columnName => type
     *          Type is a string representing the mysql type ( ex: int(11), or varchar(128), ... ).
     * - ric: the @page(ric) array
     * - autoIncrementedKey: the name of the auto-incremented column, or false (if there is no auto-incremented column)
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


        $colNames = $util->getColumnNames($table);
        $ret['columns'] = $colNames;

        $primary = $util->getPrimaryKey($table);
        $ret['primary'] = $primary;

        $ric = $util->getRic($table);
        $ret['ric'] = $ric;


        $types = $util->getColumnTypes($table, true);
        $ret['types'] = $types;


        $autoIncrementedKey = $util->getAutoIncrementedKey($table);
        $ret['autoIncrementedKey'] = $autoIncrementedKey;

        /**
         * Note: as for now, I didn't implement cache, because the perfs didn't ask for it.
         * But to implement it, just add the cache layer exactly here (i.e. cache the ret array)
         */
        return $ret;
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
        return $util->getTables($prefix);
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
         * @var $db SimplePdoWrapperInterface
         */
        $pdoWrapper = $this->container->get("database");
        $util = new MysqlInfoUtil($pdoWrapper);
        if (null !== $database) {
            $util->changeDatabase($database);
        }
        return $util;
    }
}