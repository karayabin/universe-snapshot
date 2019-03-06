<?php


namespace Ling\SqlQueryWrapper\Plugins;


use Ling\SqlQuery\SqlQueryInterface;

class SqlQueryWrapperPaginationPlugin extends SqlQueryWrapperBasePlugin
{
    protected $pageKey;
    protected $nbItemsPerPage;

    public function __construct()
    {
        parent::__construct();
        $this->pageKey = "page";
        $this->nbItemsPerPage = 20;
    }


    public function prepareQuery(SqlQueryInterface $sqlQuery)
    {
        if (array_key_exists($this->pageKey, $_GET)) {
            /**
             * Note that at this point the query is not yet executed, hence we don't know the number of items,
             * so we have to TRUST whatever comes from the uri.
             */
            $page = (int)$_GET[$this->pageKey];
            if ($page < 1) {
                $page = 1;
            }
            $offset = ($page - 1) * $this->nbItemsPerPage;
        } else {
            /**
             * even if the page param is not present in the uri, we want to paginate the list by default.
             */
            $offset = 0;
        }
        $sqlQuery->setLimit($offset, $this->nbItemsPerPage);
    }

    public function prepareModel(int $nbItems, array $rows)
    {
        $currentPage = $_GET[$this->pageKey] ?? 1;
        $nbPages = (int)ceil($nbItems / $this->nbItemsPerPage);


        // quick fixes
        if ($nbPages < 1) {
            $nbPages = 1;
        }
        if ($currentPage < 1) {
            $currentPage = 1;
        } elseif ($currentPage > $nbPages) {
            $currentPage = $nbPages;
        }
        $this->model = [
            "currentPage" => $currentPage,
            "nbPages" => $nbPages,
            "pageKey" => $this->pageKey,
        ];
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    public function setPageKey(string $pageKey)
    {
        $this->pageKey = $pageKey;
        return $this;
    }

    public function setNumberOfItemsPerPage(int $nbItemsPerPage)
    {
        $this->nbItemsPerPage = $nbItemsPerPage;
        return $this;
    }


}