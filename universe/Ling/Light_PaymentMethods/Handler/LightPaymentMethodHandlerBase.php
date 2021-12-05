<?php

namespace Ling\Light_PaymentMethods\Handler;


use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The LightPaymentMethodHandlerBase class.
 */
abstract class LightPaymentMethodHandlerBase implements LightPaymentMethodHandlerInterface, LightServiceContainerAwareInterface
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected LightServiceContainerInterface $container;


    public function __construct()
    {
        //
    }


    //--------------------------------------------
    // LightServiceContainerAwareInterface
    //--------------------------------------------
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }

}