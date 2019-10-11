<?php


namespace Ling\Light_Kit_Admin\Realist\ListActionHandler;


use Ling\Bat\BDotTool;
use Ling\Light_DatabaseInfo\Service\LightDatabaseInfoService;
use Ling\Light_Kit_Admin\Exception\LightKitAdminException;
use Ling\Light_Kit_Admin\Rights\RightsHelper;
use Ling\Light_Realist\ListActionHandler\LightRealistBaseListActionHandler;
use Ling\Light_Realist\Service\LightRealistService;
use Ling\Light_Realist\Tool\LightRealistTool;
use Ling\PhpSpreadSheetTool\PhpSpreadSheetTool;
use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;


/**
 * The LightKitAdminListActionHandler class.
 */
class LightKitAdminListActionHandler extends LightRealistBaseListActionHandler
{

    /**
     * @implementation
     */
    public function prepare(string $actionName, array &$genericActionItem, string $requestId)
    {


        switch ($actionName) {
            case "realist-delete_rows":
                $this->decorateGenericActionItemByAssets($actionName, $genericActionItem, $requestId, __DIR__);
                $table = $this->getTableNameByRequestId($requestId);
                return $this->hasMicroPermission("Light_Kit_Admin.tables.$table.delete");
                break;
            case "realist-rows_to_ods":
            case "realist-rows_to_xlsx":
            case "realist-rows_to_xls":
            case "realist-rows_to_html":
            case "realist-rows_to_csv":
            case "realist-rows_to_pdf":
                $this->decorateGenericActionItemByAssets($actionName, $genericActionItem, $requestId, __DIR__, [
                    "jsActionName" => "realist-rows_to_extension",
                ]);
                $table = $this->getTableNameByRequestId($requestId);
                return $this->hasMicroPermission("Light_Kit_Admin.tables.$table.read");
                break;
            case "realist-print":
                $this->decorateGenericActionItemByAssets($actionName, $genericActionItem, $requestId, __DIR__);
                $table = $this->getTableNameByRequestId($requestId);
                return $this->hasMicroPermission("Light_Kit_Admin.tables.$table.read");
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
            case "realist-delete_rows":
                return $this->executeDeleteRowsListAction($pluginName . '.' . $actionName, $params);
                break;
            case "realist-rows_to_ods":
            case "realist-rows_to_xlsx":
            case "realist-rows_to_xls":
            case "realist-rows_to_html":
            case "realist-rows_to_csv":
            case "realist-rows_to_pdf":
                $p = explode("_", $actionName);
                $extension = array_pop($p);
                return $this->executeRowsToSomethingListAction($pluginName . '.' . $actionName, $extension, $params);
                break;
                break;
            case "realist-print":
                return $this->executePrintListAction($pluginName . '.' . $actionName, $params);
                break;
            default:
                break;
        }
    }


    /**
     * Executes the "delete rows" action and returns the result.
     *
     * @param string $actionId
     * @param array $params
     * @return array
     * @throws \Exception
     */
    protected function executeDeleteRowsListAction(string $actionId, array $params): array
    {

        $response = [];
        if (array_key_exists("request_id", $params)) {
            if (array_key_exists("rics", $params) && is_array($params['rics'])) {

                $requestId = $params['request_id'];
                $rics = $params['rics'];

                /**
                 * @var $service LightRealistService
                 */
                $service = $this->container->get("realist");
                $conf = $service->getConfigurationArrayByRequestId($requestId);
                $table = $conf['table'];
                $toolbarItem = LightRealistTool::getToolbarItemByActionId($actionId, $conf);


                //--------------------------------------------
                // CSRF TOKEN CHECK?
                //--------------------------------------------
                $service->checkCsrfTokenByGenericActionItem($toolbarItem, $params);


                //--------------------------------------------
                // CHECK PERMISSION
                //--------------------------------------------
                $this->checkMicroPermission("Light_Kit_Admin.tables.$table.delete");


                //--------------------------------------------
                // DELETING THE ROWS
                //--------------------------------------------
                /**
                 * @var $db SimplePdoWrapperInterface
                 */
                $db = $this->container->get('database');
                $confRics = $conf['ric'];
                if (1 === count($confRics)) {
                    $sRics = LightRealistTool::ricsToIntegersOnlyInString($rics);

                    /**
                     * In light kit admin, only the root user can delete a root thing.
                     *
                     */
                    if ('lud_user' === $table && false === RightsHelper::isRoot($this->container)) {
                        $q = <<<EEE
delete u.* from lud_user u 
inner join lud_user_has_permission_group uhpg on uhpg.user_id=u.id
inner join lud_permission_group_has_permission h on h.permission_group_id=uhpg.permission_group_id
inner join lud_permission p on p.id=h.permission_id
where u.id in ($sRics) 
and p.name != '*'
EEE;
//                        az($q);
                        $db->executeStatement($q);


                    } else {


                        /**
                         * @var $dbInfo LightDatabaseInfoService
                         */
                        $dbInfo = $this->container->get("database_info");
                        $tableInfo = $dbInfo->getTableInfo("lud_user");
                        $aik = $tableInfo['autoIncrementedKey'];
                        if (false !== $aik) {
                            $db->delete($table, $aik . ' in (' . $sRics . ')');

                        } else {
                            $this->error("Not implemented yet with ric not containing the auto-incremented key.");
                        }
                    }
                } else {
                    $this->error("Not implemented yet with ric containing more than one column.");
                }
                $response = [
                    "type" => "success",
                ];
            } else {
                $this->error("rics not provided or not an array.");
            }
        } else {
            $this->error("request_id not provided.");
        }

        return $response;
    }


