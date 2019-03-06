<?php


namespace Ling\Jin\Component\Routing\Router;


/**
 *
 * @info The RouterResult class represents the result of the match method of a Jin\Component\Routing\Router\RouterInterface instance
 * (when the Application instance searches for the route during the routing phase of the http request lifecycle).
 *
 * A route result is composed of the following properties:
 * - success: bool=false, whether the router found the matching route
 * - route: string=null, the full name of the matching route (the full name is composed of the collection name followed by a dot followed by the route name)
 *              Format: <route_collection_name> <.> <route_name>
 *              Example: app_my_collection.route_one
 *
 * - vars: array=[], vars associated to the route, can be used by the target
 * - ?page: string, the page to include if the route matches. It's the resourceId passed to the template engine master
 *           (see Jin\TemplateEngine\TemplateEngineMaster for more details about the resourceId notation).
 *           Ex:
 *               - pages:home/home.php
 *               - @jin:pages:home/home.php
 *
 *
 * - ?controller: string||array, the controller to call if the route matches.
 *           A controller in general is a php callable.
 *           If it's a string, it represents a jin controller ( a controller which resides under the controller directory ).
 *           The notation is the following:
 *           - jin controller: ```<className> "->" <methodName> ```
 *
 *           With:
 *           - className: the class name of the controller (example: Controller\Demo\MyController).
 *
 *           You can use the dedicated "controller" directory of a jin app if you want.
 *           See the @section(The controllers directory) section for more details about this technique.
 *
 *           If it's an array, it uses the @keyword(sic) notation for defining php callables.
 *
 *
 *
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