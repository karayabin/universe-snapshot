<?php


namespace Ling\Light_UserDatabase\Api\Generated\Classes;

use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Database\Service\LightDatabaseService;
use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;

/**
 * The LightUserDatabaseBaseApi class.
 */
class LightUserDatabaseBaseApi
{
    /**
     * This property holds the pdoWrapper for this instance.
     * @var LightDatabaseService
     */
    protected $pdoWrapper;

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * This property holds the table for this instance.
     * @var string
     */
    protected $table;


    /**
     * Builds the AbstractLightUserDatabaseApi instance.
     */
    public function __construct()
    {
        $this->pdoWrapper = null;
        $this->container = null;
        $this->table = null;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the pdoWrapper.
     *
     * @param SimplePdoWrapperInterface $pdoWrapper
     */
    public function setPdoWrapper(SimplePdoWrapperInterface $pdoWrapper)
    {
        $this->pdoWrapper = $pdoWrapper;
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