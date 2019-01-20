<?php


namespace RowsGenerator;

/**
 * This rowGenerator implements the three kinds of searchItems:
 * - searchExpression
 * - searchFilter
 * - searchConstraint
 *
 */
abstract class AbstractRowsGenerator implements RowsGeneratorInterface
{
    protected $array;
    protected $page; // page set by the user
    protected $nipp;
    protected $sortValues;
    protected $searchItems;
    protected $nbTotalItems;


    public function __construct()
    {
        $this->array = [];
        $this->page = 1;
        $this->nipp = 20;
        $this->nbTotalItems = 0;
        $this->sortValues = [];
        $this->searchItems = [];
    }


    public static function create()
    {
        return new static();
    }


    public function setPage($page)
    {
        $this->page = $page;
        return $this;
    }

    public function setNbItemsPerPage($nipp)
    {
        $this->nipp = $nipp;
        return $this;
    }

    public function setSortValues(array $sortValues)
    {
        $this->sortValues = $sortValues;
        return $this;
    }

    public function setSearchItems(array $searchItems)
    {
        $this->searchItems = $searchItems;
        return $this;
    }

    public function getNbTotalItems()
    {
        return $this->nbTotalItems;
    }

    public function getSortValues()
    {
        return $this->sortValues;
    }

    public function getSearchItems()
    {
        return $this->searchItems;
    }

    public function getNbItemsPerPage()
    {
        return $this->nipp;
    }


}