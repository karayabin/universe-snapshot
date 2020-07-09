<?php


namespace Ling\Light_UserData\Api\Generated;


use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_UserData\Api\Custom\Classes\CustomTagApi;
use Ling\Light_UserData\Api\Custom\Interfaces\CustomTagApiInterface;
use Ling\Light_UserData\Api\Custom\Classes\CustomResourceApi;
use Ling\Light_UserData\Api\Custom\Interfaces\CustomResourceApiInterface;
use Ling\Light_UserData\Api\Custom\Classes\CustomResourceHasTagApi;
use Ling\Light_UserData\Api\Custom\Interfaces\CustomResourceHasTagApiInterface;



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
     * Returns a CustomTagApiInterface.
     *
     * @return CustomTagApiInterface
     */
    public function getTagApi(): CustomTagApiInterface
    {
        $o = new CustomTagApi();
        $o->setPdoWrapper($this->pdoWrapper);
        return $o;
    }

    /**
     * Returns a CustomResourceApiInterface.
     *
     * @return CustomResourceApiInterface
     */
    public function getResourceApi(): CustomResourceApiInterface
    {
        $o = new CustomResourceApi();
        $o->setPdoWrapper($this->pdoWrapper);
        return $o;
    }

    /**
     * Returns a CustomResourceHasTagApiInterface.
     *
     * @return CustomResourceHasTagApiInterface
     */
    public function getResourceHasTagApi(): CustomResourceHasTagApiInterface
    {
        $o = new CustomResourceHasTagApi();
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
