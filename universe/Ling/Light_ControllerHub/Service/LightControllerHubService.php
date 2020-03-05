<?php


namespace Ling\Light_ControllerHub\Service;


use Ling\Light_ControllerHub\ControllerHubHandler\LightControllerHubHandlerInterface;
use Ling\Light_ControllerHub\Exception\LightControllerHubException;

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
     * Builds the LightControllerHubService instance.
     */
    public function __construct()
    {
        $this->handlers = [];
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
        /**
         * Note: as you can see for now it's a hardcoded value.
         * The problem is that this value must be synced with the value inside the
         * /the_app/config/data/Light_ControllerHub/Light_EasyRoute/lch_routes.byml file,
         * otherwise things will break.
         *
         * As for now, I didn't't implement a mechanism to do the sync automatically (didn't need
         * it personally so far), but the main idea of the existence of this method is that at least
         * external plugin can rely on this method, which is supposed to retrieve the always up-to-date value.
         *
         * So as for now, just remember that if you change the value in the configuration file, you need to change it here as well.
         *
         */
        return "lch_route-hub";
    }
}