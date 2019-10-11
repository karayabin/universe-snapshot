<?php


namespace Ling\Light_Realist\DynamicInjection;

use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The ContainerAwareRealistDynamicInjectionHandler class
 */
abstract class ContainerAwareRealistDynamicInjectionHandler implements RealistDynamicInjectionHandlerInterface, LightServiceContainerAwareInterface
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the ContainerAwareRealistDynamicInjectionHandler instance.
     */
    public function __construct()
    {
        $this->container = null;
    }


    /**
     * @implementation
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


}