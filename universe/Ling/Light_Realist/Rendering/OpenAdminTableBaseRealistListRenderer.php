<?php


namespace Ling\Light_Realist\Rendering;


use Ling\Bat\ArrayTool;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_CsrfSession\Service\LightCsrfSessionService;
use Ling\Light_Realist\Service\LightRealistService;

/**
 * The OpenAdminTableBaseRealistListRenderer class.
 * Helps implementing the "Open Admin Table One" protocol.
 * See more details in the @page(open admin table helper implementation notes).
 *
 */
abstract class OpenAdminTableBaseRealistListRenderer implements RealistListRendererInterface, LightServiceContainerAwareInterface
{


    /**
     * This property holds the data types for this instance.
     * It's an array of columnName => dataTypeIdentifier.
     * More info in the @page(open admin table protocol).
     *
     * @var array
     */
    protected $dataTypes;

    /**
     * This property holds the labels for this instance.
     * It's an array of columnName => label.
     * The label is displayed in the header columns.
     *
     * @var array
     */
    protected $labels;


    /**
     * This property holds the propertiesToDisplay for this instance.
     * @var array
     */
    protected $propertiesToDisplay;


    /**
     * This property holds an array of booleans representing whether or not to use the renderer widgets.
     * It's an array of widget identifier => bool.
     *
     * Note: a widget shall be registered before it can be used (unless it's hardcoded inside this class, like
     * the checkbox widget for instance).
     *
     * If a widget identifier is not found, this means false (i.e. we don't use the widget).
     *
     *
     * @var bool[]
     */
    protected $useWidgets;

    /**
     * This property holds the requestId for this instance.
     * @var string
     */
    protected $requestId;


    /**
     * This property holds the csrfToken for this instance.
     * The csrf token value.
     *
     * @var string
     */
    protected $csrfToken;

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     *
     * This property holds the collapsibleColumnIndexes for this instance.
     *
     * This is a property specific to the @page(responsive table helper tool).
     *
     *
     * @var array|string
     */
    protected $collapsibleColumnIndexes;


    /**
     * This property holds the listItemGroupActions for this instance.
     * More details in the @page(list action handler conception notes).
     * @var array
     */
    protected $listItemGroupActions;

    /**
     * This property holds the listGeneralActions for this instance.
     * @var array
     */
    protected $listGeneralActions;

    /**
     * This property holds the containerCssId for this instance.
     * @var string
     */
    protected $containerCssId;

    /**
     * This property holds the sqlColumns for this instance.
     * @var array
     */
    protected $sqlColumns;

    /**
     * This property holds the relatedLinks for this instance.
     * Each link is an array:
     * - text: the label of the link
     * - url: the url of the link
     * - ?icon: the css class of the icon if any
     * @var array
     */
    protected $relatedLinks;

    /**
     * This property holds the title for this instance.
     * @var string|null
     */
    protected $title;


