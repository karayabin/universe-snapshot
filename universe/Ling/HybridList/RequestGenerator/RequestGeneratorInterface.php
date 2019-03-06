<?php


namespace Ling\HybridList\RequestGenerator;


use Ling\HybridList\RequestShaper\RequestShaperInterface;

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