<?php


namespace Ling\Light_ReverseRouter;


use Ling\Bat\HttpTool;
use Ling\Light\Core\Light;
use Ling\Light\Exception\LightException;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\ReverseRouter\LightReverseRouterInterface;
use Ling\Light_Initializer\Initializer\LightInitializerInterface;

/**
 * The ReverseRouter class.
 */
class ReverseRouter implements LightInitializerInterface, LightReverseRouterInterface
{


    /**
     * This property holds the routes for this instance.
     * @var array
     */
    protected $routes;


    /**
     * Builds the ReverseRouter instance.
     */
    public function __construct()
    {
        $this->routes = [];
    }


    /**
     * @implementation
     */
    public function initialize(Light $light, HttpRequestInterface $httpRequest)
    {
        $this->routes = $light->getRoutes();
    }


    /**
     * @implementation
     */
    public function getUrl(string $routeName, array $urlParameters = [], bool $useAbsolute = null): string
    {
        if (array_key_exists($routeName, $this->routes)) {
            $route = $this->routes[$routeName];

            if (false === $useAbsolute) {
                return $route['pattern'];
            }


            //--------------------------------------------
            // absolute version
            //--------------------------------------------
            $isSecure = $route['is_secure_protocol'];
            if(null===$isSecure){
                $isSecure = HttpTool::isHttps();
            }

            if (true === $isSecure) {
                $protocol = 'https';
            } else {
                $protocol = 'http';
            }
            $host = $route['host'];
            if (null === $host) {
                $host = $_SERVER['HTTP_HOST'];
            }
            return $protocol . "://" . $host . $route['pattern'];
        }
        throw new LightException("ReverseRouter: Route not found: $routeName.");
    }


}