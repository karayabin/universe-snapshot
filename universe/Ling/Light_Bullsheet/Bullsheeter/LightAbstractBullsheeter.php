<?php


namespace Ling\Light_Bullsheet\Bullsheeter;


use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The LightAbstractBullsheeter interface.
 */
abstract class LightAbstractBullsheeter implements LightBullsheeterInterface, LightServiceContainerAwareInterface
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the LightAbstractBullsheeter instance.
     */
    public function __construct()
    {
        $this->container = null;
    }


    /**
     * @implementation
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


}