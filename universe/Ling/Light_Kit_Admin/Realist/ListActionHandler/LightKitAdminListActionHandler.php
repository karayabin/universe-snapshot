<?php


namespace Ling\Light_Kit_Admin\Realist\ListActionHandler;


use Ling\Bat\BDotTool;
use Ling\Bat\DebugTool;
use Ling\Light_Crud\Service\LightCrudService;
use Ling\Light_Kit_Admin\Exception\LightKitAdminException;
use Ling\Light_Realist\Helper\DuelistHelper;
use Ling\Light_Realist\Helper\RealistHelper;
use Ling\Light_Realist\ListActionHandler\LightRealistBaseListActionHandler;
use Ling\Light_Realist\Service\LightRealistService;
use Ling\Light_Realist\Tool\LightRealistTool;
use Ling\Light_ReverseRouter\Service\LightReverseRouterService;
use Ling\PhpSpreadSheetTool\PhpSpreadSheetTool;


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
                return $this->hasMicroPermission("tables.$table.delete");
                break;
            case "realist-edit_rows":
                $table = $this->getTableNameByRequestId($requestId);
                $this->decorateGenericActionItemByAssets($actionName, $genericActionItem, $requestId, __DIR__, [
                    'generate_ajax_params' => false,
                ]);
                /**
                 * @var $rr LightReverseRouterService
                 */
                $rr = $this->container->get("reverse_router");
                $genericActionItem['params'] = [
                    'url' => $rr->getUrl('lka_route-tool_multiple_form_edit'),
                    'table' => $table,
                ];
                return $this->hasMicroPermission("tables.$table.update");
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
                return $this->hasMicroPermission("tables.$table.read");


                break;
            case "realist-print":
                $this->decorateGenericActionItemByAssets($actionName, $genericActionItem, $requestId, __DIR__);
                $table = $this->getTableNameByRequestId($requestId);
                return $this->hasMicroPermission("tables.$table.read");
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
                $useRowRestriction = $conf['use_row_restriction'] ?? false;
                $table = DuelistHelper::getRawTableName($conf['table']);
                $toolbarItem = LightRealistTool::getToolbarItemByActionId($actionId, $conf);


                //--------------------------------------------
                // CSRF TOKEN CHECK?
                //--------------------------------------------
                $service->checkCsrfTokenByGenericActionItem($toolbarItem, $params);


                //--------------------------------------------
                // DELETING THE ROWS
                //--------------------------------------------
                /**
                 * @var $crud LightCrudService
                 */
                $crud = $this->container->get('crud');
                $contextId = 'Light_Kit_Admin.realist-list_action-delete_rows';
                $crud->execute($contextId, $table, 'deleteMultiple', [
                    'rics' => $rics,
                    'useRowRestriction' => $useRowRestriction,
                ]);
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

                /**
                 * @var $service LightRealistService
                 */
                $service = $this->container->get("realist");
                $conf = $service->getConfigurationArrayByRequestId($requestId);
                $table = DuelistHelper::getRawTableName($conf['table']);
                $res = $this->executeFetchAllRequestByActionId($actionId, $params);


                $rows = $res['rows'];


                $fileName = "$table-" . date("Y-m-d--H:i:s") . "." . $extension;

                $columns = $conf['rendering']['column_labels'];
                $hiddenColumns = $conf['rendering']['hidden_columns'] ?? [];
                $actionColName = RealistHelper::getActionColumnNameByRequestDeclaration($conf);
                $flippedHiddenColumns = array_flip($hiddenColumns);
                $columns = array_diff_key($columns, $flippedHiddenColumns);


                array_unshift($rows, $columns);

                array_walk($rows, function (&$row) use ($flippedHiddenColumns, $actionColName) {
                    if (false !== $actionColName) {
                        unset($row[$actionColName]);
                    }
                    $row = array_diff_key($row, $flippedHiddenColumns);
                });


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
                /**
                 * @var $service LightRealistService
                 */
                $service = $this->container->get("realist");
                $conf = $service->getConfigurationArrayByRequestId($requestId);
                $res = $this->executeFetchAllRequestByActionId($actionId, $params);


                $columns = $conf['rendering']['column_labels'];
                $hiddenColumns = $conf['rendering']['hidden_columns'] ?? [];
                $columns = array_diff_key($columns, array_flip($hiddenColumns));


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


    /**
     * Returns an array containing one @page(in_rics tag) per item in the given rics array.
     * If one of the rics provided by the user doesn't match the ric defined in the configuration,
     * and exception is thrown.
     *
     * @param array $rics
     * @param array $configuration
     * @return array
     * @throws \Exception
     */
    protected function getInRicsTags(array $rics, array $configuration): array
    {
        $tags = [];
        $confRic = $configuration['ric'];
        $tags[] = [
            "tag_id" => "open_parenthesis",
        ];

        $c = 0;
        foreach ($rics as $ric) {
            if (0 !== $c) {
                $tags[] = [
                    "tag_id" => "or",
                ];
            }
            $validRic = [];
            foreach ($confRic as $col) {
                if (array_key_exists($col, $ric)) {
                    $validRic[$col] = $ric[$col];
                } else {
                    $sRic = DebugTool::toString($ric);
                    throw new LightKitAdminException("Invalid ric found: $sRic.");
                }
            }
            $tags[] = [
                'tag_id' => 'in_rics',
                'variables' => $validRic,
            ];
            $c++;
        }
        $tags[] = [
            "tag_id" => "close_parenthesis",
        ];

        return $tags;
    }


    /**
     *
     * Returns the where part of an sql query (where keyword excluded) based on the given
     * rics.
     * Also feeds the pdo markers array.
     *
     * It returns a string that looks like this for instance (parenthesis are part of the returned string)):
     *
     * - (
     *      (user_id like '1' AND permission_group_id like '5')
     *      OR (user_id like '3' AND permission_group_id like '4')
     *      ...
     *   )
     *
     *
     * The given rics is an array of ric column names,
     * whereas the given userRics is an array of items, each of which representing a row and
     * being an array of (ric) column to value.
     *
     *
     *
     * @param array $rics
     * @param array $userRics
     * @param array $markers
     * @return string
     */
    protected function getWhereByRics(array $rics, array $userRics, array &$markers): string
    {
        $s = '';
        $markerInc = 1;
        if ($userRics) {
            $s .= '(';
            $c = 0;
            foreach ($userRics as $userRic) {
                if (0 !== $c) {
                    $s .= ' or ';
                }
                $s .= '(';
                $d = 0;
                foreach ($userRic as $col => $val) {
                    if (in_array($col, $rics, true)) {
                        if (0 !== $d) {
                            $s .= ' and ';
                        }
                        $marker = $col . '_' . $markerInc++;
                        $s .= "$col like :$marker";
                        $d++;
                        $markers[$marker] = $val;
                    }
                }

                $s .= ')';
                $c++;
            }
            $s .= ')';
        }
        return $s;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the result of the LightRealistService->executeRequestById method.
     * It's just a factorization helper.
     *
     * @param string $actionId
     * @param array $params
     * @return array
     * @throws \Exception
     */
    private function executeFetchAllRequestByActionId(string $actionId, array $params)
    {

        $csrfToken = $params['csrf_token'] ?? '';
        $requestId = $params['request_id'];
        $rics = $params['rics'];
        /**
         * @var $service LightRealistService
         */
        $service = $this->container->get("realist");
        $conf = $service->getConfigurationArrayByRequestId($requestId);


        $table = DuelistHelper::getRawTableName($conf['table']);
        $toolbarItem = LightRealistTool::getToolbarItemByActionId($actionId, $conf);


        //--------------------------------------------
        // CSRF TOKEN CHECK?
        //--------------------------------------------
        $service->checkCsrfTokenByGenericActionItem($toolbarItem, $params);


        //--------------------------------------------
        // CHECK PERMISSION
        //--------------------------------------------
        $this->checkMicroPermission("tables.$table.read");

        //--------------------------------------------
        // GETTING THE ROWS
        //--------------------------------------------
        $requestParams = [
            "tags" => $this->getInRicsTags($rics, $conf),
            /**
             * We've already checked for the csrf token, so now we "trust" the user
             */
            "csrf_token" => $csrfToken,
        ];
        return $service->executeRequestById($requestId, $requestParams);
    }
}