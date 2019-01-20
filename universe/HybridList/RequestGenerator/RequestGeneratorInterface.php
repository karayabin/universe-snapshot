<?php


namespace HybridList\RequestGenerator;


use HybridList\RequestShaper\RequestShaperInterface;

interface RequestGeneratorInterface
{

    /**
     * @return array (rows)
     */
    public function getItems();

    /**
     * @return RequestShaperInterface[]
     */
    public function getRequestShapers();

    public function addRequestShaper(RequestShaperInterface $shaper);
}