<?php


namespace Ling\QueryFilterBox\ItemsGenerator;


use Kamille\Services\XLog;
use Ling\QueryFilterBox\Query\Query;
use Ling\QueryFilterBox\Query\QueryInterface;
use Ling\QueryFilterBox\QueryFilterBox\QueryFilterBoxInterface;
use Ling\QueryFilterBox\Util\Paginator\Paginator;
use Ling\QueryFilterBox\Util\Paginator\PaginatorInterface;
use Ling\QuickPdo\QuickPdo;

class ItemsGenerator implements ItemsGeneratorInterface
{
    /**
     * @var QueryFilterBoxInterface[]
     */
    private $filterBoxes;

    /**
     * @var QueryInterface $query
     */
    private $query;

    /**
     * @var PaginatorInterface
     */
    private $paginator;

    //
    private $_nbTotalItems;
    private $_usedPool;

    public function __construct()
    {
        $this->filterBoxes = [];
        $this->query = null;
    }

    public static function create()
    {
        return new static();
    }

    public function getFilterBox($name)
    {
        if (array_key_exists($name, $this->filterBoxes)) {
            return $this->filterBoxes[$name];
        }
        return null;
    }

    public function getFilterBoxes()
    {
        return $this->filterBoxes;
    }

    public function setFilterBox($name, QueryFilterBoxInterface $filterBox)
    {
        $this->filterBoxes[$name] = $filterBox;
        return $this;
    }

    public function unsetFilterBox($name)
    {
        unset($this->filterBoxes[$name]);
        return $this;
    }


    public function getItems(array $pool, $fetchStyle = null)
    {
        $query = $this->getQuery();
        $usedPool = [];
        foreach ($this->filterBoxes as $filterBox) {
            $filterBox->decorateQuery($query, $pool, $usedPool);
        }

        $markers = $query->getMarkers();
        $countQuery = $query->getCountQuery();
        $nbTotalItems = QuickPdo::fetch($countQuery, $markers, \PDO::FETCH_COLUMN);
        $this->_nbTotalItems = $nbTotalItems;

        if (null !== $this->paginator) {
            $this->paginator->decorateQuery($query, $nbTotalItems, $pool, $usedPool);
        }

        $usedPool = array_unique($usedPool);
        $this->_usedPool = array_intersect_key($pool, array_flip($usedPool));


        $q = $query->getQuery();
//        az($q);
        $items = QuickPdo::fetchAll($q, $markers, $fetchStyle);

        foreach ($this->filterBoxes as $filterBox) {
            $filterBox->setItems($items);
            $filterBox->setUsedPool($usedPool);
            $filterBox->prepare();
        }

        return $items;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    public function setQuery(QueryInterface $query)
    {
        $this->query = $query;
        return $this;
    }

    public function getQuery()
    {
        if (null === $this->query) {
            $this->query = new Query();
        }
        return $this->query;
    }

    public function setPaginator(PaginatorInterface $paginator)
    {
        $this->paginator = $paginator;
        return $this;
    }

    public function getInfo()
    {
        if ($this->paginator instanceof Paginator) {
            $model = $this->paginator->getModel();
            $nipp = $model['nipp'];
            $page = $model['page'];
        } else {
            $nipp = 20;
            $page = 1;
        }


        return [
            'nipp' => $nipp,
            'nbTotalItems' => $this->_nbTotalItems,
            'page' => $page,
            'pool' => $this->_usedPool,
        ];
    }
}


