<?php


namespace Ling\ListModifier\RequestModifier;


class RequestModifier implements RequestModifierInterface
{

    private $sortItems;
    private $searchItems;
    private $limit;


    public function __construct()
    {
        $this->sortItems = [];
        $this->searchItems = [];
    }

    public function addSortItem($column, $dir)
    {
        $this->sortItems[$column] = $dir;
        return $this;
    }

    public function addSearchItem($field, $operand, $operator = "=", $operand2 = null)
    {
        $this->searchItems[$field] = [$operand, $operator, $operand2];
        return $this;
    }

    public function getSortItems()
    {
        return $this->sortItems;
    }

    public function getSearchItems()
    {
        return $this->searchItems;
    }

    /**
     * @return mixed
     */
    public function getLimit()
    {
        return $this->limit;
    }

    public function setLimit($offset, $length)
    {
        $this->limit = [$offset, $length];
        return $this;
    }

}


