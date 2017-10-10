<?php


namespace Kamille\Utils\Routsy\RouteCollection;


use Kamille\Architecture\Request\Web\HttpRequestInterface;

class PrefixedRoutsyRouteCollection extends RoutsyRouteCollection implements PrefixedRouteCollectionInterface
{

    protected $urlPrefix;


    public function getRoutes()
    {
        $routes = parent::getRoutes();
        $prefix = (string)$this->urlPrefix;

        $routes = array_map(function ($v) use ($prefix) {
            if ('/' === substr($v[0], -1)) {
                $v[0] = substr($v[0], 0, -1);
            }
            $v[0] = $prefix . $v[0];
            return $v;
        }, $routes);
        return $routes;
    }


    public function setUrlPrefix($prefix)
    {
        $this->urlPrefix = $prefix;
        return $this;
    }

    public function getUrlPrefix()
    {
        return $this->urlPrefix;
    }


    public function prefixMatch(HttpRequestInterface $request)
    {
        /**
         * Note: we add a slash to the urlPrefix because imagine your urlPrefix is as simple as "/fr",
         * then it could match a lot of things (france, fridge, friday, ...) if we don't add the trailing slash
         */
        $uri = $request->uri(false);
        return ($uri === $this->urlPrefix || 0 === stripos($request->uri(false), $this->urlPrefix . '/'));
    }


}