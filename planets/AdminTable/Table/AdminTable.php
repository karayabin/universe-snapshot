<?php

namespace AdminTable\Table;

use AdminTable\Listable\ListableInterface;
use AdminTable\View\TableRendererInterface;


/**
 * The AdminTable features
 * ------------------------------
 *
 * - display the table rows
 *      - each row is composed of the same number of columns
 *      - each column is identified by a <column id>
 *      - accepts <extra columns> which can be positioned with precision
 *
 * - display the table widgets. Widgets are things around the table, that you can activate/deactivate:
 *      - pageSelector
 *      - search
 *      - nippSelector
 *      - pagination
 *      - multipleActions
 *
 * - can show/hide the checkboxes
 *
 * - can trigger actions:
 *      - multipleAction, using the multipleAction widget
 *              you register a multipleAction using the setMultipleAction method.
 *              setMultipleAction ( actionId, func )
 *                      The func will receive a rics arguments.
 *                      rics is an array of ric (an array containing "ric field => value" entries).
 *
 *
 *      - singleAction, per row, using javascript built-in features.
 *                  you register a singleAction using the setSingleAction method.
 *                  setSingleAction ( actionId, func )
 *                      The func will receive a ric argument.
 *                      ric is an array containing "ric field => value" entries.
 *
 *              The following css classes have special meaning when added to an element (like a link for instance):
 *              - confirmlink: will trigger a confirm dialog before processing the click on the element
 *              - postlink: the element must also have two attributes:
 *                              data-action="the-action-id"
 *                              data-ric="{ric}"
 *                          A third attribute is optional, for your convenience:
 *                              data-value="what you want here"
 *                          The postlink will create a form and submit it, so that you can handle it
 *                          with a singleAction handler.
 *                          The form will contain the following values:
 *                                  action: the-action-id
 *                                  ric: 42 (for instance)
 *                                  ?value: what you want here
 *
 *
 * - provide actions handling methods
 *      - you can manually call the handleActions method, which will handle the actions.
 *              By default, the actions will be called only when you print the table (displayTable method),
 *              but sometimes, you need to print something special before the table is displayed,
 *              and after the actions are handled, so.
 *              If you call the handleActions method manually, then the displayTable method
 *              won't handle the actions again.
 *
 *
 *
 * - can transform any column content (including <extra columns>)
 *
 * - drives a Listable object, passing it the right parameters (search, sort, sortDirection, nbItemsPerPage, page)
 *
 *
 */
class AdminTable
{

    // unlikely to change
    public $pageGetKey;
    public $nbItemsPerPageGetKey;
    public $sortColumnGetKey;
    public $sortColumnDirGetKey;
    public $searchGetKey;


    public $nbItemsPerPage;
    public $sortColumn;
    public $sortColumnDir;


    public $showCheckboxes;


    /**
     * array of <column id> => label,
     * use this to override all or some of the column headers.
     */
    public $columnLabels;
    /**
     * array of <columns id> to hide from view.
     * Note: the columns are kept in the html (because they might be useful to target a row)
     * but hidden from the view via css.
     */
    public $hiddenColumns;


    protected $widgets;
    /**
     * array of fields which uniquely identify a row
     */
    private $ric;
    //
    /**
     * it might be required (someday) that the user updates the ricSeparator;
     * but for the most part, it separates only integers.
     */
    private $ricSeparator;

    /**
     * array of actionId => [label, function]
     *
     * - the actionId is passed via http to internally identify the appropriate multiple action
     * - the label is displayed in the multiple actions selector (gui)
     * - the function is called when a multiple action is requested.
     *          It receives one argument: the rics argument, which is an array of ricValue.
     *          A ricValue is an array which keys are the name of the row identifying columns,
     *          and the values are the actual values corresponding to those columns.
     *
     *
     */
    private $multipleActions;
    /**
     * array of actionId => function
     *          The function is responsible for executing the action.
     *          It accepts one argument:
     *                  - ric: array of key => value (identifying the row on which the action should be executed)
     */
    private $singleActions;


