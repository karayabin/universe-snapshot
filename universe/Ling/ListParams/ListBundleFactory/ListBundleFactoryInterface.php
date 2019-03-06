<?php


namespace Ling\ListParams\ListBundleFactory;



use Ling\ListParams\ListBundle\ListBundleInterface;

interface ListBundleFactoryInterface
{


    /**
     * @param $identifier
     * @return ListBundleInterface
     * @throws \Exception if the expected list bundle couldn't be found
     */
    public function getListBundle($identifier);
}