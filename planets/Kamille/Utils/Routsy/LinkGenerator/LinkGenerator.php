<?php


namespace Kamille\Utils\Routsy\LinkGenerator;


use Kamille\Architecture\ApplicationParameters\ApplicationParameters;
use Kamille\Services\XLog;
use Kamille\Utils\Routsy\Exception\RoutsyException;

class LinkGenerator implements LinkGeneratorInterface
{

    private $routes;

    public function __construct()
    {
        $this->routes = [];
    }

    public static function create()
    {
        return new static();
    }


    public function getUri($routeId, array $params = [])
    {
        if (array_key_exists($routeId, $this->routes)) {
            $route = $this->routes[$routeId];
            $uri = str_replace([
                '+}',
                '{/',
                '{-', // cherry style
                '{.', // cherry style
            ], [
                '}',
                '{',
                '{',
                '{',
            ], $route[0]);
            return str_replace(array_map(function ($v) {
                return '{' . $v . '}';
            }, array_keys($params)), array_values($params), $uri);
        }
        $this->onRouteNotFound($routeId);
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    public function setRoutes(array $routes)
    {
        $this->routes = $routes;
        return $this;
    }

    private function onRouteNotFound($routeId)
    {
        $msg = "Route not found: $routeId";
        XLog::error($msg);
        if (true === ApplicationParameters::get("debug")) {
            throw new RoutsyException($msg);
        }
    }


}