    /**
     * array of <column id> => [value, pos]
     *      The pos can be either an int, or null (default).
     *      If null, it means that the column will be appended to the existing columns.
     *      If it's an int, it represents the position of the column.
     */
    private $extraColumns;

    /**
     * array of <column id> => callback,
     *       The callback accepts the following arguments:
     *              - value: mixed, the value of the column
     *              - item: array of key => value, it represents the row
     *              - ricValue: string representing the ric value to pass via the url
     */
    private $transformers;

    /**
     * @var ListableInterface
     */
    private $listable;

    /**
     * @var TableRendererInterface
     */
    private $renderer;


    //------------------------------------------------------------------------------/
    // INTERNAL
    //------------------------------------------------------------------------------/
    private $_actionsHandled;


    public function __construct()
    {

        $this->tableGetKey = "name";
        $this->pageGetKey = "page";
        $this->nbItemsPerPageGetKey = "nipp";
        $this->sortColumnGetKey = "sort";
        $this->sortColumnDirGetKey = "dir";
        $this->searchGetKey = "search";


        //
        $this->nbItemsPerPage = 50;
        $this->sortColumn = null;
        $this->sortColumnDir = null;


        $this->ric = null;
        $this->ricSeparator = '--*--';
        $this->hiddenColumns = [];
        $this->extraColumns = [];
        $this->transformers = [];
        $this->singleActions = [];
        $this->multipleActions = [];


        //
        $this->showCheckboxes = true;

        $this->listable = null;
        $this->_actionsHandled = false;

    }

    public static function create()
    {
        return new self();
    }


    public function setWidgets(ListWidgets $widgets)
    {
        $this->widgets = $widgets;
        return $this;
    }

    public function setRic(array $ric)
    {
        $this->ric = $ric;
        return $this;
    }

    public function setRicSeparator($sep)
    {
        $this->ricSeparator = $sep;
        return $this;
    }

    public function setListable(ListableInterface $listable)
    {
        $this->listable = $listable;
        return $this;
    }

    public function setExtraColumn($columnId, $value, $pos = null)
    {
        $this->extraColumns[$columnId] = [$value, $pos];
        return $this;
    }

    public function setRenderer(TableRendererInterface $renderer)
    {
        $this->renderer = $renderer;
        return $this;
    }

    public function getRenderer()
    {
        return $this->renderer;
    }

    public function handleActions()
    {
        $this->_actionsHandled = true;
        $ric = $this->ric;


        //--------------------------------------------
        // HANDLING POST
        //--------------------------------------------
        if (array_key_exists('multiple-action', $_POST)) {
            if (array_key_exists('ids', $_POST) && is_array($_POST['ids'])) {

                $multipleAction = $_POST['multiple-action'];
                if (array_key_exists($multipleAction, $this->multipleActions)) {
                    $ids = $_POST['ids'];
                    $rics = array_map(function ($v) use ($ric) {
                        $vals = explode($this->ricSeparator, $v);
                        return array_combine($ric, $vals);
                    }, $ids);
                    $actionInfo = $this->multipleActions[$multipleAction];
                    $callback = $actionInfo[1];
                    call_user_func($callback, $rics, $this);

                }
            }
        } else if (array_key_exists('action', $_POST) && array_key_exists('ric', $_POST)) {
            $action = $_POST['action'];
            if (array_key_exists($action, $this->singleActions)) {
                $_ric = (string)$_POST['ric'];
                $vals = explode($this->ricSeparator, $_ric);
                $_ric = array_combine($ric, $vals);
                $callback = $this->singleActions[$action];
                if (null !== $callback) {
                    call_user_func($callback, $_ric, $this);
                }
            }
        }

    }


