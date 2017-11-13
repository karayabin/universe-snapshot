<?php


namespace HybridList\RequestGenerator;


use HybridList\RequestShaper\RequestShaperInterface;

class RequestGenerator implements RequestGeneratorInterface
{

    protected $requestShapers;

    public function __construct()
    {
        $this->requestShapers = [];
    }


    public static function create()
    {
        return new static();
    }

    public function getItems()
    {
        return [];
    }

    public function getRequestShapers()
    {
        return $this->requestShapers;
    }

    public function addRequestShaper(RequestShaperInterface $shaper)
    {
        $this->requestShapers[] = $shaper;
        return $this;
    }
}