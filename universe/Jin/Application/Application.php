<?php


namespace Jin\Application;


use Bat\DebugTool;
use Bat\FileSystemTool;
use Bat\StringTool;
use Jin\ApplicationEnvironment\ApplicationEnvironment;
use Jin\Exception\BadConfiguration\JinNoRouteMatchesException;
use Jin\Exception\JinBadConfigurationException;
use Jin\Http\HttpRequest;
use Jin\Http\HttpResponse;
use Jin\Log\Logger;
use Jin\Registry\Access;
use Jin\Routing\Router\RouterInterface;
use Jin\Routing\Router\RouterResult;

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


    public function __construct()
    {
    }

    public function init($appDir, $profile)
    {

        // initialization
        $this->logger = Access::log();
        $this->appDir = $appDir;
        $this->profile = $profile;


        $this->logger->log("Initializing application, with profile=$profile", "app_init");

        // logging errors from application environment if any
        $initErrors = ApplicationEnvironment::getErrors();
        foreach ($initErrors as $msg) {
            $this->logger->fatal($msg);
        }


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

                            // controller
                            if ($routerResult->controller) {

                            } // page
                            elseif ($routerResult->page) {
                                $response = $this->handlePage($routerResult, $router);
                                break;
                            }
                            break;
                        }


                    } else {
                        Access::log()->error(
                            sprintf("(Jin\Application\Application->handleRequest): invalid router instance: a router instance must be of type Jin\Routing\Router\RouterInterface, %s given",
                                DebugTool::toString($router)
                            )
                        );
                    }
                }

                if (false === $routeFound) {
                    $ex = new JinNoRouteMatchesException();
                    $ex->setRequest($request);
                    throw $ex;
                }

//            az($components);

            }


        } catch (\Exception $e) {
            /**
             * If an exception reaches this block, it should be displayed as a big error message in the face of the user.
             * That's because it's probably a problem that should have been fixed by the developer.
             *
             * Exceptions should be handled by components (or children) themselves as much as possible.
             * This block is the very last defense against the white screen.
             *
             * If no response is set here, this is the WHITE SCREEN....
             */
            $response = $this->handleException($e);
            if (false === ($response instanceof HttpResponse)) {
                // do some logging before dying...
                /**
                 * @todo: errorToPage component, which maps an exception to a page to include.
                 * Configuration can be set on a per exception name/basis.
                 * Variables can be added to the template (from the configuration, like for instance the time for
                 * a maintenance page: we will be in $time).
                 */
            }

        }

        //--------------------------------------------
        // RESPONSE HANDLING
        //--------------------------------------------
        if (false === ($response instanceof HttpResponse)) {
            $response = new HttpResponse(); // WHITE SCREEN!!!
        }


        return $response;
    }



    //--------------------------------------------
    //
    //--------------------------------------------

    private function synopsis($msg)
    {
        $this->logger->log("(Jin\Application\Application->handleRequest): " . $msg, "app_synopsis");
    }

    private function handlePage(RouterResult $routerResult, RouterInterface $router)
    {
        $msg = "Route found: {$routerResult->route}, by router " . get_class($router) . ", ";
        $page = $routerResult->page;
        $pagesDir = $this->appDir . "/pages";
        $pageFile = $pagesDir . "/" . $page;

        if (is_file($pageFile)) {
            if (FileSystemTool::existsUnder($pageFile, $pagesDir)) {

            }
        }
        $msg .= "using \"page\" mechanism with page=" . $routerResult->page;
        $msg .= "using \"page\" mechanism with invalid page: " . $routerResult->page . "(file not found)";
        $msg .= "using \"page\" mechanism with invalid page: " . $routerResult->page . "(corrupted directory)";
        $this->synopsis($msg);
        return new HttpResponse();
    }

    private function handleException(\Exception $e)
    {
        return new HttpResponse();
    }

    private function handleController(RouterResult $routerResult, RouterInterface $router)
    {
        az("controller not implemented");
        return new HttpResponse();
    }
}