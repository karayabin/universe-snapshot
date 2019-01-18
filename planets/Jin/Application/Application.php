<?php


namespace Jin\Application;


use Jin\ApplicationEnvironment\ApplicationEnvironment;
use Jin\Http\HttpRequest;
use Jin\Http\HttpResponse;
use Jin\Log\Logger;
use Jin\Registry\Access;

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
 * The following channels are available and can be activated/de-activated in the app.yml file:
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


    /**
     * @info This property holds whether this instance dispatches messages on the app_init channel.
     * @type bool=false
     */
    private $useLogAppInit;


    public function __construct()
    {
    }

    public function init($appDir, $profile)
    {

        // initialization
        $conf = Access::conf();
        $this->logger = Access::log();
        $this->appDir = $appDir;
        $this->profile = $profile;
        $this->useLogAppInit = $conf->get("app.logging.special_channels.app_init", false);


        $this->logAppInit("Initializing application, with profile=$profile");

        // logging errors from application environment if any
        $initErrors = ApplicationEnvironment::getErrors();
        foreach ($initErrors as $msg) {
            $this->logger->fatal($msg);
        }


        // creating services container
        $this->logAppInit("Creating service container");


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
        $components = Access::configurationFileParser()->parseFile($file, true);



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
        if ($response) {
            return $response;
        }


        //--------------------------------------------
        // ROUTING
        //--------------------------------------------








        $response = new HttpResponse();
        return $response;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    private function logAppInit($msg)
    {
        if (true === $this->useLogAppInit) {
            $this->logger->log($msg, "app_init");
        }
    }

}