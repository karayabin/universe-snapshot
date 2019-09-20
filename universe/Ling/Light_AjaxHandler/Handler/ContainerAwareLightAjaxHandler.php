<?php


namespace Ling\Light_AjaxHandler\Handler;


use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The ContainerAwareLightAjaxHandler class.
 */
abstract class ContainerAwareLightAjaxHandler implements LightAjaxHandlerInterface, LightServiceContainerAwareInterface
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the ContainerAwareLightAjaxHandler instance.
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



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the container instance.
     *
     * @return LightServiceContainerInterface
     */
    protected function getContainer(): LightServiceContainerInterface
    {
        return $this->container;
    }

}