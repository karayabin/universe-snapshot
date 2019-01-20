<?php


namespace XiaoApi\Helper\ReadParams;


class ReadParams
{
    public $fields;
    public $where;
    public $nipp;
    public $page;
    public $order;


    public static function create()
    {
        return new static();
    }
}