<?php


namespace HybridList\RequestGenerator;


use HybridList\RequestShaper\RequestShaperInterface;

class RequestGenerator implements RequestGeneratorInterface
{

    protected $requestShapers;
    protected $items;
    protected $onGetItemsAfterCallback;

    public function __construct()
    {
        $this->requestShapers = [];
        $this->items = [];
    }


    public static function create()
    {
        return new static();
    }

    public function getItems()
    {
        $items = $this->items;
        $this->onGetItemsAfter($items);
        return $items;
    }

    public function setItems(array $items)
    {
        $this->items = $items;
        return $this;
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

    public function setOnGetItemsAfterCallback(callable $onGetItemsAfterCallback)
    {
        $this->onGetItemsAfterCallback = $onGetItemsAfterCallback;
        return $this;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    protected function onGetItemsAfter(array $items)
    {
        if (null !== $this->onGetItemsAfterCallback) {
            call_user_func($this->onGetItemsAfterCallback, $items);
        }
    }
}