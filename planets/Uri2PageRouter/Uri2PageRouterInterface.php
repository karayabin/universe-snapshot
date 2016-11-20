<?php

namespace Uri2PageRouter;

/*
 * LingTalfi 2015-12-04
 */

interface Uri2PageRouterInterface
{

    /**
     * Analyze the prepared uri and returns the corresponding page (a relative
     * path), or false if no match were found.
     *
     *
     * In case of success, the UriVirtualParameters singleton object might
     * be updated with appropriated key/values pairs.
     *
     * @returns false|string
     *
     */
    public function listen();

    public function getParameter($key, $default = false);

    public function getParameters();

    public function setParameter($key, $value);


    /**
     * Get the uri corresponding to the given string.
     * The given string might be a page, or an identifier.
     *
     * The params array can be used to pass extra information,
     * like the uriSpace that you want to target for instance.
     * See the DynamicUriRouter module for more details.
     *
     *
     * requestParameters array contains the query string parameters (the part after the question mark in an uri).
     *
     *
     * @returns false|string, false is returned if no uri
     *                          could be generated.
     *
     *
     */
    public function getLink($string, array $params = [], array $requestParameters = []);
}
