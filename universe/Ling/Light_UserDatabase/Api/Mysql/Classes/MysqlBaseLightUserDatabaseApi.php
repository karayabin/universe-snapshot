<?php


namespace Ling\Light_UserDatabase\Api\Mysql\Classes;

use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_MicroPermission\Exception\LightMicroPermissionException;
use Ling\Light_MicroPermission\Service\LightMicroPermissionService;
use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;

/**
 * The MysqlBaseLightUserDatabaseApi class.
 */
class MysqlBaseLightUserDatabaseApi
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



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Checks whether the current user has the micro permission which type is specified.
     * See [the micro-permission recommended notation for database interaction](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/pages/recommended-micropermission-notation.md)
     * for more details.
     *
     *
     *
     * @param string $type
     * @throws \Exception
     */
    protected function checkMicroPermission(string $type)
    {
        $microPermission = "tables.$this->table." . $type;
        /**
         * @var $microService LightMicroPermissionService
         */
        $microService = $this->container->get("micro_permission");
        if (false === $microService->hasMicroPermission($microPermission)) {
            throw new LightMicroPermissionException("Permission denied! You don't have the micro permission $microPermission.");
        }
    }

}