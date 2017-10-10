<?php

namespace Models\DataTable;


use Models\Model\ModelInterface;


class DataTableModel implements ModelInterface
{

    protected $headers;
    protected $hidden;
    protected $rows;
    protected $ric;
    //
    protected $page;
    protected $nbTotalItems;
    protected $nipp;
    protected $checkboxes;
    protected $isSearchable;
    protected $unsearchable;
    protected $searchValues;
    protected $isSortable;
    protected $unsortable;
    protected $sortValues;
    protected $showCountInfo;
    protected $showNipp;
    protected $nippItems;
    protected $showQuickPage;
    protected $showPagination;
    protected $paginationNavigators;
    protected $paginationLength;
    protected $showBulkActions;
    protected $showEmptyBulkWarning;
    protected $bulkActions;
    protected $showActionButtons;
    protected $actionButtons;
    protected $textNoResult;
    protected $textSearch;
    protected $textSearchClear;
    protected $textCountInfo;
    protected $textNipp;
    protected $textNippAll;
    protected $textQuickPage;
    protected $textQuickPageButton;
    protected $textBulkActionsTeaser;
    protected $textEmptyBulkWarning;
    protected $textUseSelectedRowsEmptyWarning;
    protected $textPaginationFirst;
    protected $textPaginationPrev;
    protected $textPaginationNext;
    protected $textPaginationLast;

    public function __construct()
    {
        $this->headers = [];
        $this->hidden = [];
        $this->rows = [];
        $this->ric = [];
        //
        $this->page = 1;
        $this->nbTotalItems = 1;
        $this->nipp = 20;
        $this->checkboxes = true;
        $this->isSearchable = true;
        $this->unsearchable = [];
        $this->searchValues = [];
        $this->isSortable = true;
        $this->unsortable = [];
        $this->sortValues = [];
        $this->showCountInfo = true;
        $this->showNipp = true;
        $this->nippItems = [5, 10, 20, 50, 100, 'all'];
        $this->showQuickPage = true;
        $this->showPagination = true;
        $this->paginationNavigators = ['first', 'prev', 'next', 'last'];
        $this->paginationLength = 9;
        $this->showBulkActions = true;
        $this->showEmptyBulkWarning = true;
        $this->bulkActions = [];
        $this->showActionButtons = true;
        $this->actionButtons = [];
        $this->textNoResult = "No result found";
        $this->textSearch = "Search";
        $this->textSearchClear = "Clear";
        $this->textCountInfo = "Showing {offsetStart} to {offsetEnd} of {nbItems} entries";
        $this->textNipp = "Show {select} entries";
        $this->textNippAll = "all";
        $this->textQuickPage = "Page";
        $this->textQuickPageButton = "Go";
        $this->textBulkActionsTeaser = "For selected entries";
        $this->textEmptyBulkWarning = "Please select at least one row";
        $this->textUseSelectedRowsEmptyWarning = "Please select at least one row";
        $this->textPaginationFirst = "First";
        $this->textPaginationPrev = "Prev";
        $this->textPaginationNext = "Next";
        $this->textPaginationLast = "Last";
    }

    public static function create()
    {
        return new static();
    }

    public function getArray()
    {
        return [
            'headers' => $this->headers,
            'hidden' => $this->hidden,
            'rows' => $this->rows,
            'ric' => $this->ric,
            //
            'page' => $this->page,
            'nbTotalItems' => $this->nbTotalItems,
            'nipp' => $this->nipp,
            'checkboxes' => $this->checkboxes,
            'isSearchable' => $this->isSearchable,
            'unsearchable' => $this->unsearchable,
            'searchValues' => $this->searchValues,
            'isSortable' => $this->isSortable,
            'unsortable' => $this->unsortable,
            'sortValues' => $this->sortValues,
            'showCountInfo' => $this->showCountInfo,
            'showNipp' => $this->showNipp,
            'nippItems' => $this->nippItems,
            'showQuickPage' => $this->showQuickPage,
            'showPagination' => $this->showPagination,
            'paginationNavigators' => $this->paginationNavigators,
            'paginationLength' => $this->paginationLength,
            'showBulkActions' => $this->showBulkActions,
            'showEmptyBulkWarning' => $this->showEmptyBulkWarning,
            'bulkActions' => $this->bulkActions,
            'showActionButtons' => $this->showActionButtons,
            'actionButtons' => $this->actionButtons,
            'textNoResult' => $this->textNoResult,
            'textSearch' => $this->textSearch,
            'textSearchClear' => $this->textSearchClear,
            'textCountInfo' => $this->textCountInfo,
            'textNipp' => $this->textNipp,
            'textNippAll' => $this->textNippAll,
            'textQuickPage' => $this->textQuickPage,
            'textQuickPageButton' => $this->textQuickPageButton,
            'textBulkActionsTeaser' => $this->textBulkActionsTeaser,
            'textEmptyBulkWarning' => $this->textEmptyBulkWarning,
            'textUseSelectedRowsEmptyWarning' => $this->textUseSelectedRowsEmptyWarning,
            'textPaginationFirst' => $this->textPaginationFirst,
            'textPaginationPrev' => $this->textPaginationPrev,
            'textPaginationNext' => $this->textPaginationNext,
            'textPaginationLast' => $this->textPaginationLast,
        ];
    }

