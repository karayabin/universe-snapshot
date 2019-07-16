<?php


namespace Ling\Light\Core;


use Ling\Light\Exception\LightException;
use Ling\Light\Helper\ControllerHelper;
use Ling\Light\Http\HttpRequest;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponse;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light\Router\LightRouter;
use Ling\Light\ServiceContainer\LightDummyServiceContainer;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The Light class.
 *
 *
 * The Light class has a **run** method, which handles the web application.
 * Basically, you just call the **run** method, and web pages will automatically be printed on the screen for you.
 * But of course, you need to configure the Light instance before you can see anything.
 *
 * There are two main concepts to grasp when working with the Light instance:
 *
 * - routes
 * - error handlers
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
 * Error handlers
 * ----------------
 * Often, especially during the development phase, things go wrong: a route doesn't match, or a controller fails because
 * some parameters are missing, etc...
 *
 * Whenever a failure happens, an exception is thrown.
 * The Light instance intercepts that and ask whether an error handler can handle this error (which usually has an error type associated with it).
 *
 * Note: the error handlers are registered by you (or some plugins you've installed).
 *
 * If an error handler can handle the error, it will. Usually, it will either display a pretty error message,
 * or redirect to a default page.
 *
 * If no error handlers was able to handle the error, then the Light instance has a fallback mechanism for that:
 * it will display a 500 internal server error.
 * And if you set the debug mode=true, it will print a debug page showing the exception trace instead.
 *
 *
 * Those concepts are the fundamental ideas behind the Light instance.
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
     * @var LightServiceContainerInterface|null
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
     * @param array $requirements
     * An array of requirements to test against the http request.
     * While the pattern argument is tested against the http request's uri path,
     * the requirements argument is used to test the other properties of the http request.
     *
     * If one requirement fails, the route will not match.
     * Third party plugins can be creative and enhance the requirements syntax/feature as they want.
     *
     *
     * @param array $urlParams
     * An array of key/value pairs representing the potential variables to inject into the controller callback.
     *
     */
    public function registerRoute(string $pattern, $controller, string $name = null, array $requirements = [], array $urlParams = [])
    {

        $routeName = (null !== $name) ? $name : $pattern;

        $this->routes[$routeName] = [
            'name' => $routeName,
            'pattern' => $pattern,
            'controller' => $controller,
            'requirements' => $requirements,
            'url_params' => $urlParams,
        ];
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
     * Registers a error handler callback.
     *
     * The error handler callback is a callback with the following signature:
     *
     * ```txt
     *      function errorHandler ( $errorType, \Exception $e, &$response = null )
     * ```
     *
     * The error handler callback should handle the given exception if necessary (i.e. if it can
     * handle this errorType} and set the response to either a string or an HttpResponseInterface.
     *
     * Note: multiple error handlers will be in concurrence for handling a given error, and the first
     * handler to return a response will be used (i.e. subsequent handlers will be discarded).
     *
     * Note: the errorType might be null.
     *
     *
     *
     *
     *
     * @param callable $errorHandler
     */
    public function registerErrorHandler(callable $errorHandler)
    {
        $this->errorHandlers[] = $errorHandler;
    }

    /**
     * Runs the Light web application.
     */
    public function run()
    {

        $httpRequest = HttpRequest::createFromEnv();
        $response = null;


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
                            // todo: dynamic routers, see RoutineRouter...
                            $router = $this->container->get("router");
                        }
                    }

                    if (null === $router) {
                        $router = new LightRouter();
                    }


                    $route = $router->match($httpRequest, $this->routes);
                    if (false !== $route) {


                        //--------------------------------------------
                        // NOW RESOLVING THE CONTROLLER
                        //--------------------------------------------
                        $controller = $route['controller'];


                        //--------------------------------------------
                        // CALLING THE CONTROLLER
                        //--------------------------------------------
                        if (is_callable($controller)) {


                            // we need to inject variables in the controller
                            $controllerArgs = $this->getControllerArgs($controller, $route, $httpRequest);
                            $response = call_user_func_array($controller, $controllerArgs);


                        } else {
                            $routeName = $route['name'];
                            $type = gettype($controller);
                            throw new LightException("The given controller is not a callable for route $routeName, $type given.");
                        }
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
                if (null === $response) {
                    call_user_func_array($errorHandler, [$lightErrorCode, $e, &$response]);
                    if (null !== $response) {
                        $washHandled = true;
                        break;
                    }
                }
            }


            if (false === $washHandled) {
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
            if ($response instanceof HttpResponseInterface) {
                $response->send();
            }
        }


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

        $handled = false;
        if (null !== $this->container) {
            if ($this->container->has("prettyDebugPage")) {
                $handled = true;
                $response = $this->container->get("prettyDebugPage")->renderPage($e);
            }
        }


        if (false === $handled) {
            ob_start();
            echo '<h1>An error occurred -- debug mode</h1>';
            echo nl2br((string)$e);
            $response = ob_get_clean();
        }
        return $response;
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


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the controller arguments to use when invoking the controller.
     *
     * Basically, the arguments are the variables defined in the route.vars,
     * or if not found, the default value of the argument if any.
     *
     * The special hint types for the Light instance and the HttpRequestInterface can be used
     * as an alternative to inject the light instance and the http request instance respectively.
     *
     *
     *
     *
     * @param $controller
     * @param array $route
     * @param HttpRequestInterface $httpRequest
     * @return array
     * @throws LightException
     * @throws \ReflectionException
     */
    private function getControllerArgs($controller, array $route, HttpRequestInterface $httpRequest)
    {
        $controllerArgs = [];
        $routeUrlParams = $route['url_params'];
        $controllerArgsInfo = ControllerHelper::getControllerArgsInfo($controller);
        foreach ($controllerArgsInfo as $argName => $info) {
            list($hasDefaultValue, $defaultValue, $hintType) = $info;
            if (array_key_exists($argName, $routeUrlParams)) {
                $controllerArgs[] = $routeUrlParams[$argName];
            } elseif (true === $hasDefaultValue) {
                $controllerArgs[] = $defaultValue;
            } else {

                /**
                 * Special types
                 * ----------
                 * The following types can be injected directly by the light instance, without consulting the route system.
                 * The user injects them by prefixing the right hint type to its argument
                 *
                 * - Ling\Light\Core\Light
                 * - Ling\Light\Http\HttpRequestInterface
                 * - Ling\Light\ServiceContainer\LightServiceContainerInterface
                 *
                 *
                 *
                 */
                $specialTypes = [
                    "Ling\Light\Core\Light",
                    "Ling\Light\Http\HttpRequestInterface",
                    "Ling\Light\ServiceContainer\LightServiceContainerInterface",
                ];
                if (in_array($hintType, $specialTypes, true)) {
                    if ("Ling\Light\Core\Light" === $hintType) {
                        $controllerArgs[] = $this;
                    } elseif ("Ling\Light\Http\HttpRequestInterface" === $hintType) {
                        $controllerArgs[] = $httpRequest;
                    } elseif ("Ling\Light\ServiceContainer\LightServiceContainerInterface" === $hintType) {
                        $controllerArgs[] = $this->getContainer();
                    }
                } else {
                    $routeName = $route['name'];
                    throw new LightException("The controller for route $routeName defined a mandatory argument $argName, but no value was provided by the route for this argument.");
                }
            }
        }
        return $controllerArgs;
    }
}