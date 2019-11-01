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

}