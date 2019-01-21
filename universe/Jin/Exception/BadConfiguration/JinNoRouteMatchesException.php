<?php


namespace Jin\Exception\BadConfiguration;


use Jin\Exception\JinBadConfigurationException;
use Jin\Http\HttpRequest;

/**
 *
 * @info The JinNoRouteMatchesException class indicates that no route was found by any router.
 *
 *
 * This means that the maintainer of the app needs to review her routes to handle the faulty case.
 *
 */
class JinNoRouteMatchesException extends JinBadConfigurationException
{
    /**
     * @info This property holds the http request.
     * The http request should always be set before throwing this exception
     */
    private $request;

    /**
     * @info Returns the http request instance attached to this instance.
     * @return HttpRequest
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @info Sets the http request to this instance.
     * @param HttpRequest $request
     */
    public function setRequest(HttpRequest $request)
    {
        $this->request = $request;
    }


}