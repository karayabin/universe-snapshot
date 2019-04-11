<?php


namespace Ling\Light\Router;


use Ling\Light\Http\HttpRequestInterface;

/**
 * The LightRouterInterface interface.
 *
 *
 * The router in the Light framework is the object which chooses the controller to execute, based on the http request.
 * The controller being just a function which usually renders an html page.
 *
 *
 *
 */
interface LightRouterInterface
{


    /**
     * Tests the given httpRequest against the routes until one matches.
     * If one route matches, it returns the matching route.
     * If no route matches, it returns false.
     *
     * A route is just an array which structure is detailed on @page(the route page).
     *
     *
     * @param HttpRequestInterface $request
     * @param array $routes
     * @return false|array
     */
    public function match(HttpRequestInterface $request, array $routes);


}