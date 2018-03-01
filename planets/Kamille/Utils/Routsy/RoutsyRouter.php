<?php


namespace Kamille\Utils\Routsy;


use Kamille\Architecture\ApplicationParameters\ApplicationParameters;
use Kamille\Architecture\Request\Web\HttpRequestInterface;
use Kamille\Architecture\Router\Web\WebRouterInterface;
use Kamille\Services\XLog;
use Kamille\Utils\Routsy\Exception\RoutsyException;
use Kamille\Utils\Routsy\RouteCollection\PrefixedRouteCollectionInterface;
use Kamille\Utils\Routsy\RouteCollection\PrefixedRoutsyRouteCollection;
use Kamille\Utils\Routsy\RouteCollection\RouteCollectionInterface;
use Kamille\Utils\Routsy\RouteCollection\RoutsyRouteCollection;
use Kamille\Utils\Routsy\Util\ConstraintsChecker\AppleConstraintsChecker;
use Kamille\Utils\Routsy\Util\DynamicUriMatcher\CherryDynamicUriMatcher;
use Kamille\Utils\Routsy\Util\RequirementsChecker\KiwiRequirementsChecker;

/**
 * A routsy route is an array containing the following keys:
 *
 * - 0: uri
 * - 1: constraints (uri parameters constraints)
 *              array of uriParam => constraint
 *              examples of constraints are:
 *                  - >6
 *                  - >=6
 *                  - <6
 *                  - <=6
 *                  - 6
 *                  - >7<10
 *                  - >=7<10
 *                  - >=7=<10
 *                  - >7=<10
 *                  - [78,45]   // alternatives
 *                  - kabo
 *                  - [kano, kabo]
 *
 *
 * - 2: requirements (http request requirements)
 *
 *                  examples of requirements are:
 *                      - https => true,
 *                      - inGet => ["disconnect", "pou"],
 *                      - inPost => ["disconnect", "pou"],
 *                      - getValues => ["ee" => "45", "pou" => "pl"],
 *                       -postValues => ["ee" => "45", "pou" => "pl"],
 *
 *
 * - controller (a controller match, see WebRouterInterface for more details)
 *
 *
 *
 *
 * Implementation notes
 * --------------------------
 * We split between routeCollection and prefixedRouteCollection because
 * routing is executed almost every time and I thought it would be worth (performance wise)
 * to eliminate a bunch of routes if the prefix of the collection doesn't match.
 *
 */
class RoutsyRouter implements WebRouterInterface, RouteCollectionInterface
{


    /**
     * @var RouteCollectionInterface[]
     */
    private $routeCollections;

    /**
     * @var PrefixedRouteCollectionInterface[]
     */
    private $prefixedRouteCollections;

    // cache for link generator
    private $routes;

    public function __construct()
    {
        $this->routeCollections = [];
        $this->prefixedRouteCollections = [];
        $this->routes = null;
    }

    public static function create()
    {
        return new static();
    }

    public function addCollection(RouteCollectionInterface $collection)
    {
        if ($collection instanceof PrefixedRouteCollectionInterface) {
            $this->prefixedRouteCollections[] = $collection;
        } else {
            $this->routeCollections[] = $collection;
        }
        return $this;
    }


    public function match(HttpRequestInterface $request)
    {
        foreach ($this->prefixedRouteCollections as $collection) {
            if (true === $collection->prefixMatch($request)) {
                if (null !== ($ret = $this->processCollection($collection, $request))) {
                    return $ret;
                }
            }
        }
        foreach ($this->routeCollections as $collection) {
            if (null !== ($ret = $this->processCollection($collection, $request))) {
                return $ret;
            }
        }
    }


    public function setRoutes(array $routes)
    {
        $this->routes = $routes;
        return $this;
    }

    public function getRoutes()
    {
        if (null === $this->routes) {
            $routes = [];
            foreach ($this->prefixedRouteCollections as $collection) {
                $routes = array_merge($routes, $collection->getRoutes());
            }
            foreach ($this->routeCollections as $collection) {
                $routes = array_merge($routes, $collection->getRoutes());
            }
            $this->routes = $routes;
        }
        return $this->routes;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @return false|mixed:controllerMatch (see WebRouterInterface for more details),
     *
     */
    private function matchRoute(HttpRequestInterface $request, array $route, array &$urlParams)
    {
        list($url, $constraints, $requirements, $controller) = $route;
        //--------------------------------------------
        // CHECK REQUIREMENTS
        //--------------------------------------------
        /**
         * We do requirements first because they are generally the fastest to process
         */
        if (null !== $requirements) {
            if (false === $this->checkRequirements($request, $requirements)) {
                return false;
            }
        }

        //--------------------------------------------
        // URL MATCHING
        //--------------------------------------------
        $urlMatched = false;
        $_urlParams = null; // only for dynamic params
        $uri = $request->uri(false);


        /**
         * added 2018-02-16 to match things like:
         * /admin/ekom/generated/TABLE 69/list
         */
        $uri = urldecode($uri);


        if (is_string($url)) {
            // is it dynamic or static?
            if (false === strpos($url, '{')) {
                // static
                $uri = RoutsyUtil::removeTrailingSlash($uri);
                $urlMatched = ($uri === $url);
            } else {
                // dynamic
                if (false !== ($_urlParams = $this->matchDynamic($url, $uri))) {
                    $urlMatched = true;

                    /**
                     * Checking provided url params
                     */
                    if (is_array($constraints)) {
                        if (false === $this->checkConstraints($_urlParams, $constraints)) {
                            return false;
                        }
                    }

                }
            }
        } elseif (null === $url) {
            $urlMatched = true;
        }


        //--------------------------------------------
        // CONTROLLER/URL PARAMS
        //--------------------------------------------
        if (true === $urlMatched) {
            if (is_array($_urlParams)) {
                return [$controller, $_urlParams];
            }
            return $controller;
        }
        return false;
    }

    private function checkRequirements(HttpRequestInterface $request, $requirements)
    {
        return KiwiRequirementsChecker::checkRequirements($request, $requirements);
    }


    private function matchDynamic($pattern, $uri)
    {
        return CherryDynamicUriMatcher::matchDynamic($pattern, $uri);
    }

    private function checkConstraints(array $urlParams, array $constraints)
    {
        return AppleConstraintsChecker::checkConstraints($urlParams, $constraints);
    }

    private function processCollection(RouteCollectionInterface $collection, HttpRequestInterface $request)
    {
        $routes = $collection->getRoutes();
        foreach ($routes as $routeId => $route) {
            $urlParams = [];
            if (false !== ($controllerMatch = $this->matchRoute($request, $route, $urlParams))) {
                if (true === ApplicationParameters::get("debug")) {

                    $sInfo = "";
                    if ($collection instanceof RoutsyRouteCollection) {
                        $sInfo .= "; fileName: " . $collection->getFileName();
                    }
                    if ($collection instanceof PrefixedRoutsyRouteCollection) {
                        $sInfo .= "; prefix: " . $collection->getUrlPrefix();
                    }
                    $sInfo .= "; pattern: " . $route[0];
                    XLog::debug("[Kamille.RoutsyRouter] - routeId $routeId matched" . $sInfo);
                }


                if ($collection instanceof RoutsyRouteCollection) {
                    $collection->routeMatched($routeId);
                }
                return $controllerMatch;
            }
        }
    }

}