<?php


namespace Ling\Light_Realist\Service;


use Ling\ArrayToString\ArrayToStringTool;
use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\ArrayTool;
use Ling\Bat\BDotTool;
use Ling\Bat\SmartCodeTool;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_CsrfSession\Service\LightCsrfSessionService;
use Ling\Light_Database\LightDatabasePdoWrapper;
use Ling\Light_Realist\ActionHandler\LightRealistActionHandlerInterface;
use Ling\Light_Realist\DynamicInjection\RealistDynamicInjectionHandlerInterface;
use Ling\Light_Realist\Exception\LightRealistException;
use Ling\Light_Realist\Helper\DuelistHelper;
use Ling\Light_Realist\Helper\RealistHelper;
use Ling\Light_Realist\ListActionHandler\LightRealistListActionHandlerInterface;
use Ling\Light_Realist\ListGeneralActionHandler\LightRealistListGeneralActionHandlerInterface;
use Ling\Light_Realist\Rendering\RealistListRendererInterface;
use Ling\Light_Realist\Rendering\RealistRowsRendererInterface;
use Ling\Light_Realist\Rendering\RequestIdAwareRendererInterface;
use Ling\Light_Realist\Tool\LightRealistTool;
use Ling\ParametrizedSqlQuery\Helper\ParametrizedSqlQueryHelper;
use Ling\ParametrizedSqlQuery\ParametrizedSqlQueryUtil;

/**
 * The LightRealistService class.
 *
 * More information in the @page(realist conception notes).
 *
 *
 * This class uses babyYaml files as the main storage.
 * Note: if you need another storage, you might want to extend this class, or create a similar service.
 *
 *
 *
 *
 *
 * Conception notes
 * ------------------
 *
 * So basically, I plan to implement three different methods to call sql requests.
 * This service could be the only service you use for handling ALL the sql requests of your app,
 * if so you wanted (at least that's my goal to provide such a tool with this service).
 *
 *
 * The three methods will be distribute amongst two php methods:
 *
 * - executeRequestById
 * - executeRequest
 *
 * The executeRequest is for common and/or free requests.
 * The executeRequestById splits internally in two different methods:
 *
 * - one to execute parametrized requests stored in the babyYaml files. This is the main use of this method.
 * - the other will let us go even more dynamic (more php code), in case babyYaml static style isn't enough to handle
 *      every situations.
 *
 * Now at the moment you're reading this the class might just a work in progress.
 * I like to implement the features only when there is a concrete need for it, and so for I didn't need
 * the dynamic side, nor the free requests.
 *
 *
 *
 *
 *
 */
