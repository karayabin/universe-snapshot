<?php

namespace Ling\Light\ServiceContainer;


use Ling\Light\Core\Light;
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

    /**
     * Returns the light instance of the application using this container.
     *
     * @return Light
     */
    public function getLight(): Light;

    /**
     * Sets the light instance.
     *
     * @param Light $light
     * @return mixed
     */
    public function setLight(Light $light);
}