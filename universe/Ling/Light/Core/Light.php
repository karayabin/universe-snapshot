<?php


namespace Ling\Light\Core;


use Ling\Light\Events\LightEvent;
use Ling\Light\Exception\LightException;
use Ling\Light\Helper\ControllerHelper;
use Ling\Light\Http\HttpRequest;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponse;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light\Http\VoidHttpRequest;
use Ling\Light\Router\LightRouter;
use Ling\Light\ServiceContainer\LightDummyServiceContainer;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Events\Service\LightEventsService;
use Ling\Light_Logger\Service\LightLoggerService;

/**
 * The Light class.
 *
 *
 * The Light class has a **run** method, which handles the web application.
 * Basically, you just call the **run** method, and web pages will automatically be printed on the screen for you.
 * But of course, you need to configure the Light instance before you can see anything.
 *
 * The following concepts are important to grasp when working with the Light instance:
 *
 * - routes
 * - service container
 *
 *
 * Routes
 * -----------
 * A route binds the http request to a controller.
 * So in other words, when the web user types something in the url bar of her browser (for instance http://your_site.com/home),
 * then the route does the job of deciding which controller should handle this request.
 *
 * A controller is just a function that returns a response (generally an html web page).
 *
 *
 *
 * The service container
 * ----------------
 * The service container is a very important object in a Light application.
 *
 * The philosophy of Light is to start your application from scratch, and build it progressively by adding the blocks
 * of functionality you need.
 *
 * The service container helps implementing this idea: it's a container where each plugin can provide its own services.
 *
 * And so when you install a plugin, it automatically adds its services to the services container, thus bringing to
 * the application the functionality you need.
 *
 *
 * The service container is the central piece in a Light application.
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 */
class Light
{


    /**
     * This property holds the applicationDir for this instance.
     * This is the root directory containing the application.
     *
     * @var string | null
     */
    protected ?string $applicationDir;

    /**
     * This property holds the routes for this instance.
     * @var array
     */
    protected array $routes;

    /**
     * This property holds the debug for this instance.
     * @var bool = false
     */
    protected bool $debug;

    /**
     * This property holds the service container for this instance.
     * @var LightServiceContainerInterface|null
     */
    protected ?LightServiceContainerInterface $container;


    /**
     * This property holds the settings for this instance.
     * @var array
     */
    protected array $settings;

    /**
     * This property holds the httpRequest for this instance.
     *
     * This variable is only available after the run method or initialize method is called.
     *
     * @var HttpRequestInterface | null
     */
    protected ?HttpRequestInterface $httpRequest;


    /**
     * This property holds the matchingRoute for this instance.
     * When not available, it's null.
     * When available, it's either the matching route array or false (if no route matches).
     *
     * The matching route is basically the route leading to the controller that actually returns the http response.
     * This is generally a controller found by the router, but in some cases it could be something else.
     * For instance, in the case of a not found match, we could catch the "route not found" exception and return
     * our own response using another 404 controller (for instance). In that case, the 404 controller is the one
     * actually rendering the response, and therefore the matching route could be set to the route leading to
     * that 404 controller.
     *
     * Note that this idea about the matching route is experimental. It might change in the future.
     * For now we go with it.
     *
     *
     *
     *
     *
     *
     * @var array|false|null
     */
    protected mixed $matchingRoute;


    /**
     * This property holds the isInitialized for this instance.
     * @var bool=false
     */
    private bool $isInitialized;


