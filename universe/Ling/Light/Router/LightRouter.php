<?php


namespace Ling\Light\Router;


use Ling\Light\Http\HttpRequestInterface;


/**
 * The LightRouter class.
 */
class LightRouter implements LightRouterInterface
{

    /**
     * This property holds the matchingRoute for this instance.
     * @var array|false
     */
    protected $matchingRoute;

    /**
     * Builds the LightRouter instance.
     */
    public function __construct()
    {
        $this->matchingRoute = false;
    }

    /**
     * @implementation
     */
    public function match(HttpRequestInterface $request, array $routes)
    {
        foreach ($routes as $routeName => $route) {
            $pattern = $route["pattern"];
            if ($pattern === $request->getUriPath()) {
                $this->matchingRoute = $route;
                return $route;
            }
        }
        return false;
    }

    /**
     * @implementation
     */
    public function getMatchingRoute()
    {
        return $this->matchingRoute;
    }


}