<?php


namespace Kamille\Architecture\Application\Web;




use Kamille\Architecture\Application\ApplicationInterface;
use Kamille\Architecture\Request\Web\HttpRequestInterface;


interface WebApplicationInterface extends ApplicationInterface
{
    public function handleRequest(HttpRequestInterface $request);
}