<?php


namespace Ling\Light_Kit_Admin\Realist\ListGeneralActionHandler;


use Ling\Bat\CaseTool;
use Ling\Light_Bullsheet\Service\LightBullsheetService;
use Ling\Light_DatabaseUtils\Service\LightDatabaseUtilsService;
use Ling\Light_Kit_Admin\Exception\LightKitAdminException;
use Ling\Light_Realist\Helper\DuelistHelper;
use Ling\Light_Realist\ListGeneralActionHandler\LightRealistBaseListGeneralActionHandler;
use Ling\Light_Realist\Service\LightRealistService;
use Ling\Light_Realist\Tool\LightRealistTool;
use Ling\Light_UserData\Service\LightUserDataService;
use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;

/**
 * The LightKitAdminListGeneralActionHandler class.
 */
class LightKitAdminListGeneralActionHandler extends LightRealistBaseListGeneralActionHandler
{


    /**
     * @implementation
     */
    public function prepare(string $actionName, array &$genericActionItem, string $requestId)
    {


        switch ($actionName) {
            case "realist-generate_random_rows":
                $this->decorateGenericActionItemByAssets($actionName, $genericActionItem, $requestId, __DIR__);
                $table = $this->getTableNameByRequestId($requestId);
                return $this->hasMicroPermission("tables.$table.create");
                break;
            case "realist-save_table":
                $table = $this->getTableNameByRequestId($requestId);
                $defaultName = $table . "-" . date('Y-m-d--H-i-s');
                $this->decorateGenericActionItemByAssets($actionName, $genericActionItem, $requestId, __DIR__, [
                    "modalVariables" => [
                        "defaultName" => $defaultName,
                        "table" => $table,
                    ],
                ]);
                return $this->hasMicroPermission("tables.$table.read");
                break;
            case "realist-load_table":
                $table = $this->getTableNameByRequestId($requestId);
                /**
                 * @var $userData LightUserDataService
                 */
                $userData = $this->container->get("user_data");


                $this->decorateGenericActionItemByAssets($actionName, $genericActionItem, $requestId, __DIR__, [
                    "modalVariables" => [
                        "backup_list" => $userData->list("backups/database/$table"),
                        "table" => $table,
                    ],
                ]);
                return $this->hasMicroPermission("tables.$table.create");
                break;
            default:
                break;
        }
    }


