<?php


namespace Kamille\Utils\Routsy\RouteCollection;


class RouteCollection implements RouteCollectionInterface
{
    protected $routes;

    public function __construct()
    {
        $this->routes = [];
    }

    public static function create()
    {
        return new static();
    }


    public function getRoutes()
    {
        return $this->routes;
    }

    public function setRoutes(array $routes)
    {
        $this->routes = $routes;
        return $this;
    }
}