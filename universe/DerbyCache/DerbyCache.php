<?php


namespace DerbyCache;


abstract class DerbyCache implements DerbyCacheInterface
{

    public function __construct()
    {
        // maybe one day?
    }

    public static function create()
    {
        return new static();
    }
}