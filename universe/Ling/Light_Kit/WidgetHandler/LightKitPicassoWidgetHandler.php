<?php


namespace Ling\Light_Kit\WidgetHandler;


use Ling\Kit_PicassoWidget\WidgetHandler\PicassoWidgetHandler;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;


/**
 * The LightKitPicassoWidgetHandler class.
 */
class LightKitPicassoWidgetHandler extends PicassoWidgetHandler
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    private LightServiceContainerInterface $container;


    /**
     * Builds the LightKitPicassoWidgetHandler instance.
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);

    }

    /**
     * Returns the container of this instance.
     *
     * @return LightServiceContainerInterface
     */
    public function getContainer(): LightServiceContainerInterface
    {
        return $this->container;
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