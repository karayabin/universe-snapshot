<?php


namespace Kamille\Architecture\RequestListener\Web;



use Kamille\Architecture\Request\Web\HttpRequestInterface;
use Kamille\Architecture\RequestListener\RequestListenerInterface;


interface HttpRequestListenerInterface extends RequestListenerInterface
{

    public function listen(HttpRequestInterface $request);
}