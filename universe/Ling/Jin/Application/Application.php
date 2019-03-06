<?php


namespace Ling\Jin\Application;


use Ling\ArrayToString\ArrayToStringTool;
use Ling\Bat\ClassTool;
use Ling\Bat\DebugTool;
use Ling\Jin\Component\Routing\Router\RouterInterface;
use Ling\Jin\Component\Routing\Router\RouterResult;
use Ling\Jin\Exception\BadConfiguration\JinBadControllerException;
use Ling\Jin\Exception\BadConfiguration\JinBadPageException;
use Ling\Jin\Exception\BadConfiguration\JinBadRouteException;
use Ling\Jin\Exception\BadConfiguration\JinNoRouteMatchesException;
use Ling\Jin\Exception\JinBadConfigurationException;
use Ling\Jin\Http\HttpRequest;
use Ling\Jin\Http\HttpResponse;
use Ling\Jin\Log\Logger;
use Ling\Jin\Registry\Access;

/**
 *
 * @info The Application class represents the web application.
 *
 *
 *
 * Logging
 * ----------
 * You can control which channels are fed using the config/variables/app.yml file, in the logging.special_channels section.
 *
 * The following channels are available and can be activated/de-activated using muted_channels in the config/logger.yml file (section logger):
 *
 * - app_init: debug information covering the application init method (creation of the service container).
 * - app_synopsis: general debugging information that allows the developer to quickly identify what main path the application took,
 *          so that she can solve eventual problems more efficiently.
 *           At this class level, the following messages will be logged:
 *              - the request main info when it is received
 *              - the main routing info (if the route matched or failed, and if it matched, what controller or page was called)
 *          Third-party plugins or other components are welcome to add their own messages to that channel if it seems appropriate
 *          to do so.
 *
 *
 *
 * Exceptions handling
 * ---------------------
 * The following exceptions are thrown by this class, and should all result in a big error message being displayed in the face of the user (because
 * they are dev exceptions that should be fixed BEFORE the app is sent to prod). See more details in Jin\Exception\JinBadConfigurationException's class
 * description for more details.
 *
 * - Jin\Exception\BadConfiguration\JinBadControllerException
 * - Jin\Exception\BadConfiguration\JinBadPageException
 * - Jin\Exception\BadConfiguration\JinNoRouteMatchesException
 *
 *
 *
 */
class Application
{


    /**
     * @info This property holds the application root directory
     */
    private $appDir;

    /**
     * @info This property holds the application profile (dev, prod, ...)
     */
    private $profile;

    /**
     * @info This property holds the application logger (aka main logger)
     * @var Logger $logger
     */
    private $logger;


    /**
     * @info Builds the application instance
     */
    public function __construct()
    {
    }

    /**
     * @info Initializes the application instance.
     *
     *
     * @param $appDir
     * @param $profile
     */
    public function init($appDir, $profile)
    {

        // initialization
        $this->logger = Access::log();
        $this->appDir = $appDir;
        $this->profile = $profile;


        $this->logger->log("Initializing application, with profile=$profile", "app_init");


        // creating services container
        $this->logger->log("Creating service container$profile", "app_init");


    }


