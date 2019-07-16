<?php


namespace Ling\Light\Helper;


use Ling\Light\Core\Light;
use Ling\Light\Http\HttpResponse;

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
}