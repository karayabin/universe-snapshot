<?php


namespace Ling\Light_Realist\DuelistEngine;


use Ling\ArrayToString\ArrayToStringTool;
use Ling\CheapLogger\CheapLogger;
use Ling\Light\Helper\LightHelper;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Database\LightDatabasePdoWrapper;
use Ling\Light_Realist\DeveloperVariableProvider\DeveloperVariableProviderInterface;
use Ling\Light_Realist\Exception\LightRealistException;
use Ling\ParametrizedSqlQuery\ParametrizedSqlQueryUtil;


/**
 * The MysqlDuelistEngine class.
 */
class MysqlDuelistEngine implements DuelistEngineInterface, LightServiceContainerAwareInterface
{

    /**
     * This property holds the useDebug for this instance.
     * @var bool = false
     */
    private bool $useDebug;


    /**
     * This property holds the error for this instance.
     * @var string|null
     */
    private ?string $error;


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface|null
     */
    private ?LightServiceContainerInterface $container;


    /**
     * Builds the MysqlDuelistEngine instance.
     */
    public function __construct()
    {
        $this->useDebug = false;
        $this->error = null;
        $this->container = null;
    }

    /**
     * Sets the useDebug.
     *
     * @param bool $useDebug
     */
    public function setUseDebug(bool $useDebug)
    {
        $this->useDebug = $useDebug;
    }


    //--------------------------------------------
    // LightServiceContainerAwareInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }




    //--------------------------------------------
    // DuelistEngineInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function getRowsInfo(string $requestId, array $duelistDeclaration, array $tags): array
    {

        $parametrizedSqlQuery = new ParametrizedSqlQueryUtil();


        // adding developer variables if any
        if (array_key_exists("developer_variables", $duelistDeclaration)) {
            $developerVars = $duelistDeclaration['developer_variables'];
            $res = LightHelper::executeMethod($developerVars, $this->container);
            $vars = [];
            if (is_array($res)) {
                $vars = $res;
            } elseif ($res instanceof DeveloperVariableProviderInterface) {
                $vars = $res->getVariables($requestId);
            } else {
                $type = gettype($res);
                throw new LightRealistException("Unknown developer_variables result: an array or an instance of DeveloperVariableProviderInterface was expected, $type given.");
            }

            $parametrizedSqlQuery->setDeveloperVariables($vars);
        }


        $sqlQuery = $parametrizedSqlQuery->getSqlQuery($duelistDeclaration, $tags);
        $markers = $sqlQuery->getMarkers();


        $stmt = $sqlQuery->getSqlQuery();
        $countStmt = $sqlQuery->getCountSqlQuery();


        /**
         * @var $db LightDatabasePdoWrapper
         */
        $db = $this->container->get("database");


        $rows = false;
        $countRow = [];


        try {


            $rows = $db->fetchAll($stmt, $markers);
            $countRow = $db->fetch($countStmt, $markers);


        } catch (\Exception $e) {

            $sMarkers = nl2br(ArrayToStringTool::toPhpArray($markers));

            if (false === $this->useDebug) {
                $debugMsg = $e->getMessage();
            } else {

                // sometimes it's easier to have the stmt displayed too, when debugging
                $debugMsg = "<ul>
<li><b>Query</b>: $stmt</li>
<li><b>Markers</b>: $sMarkers</li>
<li><b>Error</b>: {$e->getMessage()}</li>
</ul>
";
            }

            $this->error = $debugMsg;
        }


        $nbTotalRows = (int)current($countRow);
        $limit = $sqlQuery->getLimit();

        return [
            "rows" => $rows,
            "nbTotalRows" => $nbTotalRows,
            "limit" => $limit,
            "debugInfo" => [
                'stmt' => $stmt,
                'markers' => $markers,
            ],
        ];


    }

    /**
     * @implementation
     */
    public function getError(): string|null
    {
        return $this->error;
    }


}