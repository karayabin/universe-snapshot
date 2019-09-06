<?php


namespace Ling\Light_Realist\Rendering;


use Ling\Bat\ArrayTool;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The OpenAdminTableBaseRealistListRenderer class.
 * Helps implementing the "Open Admin Table One" protocol.
 * See more details in the @page(open admin table helper implementation notes).
 *
 */
class OpenAdminTableBaseRealistListRenderer implements RealistListRendererInterface
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
     * This property holds the listActionGroups for this instance.
     * More details in the @page(list action handler conception notes).
     * @var array
     */
    protected $listActionGroups;


    /**
     * Builds the OpenAdminTableBaseRealistListRenderer instance.
     */
    public function __construct()
    {
        $this->dataTypes = [];
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
        $this->listActionGroups = [];
    }

    /**
     * @implementation
     */
    public function prepareByRequestDeclaration(string $requestId, array $requestDeclaration, LightServiceContainerInterface $container)
    {

        $this->setRequestId($requestId);
        $this->setContainer($container);

        $rendering = $requestDeclaration['rendering'] ?? [];
        $labels = $rendering['column_labels'] ?? [];
        $this->setLabels($labels);


        $listActionGroups = $rendering['list_action_groups'] ?? [];
        $this->setListActionGroups($listActionGroups);


        $openAdminTable = $rendering['open_admin_table'] ?? [];
        $dataTypes = $openAdminTable['data_types'] ?? [];
        $this->setDataTypes($dataTypes);


        $widgetStatuses = $openAdminTable['widget_statuses'] ?? [];
        $this->setWidgetStatuses($widgetStatuses);


        $responsiveTableHelper = $rendering['responsive_table_helper'] ?? [];
        $collapsibleColumnIndexes = $responsiveTableHelper['collapsible_column_indexes'] ?? [];
        $this->setCollapsibleColumnIndexes($collapsibleColumnIndexes);

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
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
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
     * Sets the listActionGroups.
     *
     * @param array $listActionGroups
     */
    public function setListActionGroups(array $listActionGroups)
    {
        $this->listActionGroups = $listActionGroups;
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
        ArrayTool::walkRowsRecursive($this->listActionGroups, function ($v) use (&$ret) {
            $ret[] = $v;
        }, 'items', false);
        return $ret;
    }
}