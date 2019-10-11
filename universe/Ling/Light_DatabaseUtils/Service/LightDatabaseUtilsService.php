<?php


namespace Ling\Light_DatabaseUtils\Service;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_DatabaseUtils\Util\Light_DatabaseDumpUtility;

/**
 * The LightDatabaseUtilsService class.
 */
class LightDatabaseUtilsService
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * Builds the LightDatabaseUtilsService instance.
     */
    public function __construct()
    {
        $this->container = null;
    }


    /**
     * Returns a configured Light_DatabaseDumpUtility instance.
     *
     * @return Light_DatabaseDumpUtility
     */
    public function getDumpUtil(): Light_DatabaseDumpUtility
    {
        $o = new Light_DatabaseDumpUtility();
        $o->setContainer($this->container);
        return $o;
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