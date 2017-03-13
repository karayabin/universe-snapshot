<?php


namespace Kamille\Architecture\RequestListener\Web;


use Kamille\Architecture\Request\Web\HttpRequestInterface;
use Kamille\Architecture\Response\Web\HttpResponseInterface;



/**
 * This class checks whether or not a response property is in the Request.
 * If so, it supposes that it's an HttpResponse, and it executes the response.
 */
class ResponseExecuterListener implements HttpRequestListenerInterface
{

    public static function create()
    {
        return new static();
    }

    public function listen(HttpRequestInterface $request)
    {
        if (null !== ($response = $request->get("response"))) {
            if ($response instanceof HttpResponseInterface) {
                $response->send();
            }
        }
    }
}