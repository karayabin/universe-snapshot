<?php

namespace Ling\ListParams;


/**
 * First and simple implementation of ListParamsInterface
 */
class ListParams implements ListParamsInterface
{

    private $sortItems;
    private $searchItems;
    private $searchExpression;
    private $page;
    private $nipp;

    //
    private $pool;
    private $poolType;

    /**
     * Names
     */
    private $nameSort;
    private $nameSortDir;
    private $namePage;
    private $nameNipp;
    private $nameSearchExpression;
    private $nameSearchItems;

    /**
     *
     * THIS MUST BE SET BY THE MODEL
     * (because ONLY the model knows the total number of items, and/or the allowed sort/search fields)
     *
     * @var int=null
     *
     *
     */
    private $totalNumberOfItems;
    private $allowedSortFields;
    private $allowedSearchFields;


    /**
     * Defines the behaviour when the user sets the sort but not the sort dir.
     *
     * If null: the whole sort is ignored.
     * If 1 or 0: it's the value of the sort dir (1=asc, 0=desc)
     *
     */
    private $defaultSortDir;


    // data persistency
    private $persistentPage;
    private $persistentSort;
    private $persistentSearch;


    public function __construct()
    {
        $this->sortItems = [];
        $this->searchExpression = "";
        $this->searchItems = [];
        $this->page = 1;
        $this->nipp = null;

        $this->pool = $_GET;

        /**
         * names
         */
        $this->nameSort = "sort";
        $this->nameSortDir = "asc";
        $this->namePage = "page";
        $this->nameNipp = "nipp";
        $this->nameSearchExpression = "search";
        $this->nameSearchItems = "search-items";

        $this->defaultSortDir = "1";
        $this->totalNumberOfItems = 0;
        $this->allowedSortFields = [];
        $this->allowedSearchFields = [];
        $this->persistentPage = true;
        $this->persistentSort = true;
        $this->persistentSearch = true;

    }

    public static function create()
    {
        return new static();
    }


    //--------------------------------------------
    // IMPLEMENTS
    //--------------------------------------------
    public function getSortItems()
    {
        return $this->sortItems;
    }

    public function getSearchItems()
    {
        return $this->searchItems;
    }

    public function getSearchExpression()
    {
        return $this->searchExpression;
    }

    public function getPage()
    {
        return $this->page;
    }

    public function getNumberOfItemsPerPage()
    {
        return $this->nipp;
    }

