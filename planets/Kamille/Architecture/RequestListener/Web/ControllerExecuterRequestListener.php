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
 */
class ControllerExecuterRequestListener implements HttpRequestListenerInterface
{


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
        $response = $this->executeController($controller);
        if ($response instanceof HttpResponseInterface) {
            $request->set("response", $response);
        } else {
            throw new RequestListenerException("A controller should return a response");
        }
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function executeController($controller)
    {
        if (is_callable($controller)) {
            /**
             * For now, we only accept callable controllers (no strings aliases,
             * but that might change, although not planned as of today)
             */
            $response = call_user_func($controller);
            return $response;
        } else {
            /**
             * With this ControllerRequestListener, we throw an exception (i.e. if you don't like it
             * use another class).
             */
            $type = gettype($controller);
            throw new RequestListenerException("Controller should be a callable, $type given");
        }


    }

}