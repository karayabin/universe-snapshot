<?php


namespace Ling\Light_ChloroformExtension\Field\TableList;

use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_ChloroformExtension\Exception\LightChloroformExtensionException;
use Ling\Light_Database\Service\LightDatabaseService;
use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;

/**
 * The TableListService.
 */
class TableListService
{


    /**
     * This property holds the configurationHandler for this instance.
     * @var TableListFieldConfigurationHandlerInterface
     */
    protected $configurationHandler;

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * This property holds the pluginId for this instance.
     * @var string
     */
    protected $pluginId;


    /**
     * This property holds the _cache for this instance.
     * An array of pluginId => configuration item.
     *
     * @var array
     */
    private $_cache;

    /**
     * Builds the TableListService instance.
     */
    public function __construct()
    {
        $this->configurationHandler = null;
        $this->container = null;
        $this->pluginId = null;
        $this->_cache = [];
    }


    /**
     * Returns the number of items/rows of the query associated with the defined pluginId.
     *
     * @return int
     * @throws \Exception
     */
    public function getNumberOfItems(): int
    {
        list($q, $markers) = $this->getTableListSqlQueryInfo();

        /**
         * @var $pdoWrapper SimplePdoWrapperInterface
         */
        $pdoWrapper = $this->container->get("database");
        $row = $pdoWrapper->fetch($q, $markers);
        if (false !== $row) {
            return (int)$row['count'];
        }
        throw new LightChloroformExtensionException("Something went wrong with the sql count request: $q.");
    }


    /**
     * Returns an array of rows based on the defined pluginId.
     * The returned array structure depends on the valueAsIndex flag.
     *
     * If valueAsIndex=true, then it's an array of value => label.
     * If valueAsIndex=false, then it's an array of rows, each of which containing:
     *      - value: the value
     *      - label: the label
     *
     *
     * @param bool $valueAsIndex =true
     * @param string $userQuery =''
     * @return array
     * @throws \Exception
     */
    public function getItems(string $userQuery = '', bool $valueAsIndex = true): array
    {
        list($q, $markers) = $this->getTableListSqlQueryInfo(false, [
            'userQuery' => $userQuery,
        ]);

        /**
         * @var $pdoWrapper SimplePdoWrapperInterface
         */
        $pdoWrapper = $this->container->get("database");
        if (true === $valueAsIndex) {
            return $pdoWrapper->fetchAll($q, $markers, \PDO::FETCH_COLUMN | \PDO::FETCH_UNIQUE);
        }
        return $pdoWrapper->fetchAll($q, $markers);
    }


    /**
     * Returns the formatted label of the column, based on the given raw value.
     *
     * The formatting is based on the configuration pointed by the defined pluginId (i.e. if your
     * fields property use concat, see the @page(chloroformExtension conception notes) for more info).
     *
     *
     * @param string $columnValue
     * @return string
     * @throws \Exception
     */
    public function getLabel(string $columnValue): string
    {
        $conf = $this->getConfigurationItem($this->pluginId);
        $column = $conf['column'];
        list($q, $markers) = $this->getTableListSqlQueryInfo(false, [
            "whereDev" => "$column = :wheredev",
        ]);
        $markers['wheredev'] = $columnValue;


        /**
         * @var $db LightDatabaseService
         */
        $db = $this->container->get("database");
        $row = $db->fetch($q, $markers);
        if (false !== $row) {
            return $row['label'];
        }
        throw new LightChloroformExtensionException("Couldn't fetch the row value with query $q. The pluginId is $this->pluginId.");
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


    /**
     * Sets the configurationHandler.
     *
     * @param TableListFieldConfigurationHandlerInterface $configurationHandler
     */
    public function setConfigurationHandler(TableListFieldConfigurationHandlerInterface $configurationHandler)
    {
        $this->configurationHandler = $configurationHandler;
    }

    /**
     * Sets the pluginId.
     *
     * @param string $pluginId
     */
    public function setPluginId(string $pluginId)
    {
        $this->pluginId = $pluginId;
    }


    /**
     * Returns the @page(table list configuration item) referenced by the given pluginId.
     *
     * @param string|null $pluginId = null
     * @return array
     * @throws \Exception
     */
    public function getConfigurationItem(string $pluginId = null): array
    {
        if (null === $pluginId) {
            $pluginId = $this->pluginId;
        }
        if (array_key_exists($pluginId, $this->_cache)) {
            return $this->_cache[$pluginId];
        }
        $conf = $this->configurationHandler->getConfigurationItem($pluginId);
        $this->_cache[$pluginId] = $conf;
        return $conf;
    }


    //--------------------------------------------
    //
    //--------------------------------------------


    /**
     * Returns an array containing the sql query and the corresponding pdo markers, based the given table list identifier.
     * The type of query returned depends on the isCount flag.
     *
     * - if isCount=true, then the query is a count query (i.e. select count(*) as count...)
     * - if isCount=false, then the query is a query to fetch the items/rows.
     *
     * The available options are:
     * - whereDev: an extra string to add to the where clause
     *
     *
     *
     * @param bool $isCount
     * @param array $options
     * @return array
     * @throws \Exception
     */
    protected function getTableListSqlQueryInfo(bool $isCount = true, array $options = []): array
    {
        $whereDev = $options['whereDev'] ?? '';
        $userQuery = $options['userQuery'] ?? null;


        //
        $markers = [];
        $item = $this->getConfigurationItem($this->pluginId);
        $fields = $item['fields'];
        $searchColumn = $item['search_column'] ?? '';
        $table = $item['table'];
        $joins = $item['joins'] ?? '';
        $where = $item['where'] ?? '';


        if (true === $isCount) {
            $q = "select count(*) as count";
        } else {
            $q = "select $fields";
        }
        $q .= " from $table";
        if ($joins) {
            $q .= " $joins";
        }
        $userWhereUsed = false;
        if ($where) {
            $q .= " where $where";
            $userWhereUsed = true;
        }

        if ($userQuery) {
            if (false === $userWhereUsed) {
                $q .= " where ";
            } else {
                $q .= " and ";
            }
            $q .= $searchColumn . ' like :user_query';
            // for now we don't allow sql wildcards.
            $markers['user_query'] = '%' . addcslashes($userQuery, '%_') . '%';
        }


        if ($whereDev) {
            if (false === $userWhereUsed) {
                $q .= " where ";
            } else {
                $q .= " and ";
            }
            $q .= $whereDev;
        }

        return [$q, $markers];
    }


}