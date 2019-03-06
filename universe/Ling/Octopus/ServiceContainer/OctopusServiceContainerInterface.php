<?php


namespace Ling\Octopus\ServiceContainer;


use Ling\Octopus\Exception\OctopusServiceErrorException;

interface OctopusServiceContainerInterface
{


    /**
     * Returns the service which name is given.
     *
     * Note: a service is an object (i.e. an instance).
     *
     *
     * @param $service
     * @return object
     * @throws OctopusServiceErrorException, when a problem occur and the requested service cannot be returned
     *
     */
    public function get($service);
}








