<?php


namespace AdminTable\Table;


class ListWidgets
{
    protected $widgets;
    private $nbItemsPerPageList;

    public function __construct()
    {
        $this->widgets = [
            'pageSelector' => true,
            'search' => true,
            'itemsCounter' => true,
            'nippSelector' => true,
            'pagination' => true,
            'multipleActions' => true,
        ];

        $this->nbItemsPerPageList = [5, 10, 25, 50, 100, 250, 'all']; // all is a special value
    }

    public static function create()
    {
        return new self();
    }

    public function setNbItemsPerPageList(array $list)
    {
        $this->nbItemsPerPageList = $list;
        return $this;
    }

    public function getNbItemsPerPageList()
    {
        return $this->nbItemsPerPageList;
    }

    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    public function disablePageSelector()
    {
        $this->widgets['pageSelector'] = false;
        return $this;
    }

    public function disableSearch()
    {
        $this->widgets['search'] = false;
        return $this;
    }

    public function disableItemsCounter()
    {
        $this->widgets['itemsCounter'] = false;
        return $this;
    }

    public function disableNippSelector()
    {
        $this->widgets['nippSelector'] = false;
        return $this;
    }

    public function disablePagination()
    {
        $this->widgets['pagination'] = false;
        return $this;
    }

    public function disableMultipleActions()
    {
        $this->widgets['multipleActions'] = false;
        return $this;
    }

    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    public function all()
    {
        return $this->widgets;
    }
}