<?php


namespace Ling\Light\ReverseRouter;


use Ling\Light\Exception\LightException;

/**
 * The LightReverseRouterInterface interface.
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
 *
 */
interface LightReverseRouterInterface
{

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
     * @throws LightException
     */
    public function getUrl(string $routeName, array $urlParameters = [], $useAbsolute = false): string;
}