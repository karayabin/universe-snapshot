<?php


namespace Ling\Light_ControllerHub\Service;


use Ling\Bat\ClassTool;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_ControllerHub\ControllerHubHandler\LightControllerHubHandlerInterface;
use Ling\Light_ControllerHub\Exception\LightControllerHubException;
use Ling\Light_ControllerHub\Helper\LightControllerHubHelper;
use Ling\UniverseTools\PlanetTool;

/**
 * The LightControllerHubService class.
 */
class LightControllerHubService
{

    /**
     * This property holds the handlers for this instance.
     * It's an array of pluginName => LightControllerHubHandlerInterface
     * @var LightControllerHubHandlerInterface[]
     */
    protected $handlers;


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * Builds the LightControllerHubService instance.
     */
    public function __construct()
    {
        $this->handlers = [];
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
     * Returns the controller hub handler registered by the plugin which name is given.
     *
     * @param string $pluginName
     * @return LightControllerHubHandlerInterface
     * @throws \Exception
     */
    public function getControllerHubHandler(string $pluginName): LightControllerHubHandlerInterface
    {


        if (array_key_exists($pluginName, $this->handlers)) {
            return $this->handlers[$pluginName];
        } else {
            /**
             * Trying a dynamic method, based on convention.
             * Benefits: no need to register.
             * Drawbacks: the constructor is called without params (i.e. no customization)
             */

            /**
             * In this case we handle the planetIdentifier, but also for backward compatibility, we still allow
             * a raw planet name, assuming the Ling galaxy.
             */
            $p = explode('/', $pluginName, 2);
            if (1 === count($p)) {
                $galaxy = 'Ling';
                $planet = array_shift($p);
            } else {
                $galaxy = array_shift($p);
                $planet = array_shift($p);
            }
            $compressed = PlanetTool::getTightPlanetName($planet);

            /**
             * Using the custom/generated convention: https://github.com/lingtalfi/TheBar/blob/master/discussions/generated-custom-config-pattern.md
             */
            $class = $galaxy . "\\$planet\\Light_ControllerHub\\Generated\\${compressed}ControllerHubHandler";
            if (false === ClassTool::isLoaded($class)) {
                $class = $galaxy . "\\$planet\\Light_ControllerHub\\Custom\\${compressed}ControllerHubHandler";
                if (false === ClassTool::isLoaded($class)) {
                    $class = null;
                }
            }

            if (null !== $class) {
                $instance = new $class();
                if ($instance instanceof LightServiceContainerAwareInterface) {
                    $instance->setContainer($this->container);
                }
                return $instance;
            }
        }
        throw new LightControllerHubException("Unregistered handler for plugin $pluginName.");
    }


    /**
     * Registers the handler for the plugin which name is given.
     *
     * @param string $pluginName
     * @param LightControllerHubHandlerInterface $handler
     */
    public function registerHandler(string $pluginName, LightControllerHubHandlerInterface $handler)
    {
        $this->handlers[$pluginName] = $handler;
    }


    /**
     * Returns the route name of the hub controller.
     * @return string
     */
    public function getRouteName(): string
    {
        return LightControllerHubHelper::getRouteName();
    }
}