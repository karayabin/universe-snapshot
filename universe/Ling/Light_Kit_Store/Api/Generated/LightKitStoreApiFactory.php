<?php


namespace Ling\Light_Kit_Store\Api\Generated;


use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Kit_Store\Api\Custom\Classes\CustomAuthorApi;
use Ling\Light_Kit_Store\Api\Custom\Interfaces\CustomAuthorApiInterface;
use Ling\Light_Kit_Store\Api\Custom\Classes\CustomItemApi;
use Ling\Light_Kit_Store\Api\Custom\Interfaces\CustomItemApiInterface;
use Ling\Light_Kit_Store\Api\Custom\Classes\CustomAddressApi;
use Ling\Light_Kit_Store\Api\Custom\Interfaces\CustomAddressApiInterface;
use Ling\Light_Kit_Store\Api\Custom\Classes\CustomUserApi;
use Ling\Light_Kit_Store\Api\Custom\Interfaces\CustomUserApiInterface;
use Ling\Light_Kit_Store\Api\Custom\Classes\CustomUserRatesItemApi;
use Ling\Light_Kit_Store\Api\Custom\Interfaces\CustomUserRatesItemApiInterface;
use Ling\Light_Kit_Store\Api\Custom\Classes\CustomInvoiceApi;
use Ling\Light_Kit_Store\Api\Custom\Interfaces\CustomInvoiceApiInterface;
use Ling\Light_Kit_Store\Api\Custom\Classes\CustomInvoiceLineApi;
use Ling\Light_Kit_Store\Api\Custom\Interfaces\CustomInvoiceLineApiInterface;
use Ling\Light_Kit_Store\Api\Custom\Classes\CustomUserPurchasesItemApi;
use Ling\Light_Kit_Store\Api\Custom\Interfaces\CustomUserPurchasesItemApiInterface;
use Ling\Light_Kit_Store\Api\Custom\Classes\CustomCartItemApi;
use Ling\Light_Kit_Store\Api\Custom\Interfaces\CustomCartItemApiInterface;



/**
 * The LightKitStoreApiFactory class.
 */
class LightKitStoreApiFactory
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
     * Builds the LightKitStoreApiFactoryObjectFactory instance.
     */
    public function __construct()
    {
        $this->pdoWrapper = null;
        $this->container = null;
		
    }

    /**
     * Returns a CustomAuthorApiInterface.
     *
     * @return CustomAuthorApiInterface
     */
    public function getAuthorApi(): CustomAuthorApiInterface
    {
        $o = new CustomAuthorApi();
        $o->setPdoWrapper($this->pdoWrapper);
        $o->setContainer($this->container);
        return $o;
    }

    /**
     * Returns a CustomItemApiInterface.
     *
     * @return CustomItemApiInterface
     */
    public function getItemApi(): CustomItemApiInterface
    {
        $o = new CustomItemApi();
        $o->setPdoWrapper($this->pdoWrapper);
        $o->setContainer($this->container);
        return $o;
    }

    /**
     * Returns a CustomAddressApiInterface.
     *
     * @return CustomAddressApiInterface
     */
    public function getAddressApi(): CustomAddressApiInterface
    {
        $o = new CustomAddressApi();
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
     * Returns a CustomUserRatesItemApiInterface.
     *
     * @return CustomUserRatesItemApiInterface
     */
    public function getUserRatesItemApi(): CustomUserRatesItemApiInterface
    {
        $o = new CustomUserRatesItemApi();
        $o->setPdoWrapper($this->pdoWrapper);
        $o->setContainer($this->container);
        return $o;
    }

    /**
     * Returns a CustomInvoiceApiInterface.
     *
     * @return CustomInvoiceApiInterface
     */
    public function getInvoiceApi(): CustomInvoiceApiInterface
    {
        $o = new CustomInvoiceApi();
        $o->setPdoWrapper($this->pdoWrapper);
        $o->setContainer($this->container);
        return $o;
    }

    /**
     * Returns a CustomInvoiceLineApiInterface.
     *
     * @return CustomInvoiceLineApiInterface
     */
    public function getInvoiceLineApi(): CustomInvoiceLineApiInterface
    {
        $o = new CustomInvoiceLineApi();
        $o->setPdoWrapper($this->pdoWrapper);
        $o->setContainer($this->container);
        return $o;
    }

    /**
     * Returns a CustomUserPurchasesItemApiInterface.
     *
     * @return CustomUserPurchasesItemApiInterface
     */
    public function getUserPurchasesItemApi(): CustomUserPurchasesItemApiInterface
    {
        $o = new CustomUserPurchasesItemApi();
        $o->setPdoWrapper($this->pdoWrapper);
        $o->setContainer($this->container);
        return $o;
    }

    /**
     * Returns a CustomCartItemApiInterface.
     *
     * @return CustomCartItemApiInterface
     */
    public function getCartItemApi(): CustomCartItemApiInterface
    {
        $o = new CustomCartItemApi();
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
