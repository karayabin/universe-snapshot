<?php


namespace Ling\Light_UserData\Api;


use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_UserData\Api\Custom\CustomTagApi;
use Ling\Light_UserData\Api\Interfaces\TagApiInterface;
use Ling\Light_UserData\Api\Custom\CustomResourceApi;
use Ling\Light_UserData\Api\Interfaces\ResourceApiInterface;
use Ling\Light_UserData\Api\Interfaces\ResourceHasTagApiInterface;
use Ling\Light_UserData\Api\Classes\ResourceHasTagApi;



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
     * Builds the LightUserDataApiFactoryObjectFactory instance.
     */
    public function __construct()
    {
        $this->pdoWrapper = null;
        $this->container = null;
		
    }

    /**
     * Returns a TagApiInterface.
     *
     * @return CustomTagApi
     */
    public function getTagApi(): TagApiInterface
    {
        $o = new CustomTagApi();
        $o->setPdoWrapper($this->pdoWrapper);
        return $o;
    }

    /**
     * Returns a ResourceApiInterface.
     *
     * @return CustomResourceApi
     */
    public function getResourceApi(): ResourceApiInterface
    {
        $o = new CustomResourceApi();
        $o->setPdoWrapper($this->pdoWrapper);
        return $o;
    }

    /**
     * Returns a ResourceHasTagApiInterface.
     *
     * @return ResourceHasTagApi
     */
    public function getResourceHasTagApi(): ResourceHasTagApiInterface
    {
        $o = new ResourceHasTagApi();
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
