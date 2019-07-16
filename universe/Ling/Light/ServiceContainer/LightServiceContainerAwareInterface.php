<?php

namespace Ling\Light\ServiceContainer;


/**
 * The LightServiceContainerAwareInterface interface.
 */
interface LightServiceContainerAwareInterface
{


    /**
     * Sets the light service container interface.
     *
     * @param LightServiceContainerInterface $container
     * @return void
     */
    public function setContainer(LightServiceContainerInterface $container);
}