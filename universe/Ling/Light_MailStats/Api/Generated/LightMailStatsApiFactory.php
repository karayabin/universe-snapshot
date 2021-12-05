<?php


namespace Ling\Light_MailStats\Api\Generated;


use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_MailStats\Api\Custom\Classes\CustomTrackerApi;
use Ling\Light_MailStats\Api\Custom\Interfaces\CustomTrackerApiInterface;
use Ling\Light_MailStats\Api\Custom\Classes\CustomStatsApi;
use Ling\Light_MailStats\Api\Custom\Interfaces\CustomStatsApiInterface;



/**
 * The LightMailStatsApiFactory class.
 */
class LightMailStatsApiFactory
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
     * Builds the LightMailStatsApiFactoryObjectFactory instance.
     */
    public function __construct()
    {
        $this->pdoWrapper = null;
        $this->container = null;
		
    }

    /**
     * Returns a CustomTrackerApiInterface.
     *
     * @return CustomTrackerApiInterface
     */
    public function getTrackerApi(): CustomTrackerApiInterface
    {
        $o = new CustomTrackerApi();
        $o->setPdoWrapper($this->pdoWrapper);
        $o->setContainer($this->container);
        return $o;
    }

    /**
     * Returns a CustomStatsApiInterface.
     *
     * @return CustomStatsApiInterface
     */
    public function getStatsApi(): CustomStatsApiInterface
    {
        $o = new CustomStatsApi();
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
