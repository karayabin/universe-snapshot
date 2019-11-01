<?php

namespace Ling\Light\ServiceContainer;


use Ling\Octopus\ServiceContainer\OctopusServiceContainerInterface;

/**
 * The LightServiceContainerInterface interface.
 */
interface LightServiceContainerInterface extends OctopusServiceContainerInterface
{

    /**
     * Returns the application directory.
     * @return string
     */
    public function getApplicationDir(): string;
}