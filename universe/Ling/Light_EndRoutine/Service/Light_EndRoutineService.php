<?php


namespace Ling\Light_EndRoutine\Service;

use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_EndRoutine\Handler\LightEndRoutineHandlerInterface;

/**
 * The Light_EndRoutineService class.
 */
class Light_EndRoutineService
{

    /**
     * This property holds the handlers for this instance.
     * It's an array of identifier => LightEndRoutineHandlerInterface
     *
     * @var LightEndRoutineHandlerInterface[]
     */
    protected $handlers;

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * Builds the Light_EndRoutineService instance.
     */
    public function __construct()
    {
        $this->handlers = [];
    }


    /**
     * Registers an end routine handler.
     *
     * @param string $identifier
     * @param LightEndRoutineHandlerInterface $handler
     */
    public function registerHandler(string $identifier, LightEndRoutineHandlerInterface $handler)
    {
        $this->handlers[$identifier] = $handler;
        if ($handler instanceof LightServiceContainerAwareInterface) {
            $handler->setContainer($this->container);
        }
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
     * Executes all registered end routines.
     *
     * The given route argument is either a @page(light route),
     * or an empty array otherwise (if no route was used).
     *
     *
     *
     * @param array $route
     */
    public function executeEndRoutines(array $route)
    {
        $isAjax = $route['is_ajax'] ?? false;
        if (false === $isAjax) {
            foreach ($this->handlers as $handler) {
                $handler->handle();
            }
        }
    }


}