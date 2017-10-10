<?php


namespace Kamille\Architecture\Router\Web;


use Kamille\Architecture\Request\Web\HttpRequestInterface;



interface WebRouterInterface
{

    /**
     * @param HttpRequestInterface $request
     * @return null|string|callable|array, the controller match, or null if no match
     *
     * - null: means no match
     *
     * - string: the controllerRepresentation.
     *          The controller representation is interpreted later by YOUR application.
     *          By default, the format is the following:
     *
     *              controllerRepresentation: <classPath> <:> <method>
     *              Examples:
     *                  - Path\to\Controller:methodName
     *                  - My\Module\Controller:home
     *
     *
     *
     *      With this form, it's assumed that the method will be called without parameters.
     *      If your controller method uses parameters, then use the callable form.
     *
     *
     * - callable: the controller
     *
     *
     * - array:
     *      - 0: controller | controllerRepresentation
     *      - 1: urlParams, array of parameters (key => value) extracted from the request's uri
     *
     *
     *
     */
    public function match(HttpRequestInterface $request);
}