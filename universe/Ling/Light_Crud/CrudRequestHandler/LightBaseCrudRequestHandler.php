<?php


namespace Ling\Light_Crud\CrudRequestHandler;


use Ling\Bat\ArrayTool;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Crud\Exception\LightCrudException;
use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_DatabaseInfo\Service\LightDatabaseInfoService;
use Ling\Light_MicroPermission\Service\LightMicroPermissionService;
use Ling\SimplePdoWrapper\Util\RicHelper;


/**
 * The LightBaseCrudRequestHandler class.
 */
class LightBaseCrudRequestHandler implements LightCrudRequestHandlerInterface, LightServiceContainerAwareInterface
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the LightBaseCrudRequestHandler instance.
     */
    public function __construct()
    {
        $this->container = null;
    }

    /**
     * @implementation
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @implementation
     */
    public function execute(string $pluginContextIdentifier, string $table, string $action, array $params = [])
    {
        if (false === in_array($table, $this->getAllowedTables())) {
            $this->error("Table not allowed: $table.");
        }
        $this->checkMicroPermission($pluginContextIdentifier, $table, $action);

        switch ($action) {
            case "create":
                $this->executeCreate($pluginContextIdentifier, $table, $params);
                break;
            case "read":
                $this->error("Not implemented yet: action read, with table=$table.");
                break;
            case "update":
                $this->executeUpdate($pluginContextIdentifier, $table, $params);
                break;
            case "delete":
                $this->executeDelete($pluginContextIdentifier, $table, $params);
                break;
            case "deleteMultiple":
                $this->executeDelete($pluginContextIdentifier, $table, $params, true);
                break;
            default:
                break;
        }


    }





    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Executes the crud.create request.
     *
     * The params array has the following structure:
     *
     * - data: array, the row to insert
     * - ?multiplier: array, the multiplier array (see @page(the form multiplier trick) for more details)
     *
     *
     * @param string $pluginContextIdentifier
     * @param string $table
     * @param array $params
     * @throws \Exception
     */
    protected function executeCreate(string $pluginContextIdentifier, string $table, array $params = [])
    {
        /**
         * @var $dbInfoService LightDatabaseInfoService
         */
        $dbInfoService = $this->container->get("database_info");
        $tableInfo = $dbInfoService->getTableInfo($table);
        $columns = $tableInfo['columns'];

        $userData = $params['data'];
        $multiplier = $params['multiplier'] ?? null;
        $useRowRestriction = $params['useRowRestriction'] ?? false;

        /**
         * Make sure the user doesn't use the key to do some sql injection.
         */
        $data = ArrayTool::intersect($userData, $columns);

        /**
         * @var $db LightDatabaseService
         */
        $db = $this->container->get("database");


        if ($multiplier) {
            $multiplierColumn = $multiplier['column'];
            $insertMode = $multiplier['insert_mode'] ?? 'insert';
            $isInsert = ("insert" === $insertMode);


            if (false === array_key_exists($multiplierColumn, $data)) {
                $this->error("Multiplier column \"$multiplierColumn\" defined but not found in the given data.");
            }
            if (false === is_array($data[$multiplierColumn])) {
                $type = gettype($data[$multiplierColumn]);
                $this->error("The \"$multiplierColumn\" multiplier column's value must be an array, $type given.");
            }


            foreach ($data[$multiplierColumn] as $val) {
                $row = $data;
                $row[$multiplierColumn] = $val;
                if (true === $isInsert) {
                    if (false === $useRowRestriction) {
                        $db->insert($table, $row);
                    } else {
                        $db->pinsert($table, $row);
                    }
                } else {
                    if (false === $useRowRestriction) {
                        $db->replace($table, $row);
                    } else {
                        $db->preplace($table, $row);
                    }
                }
            }

        } else {
            if (false === $useRowRestriction) {
                $db->insert($table, $data);
            } else {
                $db->pinsert($table, $data);
            }
        }
    }


    /**
     * Executes the crud.update request.
     *
     *
     * The params array has the following structure:
     *
     * - data: array, the row to update
     * - updateRic: array, the key/value pairs array representing the @page(ric strict) columns and values of the row to update. It basically defines the where part of the sql query.
     * - ?multiplier: array, the multiplier array (see @page(the form multiplier trick) for more details)
     *
     * @param string $pluginContextIdentifier
     * @param string $table
     * @param array $params
     * @throws \Exception
     */
    protected function executeUpdate(string $pluginContextIdentifier, string $table, array $params = [])
    {

        /**
         * @var $dbInfoService LightDatabaseInfoService
         */
        $dbInfoService = $this->container->get("database_info");
        $tableInfo = $dbInfoService->getTableInfo($table);
        $columns = $tableInfo['columns'];
        $ricStrict = $tableInfo['ricStrict'];


        $userData = $params['data'];
        $userRic = $params['updateRic']; // array of key/value pairs
        $useRowRestriction = $params['useRowRestriction'] ?? false;


        /**
         * Make sure the user doesn't use the key to do some sql injection.
         */
        $data = ArrayTool::intersect($userData, $columns);
        /**
         * Make sure the user uses all the ric columns, otherwise he could potentially update more than one row,
         * for instance:
         *
         * update user_has_permission_group where user_id=4 (missing and permission_group_id=xxx)
         *
         *
         */
        ArrayTool::arrayKeyExistAll($ricStrict, $userRic, true);
        $ric = ArrayTool::intersect($userRic, $ricStrict);


        /**
         * @var $db LightDatabaseService
         */
        $db = $this->container->get("database");
        if (false === $useRowRestriction) {
            $db->update($table, $data, $ric);
        } else {
            $db->pupdate($table, $data, $ric);
        }
    }


    /**
     * Executes the crud.delete request.
     *
     * @param string $pluginContextIdentifier
     * @param string $table
     * @param array $params
     * @param bool $isMultiple
     * @throws \Exception
     */
    protected function executeDelete(string $pluginContextIdentifier, string $table, array $params = [], bool $isMultiple = false)
    {
        /**
         * @var $dbInfoService LightDatabaseInfoService
         */
        $dbInfoService = $this->container->get("database_info");
        $tableInfo = $dbInfoService->getTableInfo($table);
        $useRowRestriction = $params['useRowRestriction'] ?? false;


        /**
         * @var $db LightDatabaseService
         */
        $db = $this->container->get('database');
        $ricStrict = $tableInfo['ricStrict'];

        if (false === $isMultiple) {

            $userRic = $params['ric'];
            ArrayTool::arrayKeyExistAll($ricStrict, $userRic, true);
            $ric = ArrayTool::intersect($userRic, $ricStrict);
            $rics = [$ric];
        } else {
            $userRics = $params['rics'];
            foreach ($userRics as $userRic) {
                ArrayTool::arrayKeyExistAll($ricStrict, $userRic, true);
                $ric = ArrayTool::intersect($userRic, $ricStrict);
                $rics[] = $ric;
            }
        }

        $markers = [];
        $sWhere = RicHelper::getWhereByRics($ricStrict, $rics, $markers);

        if (false === $useRowRestriction) {
            $db->delete($table, $sWhere, $markers);
        } else {
            $db->pdelete($table, $sWhere, $markers);
        }
    }



    /**
     *
     * Checks whether the current user has the correct micro permission, based on the given parameters,
     * and throws an exception if that's not the case.
     *
     * @param string $pluginContextIdentifier
     * @param string $table
     * @param string $action
     * @throws \Exception
     */
    protected function checkMicroPermission(string $pluginContextIdentifier, string $table, string $action)
    {
        $microAction = $action;
        if ('deleteMultiple' === $microAction) {
            $microAction = 'delete';
        }
        $microPermission = "tables.$table.$microAction";
        /**
         * @var $microP LightMicroPermissionService
         */
        $microP = $this->container->get("micro_permission");
        if (false === $microP->hasMicroPermission($microPermission)) {
            $this->error("Micro-permission denied: $microPermission.");
        }
    }


    /**
     * Returns the array of allowed tables.
     * @return array
     * @throws \Exception
     */
    protected function getAllowedTables(): array
    {
        /**
         * @var $dbInfoService LightDatabaseInfoService
         */
        $dbInfoService = $this->container->get("database_info");
        return $dbInfoService->getTables();
    }


    /**
     * Throws an error message.
     *
     * @param string $msg
     * @throws LightCrudException
     */
    protected function error(string $msg)
    {
        throw new LightCrudException($msg);
    }
}