class LightRealistService
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * This property holds the base directory for this instance.
     * It should be set to the application directory.
     * @var string
     */
    protected $baseDir;

    /**
     * This property holds the parametrizedSqlQuery for this instance.
     * @var ParametrizedSqlQueryUtil
     */
    protected $parametrizedSqlQuery;

    /**
     * This property holds the array of realistRowsRenderer instances.
     * It's an array of str:identifier => instance:realistRowsRenderer.
     *
     *
     * @var RealistRowsRendererInterface[]
     */
    protected $realistRowsRenderers;


    /**
     * This property holds the (ric/ajax) actionHandlers for this instance.
     * It's an array of LightRealistActionHandlerInterface instances.
     *
     * @var LightRealistActionHandlerInterface[]
     */
    protected $actionHandlers;


    /**
     * This property holds the listActionHandlers for this instance.
     * It's an array of LightRealistListActionHandlerInterface instances.
     *
     * @var LightRealistListActionHandlerInterface[]
     */
    protected $listActionHandlers;

    /**
     * This property holds the listGeneralActionHandlers for this instance.
     * @var LightRealistListGeneralActionHandlerInterface[]
     */
    protected $listGeneralActionHandlers;


    /**
     * This property holds the listRenderers for this instance.
     * It's an array of identifier => RealistListRendererInterface instance
     *
     * @var RealistListRendererInterface[]
     */
    protected $listRenderers;

    /**
     * This property holds the dynamicInjectionHandlers for this instance.
     * It's an array of identifier => RealistDynamicInjectionHandlerInterface
     *
     * Usually the identifier is a plugin name.
     *
     * @var RealistDynamicInjectionHandlerInterface[]
     */
    protected $dynamicInjectionHandlers;

    /**
     * This property holds the _requestDeclarationCache for this instance.
     * An array of requestId => requestDeclaration array
     * @var array
     */
    private $_requestDeclarationCache;


    /**
     * Builds the LightRealistService instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->baseDir = "/tmp";
        $this->parametrizedSqlQuery = new ParametrizedSqlQueryUtil();
        $this->realistRowsRenderers = [];
        $this->actionHandlers = [];
        $this->listActionHandlers = [];
        $this->listGeneralActionHandlers = [];
        $this->listRenderers = [];
        $this->dynamicInjectionHandlers = [];
        $this->_requestDeclarationCache = [];
    }


    /**
     *
     * Executes the realist identified by the given requestId, and returns an array with the following
     * properties (see @page(the realist conception notes) for more details):
     *
     *
     * - nb_total_rows: int, the total number of rows without "where" filtering
     * - nb_rows: int, the number of returned rows (i.e. WITH the "where" filtering)
     * - rows: array, the raw rows returned by the sql query
     * - rows_html: string, the html of the rows, as shaped by the realist configuration
     * - sql_query: string, the executed sql query (intend: debug)
     * - markers: array, the markers used along with the executed sql query (intend: debug)
     *
     *
     *
     *
     * The requestId is a string with the following structure:
     *
     * - requestId: fileId:queryId
     *
     * With:
     *
     * - fileId: the relative path (relative to the baseDir) to the babyYaml file storing the data, without
     *      the .byml extension.
     * - queryId: the request declaration identifier used inside the babyYaml file.
     *
     * Params an array containing the following:
     *
     * - ?tags: the tags to use with the request. (see @page(the realist tag transfer protocol) for more details).
     * - ?csrf_token: string|null. the value of the csrf token to check against. If not passed or null, no csrf checking will be performed.
     * - ?csrf_token_pass: bool. If true, will bypass the csrf_token validation.
     *          Usually, you only want to use this if you've already checked for another csrf token earlier (i.e. you
     *          already trust that the user is who she claimed she is).
     *
     *
     * If the sql query is not valid, an exception will be thrown.
     *
     *
     *
     *
     * @param string $requestId
     * @param array $params
     * @return array
     * @throws \Exception
     */
    public function executeRequestById(string $requestId, array $params = []): array
    {

        $requestDeclaration = $this->getConfigurationArrayByRequestId($requestId);
        $table = DuelistHelper::getRawTableName($requestDeclaration['table']);
        $useRowRestriction = $requestDeclaration['use_row_restriction'] ?? false;
        $showQueryErrorDebug = $requestDeclaration['query_error_show_debug_info'] ?? false;


        //--------------------------------------------
        // CHECKING CSRF TOKEN
        //--------------------------------------------
        $csrfToken = $requestDeclaration['csrf_token'] ?? true;
        if (true === $csrfToken) {
            $csrfTokenValue = $params['csrf_token'] ?? '';
            $this->checkCsrfToken($csrfTokenValue);
        }

//        $csrfTokenPass = $params['csrf_token_pass'] ?? false;
//        if (false === $csrfTokenPass) {
//            if (null !== $csrfToken) {
//                $csrfTokenValue = $params['csrf_token'] ?? '';
//                $this->checkCsrfToken($csrfTokenValue);
//            }
//        }


        $tags = $params['tags'] ?? [];


        //--------------------------------------------
        // CHECKING MICRO PERMISSION
        //--------------------------------------------
        $useMicroPermission = $requestDeclaration['use_micro_permission'] ?? true;
        if (true === $useMicroPermission) {
            $microPermission = "tables.$table.read";
            if (false === $this->container->get("micro_permission")->hasMicroPermission($microPermission)) {
                throw new LightRealistException("Access denied: you don't have the micro-permission: $microPermission.");
            }
        }


//        $this->parametrizedSqlQuery->setLogger($this->container->get('logger'));
        $sqlQuery = $this->parametrizedSqlQuery->getSqlQuery($requestDeclaration, $tags);
        $markers = $sqlQuery->getMarkers();

        $stmt = $sqlQuery->getSqlQuery();
        $countStmt = $sqlQuery->getCountSqlQuery();


        /**
         * @var $db LightDatabasePdoWrapper
         */
        $db = $this->container->get("database");

        try {

            if (false === $useRowRestriction) {
                $rows = $db->fetchAll($stmt, $markers);
                $countRow = $db->fetch($countStmt, $markers);
            } else {
                $rows = $db->pfetchAll($stmt, $markers);
                $countRow = $db->pfetch($countStmt, $markers);
            }


        } catch (\Exception $e) {

            $sMarkers = nl2br(ArrayToStringTool::toPhpArray($markers));

            if (false === $showQueryErrorDebug) {
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

            throw new LightRealistException($debugMsg);
        }

        //--------------------------------------------
        // RENDERING THE ROWS
        //--------------------------------------------
        $rendering = $requestDeclaration['rendering'] ?? [];
        $rowsRenderer = $rendering['rows_renderer'] ?? [];
        $rowsRendererInstance = null;

        if (array_key_exists('class', $rowsRenderer)) {
            $rowsRendererInstance = new $rowsRenderer['class'];
        } else {
            if (array_key_exists("identifier", $rowsRenderer)) {
                $identifier = $rowsRenderer['identifier'];
                $rowsRendererInstance = $this->realistRowsRenderers[$identifier] ?? null;
            } else {
                $this->error("Bad configuration error. For the \"rendering.rows_renderer\" setting, either the \"class\" or the \"identifier\" must be set.");
            }
        }

        if ($rowsRendererInstance instanceof RealistRowsRendererInterface) {


            if ($rowsRendererInstance instanceof LightServiceContainerAwareInterface) {
                $rowsRendererInstance->setContainer($this->container);
            }

            if ($rowsRendererInstance instanceof RequestIdAwareRendererInterface) {
                $rowsRendererInstance->setRequestId($requestId);
            }

            $ric = $requestDeclaration['ric'] ?? [];
            $rowsRendererInstance->setRic($ric);


            // adding regular types
            $types = $rowsRenderer['types'] ?? [];
            foreach ($types as $columnName => $type) {
                if (false === is_array($type)) {
                    $type = [$type, []];
                }
                $theType = array_shift($type);
                $theOptions = $type;
                $rowsRendererInstance->setColumnType($columnName, $theType, $theOptions);
            }

            // adding special checkbox column
            if (array_key_exists('checkbox_column', $rowsRenderer)) {
                $conf = $rowsRenderer['checkbox_column'];
                $name = $conf['name'] ?? 'checkbox';
                $rowsRendererInstance->addDynamicColumn($name, 'pre');
            }


            // adding special action column
            $actionColName = RealistHelper::getActionColumnNameByRequestDeclaration($requestDeclaration);
            if (false !== $actionColName) {
                $rowsRendererInstance->addDynamicColumn($actionColName, 'post');
            }


            // hidden columns
            if (array_key_exists("hidden_columns", $rendering)) {
                $rowsRendererInstance->setHiddenColumns($rendering["hidden_columns"]);
            }


            $rowsHtml = $rowsRendererInstance->render($rows);

        } else {
            $type = gettype($rowsRendererInstance);
            $this->error("The rowsRenderer is not an instance of RealistRowsRendererInterface ($type given).");
        }


        // adding extra info to the output
        $limit = $sqlQuery->getLimit();
        $nbTotalRows = (int)current($countRow);
        $currentPageFirst = 0;
        $currentPageLast = $nbTotalRows;
        $nbItemsPerPage = $nbTotalRows;
        $nbPagesTotal = 1;
        $page = 1;

        if (null !== $limit) {
            list($currentPageFirst, $nbItemsPerPage) = $limit;
            $currentPageLast = $currentPageFirst + $nbItemsPerPage;
            if ($currentPageLast > $nbTotalRows) {
                $currentPageLast = $nbTotalRows;
            }
            $nbPagesTotal = ceil($nbTotalRows / $nbItemsPerPage);
            if (0 !== $nbTotalRows) {
                $page = (int)(($currentPageFirst * $nbPagesTotal) / $nbTotalRows + 1);
            } else {
                $page = 1;
            }
        }
        if (0 === (int)$nbPagesTotal) {
            $nbPagesTotal = 1;
        }


        return [
            'nb_total_rows' => $nbTotalRows,
            'current_page_first' => $currentPageFirst,
            'current_page_last' => $currentPageLast,
            'nb_pages' => $nbPagesTotal,
            'nb_items_per_page' => $nbItemsPerPage,
            'page' => $page,
            'rows' => $rows, //
            'rows_html' => $rowsHtml,
            'sql_query' => $stmt,
            'markers' => $markers,
        ];
    }


//    public function executeRequest(string $request, array $params = [])
//    {
//
//    }


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
     * Sets the baseDir.
     *
     * @param string $baseDir
     */
    public function setBaseDir(string $baseDir)
    {
        $this->baseDir = $baseDir;
    }


    /**
     * Registers a duelistRowsRenderer.
     *
     * @param string $identifier
     * @param RealistRowsRendererInterface $realistRowsRenderer
     */
    public function registerRealistRowsRenderer(string $identifier, RealistRowsRendererInterface $realistRowsRenderer)
    {
        $this->realistRowsRenderers[$identifier] = $realistRowsRenderer;
    }

    /**
     * Registers a list renderer.
     *
     * @param string $identifier
     * @param RealistListRendererInterface $renderer
     */
    public function registerListRenderer(string $identifier, RealistListRendererInterface $renderer)
    {
        $this->listRenderers[$identifier] = $renderer;
    }

    /**
     * Registers an action handler.
     *
     * @param LightRealistActionHandlerInterface $handler
     */
    public function registerActionHandler(LightRealistActionHandlerInterface $handler)
    {
        $ids = $handler->getHandledIds();
        foreach ($ids as $id) {
            $this->actionHandlers[$id] = $handler;
        }
    }


    /**
     * Registers a list action handler.
     * List action ids should be formatted like this:
     *
     * - list action id: {pluginName}.{listActionName}
     *
     *
     * @param string $pluginName
     * @param LightRealistListActionHandlerInterface $handler
     */
    public function registerListActionHandler(string $pluginName, LightRealistListActionHandlerInterface $handler)
    {
        if ($handler instanceof LightServiceContainerAwareInterface) {
            $handler->setContainer($this->container);
        }
        $this->listActionHandlers[$pluginName] = $handler;
    }


    /**
     * Registers a list general action handler.
     * List general action ids should be formatted like this:
     *
     * - list general action id: {pluginName}.{listGeneralActionName}
     *
     * @param string $pluginName
     * @param LightRealistListGeneralActionHandlerInterface $handler
     */
    public function registerListGeneralActionHandler(string $pluginName, LightRealistListGeneralActionHandlerInterface $handler)
    {
        if ($handler instanceof LightServiceContainerAwareInterface) {
            $handler->setContainer($this->container);
        }
        $this->listGeneralActionHandlers[$pluginName] = $handler;
    }


    /**
     * Registers a @page(dynamic injection handler).
     * @param string $identifier
     * @param RealistDynamicInjectionHandlerInterface $handler
     */
    public function registerDynamicInjectionHandler(string $identifier, RealistDynamicInjectionHandlerInterface $handler)
    {
        $this->dynamicInjectionHandlers[$identifier] = $handler;
    }


    /**
     * Returns the action handler identified by the given id.
     *
     * @param string $id
     * @return LightRealistActionHandlerInterface
     * @throws \Exception
     */
    public function getActionHandler(string $id): LightRealistActionHandlerInterface
    {
        if (array_key_exists($id, $this->actionHandlers)) {
            return $this->actionHandlers[$id];
        }
        throw new LightRealistException("No action handler found with id $id.");
    }


    /**
     * Executes the list action identified by the given actionId, by calling the corresponding list action handler,
     * and returns the expected ajax response.
     *
     *
     * @param string $actionId
     * @param array $params
     * @return array
     * @throws \Exception
     */
    public function executeListAction(string $actionId, array $params): array
    {
        list($pluginName, $actionName) = explode('.', $actionId, 2);
        $handler = $this->listActionHandlers[$pluginName];
        return $handler->execute($actionName, $params);
    }


    /**
     * Executes the list general action identified by the given actionId, by calling the corresponding list general action handler,
     * and returns the expected ajax response.
     *
     *
     * @param string $actionId
     * @param array $params
     * @return array
     * @throws \Exception
     */
    public function executeListGeneralAction(string $actionId, array $params): array
    {
        list($pluginName, $actionName) = explode('.', $actionId, 2);
        $handler = $this->listGeneralActionHandlers[$pluginName];
        return $handler->execute($actionName, $params);
    }


    /**
     * Returns a configured list renderer.
     *
     *
     * @param string $requestId
     * @return RealistListRendererInterface
     * @throws \Exception
     */
    public function getListRendererByRequestId(string $requestId): RealistListRendererInterface
    {
        $requestDeclaration = $this->getConfigurationArrayByRequestId($requestId);

        $rendering = $requestDeclaration['rendering'] ?? [];
        $listRendererConf = $rendering['list_renderer'] ?? [];
        $listRendererId = $listRendererConf['identifier'] ?? null;
        if (null === $listRendererId) {
            $this->error("The list renderer id was not defined (requestId=$requestId).");
        }
        if (false === array_key_exists($listRendererId, $this->listRenderers)) {
            $this->error("List renderer not found with identifier $listRendererId (requestId=$requestId).");
        }

        $listRenderer = $this->listRenderers[$listRendererId];

        // a list renderer should be able to prepare itself.
        // Note: some might need the service container?, we could pass it to them if that happened,
        // but for now we try to be conservative and pass only one argument as long as possible.
        $listRenderer->prepareByRequestDeclaration($requestId, $requestDeclaration, $this->container);
        return $listRenderer;
    }


    /**
     * Parses the given list action items (aka @page(toolbar items)) and turns them into @page(generic action items).
     * If a generic action item is discarded, it won't appear in the resulting list.
     *
     * @param array $items
     * @param string $requestId
     * @throws \Exception
     */
    public function prepareListActionGroups(array &$items, string $requestId)
    {

        foreach ($items as $k => $item) {
            if (array_key_exists('action_id', $item)) {
                $res = $this->prepareGenericActionItem($item, $this->listActionHandlers, $requestId);
                if (false === $res) {
                    unset($items[$k]);
                } else {
                    $items[$k] = $item;
                }
            } else {
                if (array_key_exists("items", $item)) {
                    $groupItems = $item['items'];
                    $this->prepareListActionGroups($groupItems, $requestId);
                    $item['items'] = $groupItems;
                    $items[$k] = $item;
                }
            }

        }

    }


    /**
     * Parses the given list general action items and turns them into @page(generic action items).
     * If a generic action item is discarded, it won't appear in the resulting list.
     *
     *
     * @param array $items
     * @param string $requestId
     * @throws \Exception
     */
    public function prepareListGeneralActions(array &$items, $requestId)
    {
        foreach ($items as $k => $item) {
            $res = $this->prepareGenericActionItem($item, $this->listGeneralActionHandlers, $requestId);
            if (false === $res) {
                unset($items[$k]);
            } else {
                $items[$k] = $item;
            }
        }
    }


    /**
     * Returns the configuration array corresponding to the given request id.
     *
     * See the @page(request id) page for more info about the request id.
     *
     * @param string $requestId
     * @return array
     * @throws \Exception
     */
    public function getConfigurationArrayByRequestId(string $requestId): array
    {

        if (array_key_exists($requestId, $this->_requestDeclarationCache)) {
            return $this->_requestDeclarationCache[$requestId];
        }

        if ('not implemented yet' === "requestIdHandlerInterface") {
            $ret = [];
        } else {

            //--------------------------------------------
            // FALLBACK MECHANISM
            //--------------------------------------------
            $p = explode(":", $requestId, 3);
            $n = count($p);
            if (3 === $n) {
                list($pluginName, $resourceId, $requestDeclarationId) = $p;
            } elseif (2 === $n) {
                list($pluginName, $resourceId) = $p;
                $requestDeclarationId = 'default';
            } else {
                $this->error("Invalid syntax for the requestId $requestId using the fallback mechanism.");
            }


            $fileId = "config/data/$pluginName/Light_Realist/$resourceId";
            $filePath = $this->baseDir . "/$fileId.byml";
            if (false === file_exists($filePath)) {
                $this->error("File not found: $filePath for requestId $requestId.");
            }

            $arr = BabyYamlUtil::readFile($filePath);
            if (false === array_key_exists($requestDeclarationId, $arr)) {
                $this->error("Query not found with request declaration id: $requestDeclarationId, in file $filePath.");
            }
            $ret = $arr[$requestDeclarationId];


            // dynamic injection phase
            SmartCodeTool::replaceSmartCodeFunction($ret, "REALIST", function ($identifier) {
                $handler = $this->getDynamicInjectionHandler($identifier);
                $args = func_get_args();
                array_shift($args);
                return $handler->handle($args);
            });


            //--------------------------------------------
            // CSRF TOKEN
            //--------------------------------------------
            /**
             * We do this because we want to allow the developer to simply write csrf_token=true
             * in the config  to generate an actual csrf token.
             * This will only work for list actions and list general actions.
             *
             */
            $listGeneralActions = BDotTool::getDotValue("rendering.list_general_actions", $ret, []);
            if ($listGeneralActions) {
                foreach ($listGeneralActions as &$item) {
                    $this->convertCsrfTokenByItem($item, $requestId);
                }
                BDotTool::setDotValue("rendering.list_general_actions", $listGeneralActions, $ret);
            }
            $listActions = BDotTool::getDotValue("rendering.list_action_groups", $ret, []);
            if ($listActions) {
                ArrayTool::walkRowsRecursive($listActions, function (&$item) use ($requestId) {
                    $this->convertCsrfTokenByItem($item, $requestId);
                }, "items", false);
                BDotTool::setDotValue("rendering.list_action_groups", $listActions, $ret);
            }


        }


        $this->_requestDeclarationCache[$requestId] = $ret;
        return $ret;
    }


    /**
     * Performs the csrf validation if necessary (i.e. if the csrf_token key is defined in the @page(generic action item) configuration),
     * and throws an exception in case of a csrf validation failure.
     *
     * The params array originates from the user (i.e. not trusted).
     *
     * @param array $item
     * @param array $params
     * @throws \Exception
     */
    public function checkCsrfTokenByGenericActionItem(array $item, array $params)
    {
        if (array_key_exists("csrf_token", $item)) {
            if (array_key_exists("csrf_token", $params)) {
                LightRealistTool::checkAjaxToken($params['csrf_token'], $this->container);
            } else {
                $this->error("The csrf_token entry was not provided with the post params.");
            }
        }
    }


    /**
     *
     * @param array $item
     * @throws \Exception
     * @deprecated
     *
     * Checks whether there is a permission restriction for the given @page(generic action item),
     * and if so checks whether the user is granted that permission.
     * If not, this method throws an exception.
     *
     * Note: both the @page(permission) and @page(micro permissions) systems are checked.
     *
     *
     *
     *
     */
//    public function checkPermissionByGenericActionItem(array $item)
//    {
//        if (array_key_exists("right", $item)) {
//            $right = $item['right'];
//
//            /**
//             * @var $user LightUserInterface
//             */
//            $user = $this->container->get("user_manager")->getUser();
//            if (false === $user->hasRight($right)) {
//                $this->error("Permission denied, missing the permission: $right.");
//            }
//        }
//        if (array_key_exists("micro_permission", $item)) {
//            $mp = $item['micro_permission'];
//
//            /**
//             * @var $user LightUserInterface
//             */
//            if (false === $this->container->get("micro_permission")->hasMicroPermission($mp)) {
//                $this->error("Permission denied, missing the micro-permission: $mp.");
//            }
//        }
//    }


    /**
     * Returns the columns used in the sql query by parsing the given request declaration.
     * It's an array of alias => column_expression, usually based on the base_fields property.
     * See the @page(duelist) page for more info.
     *
     * @param array $requestDeclaration
     * @return array
     */
    public function getSqlColumnsByRequestDeclaration(array $requestDeclaration): array
    {
        $ret = $requestDeclaration['base_fields'] ?? [];
        $alias2Expr = ParametrizedSqlQueryHelper::getColumnName2ColumnExpression($ret);
        $labels = BDotTool::getDotValue("rendering.column_labels", $requestDeclaration, []);
        return array_intersect_key($labels, $alias2Expr);
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws the given error message as an exception.
     *
     *
     * @param string $message
     * @throws LightRealistException
     */
    protected function error(string $message)
    {
        throw new LightRealistException($message);
    }


    /**
     * Returns the realist dynamic injection handler associated with the given identifier,
     * or throws an exception if it's not there.
     *
     * @param string $identifier
     * @return RealistDynamicInjectionHandlerInterface
     * @throws \Exception
     */
    protected function getDynamicInjectionHandler(string $identifier): RealistDynamicInjectionHandlerInterface
    {
        if (array_key_exists($identifier, $this->dynamicInjectionHandlers)) {
            $handler = $this->dynamicInjectionHandlers[$identifier];
            if ($handler instanceof LightServiceContainerAwareInterface) {
                $handler->setContainer($this->container);
            }
            return $handler;
        }
        throw new LightRealistException("Dynamic injection handler not found with identifier $identifier.");
    }


    /**
     * Checks whether the csrf token is valid, throws an exception if that's not the case.
     *
     * @param string $token
     * @throws \Exception
     */
    protected function checkCsrfToken(string $token)
    {
        /**
         * @var $csrfService LightCsrfSessionService
         */
        $csrfService = $this->container->get("csrf_session");
        if (true === $csrfService->isValid($token)) {
            return;
        }
        $this->error("Invalid csrf token value provided.");
    }








    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Converts the given item into a @page(generic action item).
     * Returns false if the item should be discarded (i.e. the user isn't granted access to it).
     *
     *
     *
     * @param array $item
     * @param array $handlers
     * @param string $requestId
     * @return bool
     * @throws \Exception
     */
    private function prepareGenericActionItem(array &$item, array $handlers, string $requestId)
    {
        list($pluginName, $actionName) = explode(".", $item['action_id'], 2);
        $handler = $handlers[$pluginName];
        $res = $handler->prepare($actionName, $item, $requestId);
        if (false === $res) {
            return false;
        } else {
            if (array_key_exists('modal', $item)) {
                $this->container->get('html_page_copilot')->addModal($item['modal']);
            }
        }
    }


    /**
     * Parses the given item, and converts csrf_token = true
     * entries to an actual csrf_token value.
     *
     * Note: if ajax, then the value is not generated, and a fake value is used.
     *
     * @param array $item
     * @param string $requestId
     * @throws \Exception
     */
    private function convertCsrfTokenByItem(array &$item, string $requestId)
    {
        if (array_key_exists("csrf_token", $item) && true === $item['csrf_token']) {
            /**
             * @var $csrfService LightCsrfSessionService
             */
            $csrfService = $this->container->get('csrf_session');
            $item['csrf_token'] = $csrfService->getToken();
        }
    }
}