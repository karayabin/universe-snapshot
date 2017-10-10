<?php


namespace Kamille\Utils\Routsy\RouteCollection;


use Kamille\Architecture\Request\Web\HttpRequestInterface;

interface PrefixedRouteCollectionInterface extends RouteCollectionInterface
{

    /**
     * @param HttpRequestInterface $request
     * @return bool
     */
    public function prefixMatch(HttpRequestInterface $request);
}