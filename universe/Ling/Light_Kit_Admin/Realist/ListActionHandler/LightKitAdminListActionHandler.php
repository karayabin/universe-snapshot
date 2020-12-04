<?php


namespace Ling\Light_Kit_Admin\Realist\ListActionHandler;


use Ling\Bat\CaseTool;
use Ling\Bat\DebugTool;
use Ling\Bat\StringTool;
use Ling\Light_Bullsheet\Service\LightBullsheetService;
use Ling\Light_Crud\Service\LightCrudService;
use Ling\Light_CsrfSession\Service\LightCsrfSessionService;
use Ling\Light_DatabaseUtils\Service\LightDatabaseUtilsService;
use Ling\Light_Kit_Admin\Duplicator\LkaMasterRowDuplicator;
use Ling\Light_Kit_Admin\Exception\LightKitAdminException;
use Ling\Light_Realist\Helper\DuelistHelper;
use Ling\Light_Realist\Helper\RequestDeclarationHelper;
use Ling\Light_Realist\ListActionHandler\LightRealistBaseListActionHandler;
use Ling\Light_Realist\Service\LightRealistService;
use Ling\Light_Realist\Util\RealistRowsPrinterUtil;
use Ling\Light_ReverseRouter\Service\LightReverseRouterService;
use Ling\Light_UserData\Service\LightUserDataService;
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
    public function doWeShowTrigger(string $actionId, string $requestId): bool
    {
        switch ($actionId) {
            case "realist-generate_random_rows":
            case "realist-load_table":
                $table = $this->getTableNameByRequestId($requestId);
                return $this->hasMicroPermission("store.$table.create");
                break;
            case "realist-delete_rows":
                $table = $this->getTableNameByRequestId($requestId);
                return $this->hasMicroPermission("store.$table.delete");
                break;
            case "realist-duplicate_rows":
            case "realist-duplicate_entities":
                $table = $this->getTableNameByRequestId($requestId);
                return (
                    true === $this->hasMicroPermission("store.$table.read") &&
                    true === $this->hasMicroPermission("store.$table.create")
                );
                break;
            case "realist-edit_rows":
                $table = $this->getTableNameByRequestId($requestId);
                return $this->hasMicroPermission("store.$table.update");
                break;
            case "realist-rows_to_ods":
            case "realist-rows_to_xlsx":
            case "realist-rows_to_xls":
            case "realist-rows_to_html":
            case "realist-rows_to_csv":
            case "realist-rows_to_pdf":
            case "realist-print_rows":
            case "realist-save_table":
                $table = $this->getTableNameByRequestId($requestId);
                return $this->hasMicroPermission("store.$table.read");
                break;
            case "realist-delete_rows_own":
                $this->error("not implemented yet");
                break;
        }
        return false;
    }


    /**
     * @implementation
     */
    public function prepareListAction(string $actionId, string $requestId, array &$listAction): void
    {
        switch ($actionId) {

            case "realist-generate_random_rows":
            case "realist-delete_rows":
            case "realist-duplicate_rows":
            case "realist-duplicate_entities":
                $table = $this->getTableNameByRequestId($requestId);
                $params = $this->selectiveMerge([
                    "table" => $table,
                    "request_id" => $requestId,
                ], $listAction, [
                    'confirm',
                    'confirmExecute',
                ]);

                $this->decorateGenericActionItemByAssets($actionId, $listAction, __DIR__, [
                    "params" => $params,
                ]);
                break;

            case "realist-save_table":
                $table = $this->getTableNameByRequestId($requestId);
                $defaultName = $table . "-" . date('Y-m-d--H-i-s');
                $this->decorateGenericActionItemByAssets($actionId, $listAction, __DIR__, [
                    "modalVariables" => [
                        "defaultName" => $defaultName,
                        "table" => $table,
                    ],
                    "params" => [
                        "table" => $table,
                    ],
                ]);
                break;
            case "realist-load_table":
                $table = $this->getTableNameByRequestId($requestId);
                $this->decorateGenericActionItemByAssets($actionId, $listAction, __DIR__, [
                    "params" => [
                        "table" => $table,
                    ],
                ]);
                break;
            case "realist-print_rows":
                $this->decorateGenericActionItemByAssets($actionId, $listAction, __DIR__, [
                    'params' => [
                        "request_id" => $requestId,
                    ],
                ]);
                break;
            case "realist-edit_rows":
                if (false === array_key_exists("realform_id", $listAction)) {
                    $this->error("Invalid listAction, missing the realform_id parameter.");
                }
                $realformId = $listAction['realform_id'];
                $this->decorateGenericActionItemByAssets($actionId, $listAction, __DIR__);


                /**
                 * @var $rr LightReverseRouterService
                 */
                $rr = $this->container->get("reverse_router");
                $listAction['params'] = [
                    'url' => $rr->getUrl('lka_route-tool_multiple_form_edit'),
                    'realform_id' => $realformId,
                    'csrf_token' => $listAction['params']['csrf_token'],
                ];
                break;
            case "realist-rows_to_ods":
            case "realist-rows_to_xlsx":
            case "realist-rows_to_xls":
            case "realist-rows_to_html":
            case "realist-rows_to_csv":
            case "realist-rows_to_pdf":
                $this->decorateGenericActionItemByAssets($actionId, $listAction, __DIR__, [
                    "jsActionName" => "realist-rows_to_extension",
                    'params' => [
                        "request_id" => $requestId,
                    ],
                ]);
                break;
            default:
                break;
        }
    }


    /**
     * @implementation
     */
    public function execute(string $actionId, array $params = []): array
    {
        $actionName = $actionId;

        //--------------------------------------------
        // MANDATORY AND AUTOMATIC CSRF CHECK
        //--------------------------------------------
        /**
         * Note: although the csrf_token has probably been already checked in the ajax handler that's calling this method,
         * we add an extra check (probably a duplicate), just in case.
         */
        if (array_key_exists('csrf_token', $params)) {
            /**
             * @var $csrf LightCsrfSessionService
             */
            $csrf = $this->container->get("csrf_session");
            if (false === $csrf->isValid($params['csrf_token'])) {
                $this->error("Invalid csrf token: " . $params['csrf_token'] . ", with actionName=$actionName.");
            }
        } else {
            $this->error("The csrf_token param was not found, actionName=$actionName.");
        }


        //--------------------------------------------
        //
        //--------------------------------------------
        switch ($actionName) {
            case "realist-delete_rows":
                return $this->executeDeleteRowsListAction($actionName, $params);
                break;
            case "realist-duplicate_row":
            case "realist-duplicate_row_deep":
            case "realist-duplicate_rows":
            case "realist-duplicate_entities":
                if (in_array($actionName, [
                    'realist-duplicate_row_deep',
                    'realist-duplicate_entities',
                ], true)) {
                    $params['deep'] = true;
                }
                return $this->executeDuplicateRowsListAction($params);
                break;
            case "realist-rows_to_ods":
            case "realist-rows_to_xlsx":
            case "realist-rows_to_xls":
            case "realist-rows_to_html":
            case "realist-rows_to_csv":
            case "realist-rows_to_pdf":
                $p = explode("_", $actionName);
                $extension = array_pop($p);
                return $this->executeRowsToSomethingListAction($actionName, $extension, $params);
                break;
            case "realist-print_rows":
                return $this->executePrintListAction($actionName, $params);
                break;
            case "realist-generate_random_rows":
                return $this->executeGenerateRandomRowsListGeneralAction($actionName, $params);
                break;
            case "realist-save_table":
                return $this->executeSaveTableListGeneralAction($actionName, $params);
                break;
            case "realist-load_table":
                return $this->executeLoadTableListGeneralAction($actionName, $params);
                break;
            default:
                $this->error("unknown handler for action \"$actionName\".");
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
        if (array_key_exists("table", $params)) {
            if (array_key_exists("rics", $params) && is_array($params['rics'])) {

                $table = $params['table'];
                $rics = $params['rics'];


                //--------------------------------------------
                // CHECK MICRO PERMISSION TO BE CONSISTENT WITH PREPARE METHOD
                //--------------------------------------------
                $this->checkMicroPermission("store.$table.delete");


                //--------------------------------------------
                // DELETING THE ROWS
                //--------------------------------------------
                /**
                 * @var $crud LightCrudService
                 */
                $crud = $this->container->get('crud');
                $crud->execute($table, 'deleteMultiple', [
                    'rics' => $rics,
                ]);
                $response = [
                    "type" => "success",
                ];
            } else {
                $this->error("rics not provided or not an array.");
            }
        } else {
            $this->error("table not provided.");
        }

        return $response;
    }


    /**
     * Duplicates the row(s) identified via the given rics (via params), and returns an [alcp](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/ajax-light-communication-protocol.md) response.
     *
     * @param array $params
     * @return array
     * @throws \Exception
     */
    protected function executeDuplicateRowsListAction(array $params): array
    {
        $requestId = $this->getParam('request_id', $params);
        $rics = $this->getParam('rics', $params);
        $table = $this->getTableNameByRequestId($requestId);
        $planetId = $this->getPlanetIdByRequestId($requestId);

        $this->checkMicroPermission("store.$table.create");
        $this->checkMicroPermission("store.$table.read");


        $useDeep = $params['deep'] ?? false;


        $o = new LkaMasterRowDuplicator();
        $o->setContainer($this->container);
        $o->duplicateRows($planetId, $table, $rics, [
            'deep' => $useDeep,
        ]);

        return [
            "type" => "success",
        ];
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


                /**
                 * @var $service LightRealistService
                 */
                $service = $this->container->get("realist");
                $requestId = $params['request_id'];
                if (true === $service->isAvailableActionByRequestId($actionId, $requestId)) {


                    $conf = $service->getConfigurationArrayByRequestId($requestId);
                    $table = DuelistHelper::getRawTableNameByRequestDeclaration($conf);
                    $res = $this->executeFetchAllRequestByActionId($actionId, $params);


                    //--------------------------------------------
                    // CHECK MICRO PERMISSION TO BE CONSISTENT WITH PREPARE METHOD
                    //--------------------------------------------
                    $this->checkMicroPermission("store.$table.read");


                    $rows = $res['rows'];
                    $fileName = "$table-" . date("Y-m-d--H:i:s") . "." . $extension;


                    //--------------------------------------------
                    // PREPARE THE ROWS
                    //--------------------------------------------
                    $util = new RealistRowsPrinterUtil();
                    $util->setConf($conf);
                    $finalRows = $util->prepareRows($rows);


                    ob_start();
                    PhpSpreadSheetTool::createFileByRows("php://output", $finalRows, [
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
                    $this->error("The action \"$actionId\" is not available for this requestId (requestId=$requestId).");
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
                /**
                 * @var $service LightRealistService
                 */
                $service = $this->container->get("realist");
                $conf = $service->getConfigurationArrayByRequestId($requestId);
                if (true === $service->isAvailableActionByRequestId($actionId, $requestId)) {


                    $res = $this->executeFetchAllRequestByActionId($actionId, $params);


                    $table = DuelistHelper::getRawTableNameByRequestDeclaration($conf);

                    //--------------------------------------------
                    // CHECK MICRO PERMISSION TO BE CONSISTENT WITH PREPARE METHOD
                    //--------------------------------------------
                    $this->checkMicroPermission("store.$table.read");


                    $rendering = $conf['rendering'] ?? [];
                    $pDisplay = $rendering['properties_to_display'] ?? [];
                    $pLabels = $rendering['property_labels'] ?? [];

                    $labels = [];
                    foreach ($pDisplay as $pName) {
                        if (array_key_exists($pName, $pLabels)) {
                            $labels[] = $pLabels[$pName];
                        }
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
                    $this->error("The action \"$actionId\" is not available for this requestId (requestId=$requestId).");
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
     * Executes the generate random rows list general action and returns the result.
     *
     * @param string $actionId
     * @param array $params
     * @return array
     * @throws \Exception
     */
    protected function executeGenerateRandomRowsListGeneralAction(string $actionId, array $params): array
    {
        if (array_key_exists("table", $params)) {
            if (array_key_exists("number", $params)) {

                $table = $params['table'];
                $number = (int)$params['number'];


                //--------------------------------------------
                // CHECK PERMISSION
                //--------------------------------------------
                $this->checkMicroPermission("store.$table.create");


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
            $this->error("table not provided.");
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
        if (array_key_exists("table", $params)) {
            if (array_key_exists("name", $params)) {
                if (array_key_exists("visibility", $params)) {

                    $table = $params['table'];
                    $name = $params['name'];
                    $visibility = $params['visibility'];
                    $name = CaseTool::toPortableFilename($name);


                    //--------------------------------------------
                    // CHECK PERMISSION
                    //--------------------------------------------
                    $this->checkMicroPermission("store.$table.read");


                    //--------------------------------------------
                    // CREATE THE BACKUP AND STORE IT INTO THE USER DATA
                    //--------------------------------------------
                    /**
                     * @var $dumpUtil LightDatabaseUtilsService
                     */
                    $dumpUtil = $this->container->get("database_utils");
                    $s = $dumpUtil->getDumpUtil()->dumpTable($table, "/tmp", [
                        "returnAsString" => true,
                        "ignore" => true,
                        "disableFkCheck" => true,
                    ]);
                    $isPrivate = (int)('private' === $visibility);
                    /**
                     * @var $userData LightUserDataService
                     */
                    $userData = $this->container->get("user_data");
                    $fileName = $name . ".sql";
                    $backupDir = $this->getTableBackupDir($table);
                    $path = $backupDir . "/" . $fileName;

                    $userData->createResourceByFileContent([
                        'canonical' => StringTool::truncate($fileName, 64),
                        "is_private" => $isPrivate,
                    ], $s, $path, [
                        "keep_original" => false,
                        "tags" => [
                            "Light_Kit_Admin",
                            "table backups",
                        ],
                    ]);

                    $fileManagerUrl = $this->container->get('reverse_router')->getUrl("lka_userdata_route-user_file_manager");

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
            $this->error("table not provided.");
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
        if (array_key_exists("table", $params)) {
            if (array_key_exists("resource_file_id", $params)) {

                $table = $params['table'];
                $resourceFileId = $params['resource_file_id'];


                //--------------------------------------------
                // CHECK PERMISSION
                //--------------------------------------------
                $this->checkMicroPermission("store.$table.create");


                //--------------------------------------------
                // EXECUTE THE ASSUMED CREATE STATEMENTS
                //--------------------------------------------
                /**
                 * @var $userData LightUserDataService
                 */
                $userData = $this->container->get("user_data");


                $sqlQuery = $userData->getFileContentByResourceFileId($resourceFileId);


                /**
                 * @var $db SimplePdoWrapperInterface
                 */
                $db = $this->container->get("database");
                $db->executeStatement($sqlQuery);


                return [
                    "type" => "success",
                    "toast_type" => "success",
                    "toast_title" => "Success",
                    "toast_body" => "The content of the resource file with id \"$resourceFileId\" has been executed without errors.",
                ];


            } else {
                $this->error("relative_path not provided.");
            }
        } else {
            $this->error("table not provided.");
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
        $confRic = RequestDeclarationHelper::getRicByConf($configuration);
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


        $table = DuelistHelper::getRawTableNameByRequestDeclaration($conf);


        //--------------------------------------------
        // CHECK PERMISSION
        //--------------------------------------------
        $this->checkMicroPermission("store.$table.read");

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


    /**
     * Returns the value of the parameter  which name is given, from the given params array.
     * Throws an exception if the parameter is not defined.
     *
     * @param string $name
     * @param array $params
     * @return mixed
     * @throws \Exception
     */
    private function getParam(string $name, array $params)
    {
        if (array_key_exists($name, $params)) {
            return $params[$name];
        }
        $this->error("Parameter not defined: $name.");
    }

    /**
     * Returns the backup symbolic directory for the given table.
     * @param string $table
     * @return string
     */
    private function getTableBackupDir(string $table): string
    {
        /**
         * @var $ud LightUserDataService
         */
        $ud = $this->container->get("user_data");
        $backupDir = $ud->getOption("backup_dir");
        return str_replace('$table', $table, $backupDir);
    }

    /**
     * Merges the values of arr2 in arr1, but only if the key (of arr2) is in keys; then return the result.
     *
     * @param array $arr1
     * @param array $arr2
     * @param array $keys
     * @return array
     */
    private function selectiveMerge(array $arr1, array $arr2, array $keys): array
    {
        foreach ($arr2 as $k => $v) {
            if (true == in_array($k, $keys, true)) {
                $arr1[$k] = $v;
            }
        }
        return $arr1;
    }
}