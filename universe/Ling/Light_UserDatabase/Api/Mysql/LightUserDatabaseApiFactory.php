<?php


namespace Ling\Light_UserDatabase\Api\Mysql;


use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_UserDatabase\Api\Mysql\Interfaces\UserGroupApiInterface;
use Ling\Light_UserDatabase\Api\Mysql\Classes\UserGroupApi;
use Ling\Light_UserDatabase\Api\Mysql\Interfaces\UserApiInterface;
use Ling\Light_UserDatabase\Api\Mysql\Classes\UserApi;
use Ling\Light_UserDatabase\Api\Mysql\Interfaces\PermissionGroupApiInterface;
use Ling\Light_UserDatabase\Api\Mysql\Classes\PermissionGroupApi;
use Ling\Light_UserDatabase\Api\Mysql\Custom\CustomPermissionApi;
use Ling\Light_UserDatabase\Api\Mysql\Interfaces\PermissionApiInterface;
use Ling\Light_UserDatabase\Api\Mysql\Interfaces\UserHasPermissionGroupApiInterface;
use Ling\Light_UserDatabase\Api\Mysql\Classes\UserHasPermissionGroupApi;
use Ling\Light_UserDatabase\Api\Mysql\Interfaces\PermissionGroupHasPermissionApiInterface;
use Ling\Light_UserDatabase\Api\Mysql\Classes\PermissionGroupHasPermissionApi;
use Ling\Light_UserDatabase\Api\Mysql\Custom\CustomPluginOptionApi;
use Ling\Light_UserDatabase\Api\Mysql\Interfaces\PluginOptionApiInterface;
use Ling\Light_UserDatabase\Api\Mysql\Interfaces\UserGroupHasPluginOptionApiInterface;
use Ling\Light_UserDatabase\Api\Mysql\Classes\UserGroupHasPluginOptionApi;



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
     * Returns a UserGroupApiInterface.
     *
     * @return UserGroupApi
     */
    public function getUserGroupApi(): UserGroupApiInterface
    {
        $o = new UserGroupApi();
        $o->setPdoWrapper($this->pdoWrapper);
        return $o;
    }

    /**
     * Returns a UserApiInterface.
     *
     * @return UserApi
     */
    public function getUserApi(): UserApiInterface
    {
        $o = new UserApi();
        $o->setPdoWrapper($this->pdoWrapper);
        return $o;
    }

    /**
     * Returns a PermissionGroupApiInterface.
     *
     * @return PermissionGroupApi
     */
    public function getPermissionGroupApi(): PermissionGroupApiInterface
    {
        $o = new PermissionGroupApi();
        $o->setPdoWrapper($this->pdoWrapper);
        return $o;
    }

    /**
     * Returns a PermissionApiInterface.
     *
     * @return CustomPermissionApi
     */
    public function getPermissionApi(): PermissionApiInterface
    {
        $o = new CustomPermissionApi();
        $o->setPdoWrapper($this->pdoWrapper);
        return $o;
    }

    /**
     * Returns a UserHasPermissionGroupApiInterface.
     *
     * @return UserHasPermissionGroupApi
     */
    public function getUserHasPermissionGroupApi(): UserHasPermissionGroupApiInterface
    {
        $o = new UserHasPermissionGroupApi();
        $o->setPdoWrapper($this->pdoWrapper);
        return $o;
    }

    /**
     * Returns a PermissionGroupHasPermissionApiInterface.
     *
     * @return PermissionGroupHasPermissionApi
     */
    public function getPermissionGroupHasPermissionApi(): PermissionGroupHasPermissionApiInterface
    {
        $o = new PermissionGroupHasPermissionApi();
        $o->setPdoWrapper($this->pdoWrapper);
        return $o;
    }

    /**
     * Returns a PluginOptionApiInterface.
     *
     * @return CustomPluginOptionApi
     */
    public function getPluginOptionApi(): PluginOptionApiInterface
    {
        $o = new CustomPluginOptionApi();
        $o->setPdoWrapper($this->pdoWrapper);
        return $o;
    }

    /**
     * Returns a UserGroupHasPluginOptionApiInterface.
     *
     * @return UserGroupHasPluginOptionApi
     */
    public function getUserGroupHasPluginOptionApi(): UserGroupHasPluginOptionApiInterface
    {
        $o = new UserGroupHasPluginOptionApi();
        $o->setPdoWrapper($this->pdoWrapper);
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
