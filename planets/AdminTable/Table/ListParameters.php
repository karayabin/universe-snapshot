<?php


namespace AdminTable\Table;


class ListParameters
{
    public $search;
    public $page;
    public $nipp;
    public $nbPages;
    public $sortColumn;
    public $sortColumnDir;
    public $items;

    //
    public $ric;
    public $ricSeparator;

    //
    public $showCheckboxes;

    // widgets
    public $hasPageSelector;
    public $hasSearch;
    public $hasNippSelector;
    public $hasPagination;
    public $hasMultipleActions;

    public $nbItemsPerPageList;
    public $multipleActions;

    //
    public $sortColumnGetKey;
    public $sortColumnDirGetKey;
    public $searchGetKey;
    public $nbItemsPerPageGetKey;
    public $pageGetKey;


    //
    public $columnLabels;
    public $hiddenColumns;
    /**
     * array of
     * id => [pos, value]
     * pos: last\int
     */
    public $extraColumns;
    public $transformers;
}