    /**
     * @info Handles the Jin\Http\HttpRequest and returns an appropriate Jin\Http\HttpResponse object.
     *
     *
     *
     * @param HttpRequest $request
     * @image http-request-lifecycle.png
     * @return HttpResponse
     * @throws JinBadConfigurationException
     */
    public function handleRequest(HttpRequest $request)
    {

        $response = null;
        $this->synopsis("Handling request {$request->method}: {$request->uri}");

        $file = $this->appDir . "/config/http_request_lifecycle.yml";
        $dir = $this->appDir . "/config/http_request_lifecycle";
        $components = Access::configurationFileParser()->parseFileWithDir($file, $dir, true);


        try {

            //--------------------------------------------
            // PRE-ROUTING
            //--------------------------------------------
            $preRoutingComponents = $components['pre_routing'] ?? [];
            foreach ($preRoutingComponents as $comp) {
                $callable = $comp['instance'];
                $ret = call_user_func($callable, $request);
                if ($ret instanceof HttpResponse) {
                    $sCallable = DebugTool::toString($callable);
                    $this->synopsis("An early response was given by $sCallable");
                    $response = $ret;
                    break;
                }
            }
            if (null === $response) {

                //--------------------------------------------
                // ROUTING
                //--------------------------------------------
                $routeFound = false;
                $routingComponents = $components['routing'] ?? [];
                foreach ($routingComponents as $routingComponent) {
                    $router = $routingComponent['instance'];
                    if ($router instanceof RouterInterface) {
                        $routerResult = $router->match($request);
                        if (true === $routerResult->success) {
                            $routeFound = true;


                            $msg = "Route found: {$routerResult->route}, ";


                            // controller
                            if ($routerResult->controller) {
                                $msg .= "with controller mechanism. Controller=" . DebugTool::toString($routerResult->controller);
                                $this->synopsis($msg);
                                $response = $this->handleController($routerResult, $router, $request);
                                break;
                            } // page
                            elseif ($routerResult->page) {
                                $msg .= "with page mechanism. Page=" . $routerResult->page;
                                $this->synopsis($msg);
                                $response = $this->handlePage($routerResult, $router);
                                break;
                            } else {
                                $this->synopsis("but no mechanism defined");
                                throw new JinBadRouteException("Neither the controller nor the page mechanism has been defined by the given route ({$routerResult->route})");
                            }
                            break;
                        }


                    } else {
                        Access::log()->error(
                            sprintf("(Jin\Application\Application->handleRequest): invalid router instance: a router instance must be of type Jin\Component\Routing\Router\RouterInterface, %s given",
                                DebugTool::toString($router)
                            )
                        );
                    }
                }

                if (false === $routeFound) {
                    $this->synopsis("Route not found");
                    $ex = new JinNoRouteMatchesException("No route found for request with uri " . $request->uri);
                    $ex->setRequest($request);
                    throw $ex;
                }

//            az($components);

            }


        } catch (\Exception $e) {

            $exceptionName = ClassTool::getShortName($e);
            $this->synopsis("Exception caught: $exceptionName. Calling exception handlers...");

            /**
             * If an exception reaches this block, it should be displayed as a big error message in the face of the user.
             * That's because it's probably a problem that should have been fixed by the developer.
             *
             * Exceptions should be handled by components (or children) themselves as much as possible.
             * This block is the very last defense against the white screen.
             *
             * If no response is set here, this is the WHITE SCREEN....
             */

            $response = $this->handleException($e, $components);
        }

        //--------------------------------------------
        // RESPONSE HANDLING
        //--------------------------------------------
        if ($response instanceof HttpResponse) {
            $this->synopsis("An http response was created and will be returned.");
        } else {
            $this->synopsis("No http response was created. This will lead to WHITE SCREEN!");
            $msg = "(Jin\Application\Application->handleRequest): WhITE SCREEN! With request: " . $request->uri;
            $msg .= " -- ip=" . $request->ip;
            $msg .= " -- get=" . ArrayToStringTool::toInlinePhpArray($request->get) . ";";
            $msg .= " post=" . ArrayToStringTool::toInlinePhpArray($request->post) . ";";
            $msg .= " files=" . ArrayToStringTool::toInlinePhpArray($request->files) . ";";
            $msg .= " cookie=" . ArrayToStringTool::toInlinePhpArray($request->cookie);
            Access::log()->fatal($msg);
            $response = new HttpResponse(); // WHITE SCREEN!!!
        }
        return $response;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @info Sends a log message on the app_synopsis channel.
     * See more info in this class description (Logging section)
     *
     * @param $msg
     * @param string $method
     */
    private function synopsis($msg, $method = "handleRequest")
    {
        $this->logger->log("(Jin\Application\Application->$method): " . $msg, "app_synopsis");
    }


    /**
     * @info Tries to return an http response using the given $routerResult (which is configured to use the page mechanism).
     * If it fails, it throws a JinBadPageException error.
     *
     * @param RouterResult $routerResult
     * @param RouterInterface $router
     * @return HttpResponse
     * @throws JinBadPageException
     */
    private function handlePage(RouterResult $routerResult, RouterInterface $router)
    {
        $html = Access::templateEngine()->render($routerResult->page, $routerResult->vars);
        if (false !== $html) {
            return new HttpResponse($html);
        }
        throw new JinBadPageException("Invalid page parameters, with page: {$routerResult->page}. Check your routes configuration (config/routes.yml)");
    }


    /**
     * @info Tries to return an http response using the given $routerResult (which is configured to use the controller mechanism).
     * If it fails, it throws an exception (JinBadControllerException or \ReflectionException).
     *
     * @param RouterResult $routerResult
     * @param RouterInterface $router
     * @return HttpResponse
     * @throws JinBadControllerException
     * @throws \ReflectionException
     */
    private function handleController(RouterResult $routerResult, RouterInterface $router, HttpRequest $request)
    {
        $controller = $routerResult->controller;

        $invalidController = false;
        if (is_string($controller)) {
            $p = explode('->', $controller);
            if (2 === count($p)) {
                $p[0] = new $p[0];
                $callable = $p;

            } else {
                $invalidController = true;
            }
        } elseif (is_array($controller) && array_key_exists("instance", $controller)) {
            $callable = $controller['instance'];
        } else {
            $invalidController = true;
        }


        if (false === $invalidController && is_callable($callable)) {

            //--------------------------------------------
            // INJECTING ROUTE VARS INTO THE CHOSEN CONTROLLER
            //--------------------------------------------
            $routeVars = $routerResult->vars;
            try {
                $method = new \ReflectionMethod($callable[0], $callable[1]);
            } catch (\ReflectionException $e) {
                $invalidController = true;
                goto invalid;
            }
            $parameters = $method->getParameters();

            $args = [];
            foreach ($parameters as $parameter) {
                $name = $parameter->name;
                $type = $parameter->getType();
                if (null !== $type) {
                    $typeName = $type->getName();
                    if ('Jin\Http\HttpRequest' === $typeName) {
                        $args[] = $request;
                        continue;
                    } elseif ('Jin\Component\Routing\Router\RouterResult' === $typeName) {
                        $args[] = $routerResult;
                        continue;
                    }
                }
                if (array_key_exists($name, $routeVars)) {
                    $args[] = $routeVars[$name];
                } else {
                    if ($parameter->isOptional() || $parameter->isDefaultValueAvailable()) {
                        $args[] = $parameter->getDefaultValue();
                    } else {
                        $sCallable = DebugTool::toString($callable);
                        throw new JinBadControllerException("Argument \"$name\" of controller $sCallable is required but was not found in the route variables.");
                    }
                }
            }

            $response = call_user_func_array($callable, $args);
            if ($response instanceof HttpResponse) {
                return $response;
            } else {
                $sCallable = DebugTool::toString($controller);
                throw new JinBadControllerException("Controller did not return a Jin\Http\HttpResponse. Controller: $sCallable, Route: {$routerResult->route}");
            }


        } else {
            $invalidController = true;
        }


        invalid:
        if (true === $invalidController) {
            $sCallable = DebugTool::toString($controller);
            throw new JinBadControllerException("Invalid controller, a callable was expected, you gave: $sCallable. Check your routes configuration (config/routes.yml) for route {$routerResult->route}");
        }
    }

    /**
     * @info Tries to return an http response from the given exception (i.e. trying to recover from the exception).
     * Returns null if it can't.
     *
     *
     * @param \Exception $e
     * @param array $components
     * @return HttpResponse|mixed|null
     */
    private function handleException(\Exception $e, array $components)
    {
        $response = null;
        $exceptionComponents = $components['exception'] ?? [];

        foreach ($exceptionComponents as $comp) {
            $callable = $comp['instance'];
            $ret = call_user_func($callable, $e);

            if ($ret instanceof HttpResponse) {
                $response = $ret;
                break;
            }
        }

        return $response;
    }
}