    protected function prepareParameters()
    {
        // search
        $search = (array_key_exists($this->searchGetKey, $_GET)) ? (string)$_GET[$this->searchGetKey] : '';
        $currentPage = (array_key_exists($this->pageGetKey, $_GET)) ? (int)$_GET[$this->pageGetKey] : 1;
        $nbItemsPerPageChoice = (array_key_exists($this->nbItemsPerPageGetKey, $_GET)) ? (int)$_GET[$this->nbItemsPerPageGetKey] : (int)$this->nbItemsPerPage;
        $nbItemsTotal = $this->listable->search($search);


        // pagination...
        $nbPages = 1; // if the user chooses to display all items on the same page...
        if ($nbItemsPerPageChoice > 0) { // 0 means display all items
            $nbPages = ceil($nbItemsTotal / $nbItemsPerPageChoice);
            if ($nbPages < 1) {
                $nbPages = 1;
            }
            if ($currentPage > $nbPages) {
                $currentPage = (int)$nbPages;
            } else if ($currentPage < 1) {
                $currentPage = 1;
            }
        }

        // sort
        $sortColumn = (array_key_exists($this->sortColumnGetKey, $_GET)) ? (string)$_GET[$this->sortColumnGetKey] : (string)$this->sortColumn;
        $sortColumnDir = (array_key_exists($this->sortColumnDirGetKey, $_GET)) ? (string)$_GET[$this->sortColumnDirGetKey] : $this->sortColumnDir;


        $this->listable->sort($sortColumn, $sortColumnDir);
        $this->listable->slice($currentPage, $nbItemsPerPageChoice);
        $items = $this->listable->getRows();

        if (null === $this->widgets) {
            $this->widgets = $this->getListWidgets();
        }


        $widgets = $this->widgets->all();

        $p = $this->getListParameters();
        $p->search = $search;
        $p->page = $currentPage;
        $p->nipp = $nbItemsPerPageChoice;
        $p->nbPages = $nbPages;
        $p->sortColumn = $sortColumn;
        $p->sortColumnDir = $sortColumnDir;
        $p->items = $items;
        $p->ric = $this->ric;
        $p->ricSeparator = $this->ricSeparator;
        $p->showCheckboxes = $this->showCheckboxes;
        $p->hasPageSelector = $widgets['pageSelector'];
        $p->hasSearch = $widgets['search'];
        $p->hasNippSelector = $widgets['nippSelector'];
        $p->hasPagination = $widgets['pagination'];
        $p->hasMultipleActions = $widgets['multipleActions'];
        $p->nbItemsPerPageList = $this->widgets->getNbItemsPerPageList();
        $p->multipleActions = $this->multipleActions;
        $p->sortColumnGetKey = $this->sortColumnGetKey;
        $p->sortColumnDirGetKey = $this->sortColumnDirGetKey;
        $p->searchGetKey = $this->searchGetKey;
        $p->nbItemsPerPageGetKey = $this->nbItemsPerPageGetKey;
        $p->pageGetKey = $this->pageGetKey;
        $p->columnLabels = $this->columnLabels;
        $p->hiddenColumns = $this->hiddenColumns;
        $p->extraColumns = $this->extraColumns;
        $p->transformers = $this->transformers;
        return $p;
    }


    public function displayTable()
    {


        if (false === $this->_actionsHandled) {
            $this->handleActions();
        }

        //--------------------------------------------
        // PREPARE THE LIST AND PARAMETERS
        //--------------------------------------------
        $p = $this->prepareParameters();
        $this->renderer->renderTable($p);
    }


    public function setSingleActionHandler($id, $function = null)
    {
        $this->singleActions[$id] = $function;
        return $this;
    }


    public function setMultipleActionHandler($id, $label, $function, $confirmation = false)
    {
        $this->multipleActions[$id] = [
            $label,
            $function,
            $confirmation,
        ];
        return $this;
    }

    public function setTransformer($column, $function)
    {
        $this->transformers[$column] = $function;
        return $this;
    }

    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    /**
     * @return ListParameters
     */
    protected function getListParameters()
    {
        return new ListParameters();
    }

    /**
     * @return ListWidgets
     */
    protected function getListWidgets()
    {
        return new ListWidgets();
    }
}