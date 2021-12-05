<?php


namespace Ling\Light_Kit\WidgetHandler;


use Ling\Kit_PrototypeWidget\WidgetHandler\PrototypeWidgetHandler;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Kit\Helper\LightKitControllerHelper;


/**
 * The LightKitPrototypeWidgetHandler class.
 */
class LightKitPrototypeWidgetHandler extends PrototypeWidgetHandler
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    private LightServiceContainerInterface $container;


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


    /**
     * Returns the value of the global variable set in the "controller" namespace, with the given key.
     * If it doesn't exist, returns the given default value.
     *
     * @param string $key
     * @param null $default
     */
    protected function getControllerVar(string $key, $default = null)
    {
        return LightKitControllerHelper::getControllerVar($this->container, $key, $default);
    }


    /**
     * Returns the values of the global variables set in the "controller" namespace.
     *
     * @return array
     * @throws \Exception
     */
    protected function getControllerVars(): array
    {
        return LightKitControllerHelper::getControllerVars($this->container);
    }

}