<?php


namespace Ling\Light_ReverseRouter\Service;


use Ling\Bat\HttpTool;
use Ling\Bat\UriTool;
use Ling\Light\Events\LightEvent;
use Ling\Light_ReverseRouter\Exception\LightReverseRouterException;

/**
 * The LightReverseRouterService class.
 *
 * A reverser router is an object able to get the url out of a route and possibly some parameters.
 *
 * It allows you to abstract the uris of your pages.
 * In other words, if your application uses a reverse router, you can change the uris of your
 * page easily (because they aren't hardcoded in your application).
 *
 *
 *
 *
 * See more information about the route in @page(the route page).
 */
class LightReverseRouterService
{


    /**
     * This property holds the routes for this instance.
     * @var array
     */
    protected $routes;


    /**
     * Builds the ReverseRouter instance.
     */
    public function __construct()
    {
        $this->routes = [];
    }


    /**
     * Listener for the @page(Light.initialize_1 event).
     * It stores the routes attached to the light instance.
     *
     * @param LightEvent $event
     */
    public function initialize(LightEvent $event)
    {
        $this->routes = $event->getLight()->getRoutes();
    }


    /**
     * Returns the url corresponding to the given route name and url parameters.
     * If the useAbsolute flag is set to true, an absolute url will be returned.
     *
     * The urlParameters is an array of key/value pairs.
     * The keys that belong to the route parameters will be injected as tags in the route pattern
     * (see @page(the route page) for more information), and those not used by the route will
     * be injected in the query string (after a question mark).
     *
     *
     *
     * @param string $routeName
     * @param array $urlParameters
     * @param bool=false $useAbsolute
     * @return string
     * @throws \Exception
     */
    public function getUrl(string $routeName, array $urlParameters = [], $useAbsolute = false): string
    {

        /**
         * As for now, I've not used route with tags yet, but when this will come (and it will come),
         * then the url parameters shall split in two,
         * those not used by the routes are appended to the url with a question mark (traditional get)
         */
        $routeVars = [];
        $getVars = $urlParameters; // todo: distribute this better when route tags are implemented


        if (array_key_exists($routeName, $this->routes)) {
            $route = $this->routes[$routeName];

            if (false === $useAbsolute) {
                $url = $route['pattern'];
                if ($getVars) {
                    $url .= '?' . UriTool::httpBuildQuery($getVars);
                }
                return $url;
            }


            //--------------------------------------------
            // absolute version
            //--------------------------------------------
            $isSecure = $route['is_secure_protocol'];
            if (null === $isSecure) {
                $isSecure = HttpTool::isHttps();
            }

            if (true === $isSecure) {
                $protocol = 'https';
            } else {
                $protocol = 'http';
            }
            $host = $route['host'];
            if (null === $host) {
                $host = $_SERVER['HTTP_HOST'];
            }
            $url = $protocol . "://" . $host . $route['pattern'];
            if ($getVars) {
                $url .= '?' . UriTool::httpBuildQuery($getVars);
            }
            return $url;
        }
        throw new LightReverseRouterException("ReverseRouter: Route not found: $routeName.");
    }

}