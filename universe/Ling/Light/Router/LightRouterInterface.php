<?php


namespace Ling\Light\Router;


use Ling\Light\Http\HttpRequestInterface;

/**
 * The LightRouterInterface interface.
 */
interface LightRouterInterface
{


    /**
     * Tests the given httpRequest against the routes until one matches.
     * If one route matches, it returns the matching route.
     * If no route matches, it returns false.
     *
     * The routes array is an array of route names => route item.
     *
     * A route item is an array which should contain at least the following
     * entries:
     *
     * - pattern: string. The route pattern to match against the http request uri
     * - ?requirements: an array of requirements for the http request to meet. It contains at least the following:
     *      - ?method: string = get. The name of the http method (in lower case) to match against the http request method.
     * - name: string. This entry will be added automatically to the route item, and will contain the route name.
     *
     *
     *
     * @param HttpRequestInterface $request
     * @param array $routes
     * @return false|array
     */
    public function match(HttpRequestInterface $request, array $routes);
}