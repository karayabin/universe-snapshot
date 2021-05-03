<?php


namespace Ling\Light_Kit_Admin\JimToolbox;


use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The JimToolboxItemBaseHandler class.
 */
abstract class JimToolboxItemBaseHandler implements JimToolboxItemHandlerInterface, LightServiceContainerAwareInterface
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected LightServiceContainerInterface $container;


    /**
     * Builds the JimToolboxItemBaseHandler instance.
     */
    public function __construct()
    {

    }


    //--------------------------------------------
    // LightServiceContainerAwareInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


}