    //--------------------------------------------
    // SETTERS
    //--------------------------------------------
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
        return $this;
    }

    public function setHidden(array $hidden)
    {
        $this->hidden = $hidden;
        return $this;
    }

    public function setRows(array $rows)
    {
        $this->rows = $rows;
        return $this;
    }

    public function setRic(array $ric)
    {
        $this->ric = $ric;
        return $this;
    }

    public function setPage($page)
    {
        $this->page = $page;
        return $this;
    }

    public function setNbTotalItems($nbTotalItems)
    {
        $this->nbTotalItems = $nbTotalItems;
        return $this;
    }

    public function setNipp($nipp)
    {
        $this->nipp = $nipp;
        return $this;
    }

    public function setCheckboxes($checkboxes)
    {
        $this->checkboxes = $checkboxes;
        return $this;
    }

    public function setIsSearchable($isSearchable)
    {
        $this->isSearchable = $isSearchable;
        return $this;
    }

    public function setUnsearchable(array $unsearchable)
    {
        $this->unsearchable = $unsearchable;
        return $this;
    }

    public function setSearchValues(array $searchValues)
    {
        $this->searchValues = $searchValues;
        return $this;
    }

    public function setIsSortable($isSortable)
    {
        $this->isSortable = $isSortable;
        return $this;
    }

    public function setUnsortable(array $unsortable)
    {
        $this->unsortable = $unsortable;
        return $this;
    }

    public function setSortValues(array $sortValues)
    {
        $this->sortValues = $sortValues;
        return $this;
    }

    public function setShowCountInfo($showCountInfo)
    {
        $this->showCountInfo = $showCountInfo;
        return $this;
    }

    public function setShowNipp($showNipp)
    {
        $this->showNipp = $showNipp;
        return $this;
    }

    public function setNippItems(array $nippItems)
    {
        $this->nippItems = $nippItems;
        return $this;
    }

    public function setShowQuickPage($showQuickPage)
    {
        $this->showQuickPage = $showQuickPage;
        return $this;
    }

    public function setShowPagination($showPagination)
    {
        $this->showPagination = $showPagination;
        return $this;
    }

    public function setPaginationNavigators(array $paginationNavigators)
    {
        $this->paginationNavigators = $paginationNavigators;
        return $this;
    }

    public function setPaginationLength($paginationLength)
    {
        $this->paginationLength = $paginationLength;
        return $this;
    }


    public function setShowBulkActions($showBulkActions)
    {
        $this->showBulkActions = $showBulkActions;
        return $this;
    }

    public function setShowEmptyBulkWarning($showEmptyBulkWarning)
    {
        $this->showEmptyBulkWarning = $showEmptyBulkWarning;
        return $this;
    }


    public function setBulkActions(array $bulkActions)
    {
        $this->bulkActions = $bulkActions;
        return $this;
    }

    public function setShowActionButtons($showActionButtons)
    {
        $this->showActionButtons = $showActionButtons;
        return $this;
    }

    public function setActionButtons(array $actionButtons)
    {
        $this->actionButtons = $actionButtons;
        return $this;
    }

    public function setTextNoResult($textNoResult)
    {
        $this->textNoResult = $textNoResult;
        return $this;
    }

    public function setTextSearch($textSearch)
    {
        $this->textSearch = $textSearch;
        return $this;
    }

    public function setTextSearchClear($textSearchClear)
    {
        $this->textSearchClear = $textSearchClear;
        return $this;
    }

    public function setTextCountInfo($textCountInfo)
    {
        $this->textCountInfo = $textCountInfo;
        return $this;
    }

    public function setTextNipp($textNipp)
    {
        $this->textNipp = $textNipp;
        return $this;
    }

    public function setTextNippAll($textNippAll)
    {
        $this->textNippAll = $textNippAll;
        return $this;
    }

    public function setTextQuickPage($textQuickPage)
    {
        $this->textQuickPage = $textQuickPage;
        return $this;
    }

    public function setTextQuickPageButton($textQuickPageButton)
    {
        $this->textQuickPageButton = $textQuickPageButton;
        return $this;
    }

    public function setTextBulkActionsTeaser($textBulkActionsTeaser)
    {
        $this->textBulkActionsTeaser = $textBulkActionsTeaser;
        return $this;
    }

    public function setTextEmptyBulkWarning($textEmptyBulkWarning)
    {
        $this->textEmptyBulkWarning = $textEmptyBulkWarning;
        return $this;
    }

    public function setTextUseSelectedRowsEmptyWarning($textUseSelectedRowsEmptyWarning)
    {
        $this->textUseSelectedRowsEmptyWarning = $textUseSelectedRowsEmptyWarning;
        return $this;
    }

    public function setTextPaginationFirst($textPaginationFirst)
    {
        $this->textPaginationFirst = $textPaginationFirst;
        return $this;
    }

    public function setTextPaginationPrev($textPaginationPrev)
    {
        $this->textPaginationPrev = $textPaginationPrev;
        return $this;
    }

    public function setTextPaginationNext($textPaginationNext)
    {
        $this->textPaginationNext = $textPaginationNext;
        return $this;
    }

    public function setTextPaginationLast($textPaginationLast)
    {
        $this->textPaginationLast = $textPaginationLast;
        return $this;
    }

}