    /**
     * Executes the "rows to csv" action and returns information about the resulting generated content.
     *
     * @param string $actionId
     * @param array $params
     * @return array
     * @throws \Exception
     */
//    protected function executeRowsToCsvListAction(string $actionId, array $params): array
//    {
//
//        $response = [];
//        if (array_key_exists("request_id", $params)) {
//            if (array_key_exists("rics", $params) && is_array($params['rics'])) {
//
//                $requestId = $params['request_id'];
//                $rics = $params['rics'];
//
//                /**
//                 * @var $service LightRealistService
//                 */
//                $service = $this->container->get("realist");
//                $conf = $service->getConfigurationArrayByRequestId($requestId);
//                $table = $conf['table'];
//                $toolbarItem = LightRealistTool::getToolbarItemByActionId($actionId, $conf);
//
//
//                //--------------------------------------------
//                // CSRF TOKEN CHECK?
//                //--------------------------------------------
//                $service->checkCsrfTokenByGenericActionItem($toolbarItem, $params);
//
//
//                //--------------------------------------------
//                // CHECK PERMISSION
//                //--------------------------------------------
//                $this->checkMicroPermission("Light_Kit_Admin.tables.$table.read");
//
//
//                //--------------------------------------------
//                // GENERATING CSV
//                //--------------------------------------------
//                /**
//                 * @var $db SimplePdoWrapperInterface
//                 */
//                $db = $this->container->get('database');
//                $confRics = $conf['ric'];
//                if (1 === count($confRics)) {
//                    $primaryColumn = current($confRics);
//                    $sRics = LightRealistTool::ricsToIntegersOnlyInString($rics);
//                    $rows = $db->fetchAll("select * from `$table` where $primaryColumn in ($sRics)");
//                    $delimiter = ",";
//                    $content = CsvUtil::getString($rows, $delimiter);
//                    $response = [
//                        "type" => "success",
//                        "content" => $content,
//                        "contentType" => "text-csv",
//                        "filename" => "$table-" . date("Y-m-d--h:i:s") . ".csv",
//                    ];
//
//
//                } else {
//                    $this->error("Not implemented yet with ric containing more than one column.");
//                }
//            } else {
//                $this->error("rics not provided or not an array.");
//            }
//        } else {
//            $this->error("request_id not provided.");
//        }
//
//        return $response;
//    }


