<?php


namespace Jin\Application;


use Bat\DebugTool;
use Jin\ApplicationEnvironment\ApplicationEnvironment;
use Jin\Http\HttpRequest;
use Jin\Http\HttpResponse;
use Jin\Log\Logger;
use Jin\Registry\Access;
use Jin\Routing\Router\RouterInterface;

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
 *
 *
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
     */
    public function handleRequest(HttpRequest $request)
    {

        $response = null;

        $file = $this->appDir . "/config/http_request_lifecycle.yml";
        $dir = $this->appDir . "/config/http_request_lifecycle";
        $components = Access::configurationFileParser()->parseFileWithDir($file, $dir, true);


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
            $routingComponents = $components['routing'] ?? [];
            foreach ($routingComponents as $routingComponent) {
                $router = $routingComponent['instance'];
                if ($router instanceof RouterInterface) {
                    $routerResult = $router->match($request);
//                    az($routerResult);
                } else {
                    Access::log()->error(
                        sprintf("(Jin\Application\Application->handleRequest): invalid router instance: a router instance must be of type Jin\Routing\Router\RouterInterface, %s given",
                            DebugTool::toString($router)
                        )
                    );
                }
            }
//            az($components);

        }


        //--------------------------------------------
        // RESPONSE HANDLING
        //--------------------------------------------


        return $response;
    }


}