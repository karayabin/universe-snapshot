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
use Ling\SimplePdoWrapper\Util\Where;


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
    public function execute(string $table, string $action, array $params = [])
    {

        $this->checkMicroPermission($table, $action);

        switch ($action) {
            case "create":
                $this->executeCreate($table, $params);
                break;
            case "read":
                $this->error("Not implemented yet: action read, with table=$table.");
                break;
            case "update":
                $this->executeUpdate($table, $params);
                break;
            case "delete":
                $this->executeDelete($table, $params);
                break;
            case "deleteMultiple":
                $this->executeDelete($table, $params, true);
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
     * @param string $table
     * @param array $params
     * @throws \Exception
     */
    protected function executeCreate(string $table, array $params = [])
    {
        /**
         * @var $dbInfoService LightDatabaseInfoService
         */
        $dbInfoService = $this->container->get("database_info");
        $tableInfo = $dbInfoService->getTableInfo($table);
        $columns = $tableInfo['columns'];

        $userData = $params['data'];
        $multiplier = $params['multiplier'] ?? null;


        /**
         * Make sure the user doesn't use the key to do some sql injection.
         */
        $data = ArrayTool::intersect($userData, $columns);

        /**
         * @var $db LightDatabaseService
         */
        $db = $this->container->get("database");


        if ($multiplier) {
            ArrayTool::arrayKeyExistAll([
                "item_id",
            ], $multiplier, true);

            $fieldId = $multiplier['item_id'];

            /**
             * assuming the field id always represents a top level entry of the data (otherwise we need to use bdot)
             */
            if (false === array_key_exists($fieldId, $data)) {
                $this->error("Multiplier column \"$fieldId\" defined but not found in the given data.");
            }

            if (false === is_array($data[$fieldId])) {
                $type = gettype($data[$fieldId]);
                $this->error("The \"$fieldId\" multiplier column's value must be an array, $type given.");
            }


            foreach ($data[$fieldId] as $val) {
                $row = $data;
                $row[$fieldId] = $val;
                $db->insert($table, $row, [
                    'ignore' => true,
                ]);
            }

        } else {
            $db->insert($table, $data);
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
     * @param string $table
     * @param array $params
     * @throws \Exception
     */
    protected function executeUpdate(string $table, array $params = [])
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
        $multiplier = $params['multiplier'] ?? null;
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


        if (null === $multiplier) {
            $db->update($table, $data, $ric);
        } else {
            ArrayTool::arrayKeyExistAll([
                "pivot",
                "item_id",
            ], $multiplier, true);

            $pivot = $multiplier['pivot'];
            $fieldId = $multiplier['item_id'];

            /**
             * abc.1
             */
            if (false === array_key_exists($fieldId, $ric)) {
                $this->error("The \"$fieldId\" property was not found in the given ric.");
            }
            if (false === array_key_exists($pivot, $ric)) {
                $this->error("The \"$pivot\" property was not found in the given ric.");
            }

            /**
             * abc.1
             */
            if (false === array_key_exists($fieldId, $userData)) {
                $this->error("The \"$fieldId\" property was not found in the posted data.");
            }

            $values = $userData[$fieldId];

            if (false === is_array($values)) {
                $type = gettype($values);
                $this->error("The \"$fieldId\" must be an array, $type given.");
            }


            /**
             * delete all, then reinsert, see the [form multiplier trick](https://github.com/lingtalfi/TheBar/blob/master/discussions/form-multiplier.md) for more details.
             */
            $db->delete($table, Where::inst()->key($pivot)->equals($ric[$pivot]));


            $row = $userData;
            /**
             * abc.1
             */
            unset($row[$fieldId]);
            foreach ($values as $value) {
                $row[$fieldId] = $value;
                $db->insert($table, $row, [
                    'ignore' => true,
                ]);
            }
        }
    }


    /**
     * Executes the crud.delete request.
     *
     * @param string $table
     * @param array $params
     * @param bool $isMultiple
     * @throws \Exception
     */
    protected function executeDelete(string $table, array $params = [], bool $isMultiple = false)
    {
        /**
         * @var $dbInfoService LightDatabaseInfoService
         */
        $dbInfoService = $this->container->get("database_info");
        $tableInfo = $dbInfoService->getTableInfo($table);


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
        $db->delete($table, $sWhere, $markers);
    }


    /**
     *
     * Checks whether the current user has the correct micro permission, based on the given parameters,
     * and throws an exception if that's not the case.
     *
     * @param string $table
     * @param string $action
     * @throws \Exception
     */
    protected function checkMicroPermission(string $table, string $action)
    {
        $microAction = $action;
        if ('deleteMultiple' === $microAction) {
            $microAction = 'delete';
        }
        $microPermission = "store.$table.$microAction";
        /**
         * @var $microP LightMicroPermissionService
         */
        $microP = $this->container->get("micro_permission");
        if (false === $microP->hasMicroPermission($microPermission)) {
            $this->error("Micro-permission denied: $microPermission.");
        }
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