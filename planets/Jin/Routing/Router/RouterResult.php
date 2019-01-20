<?php


namespace Jin\Routing\Router;


/**
 *
 * @info The RouterResult class represents the result of the match method of a Jin\Routing\Router\RouterInterface instance
 * (when the Application instance searches for the route during the routing phase of the http request lifecycle).
 *
 * A route result is composed of the following properties:
 * - success: bool=false, whether the router found the matching route
 * - route: string=null, the name of the matching route
 * - vars: array=[], vars associated to the route, can be used by the target
 * - ?page: string=null, the page execution string (contains the information of what page to include)
 * - ?controller: string=null, the controller execution string  (contains the information of what controller method to call)
 *
 * Page and controller are mutually exclusive (i.e. either page is set, or controller, but not both).
 * Note: because of our implementation, both can technically be set together, and so if both are set, the controller
 * has precedence (since it's the more elaborate choice).
 *
 * @image http-request-lifecycle.png
 *
 */
class RouterResult
{
    /**
     * @info This property holds whether the router found the matching route
     * @type bool
     */
    public $success;
    /**
     * @info This property holds the name of the matching route
     */
    public $route;
    /**
     * @info This property holds the vars associated to the route, can be used by the target
     * @type array
     */
    public $vars;
    /**
     * @info This property holds the page execution string (contains the information of what page to include)
     */
    public $page;
    /**
     * @info This property holds the controller execution string  (contains the information of what controller method to call)
     */
    public $controller;

    /**
     * @info Builds the RouterResult instance
     */
    public function __construct()
    {
        $this->success = false;
        $this->vars = [];
    }
}