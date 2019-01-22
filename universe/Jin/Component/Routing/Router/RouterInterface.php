<?php

namespace Jin\Component\Routing\Router;


use Jin\Http\HttpRequest;

/**
 *
 * @info The RouterInterface is the interface for all routers.
 * In a jin app, routers are called during the routing phase of the http request lifecycle.
 * @image http-request-lifecycle.png
 *
 */
interface RouterInterface
{

    /**
     * @info Tries to find a route matching the given http request, and returns its result in the form of a
     * RouterResult instance.
     *
     * @param HttpRequest $request
     * @return RouterResult
     */
    public function match(HttpRequest $request): RouterResult;
}