<?php


namespace Ling\Light_Kit_Admin_UserDatabase\Service;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The LightKitAdminUserDatabaseService class.
 */
class LightKitAdminUserDatabaseService
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