    public function getDefaultSortDir()
    {
        return $this->defaultSortDir;
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     *
     * Use this method to convert values from the pool to calls to the following
     * methods (lazy way):
     *
     * -> addSortItem
     * -> setPage
     * -> setNumberOfItemsPerPage
     * -> setSearchExpression
     * -> addSearchItem
     *
     *
     *
     */
    public function infuse()
    {
        // sort
        if (array_key_exists($this->nameSort, $this->pool)) {
            if (array_key_exists($this->nameSortDir, $this->pool)) {
                $sortDir = (int)$this->pool[$this->nameSortDir];
            } else {
                $sortDir = $this->defaultSortDir;
            }
            if (null !== $sortDir) {
                $this->addSortItem($this->pool[$this->nameSort], (bool)$sortDir);
            }
        }

        // page
        if (array_key_exists($this->namePage, $this->pool)) {
            $this->setPage($this->pool[$this->namePage]);
        }

        // nipp
        if (array_key_exists($this->nameNipp, $this->pool)) {
            $this->setNumberOfItemsPerPage($this->pool[$this->nameNipp]);
        }

        // search expression
        if (array_key_exists($this->nameSearchExpression, $this->pool)) {
            $this->setSearchExpression($this->pool[$this->nameSearchExpression]);
        }

        // search items
        if (array_key_exists($this->nameSearchItems, $this->pool)) {
            $items = $this->pool[$this->nameSearchItems];
            if (is_array($items)) {
                foreach ($items as $field => $item) {
                    $this->addSearchItem($field, $item);
                }
            }
        }

        return $this;
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    public function addSortItem($field, $isAsc)
    {
        $this->sortItems[$field] = (bool)$isAsc;
        return $this;
    }

    public function setSearchExpression($searchExpression)
    {
        $this->searchExpression = $searchExpression;
        return $this;
    }

    public function addSearchItem($field, $expression)
    {
        $this->searchItems[$field] = $expression;
        return $this;
    }

    public function setPage($page)
    {
        $this->page = (int)$page;
        return $this;
    }

    public function setNumberOfItemsPerPage($nipp)
    {
        $this->nipp = $nipp;
        return $this;
    }


    //--------------------------------------------
    // POOL
    //--------------------------------------------
    public function setPool(array $pool)
    {
        $this->pool = $pool;
        return $this;
    }

    public function getPool()
    {
        return $this->pool;
    }

    public function getPoolType()
    {
        return $this->poolType;
    }

    public function setPoolType($poolType)
    {
        $this->poolType = $poolType;
        return $this;
    }





    //--------------------------------------------
    // TOTAL NUMBER OF ITEMS PER PAGE
    //--------------------------------------------
    public function setTotalNumberOfItems($n)
    {
        $this->totalNumberOfItems = (int)$n;
        return $this;
    }

    public function getTotalNumberOfItems()
    {
        return $this->totalNumberOfItems;
    }




    //--------------------------------------------
    // REGULAR SETTERS
    //--------------------------------------------
    public function setNameSort($nameSort)
    {
        $this->nameSort = $nameSort;
        return $this;
    }

    public function setNameSortDir($nameSortDir)
    {
        $this->nameSortDir = $nameSortDir;
        return $this;
    }

    public function setNamePage($namePage)
    {
        $this->namePage = $namePage;
        return $this;
    }

    public function setNameNipp($nameNipp)
    {
        $this->nameNipp = $nameNipp;
        return $this;
    }

    public function setNameSearchExpression($nameSearchExpression)
    {
        $this->nameSearchExpression = $nameSearchExpression;
        return $this;
    }

    public function setNameSearchItems($nameSearchItems)
    {
        $this->nameSearchItems = $nameSearchItems;
        return $this;
    }

    public function setDefaultSortDir($defaultSortDir)
    {
        $this->defaultSortDir = $defaultSortDir;
        return $this;
    }



    //--------------------------------------------
    // REGULAR GETTERS
    //--------------------------------------------
    /**
     * @return mixed
     */
    public function getNameSort()
    {
        return $this->nameSort;
    }

    /**
     * @return string
     */
    public function getNameSortDir()
    {
        return $this->nameSortDir;
    }

    /**
     * @return string
     */
    public function getNamePage()
    {
        return $this->namePage;
    }

    /**
     * @return string
     */
    public function getNameNipp()
    {
        return $this->nameNipp;
    }

    /**
     * @return string
     */
    public function getNameSearchExpression()
    {
        return $this->nameSearchExpression;
    }

    /**
     * @return string
     */
    public function getNameSearchItems()
    {
        return $this->nameSearchItems;
    }

    //--------------------------------------------
    // PERSISTENCE
    //--------------------------------------------
    /**
     * @return bool
     */
    public function hasPersistentPage()
    {
        return $this->persistentPage;
    }

    public function setPersistentPage($persistentPage)
    {
        $this->persistentPage = (bool)$persistentPage;
        return $this;
    }

    /**
     * @return bool
     */
    public function hasPersistentSort()
    {
        return $this->persistentSort;
    }

    public function setPersistentSort($persistentSort)
    {
        $this->persistentSort = (bool)$persistentSort;
        return $this;
    }

    /**
     * @return bool
     */
    public function hasPersistentSearch()
    {
        return $this->persistentSearch;
    }

    public function setPersistentSearch($persistentSearch)
    {
        $this->persistentSearch = (bool)$persistentSearch;
        return $this;
    }

    //--------------------------------------------
    // ALLOWED SORT/SEARCH FIELDS
    //--------------------------------------------
    /**
     * @return array
     */
    public function getAllowedSortFields()
    {
        return $this->allowedSortFields;
    }

    public function setAllowedSortFields(array $allowedSortFields)
    {
        $this->allowedSortFields = $allowedSortFields;
        return $this;
    }

    /**
     * @return array
     */
    public function getAllowedSearchFields()
    {
        return $this->allowedSearchFields;
    }

    public function setAllowedSearchFields(array $allowedSearchFields)
    {
        $this->allowedSearchFields = $allowedSearchFields;
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    public function getHash()
    {
        $pool = $this->pool;
        asort($pool);
        return md5(serialize($pool));
    }


}
