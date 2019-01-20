<?php


namespace QueryFilterBox\QueryFilterBox;


use QueryFilterBox\FilterBoxWidget\FilterBoxWidgetInterface;
use QueryFilterBox\Query\Query;
use QueryFilterBox\Query\QueryInterface;

class QueryFilterBox implements QueryFilterBoxInterface, FilterBoxWidgetInterface
{

    protected $nbItems;
    protected $items;
    protected $usedPool;
    protected $pool;
    protected $model;

    public function __construct()
    {
        $this->nbItems = 0;
        $this->items = [];
        $this->usedPool = [];
        $this->pool = [];
        $this->model = [];
    }

    public static function create()
    {
        return new static();
    }


    public function decorateQuery(QueryInterface $query, array $pool, array &$usedPool)
    {
        $this->pool = $pool;
        if ($query instanceof Query) {
            $this->doDecorateQuery($query, $pool, $usedPool);
        }
    }

    public function prepare()
    {
    }

    public function setUsedPool(array $usedPool)
    {
        $this->usedPool = $usedPool;
        return $this;
    }

    public function setItems(array $items)
    {
        $this->items = $items;
        return $this;
    }

    public function setNbTotalItems($nbTotalItems)
    {
        $this->nbItems = $nbTotalItems;
        return $this;
    }

    public function getModel()
    {
        return $this->model;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    protected function doDecorateQuery(Query $query, array $pool, array &$usedPool)
    {

    }
}


