<?php


namespace Ling\Ecp\Output;


interface EcpOutputInterface
{

    public function success($msg);

    public function getSuccess();

    public function error($msg);

    public function getError();
}