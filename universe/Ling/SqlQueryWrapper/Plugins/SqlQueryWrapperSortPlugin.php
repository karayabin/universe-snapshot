<?php


namespace Ling\SqlQueryWrapper\Plugins;


use Ling\SqlQuery\SqlQueryInterface;

/**
 * This plugin is a little bit tricky.
 * First, sorts are passed via the uri using a unique key encoding for both the sort field and the sort direction (whereas
 * in some other tools you have separated parameters).
 *
 * For instance, label_asc means both:
 *      - the column to sort is label
 *      - the sort direction is asc
 *
 * Basically, you just add the _asc or _desc suffix to the column name you want to sort.
 * Also, the first part (the prefix) is directly the column name in your sql query without other mapping.
 * Note: the motivation behind this design is that you can always set aliases in your sql query, which makes it very
 * simple for the dev to call this plugin (no maps required).
 *
 *
 *
 *
 *
 *
 */
class SqlQueryWrapperSortPlugin extends SqlQueryWrapperBasePlugin
{
    protected $sortKey;
    protected $pageKey;
    protected $sortItems;
    protected $defaultSort;

    public function __construct()
    {
        parent::__construct();
        $this->sortKey = "sort";
        $this->pageKey = "page";
        $this->defaultSort = null;
        $this->sortItems = [];
    }


    public function prepareQuery(SqlQueryInterface $sqlQuery)
    {

        $orderBy = null;
        $orderBy = null;


        $currentSort = $_GET[$this->sortKey] ?? $this->defaultSort;

        if ($currentSort) {
            if (array_key_exists($currentSort, $this->sortItems)) { // sanitize check
                $p = explode('_', $currentSort);
                $orderDir = array_pop($p);
                $orderBy = implode('_', $p);
            }
        }

        if (null !== $orderBy) {
            $sqlQuery->addOrderBy($orderBy, $orderDir);
        }
    }

    public function prepareModel(int $nbItems, array $rows)
    {
        $currentSort = $_GET[$this->sortKey] ?? $this->defaultSort;
        $this->model = [
            "sortItems" => $this->sortItems,
            "sortKey" => $this->sortKey,
            "pageKey" => $this->pageKey,
            "currentSort" => $currentSort,
            "nbItems" => $nbItems,
        ];
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    public function setSortKey(string $sortKey)
    {
        $this->sortKey = $sortKey;
        return $this;
    }

    public function setPageKey(string $pageKey)
    {
        $this->pageKey = $pageKey;
        return $this;
    }

    public function setSortItems(array $sortItems)
    {
        $this->sortItems = $sortItems;
        return $this;
    }

    public function appendSortItems(array $sortItems)
    {
        foreach ($sortItems as $k => $v) {
            $this->sortItems[$k] = $v;
        }
        return $this;
    }

    public function prependSortItems(array $sortItems)
    {
        $curSortItems = $this->sortItems;
        $this->sortItems = $sortItems;
        $this->appendSortItems($curSortItems);
        return $this;
    }

    public function setDefaultSort(string $defaultSort)
    {
        $this->defaultSort = $defaultSort;
        return $this;
    }


}