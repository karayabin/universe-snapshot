<?php


namespace Ling\Light_Realform\Service;

use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Realform\DynamicInjection\RealformDynamicInjectionHandlerInterface;
use Ling\Light_Realform\Exception\LightRealformException;
use Ling\Light_Realform\Handler\RealformHandlerInterface;

/**
 * The LightRealformService class.
 */
class LightRealformService
{


    /**
     * This property holds the handlers for this instance.
     * It's an array of pluginName => RealformHandlerInterface
     * @var RealformHandlerInterface[]
     */
    protected $handlers;

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * This property holds the dynamicInjectionHandlers for this instance.
     * It's an array of identifier => RealformDynamicInjectionHandlerInterface
     *
     * Usually the identifier is a plugin name.
     *
     * @var RealformDynamicInjectionHandlerInterface[]
     */
    protected $dynamicInjectionHandlers;


    /**
     * Builds the LightRealformService instance.
     */
    public function __construct()
    {
        $this->handlers = [];
        $this->dynamicInjectionHandlers = [];
        $this->container = null;
    }


    /**
     * Returns the realform handler instance corresponding to the given identifier.
     *
     * The identifier notation is:
     *
     * - identifier: {pluginName}.{id}
     *
     * More info in the @page(conception notes).
     *
     *
     * @param string $identifier
     * @return RealformHandlerInterface
     * @throws \Exception
     */
    public function getFormHandler(string $identifier): RealformHandlerInterface
    {
        $p = explode(".", $identifier, 2);
        if (2 === count($p)) {
            list($pluginName, $id) = $p;
            if (array_key_exists($pluginName, $this->handlers)) {
                $realformHandler = $this->handlers[$pluginName];

                /**
                 * Since there are potentially multiple forms on the same page,
                 * we don't want to share the handler instance between forms,
                 * we want to return a dedicated formHandler instance per identifier.
                 */
                $clone = clone($realformHandler);
                $clone->setId($id);
                if ($clone instanceof LightServiceContainerAwareInterface) {
                    $clone->setContainer($this->container);
                }
                return $clone;
            }
            throw new LightRealformException("Form handler not found with identifier $identifier.");
        }
        throw new LightRealformException("Invalid realform identifier $identifier.");
    }


    /**
     * Registers a realform handler.
     *
     * @param string $pluginName
     * @param RealformHandlerInterface $formHandler
     */
    public function registerFormHandler(string $pluginName, RealformHandlerInterface $formHandler)
    {
        $this->handlers[$pluginName] = $formHandler;
    }

    /**
     * Registers a @page(dynamic injection handler).
     * @param string $identifier
     * @param RealformDynamicInjectionHandlerInterface $handler
     */
    public function registerDynamicInjectionHandler(string $identifier, RealformDynamicInjectionHandlerInterface $handler)
    {
        $this->dynamicInjectionHandlers[$identifier] = $handler;
    }

    /**
     * Returns the realform dynamic injection handler associated with the given identifier,
     * or throws an exception if it's not there.
     *
     * @param string $identifier
     * @return RealformDynamicInjectionHandlerInterface
     * @throws \Exception
     */
    public function getDynamicInjectionHandler(string $identifier): RealformDynamicInjectionHandlerInterface
    {
        if (array_key_exists($identifier, $this->dynamicInjectionHandlers)) {
            $handler = $this->dynamicInjectionHandlers[$identifier];
            if ($handler instanceof LightServiceContainerAwareInterface) {
                $handler->setContainer($this->container);
            }
            return $handler;
        }
        throw new LightRealformException("Dynamic injection handler not found with identifier $identifier.");
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





    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the handlers.
     *
     * @param RealformHandlerInterface[] $handlers
     */
    public function setHandlers(array $handlers)
    {
        $this->handlers = $handlers;
    }
}