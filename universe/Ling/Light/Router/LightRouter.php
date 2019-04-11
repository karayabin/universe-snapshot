<?php


namespace Ling\Light\Router;


use Ling\Light\Http\HttpRequestInterface;


/**
 * The LightRouter class.
 */
class LightRouter implements LightRouterInterface
{
    /**
     * @implementation
     */
    public function match(HttpRequestInterface $request, array $routes)
    {
        foreach ($routes as $routeName => $route) {
            $pattern = $route["pattern"];
            if ($pattern === $request->getUriPath()) {
                return $route;
            }
        }
        return false;
    }
}