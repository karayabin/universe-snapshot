<?php


namespace Ling\Models\Model;


abstract class AbstractModel implements ModelInterface
{
    protected $array;

    public function __construct()
    {
        $this->array = [];
    }

    public static function create()
    {
        return new static();
    }

    public function getArray()
    {
        return $this->array;
    }


}