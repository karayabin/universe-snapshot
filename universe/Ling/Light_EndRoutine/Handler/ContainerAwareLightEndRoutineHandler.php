<?php


namespace Ling\Light_EndRoutine\Handler;


use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The ContainerAwareLightEndRoutineHandler class.
 */
abstract class ContainerAwareLightEndRoutineHandler implements LightEndRoutineHandlerInterface, LightServiceContainerAwareInterface
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * Builds the ContainerAwareLightEndRoutineHandler instance.
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