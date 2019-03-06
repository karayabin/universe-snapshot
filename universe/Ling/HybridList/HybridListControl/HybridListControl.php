<?php


namespace Ling\HybridList\HybridListControl;


abstract class HybridListControl implements HybridListControlInterface
{

    protected $model;

    public function __construct()
    {
        $this->model = [];
    }

    public static function create()
    {
        return new static();
    }


    public function getModel()
    {
        return $this->model;
    }


}