<?php


namespace Ling\Light_AjaxHandler\Service;

use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_AjaxHandler\Exception\LightAjaxHandlerException;
use Ling\Light_AjaxHandler\Handler\LightAjaxHandlerInterface;

/**
 * The LightAjaxHandlerService class.
 */
class LightAjaxHandlerService
{

    /**
     * This property holds the handlers for this instance.
     * It's an array of handlerId => LightAjaxHandlerInterface.
     *
     * @var LightAjaxHandlerInterface[]
     */
    protected $handlers;


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the LightAjaxHandlerService instance.
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
     * Registers a handler.
     * Note: the identifier is usually a plugin name.
     *
     *
     * @param string $identifier
     * @param LightAjaxHandlerInterface $handler
     */
    public function registerHandler(string $identifier, LightAjaxHandlerInterface $handler)
    {
        $this->handlers[$identifier] = $handler;
        if ($handler instanceof LightServiceContainerAwareInterface) {
            $handler->setContainer($this->container);
        }
    }


    /**
     * Returns the handler identified by the given identifier.
     *
     * @param string $identifier
     * @return LightAjaxHandlerInterface
     * @throws \Exception
     */
    public function getHandler(string $identifier): LightAjaxHandlerInterface
    {
        if (array_key_exists($identifier, $this->handlers)) {
            return $this->handlers[$identifier];
        }
        throw new LightAjaxHandlerException("Handler not found with identifier $identifier.");
    }


}
