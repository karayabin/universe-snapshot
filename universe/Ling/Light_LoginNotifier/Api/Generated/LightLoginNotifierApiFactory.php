<?php


namespace Ling\Light_LoginNotifier\Api\Generated;


use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_LoginNotifier\Api\Custom\Classes\CustomConnexionApi;
use Ling\Light_LoginNotifier\Api\Custom\Interfaces\CustomConnexionApiInterface;



/**
 * The LightLoginNotifierApiFactory class.
 */
class LightLoginNotifierApiFactory
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
     * Builds the LightLoginNotifierApiFactoryObjectFactory instance.
     */
    public function __construct()
    {
        $this->pdoWrapper = null;
        $this->container = null;
		
    }

    /**
     * Returns a CustomConnexionApiInterface.
     *
     * @return CustomConnexionApiInterface
     */
    public function getConnexionApi(): CustomConnexionApiInterface
    {
        $o = new CustomConnexionApi();
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
