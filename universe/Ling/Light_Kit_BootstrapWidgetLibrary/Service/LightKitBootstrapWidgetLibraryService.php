<?php


namespace Ling\Light_Kit_BootstrapWidgetLibrary\Service;


use Ling\Light_Kit_BootstrapWidgetLibrary\Exception\LightKitBootstrapWidgetLibraryException;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;


/**
 * The LightKitBootstrapWidgetLibraryService class.
 */
class LightKitBootstrapWidgetLibraryService
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected LightServiceContainerInterface $container;

    /**
     * This property holds the options for this instance.
     *
     * Available options are:
     *
     *
     *
     * See the @page(Light_Kit_BootstrapWidgetLibrary conception notes) for more details.
     *
     *
     * @var array
     */
    protected $options;


    /**
     * Builds the LightKitBootstrapWidgetLibraryService instance.
     */
    public function __construct()
    {
        $this->options = [];
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


    /**
     * Throws an exception.
     *
     * @param string $msg
     * @throws \Exception
     */
    private function error(string $msg)
    {
        throw new LightKitBootstrapWidgetLibraryException($msg);
    }

}