    /**
     * Builds the OpenAdminTableBaseRealistListRenderer instance.
     */
    public function __construct()
    {
        $this->dataTypes = [];
        $this->propertiesToDisplay = [];
        $this->labels = [];
        $this->useWidgets = [
            "checkbox" => true,
            "table" => true,
            "head" => true,
            "order" => true,
        ];
        $this->requestId = null;
        $this->container = null;
        $this->collapsibleColumnIndexes = [];
        $this->listItemGroupActions = [];
        $this->listGeneralActions = [];
        $this->containerCssId = null;
        $this->sqlColumns = [];
        $this->relatedLinks = [];
        $this->title = null;

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
    // RealistListRendererInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function prepareByRequestDeclaration(string $requestId, array $requestDeclaration)
    {

        $this->setRequestId($requestId);

        /**
         * @var $realist LightRealistService
         */
        $realist = $this->container->get('realist');

        $rendering = $requestDeclaration['rendering'] ?? [];
        $labels = $rendering['property_labels'] ?? [];
        $propDisplay = $rendering['properties_to_display'] ?? [];


        $this->setLabels($labels);
        $this->setPropertiesToDisplay($propDisplay);



        $this->setSqlColumns($realist->getSqlColumnsByRequestDeclaration($requestDeclaration));


        $liga = $realist->prepareListItemGroupActionsByRequestId($requestId);
        $this->setListItemGroupActions($liga);


        $ga = $realist->prepareListGeneralActionsByRequestId($requestId);
        $this->setListGeneralActions($ga);



        $openAdminTable = $rendering['open_admin_table'] ?? [];
        $dataTypes = $openAdminTable['data_types'] ?? [];
        $this->setDataTypes($dataTypes);


        $widgetStatuses = $openAdminTable['widget_statuses'] ?? [];
        $this->setWidgetStatuses($widgetStatuses);


        $responsiveTableHelper = $rendering['responsive_table_helper'] ?? [];
        $collapsibleColumnIndexes = $responsiveTableHelper['collapsible_column_indexes'] ?? [];
        $this->setCollapsibleColumnIndexes($collapsibleColumnIndexes);


        /**
         * @var $csrfService LightCsrfSessionService
         */
        $csrfService = $this->container->get('csrf_session');
        $this->setCsrfToken($csrfService->getToken());


        $relatedLinks = $rendering['related_links'] ?? [];
        if ($relatedLinks) {
            $this->setRelatedLinks($relatedLinks);
        }

        if (array_key_exists("title", $rendering)) {
            $this->setTitle($rendering['title']);
        }
    }

    /**
     * @implementation
     */
    public function setContainerCssId(string $cssId)
    {
        $this->containerCssId = $cssId;
    }

    /**
     * @implementation
     */
    public function renderTitle()
    {
        echo $this->title;
    }







    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the data types.
     *
     * @param array $array
     */
    public function setDataTypes(array $array)
    {
        $this->dataTypes = $array;
    }


    /**
     * Sets the labels.
     * @param array $labels
     */
    public function setLabels(array $labels)
    {
        $this->labels = $labels;
    }

    /**
     * Sets the propertiesToDisplay.
     *
     * @param array $propertiesToDisplay
     */
    public function setPropertiesToDisplay(array $propertiesToDisplay)
    {
        $this->propertiesToDisplay = $propertiesToDisplay;
    }


    /**
     * Sets the widget statuses.
     * It's an array of widgetName => bool (whether this widget should be used)
     *
     * @param array $widgetStatuses
     */
    public function setWidgetStatuses(array $widgetStatuses)
    {
        $this->useWidgets = array_replace($this->useWidgets, $widgetStatuses);
    }

    /**
     * Sets the requestId.
     *
     * @param string $requestId
     */
    public function setRequestId(string $requestId)
    {
        $this->requestId = $requestId;
    }


    /**
     * Sets the collapsibleColumnIndexes.
     *
     * @param mixed $collapsibleColumnIndexes
     */
    public function setCollapsibleColumnIndexes($collapsibleColumnIndexes)
    {
        $this->collapsibleColumnIndexes = $collapsibleColumnIndexes;
    }

    /**
     * Sets the "actions items" representing the "list item group actions" for this list.
     *
     * See more details in the @page(realist action-items document),
     * and the @page(realist list-actions document).
     *
     *
     * @param array $actions
     */
    public function setListItemGroupActions(array $actions)
    {
        $this->listItemGroupActions = $actions;
    }

    /**
     * Sets the listGeneralActions.
     *
     * @param array $listGeneralActions
     */
    public function setListGeneralActions(array $listGeneralActions)
    {
        $this->listGeneralActions = $listGeneralActions;
    }


    /**
     * Sets the csrfToken value.
     *
     * @param string $csrfToken
     */
    public function setCsrfToken(string $csrfToken)
    {
        $this->csrfToken = $csrfToken;
    }

    /**
     * Sets the sqlColumns.
     *
     * @param array $sqlColumns
     */
    public function setSqlColumns(array $sqlColumns)
    {
        $this->sqlColumns = $sqlColumns;
    }

    /**
     * Sets the relatedLinks.
     *
     * @param array $relatedLinks
     */
    public function setRelatedLinks(array $relatedLinks)
    {
        $this->relatedLinks = $relatedLinks;
    }

    /**
     * Sets the title.
     *
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }











    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the data type of the column.
     * If the data type is not defined, "string" is returned.
     *
     * @param string $columnName
     * @return string
     */
    protected function getDataType(string $columnName): string
    {
        if (array_key_exists($columnName, $this->dataTypes)) {
            return $this->dataTypes[$columnName];
        }
        return "string";
    }


    /**
     * Returns whether the widget identified by $identifier is enabled.
     *
     * @param string $identifier
     * @return bool
     */
    protected function isWidgetEnabled(string $identifier): bool
    {
        return (array_key_exists($identifier, $this->useWidgets) && true === $this->useWidgets[$identifier]);
    }


    /**
     * Returns the array of leaf items (i.e. an item not containing any child) from the list action group.
     * @return array
     */
    protected function getListActionGroupLeafItems(): array
    {
        $ret = [];
        ArrayTool::walkRowsRecursive($this->listItemGroupActions, function ($v) use (&$ret) {
            $ret[] = $v;
        }, 'items', false);
        return $ret;
    }
}