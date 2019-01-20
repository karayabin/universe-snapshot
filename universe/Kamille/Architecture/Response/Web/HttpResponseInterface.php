<?php


namespace Kamille\Architecture\Response\Web;


use Kamille\Architecture\Response\ResponseInterface;


interface HttpResponseInterface extends ResponseInterface
{
    public function send();
}