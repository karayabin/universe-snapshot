<?php


namespace Ling\ListParams\ListBundle;

use Ling\ListParams\Controller\InfoFrameInterface;
use Ling\ListParams\Controller\PaginationFrameInterface;
use Ling\ListParams\Controller\SortFrameInterface;
use Ling\ListParams\ListParamsInterface;

class ListBundle implements ListBundleInterface
{

    private $items;
    private $pagination;
    private $sort;
    private $info;
    private $listParams;

    public function __construct()
    {
        $this->items = [];
    }

    public static function create()
    {
        return new static();
    }

    public function getListItems()
    {
        return $this->items;
    }


    public function getListParams()
    {
        return $this->listParams;
    }

    public function getPaginationFrame()
    {
        return $this->pagination;
    }

    public function getSortFrame()
    {
        return $this->sort;
    }

    public function getInfoFrame()
    {
        return $this->info;
    }



    //--------------------------------------------
    // SETTERS
    //--------------------------------------------
    public function setItems(array $items)
    {
        $this->items = $items;
        return $this;
    }

    public function setPagination(PaginationFrameInterface $pagination)
    {
        $this->pagination = $pagination;
        return $this;
    }

    public function setSort(SortFrameInterface $sort)
    {
        $this->sort = $sort;
        return $this;
    }

    public function setInfo(InfoFrameInterface $info)
    {
        $this->info = $info;
        return $this;
    }

    public function setListParams(ListParamsInterface $listParams)
    {
        $this->listParams = $listParams;
        return $this;
    }


}