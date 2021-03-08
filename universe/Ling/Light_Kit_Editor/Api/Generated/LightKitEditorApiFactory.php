<?php


namespace Ling\Light_Kit_Editor\Api\Generated;


use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Kit_Editor\Api\Custom\Classes\CustomWidgetApi;
use Ling\Light_Kit_Editor\Api\Custom\Interfaces\CustomWidgetApiInterface;
use Ling\Light_Kit_Editor\Api\Custom\Classes\CustomZoneApi;
use Ling\Light_Kit_Editor\Api\Custom\Interfaces\CustomZoneApiInterface;
use Ling\Light_Kit_Editor\Api\Custom\Classes\CustomZoneHasWidgetApi;
use Ling\Light_Kit_Editor\Api\Custom\Interfaces\CustomZoneHasWidgetApiInterface;
use Ling\Light_Kit_Editor\Api\Custom\Classes\CustomPageApi;
use Ling\Light_Kit_Editor\Api\Custom\Interfaces\CustomPageApiInterface;
use Ling\Light_Kit_Editor\Api\Custom\Classes\CustomPageHasZoneApi;
use Ling\Light_Kit_Editor\Api\Custom\Interfaces\CustomPageHasZoneApiInterface;



/**
 * The LightKitEditorApiFactory class.
 */
class LightKitEditorApiFactory
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
     * Builds the LightKitEditorApiFactoryObjectFactory instance.
     */
    public function __construct()
    {
        $this->pdoWrapper = null;
        $this->container = null;
		
    }

    /**
     * Returns a CustomWidgetApiInterface.
     *
     * @return CustomWidgetApiInterface
     */
    public function getWidgetApi(): CustomWidgetApiInterface
    {
        $o = new CustomWidgetApi();
        $o->setPdoWrapper($this->pdoWrapper);
        $o->setContainer($this->container);
        return $o;
    }

    /**
     * Returns a CustomZoneApiInterface.
     *
     * @return CustomZoneApiInterface
     */
    public function getZoneApi(): CustomZoneApiInterface
    {
        $o = new CustomZoneApi();
        $o->setPdoWrapper($this->pdoWrapper);
        $o->setContainer($this->container);
        return $o;
    }

    /**
     * Returns a CustomZoneHasWidgetApiInterface.
     *
     * @return CustomZoneHasWidgetApiInterface
     */
    public function getZoneHasWidgetApi(): CustomZoneHasWidgetApiInterface
    {
        $o = new CustomZoneHasWidgetApi();
        $o->setPdoWrapper($this->pdoWrapper);
        $o->setContainer($this->container);
        return $o;
    }

    /**
     * Returns a CustomPageApiInterface.
     *
     * @return CustomPageApiInterface
     */
    public function getPageApi(): CustomPageApiInterface
    {
        $o = new CustomPageApi();
        $o->setPdoWrapper($this->pdoWrapper);
        $o->setContainer($this->container);
        return $o;
    }

    /**
     * Returns a CustomPageHasZoneApiInterface.
     *
     * @return CustomPageHasZoneApiInterface
     */
    public function getPageHasZoneApi(): CustomPageHasZoneApiInterface
    {
        $o = new CustomPageHasZoneApi();
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
