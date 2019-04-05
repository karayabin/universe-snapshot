<?php


namespace Ling\Light\Core;


use Ling\Light\Exception\LightException;
use Ling\Light\Http\HttpRequest;
use Ling\Light\Http\HttpResponse;
use Ling\Light\Router\LightRouter;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The Light class.
 */
class Light
{


    /**
     * This property holds the applicationDir for this instance.
     * This is the root directory containing the application.
     *
     * @var string
     */
    protected $applicationDir;

    /**
     * This property holds the routes for this instance.
     * @var array
     */
    protected $routes;

    /**
     * This property holds the errorHandlers for this instance.
     * @var array
     */
    protected $errorHandlers;

    /**
     * This property holds the debug for this instance.
     * @var bool = false
     */
    protected $debug;

    /**
     * This property holds the service container for this instance.
     * @var LightServiceContainerInterface||null
     */
    protected $container;


    /**
     * This property holds the settings for this instance.
     * @var array
     */
    protected $settings;


    /**
     * Builds the Light instance.
     */
    public function __construct()
    {
        /**
         * By default, I assume that the Light instance is created from $appDir/www/index.php
         */
        $appDir = $_SERVER['DOCUMENT_ROOT'] ?? null;
        if ($appDir) {
            $appDir = dirname($appDir);
        }
        $this->applicationDir = $appDir;
        $this->debug = false;
        $this->routes = [];
        $this->errorHandlers = [];
        $this->container = null;
        $this->settings = [];
    }

    /**
     * Sets the debug.
     *
     * @param bool $debug
     */
    public function setDebug(bool $debug)
    {
        $this->debug = $debug;
    }

    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


    /**
     * Registers a route item for this Light instance.
     *
     * The route can be dynamic or static.
     * The viewCallback can be many things:
     *
     * - a php callback
     *
     *
     *
     * @param string $route
     * @param $viewCallback
     * @param array $options
     */
    public function registerRoute(string $route, $viewCallback, array $options = [])
    {
        $routeName = $options['routeName'] ?? $route;
        $this->routes[$routeName] = [
            'pattern' => $route,
            'viewCallback' => $viewCallback,
            'options' => $options,
        ];
    }


    /**
     * Runs the Light web application.
     */
    public function run()
    {

        $httpRequest = HttpRequest::createFromEnv();




        if (null !== $this->container) {
            if ($this->container->has("initializer")) {
                $initializer = $this->container->get("initializer");
                $initializer->initialize($this, $httpRequest);
            }
        }



        try {
            if (null !== $this->applicationDir) {
                if (is_dir($this->applicationDir)) {


                    // route auto-registering plugins here...


                    //--------------------------------------------
                    // SEARCHING A MATCHING ROUTE
                    //--------------------------------------------
                    $router = null;
                    if (null !== $this->container) {
                        if ($this->container->has("router")) {
                            $router = $this->container->get("router");
                        }
                    }

                    if (null === $router) {
                        $router = new LightRouter();
                    }


                    $result = $router->match($httpRequest, $this->routes);
                    if (false !== $result) {


                        //--------------------------------------------
                        // NOW INTERPRETING THE ROUTE
                        //--------------------------------------------


                        //--------------------------------------------
                        // RANDOM THOUGHTS
                        //--------------------------------------------
//                        // todo: encapsulate below in method
//                        // todo: NO, do all this by service: Light_Router, and settings in the service conf of
//                        // Light_Router, not in Light.
//                        // In other words, Light by itself only provides static level,
//                        // to add dynamic routes, we need the Light_Router plugin
//                        $this->settings['route_matching_algo'] = "static"; // default
//                        // static
//                        // apple (dynamic level one)
//                        // banana (dynamic level two...)
//                        // cherry...
//                        foreach ($this->routes as $routeName => $routeItem) {
//                            list($route, $viewCallback, $options) = $routeItem;
//                        }


                    } else {
                        throw new LightException("No route matches", "404");
                    }


                } else {
                    throw new LightException("Application dir does not exist: $this->applicationDir.");
                }
            } else {
                throw new LightException("Application dir not set.");
            }
        } catch (\Exception $e) {


            $lightErrorCode = null;
            if ($e instanceof LightException) {
                $lightErrorCode = $e->getLightErrorCode();
            }


            $washHandled = false;
            foreach ($this->errorHandlers as $errorHandler) {

            }


            if (false === $washHandled) {
                if (false === $this->debug) {
                    $this->showInternalServerErrorPage();

                } else {
                    $this->showDebugPage($e);
                }
            }
        }

    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Displays the debug page.
     * You should override this method if you need a more sophisticated/fancy display.
     *
     * @param \Exception $e
     * @overrideMe
     * @throws \Exception
     */
    protected function showDebugPage(\Exception $e)
    {

        $handled = false;
        if (null !== $this->container) {
            if ($this->container->has("prettyDebugPage")) {
                $handled = true;
                $this->container->get("prettyDebugPage")->print($e);
            }
        }


        if (false === $handled) {
            echo '<h1>An error occurred -- debug mode</h1>';
            echo nl2br((string)$e);
        }

    }


    /**
     * Displays the error page when an uncaught exception occurred and the debug mode is false:
     * it should display an internal server error page with code 500.
     *
     * You should override this method if you want a more fancy display.
     *
     * @overrideMe
     */
    protected function showInternalServerErrorPage()
    {
        $response = new HttpResponse("
            <h1>Internal server error</h1>
            <p>The server encountered an internal error misconfiguration and was unable to complete your request.</p>", 500);
        $response->send();
    }
}