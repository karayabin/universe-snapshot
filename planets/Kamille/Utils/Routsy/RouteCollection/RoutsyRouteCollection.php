<?php


namespace Kamille\Utils\Routsy\RouteCollection;


use Kamille\Utils\Routsy\RoutsyUtil;

/**
 * This route collection assumes that the following structure exists:
 *
 *
 * The routsy dir by default is: **app/config/routsy**
 *
 * - $routsyDir/$prefix.php
 *
 *
 *
 */
class RoutsyRouteCollection extends RouteCollection
{

    private $routsyDir;
    private $fileName;
    private $onRouteMatch;


    public function __construct()
    {
        parent::__construct();
        $this->routsyDir = RoutsyUtil::getRoutsyDir();
    }

    public function setRoutsyDir($routsyDir)
    {
        $this->routsyDir = $routsyDir;
        return $this;
    }

    public function getRoutes()
    {
        $f = $this->routsyDir . "/" . $this->fileName . ".php";
        if (file_exists($f)) {
            $routes = [];
            include $f;
            $this->routes = $routes;
        }
        return parent::getRoutes();
    }

    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
        return $this;
    }

    public function getFileName()
    {
        return $this->fileName;
    }



    public function setOnRouteMatch(callable $onRouteMatch)
    {
        $this->onRouteMatch = $onRouteMatch;
        return $this;
    }

    public function routeMatched($routeId)
    {
        if (null !== $this->onRouteMatch) {
            call_user_func($this->onRouteMatch, $routeId);
        }
    }


}