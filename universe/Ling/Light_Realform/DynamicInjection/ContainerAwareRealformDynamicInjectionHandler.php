<?php


namespace Ling\Light_Realform\DynamicInjection;

use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The ContainerAwareRealformDynamicInjectionHandler class
 */
abstract class ContainerAwareRealformDynamicInjectionHandler implements RealformDynamicInjectionHandlerInterface, LightServiceContainerAwareInterface
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the ContainerAwareRealformDynamicInjectionHandler instance.
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