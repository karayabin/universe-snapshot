<?php


namespace Ling\Kamille\Architecture\RequestListener\Web;



use Ling\Kamille\Architecture\Request\Web\HttpRequestInterface;
use Ling\Kamille\Architecture\RequestListener\RequestListenerInterface;


interface HttpRequestListenerInterface extends RequestListenerInterface
{

    public function listen(HttpRequestInterface $request);
}