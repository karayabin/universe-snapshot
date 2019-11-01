<?php


namespace Ling\Light_UserData\Api;


use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;
use Ling\Light_UserData\Api\Custom\CustomDirectoryMapApi;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;



/**
 * The LightUserDataApiFactory class.
 */
class LightUserDataApiFactory
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
     * This property holds the microPermissionPlugin for this instance.
     * @var string
     */
    protected $microPermissionPlugin;

    /**
     * Builds the LightUserDataApiFactory instance.
     */
    public function __construct()
    {
        $this->pdoWrapper = null;
		$this->container = null;
		$this->microPermissionPlugin = "Light_UserData";
    }

    /**
     * Returns a CustomDirectoryMapApi.
     *
     * @return CustomDirectoryMapApi
     */
    public function getDirectoryMapApi(): CustomDirectoryMapApi
    {
        $o = new CustomDirectoryMapApi();
		$o->setContainer($this->container);
		$o->setMicroPermissionPlugin($this->microPermissionPlugin);
        $o->setPdoWrapper($this->pdoWrapper);
        return $o;
    }

    /**
     * Returns a ResourceApiInterface.
     *
     * @return ResourceApiInterface
     */
    public function getResourceApi(): ResourceApiInterface
    {
        $o = new ResourceApi();
		$o->setContainer($this->container);
		$o->setMicroPermissionPlugin($this->microPermissionPlugin);
        $o->setPdoWrapper($this->pdoWrapper);
        return $o;
    }

    /**
     * Returns a ResourceHasTagApiInterface.
     *
     * @return ResourceHasTagApiInterface
     */
    public function getResourceHasTagApi(): ResourceHasTagApiInterface
    {
        $o = new ResourceHasTagApi();
		$o->setContainer($this->container);
		$o->setMicroPermissionPlugin($this->microPermissionPlugin);
        $o->setPdoWrapper($this->pdoWrapper);
        return $o;
    }

    /**
     * Returns a TagApiInterface.
     *
     * @return TagApiInterface
     */
    public function getTagApi(): TagApiInterface
    {
        $o = new TagApi();
		$o->setContainer($this->container);
		$o->setMicroPermissionPlugin($this->microPermissionPlugin);
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
    /**
     * Sets the name of the plugin used to handle the micro-permissions.
     *
     * @param string $pluginName
     */
    public function setMicroPermissionPlugin(string $pluginName)
    {
        $this->microPermissionPlugin = $pluginName;
    }
}