    /**
     * Builds the Light instance.
     */
    public function __construct()
    {
        /**
         * By default, I assume that the Light instance is created from $appDir/www/index.php
         * If that's not the case, you should set the applicationDir just after instantiating this class.
         */
        $appDir = $_SERVER['DOCUMENT_ROOT'] ?? null;
        if ($appDir) {
            $appDir = dirname($appDir);
        }
        $this->applicationDir = $appDir;
        $this->debug = false;
        $this->routes = [];
        $this->container = null;
        $this->httpRequest = null;
        $this->matchingRoute = null;
        $this->settings = [];
        $this->isInitialized = false;
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
     * Returns the debug of this instance.
     *
     * @return bool
     */
    public function isDebug(): bool
    {
        return $this->debug;
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
     * Returns the services container of this instance.
     * If no instance was set, it returns a dummy container.
     *
     * @return LightServiceContainerInterface
     */
    public function getContainer(): LightServiceContainerInterface
    {
        if (null === $this->container) {
            return new LightDummyServiceContainer();
        }
        return $this->container;
    }


    /**
     * Returns the routes of this instance.
     * It's an array of route name => route.
     *
     * A route is an array which structure is defined in @page(the route page).
     *
     *
     * @return array
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }

    /**
     * Returns the httpRequest of this instance.
     *
     * @return HttpRequestInterface
     */
    public function getHttpRequest(): HttpRequestInterface
    {
        return $this->httpRequest;
    }

    /**
     * Sets the httpRequest.
     * This was created for debugging purpose only, you should generally not use this method.
     *
     * @param HttpRequestInterface $httpRequest
     */
    public function setHttpRequest(HttpRequestInterface $httpRequest)
    {
        $this->httpRequest = $httpRequest;
    }


    /**
     * Returns the matching route array, or false if no route matched.
     * This method can only be called after the route matching test has been executed.
     *
     * If this method is called before the route matching test, an exception will be thrown.
     *
     *
     * @return array|false
     * @throws \Exception
     */
    public function getMatchingRoute()
    {
        if (null !== $this->matchingRoute) {
            return $this->matchingRoute;
        }
        throw new LightException("The matching route is not available yet (the matching route test hasn't been executed yet).");
    }

    /**
     * Sets the matchingRoute.
     * You shouldn't use this method unless you know what you are doing.
     * This is experimental.
     *
     * It basically allows for internal hacks.
     * So for those hacks are:
     *
     * - ControllerHelper::executeControllerByRouteName
     *      We basically created this method so that executeControllerByRouteName could specify urlParams if he wanted.
     *      That's all. Otherwise this method shouldn't be used.
     *
     *
     *
     * @param array $matchingRoute
     */
    public function setMatchingRoute(array $matchingRoute)
    {
        $this->matchingRoute = $matchingRoute;
    }


    /**
     * Registers a route item, as defined in @page(the route page).
     *
     *
     *
     * @param string $pattern
     * A string to match against the uri.
     * By default, it has to match the uri exactly in order for the route to match.
     * However, third-party plugins can add their own features to the syntax (for instance, a plugin could allow the
     * pattern to use dynamic routes which would create variables).
     *
     *
     * @param $controller
     *
     * The controller is a php callback by default.
     * However, plugins can use the controller argument as they want (for instance it could be a string representing
     * a Controller object to invoke).
     *
     * Note: in the end though (after being interpreted by third party plugins), the controller will resolve into a callback form.
     *
     * @param string|null $name
     * If the route name is not defined, it will default to the given pattern.
     * Note: route names should be unique.
     *
     *
     * @param array $route
     * An array containing any other route properties that you want to include.
     * If not overwritten, the default values are:
     * - requirements: []
     * - url_params: []
     * - host: null
     * - is_secure_protocol: null
     * - is_ajax: false
     *
     * See the @page(route page) for more details.
     *
     *
     */
    public function registerRoute(string $pattern, $controller, string $name = null, array $route = [])
    {


        $routeName = (null !== $name) ? $name : $pattern;

        unset($route['pattern']);
        unset($route['controller']);


        $this->routes[$routeName] = array_merge([
            'name' => $routeName,
            'pattern' => $pattern,
            'controller' => $controller,
            'requirements' => [],
            'url_params' => [],
            'host' => null,
            "is_secure_protocol" => null,
            "is_ajax" => false,
        ], $route);
    }


    /**
     * An alias for the registerRoute method.
     *
     * @param string $pattern
     * @param $controller
     * @param string|null $name
     * @param array $route
     */
    public function get(string $pattern, $controller, string $name = null, array $route = [])
    {
        $this->registerRoute($pattern, $controller, $name, $route);
    }


    /**
     * Triggers the initialize phase if set in the service container.
     *
     * This method was created for debugging purposes only.
     *
     * @param HttpRequestInterface|null $httpRequest
     * @throws \Exception
     */
    public function initialize(HttpRequestInterface $httpRequest = null)
    {
        if (null === $httpRequest) {
            if ('cli' === php_sapi_name()) {
                $httpRequest = new VoidHttpRequest();
            } else {
                $httpRequest = HttpRequest::createFromEnv();
            }
        }
        $this->httpRequest = $httpRequest;

        $container = $this->getContainer();
        $container->setLight($this);


        if ($container->has("events")) {
            /**
             * @var $events LightEventsService
             */
            $events = $container->get('events');
            /**
             * See the [events page](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md) for more details.
             */
            $data = LightEvent::createByContainer($container);


            $events->dispatch('Ling.Light.initialize_1', $data);
//            $events->dispatch('Light.initialize_2', $data);
//            $events->dispatch('Light.initialize_3', $data);
        }
    }


    /**
     * Runs the Light web application.
     */
    public function run()
    {
        $container = $this->getContainer();
        $container->setLight($this);

        try {

            $response = null;
            $route = null;
            $events = null;


            //--------------------------------------------
            // INITIALIZE PHASE
            //--------------------------------------------
            if (false === $this->isInitialized) {
                $httpRequest = HttpRequest::createFromEnv();
                $this->httpRequest = $httpRequest;
                $this->initialize($httpRequest);
            }
            $httpRequest = $this->httpRequest;


            if ($container->has("events")) {

                /**
                 * @var $events LightEventsService
                 */
                $events = $container->get('events');
            }


            //--------------------------------------------
            // PRE-ROUTE PHASE
            //--------------------------------------------
            if ($container->has("preroute_hub")) {
                $prerouteHub = $container->get("preroute_hub");
                $prerouteHub->run($this, $httpRequest, $response);
            }


            if (null === $response) {

                if (null !== $this->applicationDir) {
                    if (is_dir($this->applicationDir)) {


                        // route auto-registering plugins here...


                        //--------------------------------------------
                        // SEARCHING A MATCHING ROUTE
                        //--------------------------------------------
                        $router = null;

                        if ($container->has("router")) {
                            // todo: dynamic routers, see RoutineRouter...
                            $router = $this->container->get("router");
                        }


                        if (null === $router) {
                            $router = new LightRouter();
                        }


                        $route = $router->match($httpRequest, $this->routes);
                        $this->matchingRoute = $route;


                        if (false !== $route) {

                            if (null !== $events) {
                                $event = LightEvent::createByContainer($this->container);
                                $event->setVar("route", $route);
                                $events->dispatch('Ling.Light.on_route_found', $event);
                            }


                            $response = ControllerHelper::executeController($route['controller'], $this);
                        } else {
                            $url = $this->httpRequest->getUri();
                            throw LightException::create("No route matches for url $url.", "404");
                        }


                    } else {
                        throw new LightException("Application dir does not exist: $this->applicationDir.");
                    }
                } else {
                    throw new LightException("Application dir not set.");
                }

            }

        } catch (\Exception $e) {

            $wasHandled = false;

            if (null !== $events) {
                $data = LightEvent::createByContainer($container);
                $data->setVar('exception', $e);

                $events->dispatch("Ling.Light.on_exception_caught", $data);


                // some plugins can change the exception
                $e = $data->getVar('exception');

                $httpResponse = $data->getVar('httpResponse');
                if ($httpResponse instanceof HttpResponseInterface) {
                    $wasHandled = true;
                    $response = $httpResponse;
                }
            }


            if (false === $wasHandled) {


                if (null !== $events) {
                    /**
                     * This event is just used for logging (i.e. no fallback response possible...).
                     */
                    $data = LightEvent::createByContainer($container);
                    $data->setVar('exception', $e);
                    $events->dispatch("Ling.Light.on_unhandled_exception_caught", $data);
                }


                if (false === $this->debug) {
                    $response = $this->renderInternalServerErrorPage();

                } else {
                    $response = $this->renderDebugPage($e);
                }
            }

        }


        //--------------------------------------------
        // DISPLAYING THE RESPONSE IF ANY
        //--------------------------------------------
        if (null !== $response) {
            if (is_string($response)) {
                $response = new HttpResponse($response);
            }


            //--------------------------------------------
            // END ROUTINE
            //--------------------------------------------
            if (null !== $events) {
                if (null === $route || false === $route) {
                    $route = false;
                }
                $data = LightEvent::createByContainer($container);
                $data->setVar('route', $route);
                $events->dispatch("Ling.Light.end_routine", $data);
            }


            if ($response instanceof HttpResponseInterface) {
                $response->send();
            }
        }


    }



    /**
     *
     * Sends a log message to the logger service's error channel.
     *
     * See the @page(light philosophy page) for more details.
     *
     * @param $msg
     * @throws \Exception
     */
    public function logError($msg)
    {
        /**
         * @var $_lo LightLoggerService
         */
        $_lo = $this->getContainer()->get("logger");
        $_lo->error($msg);
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Renders (returns the html code of) the debug page.
     * You should override this method if you need a more sophisticated/fancy display.
     *
     * @param \Exception $e
     * @return string|HttpResponseInterface
     * @throws \Exception
     */
    protected function renderDebugPage(\Exception $e)
    {
        $response = null;
        $responseStatus = 200;

        if ($e instanceof LightException) {
            if ("404" === $e->getLightErrorCode()) {
                $responseStatus = 404;
            }
        }


        if (null !== $this->container) {
            if ($this->container->has("pretty_error")) {
                $response = $this->container->get("pretty_error")->renderPage($e);
            }
        }

        if (null === $response) {
            ob_start();
            echo '<h1>An error occurred -- debug mode</h1>';
            echo nl2br((string)$e);
            $response = ob_get_clean();
        }
        return new HttpResponse($response, $responseStatus);
    }


    /**
     * Displays the error page when an uncaught exception occurred and the debug mode is false:
     * it should display an internal server error page with code 500.
     *
     * You should override this method if you want a more fancy display.
     *
     * @return string|HttpResponseInterface
     * @overrideMe
     */
    protected function renderInternalServerErrorPage()
    {
        $response = new HttpResponse("
            <h1>Internal server error</h1>
            <p>The server encountered an internal error misconfiguration and was unable to complete your request.</p>", 500);
        return $response;
    }
}