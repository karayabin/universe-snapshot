<?php


namespace Ling\Kamille\Utils\Routsy\RouteCollection;


interface RouteCollectionInterface
{
    /**
     * @return array of routeId => routsy route (see RoutsyRouter for more details)
     */
    public function getRoutes();
}