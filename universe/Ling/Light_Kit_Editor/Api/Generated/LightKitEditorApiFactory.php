<?php


namespace Ling\Light_Kit_Editor\Api\Generated;


use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Kit_Editor\Api\Custom\Classes\CustomWidgetApi;
use Ling\Light_Kit_Editor\Api\Custom\Interfaces\CustomWidgetApiInterface;
use Ling\Light_Kit_Editor\Api\Custom\Classes\CustomBlockApi;
use Ling\Light_Kit_Editor\Api\Custom\Interfaces\CustomBlockApiInterface;
use Ling\Light_Kit_Editor\Api\Custom\Classes\CustomSiteApi;
use Ling\Light_Kit_Editor\Api\Custom\Interfaces\CustomSiteApiInterface;
use Ling\Light_Kit_Editor\Api\Custom\Classes\CustomPageApi;
use Ling\Light_Kit_Editor\Api\Custom\Interfaces\CustomPageApiInterface;
use Ling\Light_Kit_Editor\Api\Custom\Classes\CustomBlockHasWidgetApi;
use Ling\Light_Kit_Editor\Api\Custom\Interfaces\CustomBlockHasWidgetApiInterface;
use Ling\Light_Kit_Editor\Api\Custom\Classes\CustomPageHasBlockApi;
use Ling\Light_Kit_Editor\Api\Custom\Interfaces\CustomPageHasBlockApiInterface;



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
     * Returns a CustomBlockApiInterface.
     *
     * @return CustomBlockApiInterface
     */
    public function getBlockApi(): CustomBlockApiInterface
    {
        $o = new CustomBlockApi();
        $o->setPdoWrapper($this->pdoWrapper);
        $o->setContainer($this->container);
        return $o;
    }

    /**
     * Returns a CustomSiteApiInterface.
     *
     * @return CustomSiteApiInterface
     */
    public function getSiteApi(): CustomSiteApiInterface
    {
        $o = new CustomSiteApi();
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
     * Returns a CustomBlockHasWidgetApiInterface.
     *
     * @return CustomBlockHasWidgetApiInterface
     */
    public function getBlockHasWidgetApi(): CustomBlockHasWidgetApiInterface
    {
        $o = new CustomBlockHasWidgetApi();
        $o->setPdoWrapper($this->pdoWrapper);
        $o->setContainer($this->container);
        return $o;
    }

    /**
     * Returns a CustomPageHasBlockApiInterface.
     *
     * @return CustomPageHasBlockApiInterface
     */
    public function getPageHasBlockApi(): CustomPageHasBlockApiInterface
    {
        $o = new CustomPageHasBlockApi();
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
