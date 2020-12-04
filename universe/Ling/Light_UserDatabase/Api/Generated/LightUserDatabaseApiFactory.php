<?php


namespace Ling\Light_UserDatabase\Api\Generated;


use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_UserDatabase\Api\Custom\Classes\CustomUserGroupApi;
use Ling\Light_UserDatabase\Api\Custom\Interfaces\CustomUserGroupApiInterface;
use Ling\Light_UserDatabase\Api\Custom\Classes\CustomUserApi;
use Ling\Light_UserDatabase\Api\Custom\Interfaces\CustomUserApiInterface;
use Ling\Light_UserDatabase\Api\Custom\Classes\CustomPermissionGroupApi;
use Ling\Light_UserDatabase\Api\Custom\Interfaces\CustomPermissionGroupApiInterface;
use Ling\Light_UserDatabase\Api\Custom\Classes\CustomPermissionApi;
use Ling\Light_UserDatabase\Api\Custom\Interfaces\CustomPermissionApiInterface;
use Ling\Light_UserDatabase\Api\Custom\Classes\CustomUserHasPermissionGroupApi;
use Ling\Light_UserDatabase\Api\Custom\Interfaces\CustomUserHasPermissionGroupApiInterface;
use Ling\Light_UserDatabase\Api\Custom\Classes\CustomPermissionGroupHasPermissionApi;
use Ling\Light_UserDatabase\Api\Custom\Interfaces\CustomPermissionGroupHasPermissionApiInterface;
use Ling\Light_UserDatabase\Api\Custom\Classes\CustomPluginOptionApi;
use Ling\Light_UserDatabase\Api\Custom\Interfaces\CustomPluginOptionApiInterface;
use Ling\Light_UserDatabase\Api\Custom\Classes\CustomUserGroupHasPluginOptionApi;
use Ling\Light_UserDatabase\Api\Custom\Interfaces\CustomUserGroupHasPluginOptionApiInterface;



/**
 * The LightUserDatabaseApiFactory class.
 */
class LightUserDatabaseApiFactory
{

    /**
     * This property holds the pdoWrapper for this instance.
     * @var SimplePdoWrapperInterface
     */
    protected $pdoWrapper;

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;



    /**
     * Builds the LightUserDatabaseApiFactoryObjectFactory instance.
     */
    public function __construct()
    {
        $this->pdoWrapper = null;
        $this->container = null;
		
    }

    /**
     * Returns a CustomUserGroupApiInterface.
     *
     * @return CustomUserGroupApiInterface
     */
    public function getUserGroupApi(): CustomUserGroupApiInterface
    {
        $o = new CustomUserGroupApi();
        $o->setPdoWrapper($this->pdoWrapper);
        $o->setContainer($this->container);
        return $o;
    }

    /**
     * Returns a CustomUserApiInterface.
     *
     * @return CustomUserApiInterface
     */
    public function getUserApi(): CustomUserApiInterface
    {
        $o = new CustomUserApi();
        $o->setPdoWrapper($this->pdoWrapper);
        $o->setContainer($this->container);
        return $o;
    }

    /**
     * Returns a CustomPermissionGroupApiInterface.
     *
     * @return CustomPermissionGroupApiInterface
     */
    public function getPermissionGroupApi(): CustomPermissionGroupApiInterface
    {
        $o = new CustomPermissionGroupApi();
        $o->setPdoWrapper($this->pdoWrapper);
        $o->setContainer($this->container);
        return $o;
    }

    /**
     * Returns a CustomPermissionApiInterface.
     *
     * @return CustomPermissionApiInterface
     */
    public function getPermissionApi(): CustomPermissionApiInterface
    {
        $o = new CustomPermissionApi();
        $o->setPdoWrapper($this->pdoWrapper);
        $o->setContainer($this->container);
        return $o;
    }

    /**
     * Returns a CustomUserHasPermissionGroupApiInterface.
     *
     * @return CustomUserHasPermissionGroupApiInterface
     */
    public function getUserHasPermissionGroupApi(): CustomUserHasPermissionGroupApiInterface
    {
        $o = new CustomUserHasPermissionGroupApi();
        $o->setPdoWrapper($this->pdoWrapper);
        $o->setContainer($this->container);
        return $o;
    }

    /**
     * Returns a CustomPermissionGroupHasPermissionApiInterface.
     *
     * @return CustomPermissionGroupHasPermissionApiInterface
     */
    public function getPermissionGroupHasPermissionApi(): CustomPermissionGroupHasPermissionApiInterface
    {
        $o = new CustomPermissionGroupHasPermissionApi();
        $o->setPdoWrapper($this->pdoWrapper);
        $o->setContainer($this->container);
        return $o;
    }

    /**
     * Returns a CustomPluginOptionApiInterface.
     *
     * @return CustomPluginOptionApiInterface
     */
    public function getPluginOptionApi(): CustomPluginOptionApiInterface
    {
        $o = new CustomPluginOptionApi();
        $o->setPdoWrapper($this->pdoWrapper);
        $o->setContainer($this->container);
        return $o;
    }

    /**
     * Returns a CustomUserGroupHasPluginOptionApiInterface.
     *
     * @return CustomUserGroupHasPluginOptionApiInterface
     */
    public function getUserGroupHasPluginOptionApi(): CustomUserGroupHasPluginOptionApiInterface
    {
        $o = new CustomUserGroupHasPluginOptionApi();
        $o->setPdoWrapper($this->pdoWrapper);
        $o->setContainer($this->container);
        return $o;
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
