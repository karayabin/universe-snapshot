<?php


namespace Ling\Light_Kit_Admin\Service;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The LightKitAdminStandardServicePlugin class.
 */
class LightKitAdminStandardServicePlugin
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * This property holds the options for this instance.
     *
     * Available options are:
     *
     *
     * @var array
     */
    protected $options;


    /**
     * Builds the LightLingStandardService01 instance.
     */
    public function __construct()
    {
        $this->options = [];
        $this->container = null;
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


    /**
     * Sets the options.
     *
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }

}