    /**
     * Creates the spreadsheet document depending on the given extension, and returns the info to download it
     * from the browser.
     *
     * @param string $actionId
     * @param string $extension
     * @param array $params
     * @return array
     * @throws \Exception
     */
    protected function executeRowsToSomethingListAction(string $actionId, string $extension, array $params): array
    {

        $response = [];
        if (array_key_exists("request_id", $params)) {
            if (array_key_exists("rics", $params) && is_array($params['rics'])) {

                $requestId = $params['request_id'];
                $rics = $params['rics'];

                /**
                 * @var $service LightRealistService
                 */
                $service = $this->container->get("realist");
                $conf = $service->getConfigurationArrayByRequestId($requestId);
                $table = $conf['table'];
                $toolbarItem = LightRealistTool::getToolbarItemByActionId($actionId, $conf);


                //--------------------------------------------
                // CSRF TOKEN CHECK?
                //--------------------------------------------
                $service->checkCsrfTokenByGenericActionItem($toolbarItem, $params);


                //--------------------------------------------
                // CHECK PERMISSION
                //--------------------------------------------
                $this->checkMicroPermission("Light_Kit_Admin.tables.$table.read");


                //--------------------------------------------
                // GENERATING CSV
                //--------------------------------------------
                /**
                 * @var $db SimplePdoWrapperInterface
                 */
                $db = $this->container->get('database');
                $confRics = $conf['ric'];
                if (1 === count($confRics)) {
                    $primaryColumn = current($confRics);
                    $sRics = LightRealistTool::ricsToIntegersOnlyInString($rics);
                    $rows = $db->fetchAll("select * from `$table` where $primaryColumn in ($sRics)");


                    $fileName = "$table-" . date("Y-m-d--H:i:s") . "." . $extension;

                    /**
                     * @var $dbInfo LightDatabaseInfoService
                     */
                    $dbInfo = $this->container->get('database_info');
                    $columns = $dbInfo->getTableInfo($table)['columns'];
                    array_unshift($rows, $columns);


                    ob_start();
                    PhpSpreadSheetTool::createFileByRows("php://output", $rows, [
                        "extension" => $extension,
                    ]);
                    $content = ob_get_contents();
                    ob_end_clean();


                    $mimeType = null;
                    switch ($extension) {
                        case "ods":
                            $mimeType = "application/vnd.oasis.opendocument.spreadsheet";
                            break;
                        case "xlsx":
                            $mimeType = "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet";
                            break;
                        case "xls":
                            $mimeType = "application/vnd.ms-excel";
                            break;
                        case "html":
                            $mimeType = "text/html";
                            break;
                        case "csv":
                            $mimeType = "text/csv";
                            break;
                        case "pdf":
                            $mimeType = "application/pdf";
                            break;
                        default:
                            $mimeType = "application/octet-stream";
                            break;
                    }


                    $response = [
                        "type" => "success",
                        "contentType" => $mimeType,
                        "file" => "data:$mimeType;base64," . base64_encode($content),
                        "filename" => $fileName,
                    ];


                } else {
                    $this->error("Not implemented yet with ric containing more than one column.");
                }
            } else {
                $this->error("rics not provided or not an array.");
            }
        } else {
            $this->error("request_id not provided.");
        }

        return $response;
    }


    /**
     * Executes the "print" action and returns the result.
     *
     * @param string $actionId
     * @param array $params
     * @return array
     * @throws \Exception
     */
    protected function executePrintListAction(string $actionId, array $params): array
    {

        $response = [];
        if (array_key_exists("request_id", $params)) {
            if (array_key_exists("rics", $params) && is_array($params['rics'])) {

                $requestId = $params['request_id'];
                $rics = $params['rics'];

                /**
                 * @var $service LightRealistService
                 */
                $service = $this->container->get("realist");
                $conf = $service->getConfigurationArrayByRequestId($requestId);
                $table = $conf['table'];
                $toolbarItem = LightRealistTool::getToolbarItemByActionId($actionId, $conf);


                //--------------------------------------------
                // CSRF TOKEN CHECK?
                //--------------------------------------------
                $service->checkCsrfTokenByGenericActionItem($toolbarItem, $params);


                //--------------------------------------------
                // CHECK PERMISSION
                //--------------------------------------------
                $this->checkMicroPermission("Light_Kit_Admin.tables.$table.read");

                //--------------------------------------------
                // GETTING THE ROWS
                //--------------------------------------------
                $confRics = $conf['ric'];
                if (1 === count($confRics)) {
                    /**
                     * @var $dbInfo LightDatabaseInfoService
                     */
                    $dbInfo = $this->container->get("database_info");
                    $tableInfo = $dbInfo->getTableInfo("lud_user");
                    if (false !== $tableInfo['autoIncrementedKey']) {
                        $requestParams = [
                            "tags" => [
                                [
                                    "tag_id" => "in_ids",
                                    "variables" => [
                                        "ids" => LightRealistTool::ricsToIntegersOnlyInString($rics),
                                    ],
                                ],
                            ],
                            /**
                             * We've already checked for the csrf token, so now we "trust" the user
                             */
                            "csrf_token_pass" => true,
                        ];
                        $res = $service->executeRequestById($requestId, $requestParams);
                    } else {
                        $this->error("Not implemented yet with ric not containing the auto-incremented key.");
                    }
                } else {
                    $this->error("Not implemented yet with ric containing more than one column.");
                }


                $columns = $conf['rendering']['column_labels'];
                $checkboxCol = BDotTool::getDotValue("rendering.rows_renderer.checkbox_column", $conf);
                if (is_array($checkboxCol)) {
                    array_unshift($columns, "Checkbox");
                }


                $rowsHtml = $res['rows_html'];
                ob_start();
                require_once __DIR__ . "/templates/print.php";
                $content = ob_get_clean();
                $response = [
                    "type" => "print",
                    "content" => $content,
                ];
            } else {
                $this->error("rics not provided or not an array.");
            }
        } else {
            $this->error("request_id not provided.");
        }

        return $response;
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