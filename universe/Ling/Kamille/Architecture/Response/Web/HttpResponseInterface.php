<?php


namespace Ling\Kamille\Architecture\Response\Web;


use Ling\Kamille\Architecture\Response\ResponseInterface;


interface HttpResponseInterface extends ResponseInterface
{
    public function send();
}