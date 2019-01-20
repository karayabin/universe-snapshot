<?php


namespace QueryFilterBox\Util\Paginator;


use QueryFilterBox\FilterBoxWidget\FilterBoxWidgetInterface;
use QueryFilterBox\Query\Query;

class Paginator implements PaginatorInterface, FilterBoxWidgetInterface
{
    private $keyPage;
    private $keyNipp;
    private $_nipp;
    private $_page;


    public function __construct()
    {
        $this->keyPage = 'page';
        $this->keyNipp = 'nipp';
    }


    public static function create()
    {
        return new static();
    }

    public function decorateQuery(Query $query, $nbTotalItems, array $pool, array &$usedPool = [])
    {
        $page = (array_key_exists($this->keyPage, $pool)) ? $pool[$this->keyPage] : 1;
        $nipp = (array_key_exists($this->keyNipp, $pool)) ? (int)$pool[$this->keyNipp] : 20;

        /**
         * If you don't want to add to the usedPool, you should not use the Paginator at all (I believe)
         */
        $usedPool[] = $this->keyPage;
        $usedPool[] = $this->keyNipp;

        $this->_nipp = $nipp;
        if ($nipp > 0) {
            $nbTotalPages = ceil($nbTotalItems / $nipp);
            if ($page > $nbTotalPages) {
                $page = $nbTotalPages;
            }
            if ($page < 1) {
                $page = 1;
            }
            $this->_page = $page;
            $offset = ($page - 1) * $nipp;
            $rowCount = $nipp;
            $query->setLimit($offset, $rowCount);
        }
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    public function getModel()
    {
        return [
            'namePage' => $this->keyPage,
            'nameNipp' => $this->keyNipp,
            'nipp' => $this->_nipp,
            'page' => $this->_page,
        ];
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    public function setKeyPage($keyPage)
    {
        $this->keyPage = $keyPage;
        return $this;
    }

    public function setKeyNipp($keyNipp)
    {
        $this->keyNipp = $keyNipp;
        return $this;
    }


}