<?php


namespace Ling\Light_Kit_Admin_UserData\Service;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The LightKitAdminUserDataService class.
 */
class LightKitAdminUserDataService
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface|null
     */
    protected ?LightServiceContainerInterface $container;


    /**
     * Builds the LightKitAdminUserDataService instance.
     */
    public function __construct()
    {
        $this->container = null;
    }

    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


}