<?php


namespace Ling\Light_ChloroformExtension\Field\TableList;

use Ling\ArrayToString\ArrayToStringTool;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_ChloroformExtension\Exception\LightChloroformExtensionException;
use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_Nugget\Service\LightNuggetService;
use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;
use Ling\SimplePdoWrapper\Util\Where;
use Ling\SqlWizard\Util\MysqlSelectQueryParser;

/**
 * The TableListService.
 */
class TableListService
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * This property holds the nugget for this instance.
     * @var array
     */
    protected $nugget;


    /**
     * This property holds the securityChecked for this instance.
     * @var bool=false
     */
    private $securityChecked;


    /**
     * Builds the TableListService instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->securityChecked = false;
    }

    /**
     * Sets the nugget.
     *
     * @param array $nugget
     */
    public function setNugget(array $nugget)
    {
        $this->nugget = $nugget;
    }

    /**
     * Returns the nugget of this instance.
     *
     * @return array
     */
    public function getNugget(): array
    {
        return $this->nugget;
    }


    /**
     * Returns the number of items/rows of the query associated with the defined pluginId.
     *
     * @return int
     * @throws \Exception
     */
    public function getNumberOfItems(): int
    {
        $this->checkSecurity();
        list($q, $markers) = $this->getQueryInfo('count');

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
     * Returns an array of rows based on the defined nugget.
     *
     *
     * This method operates in one of two modes:
     *
     * - search mode (if the searchExpression argument is not null)
     * - regular mode (if the searchExpression argument is null)
     *
     *
     * The returned array structure depends on the mode:
     *
     * - in regular mode, it's an array of value => label.
     * - in search mode, it's an array of rows, each of which containing:
     *      - value: the value
     *      - label: the label
     *
     *
     *
     * The sql query is provided by the nugget ("sql" directive).
     *
     * In search mode, the given "search expression" will be searched in a column provided by the "search_column" directive of the nugget.
     *
     *
     *
     *
     * @param string|null $searchExpression
     * @return array
     * @throws \Exception
     */
    public function getItems(string $searchExpression = null): array
    {
        $this->checkSecurity();


        $q = $this->nugget['sql'];
        $markers = [];


        /**
         * @var $pdoWrapper LightDatabaseService
         */
        $pdoWrapper = $this->container->get("database");
        if (null === $searchExpression) {
            return $pdoWrapper->fetchAll($q, $markers, \PDO::FETCH_COLUMN | \PDO::FETCH_UNIQUE);
        } else {

            $searchColumn = $this->nugget['search_column'];


            $parts = MysqlSelectQueryParser::getQueryParts($q);
            $wherePart = $searchColumn . ' like :search';
            // for now we don't allow sql wildcards.
            $markers['search'] = '%' . addcslashes($searchExpression, '%_') . '%';
            MysqlSelectQueryParser::combineWhere($parts, $wherePart);
            $q = MysqlSelectQueryParser::recompileParts($parts);
        }


        return $pdoWrapper->fetchAll($q, $markers);
    }


    /**
     * Returns the formatted value => label(s) for the given value(s).
     *
     * If a string is passed, the returned array will contain only one element.
     * If an array is passed, the returned array will contain the same number of elements as the given array.
     *
     * This uses the "column" directive of the configuration item.
     * See the @page(chloroformExtension conception notes) for more info).
     *
     *
     * @param string $value
     * @return string
     * @throws \Exception
     */
    public function getValueToLabels($value): array
    {
        /**
         * @var $db LightDatabaseService
         */
        $db = $this->container->get("database");
        $multiple = is_array($value);


        $conf = $this->nugget;
        $q = $conf['sql'];
        $column = $conf['column'];


        $markers = [];
        $parts = MysqlSelectQueryParser::getQueryParts($q);


        if (true === $multiple) {
            $wherePart = '';
            $whereConds = Where::inst()->key($column)->in($value);
            $whereConds->apply($wherePart, $markers);
        } else {
            $wherePart = $column . ' = :columnvalue';
            $markers['columnvalue'] = $value;

        }

        MysqlSelectQueryParser::combineWhere($parts, $wherePart);
        $q = MysqlSelectQueryParser::recompileParts($parts);


        if (true === $multiple) {
            // by definition, label is the second column, see conception notes
            return  $db->fetchAll($q, $markers, \PDO::FETCH_COLUMN | \PDO::FETCH_UNIQUE);
        } else {
            $row = $db->fetch($q, $markers);
            if (false !== $row) {
                return [
                    $value => $row['label'],
                ];
            }
            throw new LightChloroformExtensionException("Couldn't fetch the row value with query $q, and markers " . ArrayToStringTool::toInlinePhpArray($markers));

        }
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


    //--------------------------------------------
    //
    //--------------------------------------------


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the query info based on the given mode.
     * It's an array containing:
     *
     * - 0: string, the query to execute
     * - 1: array, the pdo markers to execute the query with
     *
     *
     *
     * @param string $mode
     * @param array $options
     * @return array
     * @throws \Exception
     */
    private function getQueryInfo(string $mode, array $options = []): array
    {

        $query = null;
        $markers = [];

        switch ($mode) {
            case "count":
                $sql = $this->nugget['sql'] ?? null;
                if (null === $sql) {
                    $this->error("Property sql was not defined in the nugget.");
                }
                $queryInfo = MysqlSelectQueryParser::getQueryParts($sql);

                $queryInfo['fields'] = 'count(*) as count';
                $query = MysqlSelectQueryParser::recompileParts($queryInfo);
                break;
            default:
                $this->error("Unknown mode $mode.");
                break;
        }


        return [
            $query,
            $markers,
        ];
    }


    /**
     * Checks that the user is allowed to execute the actions for this nugget, and throws an exception if that's not the case.
     */
    private function checkSecurity()
    {
        if (false === $this->securityChecked) {
            $this->securityChecked = true;

            /**
             * For now, we can't specify the params.
             * Maybe if this feature is needed we'll update that bit...
             */
            $params = [];
            /**
             * @var $ng LightNuggetService
             */
            $ng = $this->container->get("nugget");
            $ng->checkSecurity($this->nugget, $params);
        }
    }


    /**
     * Throws an exception.
     * @param string $msg
     * @throws \Exception
     */
    private function error(string $msg)
    {
        throw new LightChloroformExtensionException($msg);
    }
}