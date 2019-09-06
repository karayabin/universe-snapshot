<?php


namespace Ling\Light\Helper;


use Ling\Bat\SmartCodeTool;
use Ling\Light\Core\Light;
use Ling\Light\Exception\LightException;
use Ling\Light\Http\HttpResponse;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The LightHelper class.
 */
class LightHelper
{

    /**
     * Register all the routes which patterns are given.
     *
     *
     * @param array $routePatterns
     * @param Light $light
     * @param null $controller
     * The controller to use. If null, a default controller is provided.
     */
    public static function createDummyRoutes(array $routePatterns, Light $light, $controller = null)
    {
        if (null === $controller) {
            $controller = function () {
                $response = new HttpResponse("Dummy page from <code>Ling\Light\Helper\LightHelper</code></p>");
                $response->send();
            };
            foreach ($routePatterns as $pattern) {
                $light->registerRoute($pattern, $controller);
            }
        }
    }


    /**
     * Executes a php method based on the notation described below, and returns the result.
     *
     *
     * This technique originally comes from the [ClassTool::executePhpMethod](https://github.com/lingtalfi/Bat/blob/master/ClassTool.md#executephpmethod-aka-smart-php-method-call).
     *
     * We've just added the possibility to call services by prefixing the service name with the @ symbol.
     *
     *
     * The given $method must have one of the following format (or else an exception will be thrown):
     *
     * - $class::$method
     * - $class::$method ( $args )
     *
     * - $class->$method
     * - $class->$method ( $args )
     *
     * - @$service->$method
     * - @$service->$method ( $args )
     *
     *
     * Note that the first two forms refer to a static method call, the next two forms refer to a method call on
     * an instance (instantiation is done by this method), and the last ones call a service's method.
     *
     *
     * With:
     *
     * - $class: the full class name (example: Ling\Bat)
     * - $method: the name of the method to execute
     * - $args: a list of arguments written with smartCode notation (see SmartCodeTool class for more details).
     *              Note: we can use regular php notation as it's a subset of the smartCode notation.
     * - $service: the name of the service to call
     *
     *
     * See the [examples here](https://github.com/lingtalfi/Bat/blob/master/ClassTool.md#executephpmethod-aka-smart-php-method-call)
     *
     *
     *
     *
     *
     *
     * @param string $expr
     * @param LightServiceContainerInterface $container
     * @return mixed
     * @throws \Exception
     */
    public static function executeMethod(string $expr, LightServiceContainerInterface $container)
    {

        if (preg_match('!
        (?<class>[@a-zA-Z0-9_\\\\]*)
        (?<sep>::|->)
        (?<method>[a-zA-Z0-9_]*)
        (?<args>\(.*\))?
        !x', $expr, $match)) {


            $class = $match['class'];
            $service = null;
            if ("@" == substr($class, 0, 1)) {
                $service = substr($class, 1);
            }
            $sep = $match['sep'];
            $method = $match['method'];
            $args = [];
            if (array_key_exists('args', $match)) {
                $args = SmartCodeTool::parse("[" . substr($match['args'], 1, -1) . ']');
            }

            $ret = null;
            if ('::' === $sep) {
                if (null === $service) {
//                $ret = $class::$method($args);
                    $ret = call_user_func_array([$class, $method], $args);
                } else {
                    $ret = call_user_func_array([$container->get($service), $method], $args);
                }
            } else {

                if (null === $service) {
                    $instance = new $class;
                } else {
                    $instance = $container->get($service);
                }
                $ret = call_user_func_array([$instance, $method], $args);
            }
            return $ret;
        }
        throw new LightException("Unrecognized method syntax: $expr.");
    }
}