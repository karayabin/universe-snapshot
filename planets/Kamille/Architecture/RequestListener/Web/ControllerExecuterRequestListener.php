<?php


namespace Kamille\Architecture\RequestListener\Web;


use Kamille\Architecture\Request\Web\HttpRequestInterface;
use Kamille\Architecture\RequestListener\Exception\RequestListenerException;
use Kamille\Architecture\Response\Web\HttpResponseInterface;


/**
 * This requestListener sees if a response is already set in the Request.
 * If not, it looks for a controller parameter in the Request.
 * If a controller parameter is found in the Request parameters, then this class
 * executes the corresponding Controller.
 *
 *
 * This executor attaches the returned Response to the Request, that is if a Response was actually returned by the Controller.
 *
 * If the Controller doesn't return a proper Response, an exception is thrown.
 *
 * If no Controller is set in the Request, you can control whether or not an exception is thrown
 * with the _throwExOnControllerNotFound property.
 *
 */
class ControllerExecuterRequestListener implements HttpRequestListenerInterface
{

    private $_throwExOnControllerNotFound;
    private $controllerRepresentationAdaptorCb;


    public function __construct()
    {
        $this->_throwExOnControllerNotFound = true;
        $this->controllerRepresentationAdaptorCb = null;
    }

    public static function create()
    {
        return new static();
    }

    public function listen(HttpRequestInterface $request)
    {

        // response previously set? then bypass
        if (null !== ($response = $request->get('response'))) {
            if ($response instanceof HttpResponseInterface) {
                return $response;
            }
        }

        $controller = $request->get("controller", null);

        if (null === $controller && true === $this->_throwExOnControllerNotFound) {
            throw new RequestListenerException("The controller parameter was not found in the request " . $request->uri());
        }


        if (null !== $controller) {
            $response = $this->executeController($controller);
            if ($response instanceof HttpResponseInterface) {
                $request->set("response", $response);
            } else {
                throw new RequestListenerException("A controller should return a response");
            }
        }
    }


    public function throwExOnControllerNotFound($bool)
    {
        $this->_throwExOnControllerNotFound = (bool)$bool;
        return $this;
    }

    public function setControllerRepresentationAdaptorCb(callable $controllerRepresentationAdaptorCb)
    {
        $this->controllerRepresentationAdaptorCb = $controllerRepresentationAdaptorCb;
        return $this;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    private function executeController($controller)
    {
        if (is_callable($controller)) {
            return call_user_func($controller);
        } elseif (is_string($controller)) {
            $controller = call_user_func($this->controllerRepresentationAdaptorCb, $controller);
            if (is_callable($controller)) {
                return call_user_func($controller);
            }

            if (is_array($controller) && 2 === count($controller)) {
                $p = $controller;
                $controller = '[' . get_class($p[0]) . ':' . $p[1] . ']';
            }
            throw new RequestListenerException("Could not interpret the controllerRepresentation for $controller");
        } else {
            $type = gettype($controller);
            throw new RequestListenerException("Controller should be a callable or a string (controller representation), $type given");
        }
    }
}