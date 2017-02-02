<?php


namespace AdminTable\Listable;

abstract class WithSearchColumns implements ListableInterface
{

    /**
     * @var null|array
     *      If null, means search all the columns
     */
    protected $searchCols;

    public function __construct()
    {
        $this->searchCols = null;
    }

    public function searchColumns(array $cols)
    {
        $this->searchCols = $cols;
        return $this;
    }
}