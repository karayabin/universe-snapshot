<?php


namespace Kamille\Architecture\Router;


use Kamille\Architecture\Request\Web\HttpRequestInterface;

interface RouterInterface
{

    /**
     * @param HttpRequestInterface $request
     * @return null|string|array
     *
     *      If null, it means no match
     *      If it's a string, it represents the controller and method to use.
     *      The format in this case is the following:
     *
     *              controller: <classPath> <:> <method>
     *              Examples:
     *                  - Path\to\Controller:methodName
     *                  - My\Module\Controller:home
     *
     *      With this form, it's assumed that the method will be called without parameters.
     *      If your controller method uses parameters, then use the array form described below.
     *
     *
     *      If it's an array, it contains the following elements:
     *          0: the controller string (as described above)
     *          1: array of available parameters for the controller method
     *
     *          A controller method doesn't have to use all the available parameters,
     *          it's okay to use only a few of them.
     *
     */
    public function match(HttpRequestInterface $request);
}