    /**
     * @implementation
     */
    public function execute(string $actionName, array $params): array
    {
        $pluginName = $this->getPluginName();
        switch ($actionName) {
            case "realist-generate_random_rows":
                return $this->executeGenerateRandomRowsListGeneralAction($pluginName . "." . $actionName, $params);
                break;
            case "realist-save_table":
                return $this->executeSaveTableListGeneralAction($pluginName . "." . $actionName, $params);
                break;
            case "realist-load_table":
                return $this->executeLoadTableListGeneralAction($pluginName . "." . $actionName, $params);
                break;
            default:
                break;
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Executes the generate random rows list general action and returns the result.
     *
     * @param string $actionId
     * @param array $params
     * @return array
     * @throws \Exception
     */
    protected function executeGenerateRandomRowsListGeneralAction(string $actionId, array $params): array
    {
        if (array_key_exists("request_id", $params)) {
            if (array_key_exists("number", $params)) {

                $requestId = $params['request_id'];
                $number = (int)$params['number'];

                /**
                 * @var $service LightRealistService
                 */
                $service = $this->container->get("realist");
                $conf = $service->getConfigurationArrayByRequestId($requestId);
                $table = DuelistHelper::getRawTableName($conf['table']);


                $item = LightRealistTool::getListGeneralActionItemByActionId($actionId, $conf);


                //--------------------------------------------
                // CSRF TOKEN CHECK?
                //--------------------------------------------
                $service->checkCsrfTokenByGenericActionItem($item, $params);


                //--------------------------------------------
                // CHECK PERMISSION
                //--------------------------------------------
                $this->checkMicroPermission("tables.$table.create");


                //--------------------------------------------
                // GENERATING ROWS
                //--------------------------------------------
                $bullsheetTable = $table;
                switch ($table) {
                    case "lud_user":
                        // this service is already provided by the Light_UserDatabase plugin
                        $bullsheetTable = "Light_UserDatabase.lud_user";
                        break;
                    default:
                        $bullsheetTable = "Light_Kit_Admin.default";
//                        $this->error("Unhandled table $table.");
                        break;
                }


                /**
                 * @var $bull LightBullsheetService
                 */
                $bull = $this->container->get("bullsheet");

                $bull->generateRows($bullsheetTable, $number, [
                    "table" => $table,
                ]);
                return [
                    "type" => "success",
                    "toast_type" => "success",
                    "toast_title" => "Success",
                    "toast_body" => "$number row(s) have been successfully generated in table $table.",
                ];

            } else {
                $this->error("number not provided.");
            }
        } else {
            $this->error("request_id not provided.");
        }
    }

    /**
     * Saves the table data in the form of inserts statements, and put the resulting sql file in the user assets.
     *
     * @param string $actionId
     * @param array $params
     * @return array
     * @throws \Exception
     */
    protected function executeSaveTableListGeneralAction(string $actionId, array $params): array
    {
        if (array_key_exists("request_id", $params)) {
            if (array_key_exists("name", $params)) {
                if (array_key_exists("visibility", $params)) {

                    $requestId = $params['request_id'];
                    $name = $params['name'];
                    $visibility = $params['visibility'];
                    $name = CaseTool::toPortableFilename($name);


                    /**
                     * @var $service LightRealistService
                     */
                    $service = $this->container->get("realist");
                    $conf = $service->getConfigurationArrayByRequestId($requestId);
                    $table = DuelistHelper::getRawTableName($conf['table']);


                    $item = LightRealistTool::getListGeneralActionItemByActionId($actionId, $conf);


                    //--------------------------------------------
                    // CSRF TOKEN CHECK?
                    //--------------------------------------------
                    $service->checkCsrfTokenByGenericActionItem($item, $params);


                    //--------------------------------------------
                    // CHECK PERMISSION
                    //--------------------------------------------
                    $this->checkMicroPermission("tables.$table.read");


                    //--------------------------------------------
                    // CREATE THE BACKUP AND STORE IT INTO THE USER DATA
                    //--------------------------------------------
                    /**
                     * @var $dumpUtil LightDatabaseUtilsService
                     */
                    $dumpUtil = $this->container->get("database_utils");
                    $s = $dumpUtil->getDumpUtil()->dumpTable("lud_user", "/tmp", [
                        "returnAsString" => true,
                    ]);
                    /**
                     * @var $userData LightUserDataService
                     */
                    $userData = $this->container->get("user_data");
                    $fileName = $name . ".sql";
                    $userData->save("backups/database/$table/$fileName", $s, [
                        "tags" => [
                            "Light_Kit_Admin",
                        ],
                        "is_private" => ('private' === $visibility),
                    ]);

                    $fileManagerUrl = $this->container->get('reverse_router')->getUrl("lka_route-user_file_manager");

                    return [
                        "type" => "success",
                        "toast_type" => "success",
                        "toast_title" => "Success",
                        "toast_body" => "The backup has been saved. Go to the <a href='" . htmlspecialchars($fileManagerUrl) . "'>user manager</a>.",
                    ];

                } else {
                    $this->error("visibility not provided.");
                }
            } else {
                $this->error("name not provided.");
            }
        } else {
            $this->error("request_id not provided.");
        }
    }


    /**
     * Executes the sql statements found in the given table backup (in the params),
     * which we assume are mostly insert statements.
     *
     * @param string $actionId
     * @param array $params
     * @return array
     * @throws \Exception
     */
    protected function executeLoadTableListGeneralAction(string $actionId, array $params): array
    {
        if (array_key_exists("request_id", $params)) {
            if (array_key_exists("relative_path", $params)) {

                $requestId = $params['request_id'];
                $relativePath = CaseTool::toPortableFilename($params['relative_path']);


                /**
                 * @var $service LightRealistService
                 */
                $service = $this->container->get("realist");
                $conf = $service->getConfigurationArrayByRequestId($requestId);
                $table = DuelistHelper::getRawTableName($conf['table']);


                $item = LightRealistTool::getListGeneralActionItemByActionId($actionId, $conf);


                //--------------------------------------------
                // CSRF TOKEN CHECK?
                //--------------------------------------------
                $service->checkCsrfTokenByGenericActionItem($item, $params);


                //--------------------------------------------
                // CHECK PERMISSION
                //--------------------------------------------
                $this->checkMicroPermission("tables.$table.create");


                //--------------------------------------------
                // EXECUTE THE ASSUMED CREATE STATEMENTS
                //--------------------------------------------
                /**
                 * @var $userData LightUserDataService
                 */
                $userData = $this->container->get("user_data");
                $realPath = "backups/database/$table/" . $relativePath;
                $sqlQuery = $userData->getContent($realPath);


                /**
                 * @var $db SimplePdoWrapperInterface
                 */
                $db = $this->container->get("database");
                $db->executeStatement($sqlQuery);


                return [
                    "type" => "success",
                    "toast_type" => "success",
                    "toast_title" => "Success",
                    "toast_body" => "The content of the $requestId file has been executed without errors.",
                ];


            } else {
                $this->error("relative_path not provided.");
            }
        } else {
            $this->error("request_id not provided.");
        }
    }


    /**
     * Throws an error message.
     *
     * @param string $message
     * @throws \Exception
     */
    protected function error(string $message)
    {
        throw new LightKitAdminException($message);
    }
}