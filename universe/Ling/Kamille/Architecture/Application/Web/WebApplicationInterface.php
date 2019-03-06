<?php


namespace Ling\Kamille\Architecture\Application\Web;




use Ling\Kamille\Architecture\Application\ApplicationInterface;
use Ling\Kamille\Architecture\Request\Web\HttpRequestInterface;


interface WebApplicationInterface extends ApplicationInterface
{
    public function handleRequest(HttpRequestInterface $request);
}