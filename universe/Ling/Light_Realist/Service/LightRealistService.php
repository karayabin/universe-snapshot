<?php


namespace Ling\Light_Realist\Service;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Database\LightDatabasePdoWrapper;
use Ling\Light_Realist\ActionHandler\LightRealistActionHandlerInterface;
use Ling\Light_Realist\Exception\LightRealistException;
use Ling\Light_Realist\ListActionHandler\LightRealistListActionHandlerInterface;
use Ling\Light_Realist\Rendering\RealistListRendererInterface;
use Ling\Light_Realist\Rendering\RealistRowsRendererInterface;
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
     * @var LightRealistListActionHandlerInterface
     */
    protected $listActionHandlers;


    /**
     * This property holds the listRenderers for this instance.
     * It's an array of identifier => RealistListRendererInterface instance
     *
     * @var RealistListRendererInterface[]
     */
    protected $listRenderers;


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
        $this->listRenderers = [];
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


        $tags = $params['tags'] ?? [];


//        $this->parametrizedSqlQuery->setLogger($this->container->get('logger'));
        $sqlQuery = $this->parametrizedSqlQuery->getSqlQuery($requestDeclaration, $tags);
        $markers = $sqlQuery->getMarkers();

        $stmt = $sqlQuery->getSqlQuery();
        $countStmt = $sqlQuery->getCountSqlQuery();


        /**
         * @var $db LightDatabasePdoWrapper
         */
        $db = $this->container->get("database");
        $rows = $db->fetchAll($stmt, $markers);
        $countRow = $db->fetch($countStmt, $markers);

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
                $label = $conf['label'] ?? '#';
                $rowsRendererInstance->addDynamicColumn($name, $label, 'pre');
            }


            // adding special action column
            if (array_key_exists('action_column', $rowsRenderer)) {
                $conf = $rowsRenderer['action_column'];
                $name = $conf['name'] ?? 'action';
                $label = $conf['label'] ?? 'Actions';
                $rowsRendererInstance->addDynamicColumn($name, $label, 'post');
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
     *
     * @param LightRealistListActionHandlerInterface $handler
     */
    public function registerListActionHandler(LightRealistListActionHandlerInterface $handler)
    {
        $ids = $handler->getHandledIds();
        foreach ($ids as $id) {
            $this->listActionHandlers[$id] = $handler;
        }
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
        throw new LightRealistException("No action handler found with id=$id.");
    }


    /**
     * Returns the list action handler identified by the given id.
     *
     * @param string $id
     * @return LightRealistListActionHandlerInterface
     * @throws \Exception
     */
    public function getListActionHandler(string $id): LightRealistListActionHandlerInterface
    {
        if (array_key_exists($id, $this->listActionHandlers)) {
            return $this->listActionHandlers[$id];
        }
        throw new LightRealistException("List action handler not found with id=$id.");
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
     * Returns the configuration array corresponding to the given request id.
     *
     * @param string $requestId
     * @return array
     * @throws \Exception
     */
    protected function getConfigurationArrayByRequestId(string $requestId): array
    {
        $p = explode(":", $requestId, 2);
        $fileId = $p[0];
        $queryId = $p[1];
        $filePath = $this->baseDir . "/$fileId.byml";
        if (false === file_exists($filePath)) {
            $this->error("File not found: $filePath.");
        }

        $arr = BabyYamlUtil::readFile($filePath);
        if (false === array_key_exists($queryId, $arr)) {
            $this->error("Query not found with id: $queryId, in file $filePath.");
        }
        return $arr[$queryId];
    }

}