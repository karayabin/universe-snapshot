<?php


namespace Ling\Light\Helper;


use Ling\CheapLogger\CheapLogger;
use Ling\Light\Controller\RouteAwareControllerInterface;
use Ling\Light\Core\Light;
use Ling\Light\Core\LightAwareInterface;
use Ling\Light\Exception\LightException;
use Ling\Light\Http\HttpResponse;
use Ling\Light\Http\HttpResponseInterface;

/**
 * The ControllerHelper class.
 */
class ControllerHelper
{


    /**
     * Executes the given controller and returns the appropriate response.
     *
     * Note: this method is used by the Core/Light instance, and has been externalized so that plugins
     * can call controllers by themselves, using the same technique as the Core/Light instance.
     *
     * Note: at this point it's assumed that the route has matched already.
     *
     * Note: although external plugins can use this method, the matched route can't be changed.
     * In other words, the controllers called by the plugin using this method can use the parameters
     * of the matching route in its arguments.
     *
     *
     *
     * @param $controller
     * @param Light $light
     * @return HttpResponseInterface
     * @throws LightException
     * @throws \ReflectionException
     */
    public static function executeController($controller, Light $light): HttpResponseInterface
    {

        $route = $light->getMatchingRoute();

        //--------------------------------------------
        // NOW RESOLVING THE CONTROLLER
        //--------------------------------------------
        $controller = ControllerHelper::resolveController($controller, $light);


        //--------------------------------------------
        // CALLING THE CONTROLLER
        //--------------------------------------------
        if (is_callable($controller)) {

            // we need to inject variables in the controller
            $controllerArgs = ControllerHelper::getControllerArgs($controller, $light);
            $response = call_user_func_array($controller, $controllerArgs);
            if (is_string($response)) {
                $response = new HttpResponse($response);
            }
            return $response;
        } else {
            $routeName = $route['name'];
            $type = gettype($controller);
            throw new LightException("The given controller is not a callable for route $routeName, $type given.");
        }
    }


    /**
     * Returns a callable controller from the given controller, or null if no callable
     * controller can be extracted out of the given value.
     *
     * Note: at this point it's assumed that a route has matched already.
     *
     * Note: This is the method used by the Core/Light instance to create its controllers,
     * and so it contains all the string transformation logic used by the Core/Light.
     * This method has been externalized so that other plugins can execute controllers
     * the same way the Core/Light instance does.
     *
     *
     *
     *
     * @param $controller
     * @param Light $light
     * The matching route.
     * @return callable|null
     * @throws \Exception
     */
    public static function resolveController($controller, Light $light): ?callable
    {

        //--------------------------------------------
        // NOW RESOLVING THE CONTROLLER
        //--------------------------------------------
        $instance = null;

        // if not a callable yet, we want to turn it into a callable
        if (false === is_callable($controller)) {
            if (is_string($controller)) {
                /**
                 * We want to allow the following notations:
                 *
                 * - for non static method: MyVendor\Controller\MyController->myMethod
                 *
                 *
                 */
                $p = explode('->', $controller);
                if (2 === count($p)) {
                    $class = $p[0];
                    $method = $p[1];
                    $instance = new $class;
                    $controller = [$instance, $method];
                }

            }
        }


        //--------------------------------------------
        // INJECT THINGS IN THE CONTROLLERS
        //--------------------------------------------
        if (null !== $instance) {
            if ($instance instanceof LightAwareInterface) {
                $instance->setLight($light);
            }

            if ($instance instanceof RouteAwareControllerInterface) {
                $instance->setRoute($light->getMatchingRoute());
            }
        }

        return $controller;
    }


    /**
     * Returns the controller arguments for the given controller and light instance.
     *
     * Note: at this point it's assumed that a route has matched already.
     *
     *
     * Basically, the arguments are the variables defined in the route.vars,
     * or if not found, the default value of the argument if any.
     *
     * The special hint types for the Light instance and the HttpRequestInterface can be used
     * as an alternative to inject the light instance and the http request instance respectively.
     *
     *
     *
     * Note: this is the method used by the Core/Light instance to prepare arguments for a given controller.
     * It has been externalized so that other plugins can call their controllers the same way the Core/Light instance
     * does (for app consistency sake).
     *
     *
     *
     * @param callable $controller
     * @param Light $light
     * @return array
     * @throws LightException
     * @throws \ReflectionException
     */
    public static function getControllerArgs(callable $controller, Light $light)
    {
        $controllerArgs = [];
        $route = $light->getMatchingRoute();
        $routeUrlParams = $route['url_params'];
        $httpRequest = $light->getHttpRequest();
        $requestArgs = $httpRequest->getGet();
        $controllerArgsInfo = ControllerHelper::getControllerArgsInfo($controller);
        foreach ($controllerArgsInfo as $argName => $info) {


            list($hasDefaultValue, $defaultValue, $hintType) = $info;
            if (array_key_exists($argName, $routeUrlParams)) {
                $controllerArgs[] = $routeUrlParams[$argName];
            } elseif (array_key_exists($argName, $requestArgs)) {
                $controllerArgs[] = $requestArgs[$argName];
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
                    "Ling\Light\Http\HttpResponse",
                    "Ling\Light\ServiceContainer\LightServiceContainerInterface",
                ];
                if (in_array($hintType, $specialTypes, true)) {
                    if ("Ling\Light\Core\Light" === $hintType) {
                        $controllerArgs[] = $light;
                    } elseif ("Ling\Light\Http\HttpRequestInterface" === $hintType) {
                        $controllerArgs[] = $httpRequest;
                    } elseif ("Ling\Light\ServiceContainer\LightServiceContainerInterface" === $hintType) {
                        $controllerArgs[] = $light->getContainer();
                    } elseif ("Ling\Light\Http\HttpResponse" === $hintType) {
                        $controllerArgs[] = new HttpResponse();
                    }
                } else {

                    if ('_route' === $argName) {
                        $controllerArgs[] = $route;
                    } else {
                        $routeName = $route['name'];
                        throw new LightException("The controller for route $routeName defined a mandatory argument $argName, but no value was provided by the route for this argument.");
                    }
                }
            }


        }
        return $controllerArgs;
    }

    /**
     * Returns an array of controller args corresponding to the given controller.
     *
     * The controller args is an array of parameterName => item,
     * each item having the following structure:
     *      - 0: hasDefaultValue, bool. Whether the argument has a default value (i.e. if there is an equal symbol in the parameter definition).
     *      - 1: defaultValue, mixed=null. If hasDefaultValue is true, the actual default value for this parameter.
     *      - 2: hint: mixed=null. The hint type if any (bool, string, int, an object, ...)
     *
     * @param callable $controller
     * @return array
     * @throws \ReflectionException
     */
    public static function getControllerArgsInfo(callable $controller)
    {

        if ($controller instanceof \Closure) {
            $r = new \ReflectionFunction($controller);
        } elseif (is_array($controller)) {
            if (is_object($controller[0])) {
                $r = new \ReflectionMethod($controller[0], $controller[1]);
            }
        }

        $ret = [];
        // function
        $params = $r->getParameters();
        foreach ($params as $param) {


            $hasDefaultValue = $param->isDefaultValueAvailable();
            $defaultValue = null;
            if (true === $hasDefaultValue) {
                $defaultValue = $param->getDefaultValue();
            }

            $type = null;
            if (true === $param->hasType()) {
                $type = $param->getType()->getName();
            }

            $ret[$param->getName()] = [
                $hasDefaultValue,
                $defaultValue,
                $type,
            ];
        }
        return $ret;
    }
}