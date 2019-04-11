<?php


namespace Ling\Light_ReverseRouter;


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
    public function getUrl(string $routeName, array $urlParameters = []): string
    {
        if (array_key_exists($routeName, $this->routes)) {
            $route = $this->routes[$routeName];
            return $route['pattern'];
        }
        throw new LightException("ReverseRouter: Route not found: $routeName.");
    }


}