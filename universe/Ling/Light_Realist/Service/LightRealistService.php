<?php


namespace Ling\Light_Realist\Service;


use Ling\ArrayVariableResolver\ArrayVariableResolverUtil;
use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\ArrayTool;
use Ling\Bat\BDotTool;
use Ling\Bat\FileSystemTool;
use Ling\Bat\SmartCodeTool;
use Ling\ConventionTools\ConventionTool;
use Ling\Light\Helper\LightHelper;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_CsrfSession\Service\LightCsrfSessionService;
use Ling\Light_Nugget\Service\LightNuggetService;
use Ling\Light_Realist\ActionHandler\LightRealistActionHandlerInterface;
use Ling\Light_Realist\DuelistEngine\DuelistEngineInterface;
use Ling\Light_Realist\DuelistEngine\MysqlDuelistEngine;
use Ling\Light_Realist\DynamicInjection\RealistDynamicInjectionHandlerInterface;
use Ling\Light_Realist\Exception\LightRealistException;
use Ling\Light_Realist\Helper\DuelistHelper;
use Ling\Light_Realist\ListActionHandler\LightRealistListActionHandlerInterface;
use Ling\Light_Realist\Rendering\RealistListItemRendererInterface;
use Ling\Light_Realist\Rendering\RealistListRendererInterface;
use Ling\Light_Realist\Rendering\RequestIdAwareRendererInterface;
use Ling\Light_Realist\Tool\LightRealistTool;
use Ling\Light_User\LightWebsiteUser;
use Ling\Light_UserManager\Service\LightUserManagerService;
use Ling\ParametrizedSqlQuery\Helper\ParametrizedSqlQueryHelper;

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
     * The list item renderer.
     * See more details in the @page(list item renderer page).
     *
     *
     *
     * @var RealistListItemRendererInterface
     */
    protected $listItemRenderer;


    /**
     * This property holds the (ric/ajax) actionHandlers for this instance.
     * It's an array of LightRealistActionHandlerInterface instances.
     *
     * @var LightRealistActionHandlerInterface[]
     */
    protected $actionHandlers;


    /**
     * The LightRealistListActionHandlerInterface instance used to handle the list actions.
     * See the @page(realist list actions) document for more details.
     *
     * @var LightRealistListActionHandlerInterface
     */
    protected $listActionHandler;


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
     * This property holds the lateRegistered for this instance.
     *
     * An array of already registered requestId.
     *
     * @var array
     */
    private $lateRegistered;


    /**
     * Builds the LightRealistService instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->baseDir = "/tmp";

        $this->listItemRenderer = null;
        $this->actionHandlers = [];
        $this->listActionHandler = null;
        $this->listRenderers = [];
        $this->dynamicInjectionHandlers = [];
        $this->_requestDeclarationCache = [];
        $this->lateRegistered = [];
    }


    /**
     *
     * Executes the realist identified by the given requestId, and returns an array with the following
     * properties (see @page(the realist conception notes) for more details):
     *
     *
     * - nb_total_rows: int, the total number of rows without "where" filtering
     * - current_page_first: int, the index of the first item of the current page
     * - current_page_last: int, the index of the last item of the current page
     * - nb_pages: int, the number of pages
     * - nb_items_per_page: int, the number of items per page
     * - page: int, the current page number
     * - rows: array, the raw rows returned by the sql query
     * - rows_html: string, the html of the rows, as shaped by the realist configuration
     * - sql_query: string, the executed sql query (intend: debug)
     * - markers: array, the markers used along with the executed sql query (intend: debug)
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
     * @param array $options
     * @return array
     * @throws \Exception
     */
    public function executeRequestById(string $requestId, array $params = [], array $options = []): array
    {


        $tags = $params['tags'] ?? [];
        $requestDeclaration = $this->getConfigurationArrayByRequestId($requestId);


        $table = DuelistHelper::getRawTableNameByRequestDeclaration($requestDeclaration);
        $showQueryErrorDebug = $requestDeclaration['query_error_show_debug_info'] ?? false;
        $ric = null;


        //--------------------------------------------
        // CHECKING CSRF TOKEN
        //--------------------------------------------
        $csrfTokenValue = $params['csrf_token'] ?? '';
        $this->checkCsrfToken($csrfTokenValue);


        //--------------------------------------------
        // CHECKING MICRO PERMISSION
        //--------------------------------------------
        $useMicroPermission = $requestDeclaration['use_micro_permission'] ?? true;
        if (true === $useMicroPermission) {
            $microPermission = "store.$table.read";
            if (false === $this->container->get("micro_permission")->hasMicroPermission($microPermission)) {
                throw new LightRealistException("Access denied: you don't have the micro-permission: $microPermission.");
            }
        }


//        $this->parametrizedSqlQuery->setLogger($this->container->get('logger'));


        //--------------------------------------------
        // FETCHING LIST ITEMS
        //--------------------------------------------
        if (array_key_exists("duelist", $requestDeclaration)) {

            $duelistDeclaration = $requestDeclaration['duelist'];
            $engine = $duelistDeclaration['engine'] ?? null;
            $ric = $duelistDeclaration['ric'];


            /**
             * default duelist engine.
             */
            if (null === $engine) {
                $duelistEngine = new MysqlDuelistEngine();
                if (true === $showQueryErrorDebug) {
                    $duelistEngine->setUseDebug(true);
                }
            } else {
                $duelistEngine = LightHelper::executeMethod($engine, $this->container);
                if (false === ($duelistEngine instanceof DuelistEngineInterface)) {
                    $type = gettype($engine);
                    $this->error("Duelist engine must be an instance of DuelistEngineInterface, $type given.");
                }
            }


            if ($duelistEngine instanceof LightServiceContainerAwareInterface) {
                $duelistEngine->setContainer($this->container);
            }

            $engineResult = $duelistEngine->getRowsInfo($requestId, $duelistDeclaration, $tags);
            if (false === $engineResult) {
                throw new LightRealistException($duelistEngine->getError());
            }

            $rows = $engineResult['rows'];
            $nbTotalRows = $engineResult['nbTotalRows'];
            $limit = $engineResult['limit'];
            $debugInfo = $engineResult['debugInfo'];


        } else {
            $this->error("Don't know yet how to proceed with this type of request declaration.");
        }


        //--------------------------------------------
        // RENDERING LIST ITEMS
        //--------------------------------------------
        $rendering = $requestDeclaration['rendering'] ?? [];
        $liRenderer = $rendering['list_item_renderer'] ?? [];
        $liRendererInstance = null;


        if (array_key_exists('class', $liRenderer)) {
            $liRendererInstance = new $liRenderer['class'];
            if ($liRendererInstance instanceof LightServiceContainerAwareInterface) {
                $liRendererInstance->setContainer($this->container);
            }
        } else {
            if (null !== $this->listItemRenderer) {
                $liRendererInstance = $this->listItemRenderer;
            }
        }
        if ($liRendererInstance instanceof RealistListItemRendererInterface) {


            if ($liRendererInstance instanceof LightServiceContainerAwareInterface) {
                $liRendererInstance->setContainer($this->container);
            }

            if ($liRendererInstance instanceof RequestIdAwareRendererInterface) {
                $liRendererInstance->setRequestId($requestId);
            }


            if (null === $ric) {
                $ric = $requestDeclaration['ric'] ?? [];
            }
            $liRendererInstance->setRic($ric);


            // adding regular types
            $types = $liRenderer['types'] ?? [];
            foreach ($types as $property => $type) {
                if (false === is_array($type)) {
                    $type = [$type, []];
                }
                $theType = array_shift($type);
                $theOptions = $type;
                $liRendererInstance->setPropertyType($property, $theType, $theOptions);
            }


            if (array_key_exists("dynamic", $liRenderer)) {
                $dynamics = $liRenderer['dynamic'];
                foreach ($dynamics as $property) {
                    $liRendererInstance->addDynamicProperty($property);
                }
            }


            // filter the properties to display/return
            if (array_key_exists("properties_to_display", $rendering)) {
                $liRendererInstance->setPropertiesToDisplay($rendering["properties_to_display"]);
            }


            $rowsHtml = $liRendererInstance->render($rows);

        } else {
            $type = gettype($liRendererInstance);
            $this->error("The rowsRenderer is not an instance of RealistListItemRendererInterface ($type given).");
        }


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
            'sql_query' => $debugInfo['stmt'] ?? '',
            'markers' => $debugInfo['markers'] ?? [],
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
     * Returns an array of standard developer variables.
     *
     * See the @page(duelist developer variables concept) for more info.
     *
     * This particular array contains the following variables:
     * - user_id, this assumes a valid LightWebsiteUser, see the [Light_User planet](https://github.com/lingtalfi/Light_User) for more info
     *
     *
     * @return array
     */
    public function getStandardDeveloperVariables(): array
    {

        /**
         * @var $manager LightUserManagerService
         */
        $manager = $this->container->get("user_manager");
        $user = $manager->getUser();
        if (true === $user->isValid() && $user instanceof LightWebsiteUser) {
            $userId = $user->getId();
        } else {
            $this->error("Problem with the current user. Either he's not valid, or not an instance of LightWebsiteUser.");
        }

        return [
            'user_id' => $userId,
        ];
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
     * Sets the baseDir.
     *
     * @param string $baseDir
     */
    public function setBaseDir(string $baseDir)
    {
        $this->baseDir = $baseDir;
    }


    /**
     * Registers a RealistListRendererInterface.
     *
     * @param string $identifier
     * @param RealistListItemRendererInterface $renderer
     */
    public function registerListItemRenderer(string $identifier, RealistListItemRendererInterface $renderer)
    {
        $this->realistRowsRenderers[$identifier] = $renderer;
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
     * Sets the list action handler.
     * See the @page(realist action handler section) for more details.
     *
     * @param LightRealistListActionHandlerInterface $handler
     */
    public function setListActionHandler(LightRealistListActionHandlerInterface $handler)
    {
        if ($handler instanceof LightServiceContainerAwareInterface) {
            $handler->setContainer($this->container);
        }
        $this->listActionHandler = $handler;
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
     * Returns the action handler for the given request id.
     * See more in the @page(realist action handler section).
     *
     *
     * @param string $requestId
     * @return LightRealistListActionHandlerInterface
     * @throws \Exception
     */
    public function getActionHandlerByRequestId(string $requestId): LightRealistListActionHandlerInterface
    {
        if (null === $this->listActionHandler) {
            $defined = false;
            $conf = $this->getConfigurationArrayByRequestId($requestId);
            if (array_key_exists("action_handler", $conf)) {
                if (array_key_exists('class', $conf['action_handler'])) {
                    $handler = new $conf['action_handler']['class']();
                    if ($handler instanceof LightRealistListActionHandlerInterface) {
                        $this->setListActionHandler($handler);
                        $defined = true;
                    }
                }
            }
            if (false === $defined) {
                $this->error("Undefined list action handler for this realist (requestId=$requestId).");
            }
        }
        return $this->listActionHandler;
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
        $listRendererClass = $listRendererConf['class'] ?? null;
        $listRendererId = $listRendererConf['identifier'] ?? null;


        if (null !== $listRendererClass) {
            $listRenderer = new $listRendererClass;
            if ($listRenderer instanceof LightServiceContainerAwareInterface) {
                $listRenderer->setContainer($this->container);
            }
        } elseif (null !== $listRendererId) {
            if (false === array_key_exists($listRendererId, $this->listRenderers)) {
                $this->error("List renderer not found with identifier $listRendererId (requestId=$requestId).");
            }

            $listRenderer = $this->listRenderers[$listRendererId];
        } else {
            $this->error("The list renderer was not defined in the request declaration (requestId=$requestId).");
        }

        $listRenderer->prepareByRequestDeclaration($requestId, $requestDeclaration);
        return $listRenderer;
    }


    /**
     *
     * Returns the prepared "action items" array representing the "list item group actions" for the list identified by the given requestId.
     *
     * For more information about "action items", see the @page(realist action items document).
     * For more information about "list item group actions", see the @page(realist list-actions document).
     *
     * By default, we use the "generic action item" format, which is explained in the "request declaration",
     * using the "list_item_group_actions" property.
     *
     *
     * See more about that format in the @page(realist generic action item section).
     * See the @page(request declaration document) for more details.
     *
     *
     * @param string $requestId
     * @param string|null $format
     * @return array
     * @throws \Exception
     */
    public function prepareListItemGroupActionsByRequestId(string $requestId, string $format = null): array
    {
        // note: for now we only know the generic action item format, so the $format arg is not really used today
        $c = $this->getConfigurationArrayByRequestId($requestId);
        $rendering = $c['rendering'] ?? [];
        $items = $rendering['list_item_group_actions'] ?? [];

        $lah = $this->getActionHandlerByRequestId($requestId);
        $this->prepareListItemGroupActions($items, $lah, $requestId);
        return $items;
    }


    /**
     * Returns the prepared "action items" array representing the "general actions" for the list identified by the given requestId.
     *
     * For more information about "action items", see the @page(realist action items document).
     * For more information about "general actions", see the @page(realist list-actions document).
     *
     * By default, we use the "generic action item" format, which is explained in the "request declaration",
     * using the "list_item_group_actions" property.
     *
     *
     * See more about that format in the @page(realist generic action item section).
     * See the @page(request declaration document) for more details.
     *
     * @param string $requestId
     * @throws \Exception
     */
    public function prepareListGeneralActionsByRequestId($requestId)
    {
        // note: for now we only know the generic action item format, so the $format arg is not really used today
        $c = $this->getConfigurationArrayByRequestId($requestId);
        $rendering = $c['rendering'] ?? [];
        $items = $rendering['list_general_actions'] ?? [];
        foreach ($items as $k => $item) {
            $res = $this->prepareGenericActionItem($item, $this->listActionHandler, $requestId);
            if (false === $res) {
                unset($items[$k]);
            } else {
                $items[$k] = $item;
            }
        }
        return $items;
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


            /**
             * @var $nug LightNuggetService
             */
//            $nug = $this->container->get("nugget");
//            $ret = $nug->getNugget($requestId, "Ling.Light_Realist/list");


            $p = explode(":", $requestId, 2);
            if (2 !== count($p)) {
                $this->error("Invalid request identifier: $requestId. Missing colon.");
            }
            list($planetDotName, $relPath) = $p;
            $f = $this->container->getApplicationDir() . "/config/open/Ling.Light_Realist/$planetDotName/$relPath.byml";
            $f = ConventionTool::getGeneratedCustomPath(FileSystemTool::removeTraversalDots($f));
            if (false === file_exists($f)) {
                $this->error("realist file not found for requestId $requestId ($f).");
            }
            $ret = BabyYamlUtil::readFile($f);
            if (array_key_exists("_vars", $ret)) {
                $vars = $ret["_vars"];
                $resolver = new ArrayVariableResolverUtil();
                $resolver->setFirstSymbol("");
                $resolver->setOpeningBracket('%{');
                $resolver->setClosingBracket('}');
                $resolver->resolve($ret, $vars);
            }
            $ret = LightHelper::executeParenthesisWrappersByArray($ret, $this->container, ['::']);


            // dynamic injection phase
            SmartCodeTool::replaceSmartCodeFunction($ret, "REALIST", function ($identifier) {
                $handler = $this->getDynamicInjectionHandler($identifier);
                $args = func_get_args();
                array_shift($args);
                return $handler->handle($args);
            });
        }


        $this->_requestDeclarationCache[$requestId] = $ret;
        return $ret;
    }


    /**
     * Returns the given action is allowed for the given requestId.
     *
     *
     * @param string $actionId
     * @param string $requestId
     * @return bool
     */
    public function isAvailableActionByRequestId(string $actionId, string $requestId): bool
    {
        /**
         * Note: this algo might evolve as new directives are added to the request declaration.
         */
        $c = $this->getConfigurationArrayByRequestId($requestId);
        $rendering = $c['rendering'] ?? [];
        $lga = $rendering['list_general_actions'] ?? [];
        $liga = $rendering['list_item_group_actions'] ?? [];
        $ah = $c['action_handler'] ?? [];
        $allowed = $ah['allowed_actions'] ?? [];


        foreach ($lga as $i) {
            if (array_key_exists('action_id', $i)) {
                $allowed[] = $i['action_id'];
            }
        }

        ArrayTool::walkRowsRecursive($liga, function (&$item) use (&$allowed) {
            if (array_key_exists('action_id', $item)) {
                $allowed[] = $item['action_id'];
            }
        }, "items", false);
        $allowed = array_unique($allowed);

        return in_array($actionId, $allowed, true);
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
        $ret = $requestDeclaration['duelist']['base_fields'] ?? [];
        $alias2Expr = ParametrizedSqlQueryHelper::getColumnName2ColumnExpression($ret);
        $labels = BDotTool::getDotValue("rendering.property_labels", $requestDeclaration, []);
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
     * Converts the given item into a @page(generic action item) in expanded form.
     *
     * Returns false if the item should be discarded (i.e. the user isn't granted access to it).
     *
     *
     *
     * @param array $item
     * @param LightRealistListActionHandlerInterface $actionHandler
     * @param string $requestId
     * @return false|null
     * @throws \Exception
     */
    private function prepareGenericActionItem(array &$item, LightRealistListActionHandlerInterface $actionHandler, string $requestId)
    {
        if (array_key_exists('action_id', $item)) {
            $actionId = $item['action_id'];
            if (false === $actionHandler->doWeShowTrigger($actionId, $requestId)) {
                return false;
            } else {
                $actionHandler->prepareListAction($actionId, $requestId, $item);
                if (array_key_exists('modal', $item)) {
                    $this->container->get('html_page_copilot')->addModal($item['modal']);
                }
            }
        } else {
            $this->error("Invalid \"generic action item\" format. The action_id property is not defined (requestId=$requestId).");
        }
    }


    /**
     * Parses the given list action items (aka @page(toolbar items)) and turns them into @page(generic action items).
     * If a generic action item is discarded, it won't appear in the resulting list.
     *
     * @param array $items
     * @param LightRealistListActionHandlerInterface $actionHandler
     * @param string $requestId
     * @throws \Exception
     */
    private function prepareListItemGroupActions(array &$items, LightRealistListActionHandlerInterface $actionHandler, string $requestId)
    {
        foreach ($items as $k => $item) {
            if (array_key_exists('action_id', $item)) {
                $res = $this->prepareGenericActionItem($item, $actionHandler, $requestId);
                if (false === $res) {
                    unset($items[$k]);
                } else {
                    $items[$k] = $item;
                }
            } else {
                if (array_key_exists("items", $item)) {
                    $groupItems = $item['items'];
                    $this->prepareListItemGroupActions($groupItems, $actionHandler, $requestId);
                    $item['items'] = $groupItems;
                    $items[$k] = $item;
                }
            }
        }
    }
}