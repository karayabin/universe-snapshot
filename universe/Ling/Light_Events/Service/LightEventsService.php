<?php


namespace Ling\Light_Events\Service;


use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Events\Exception\LightEventsException;
use Ling\Light_Events\Listener\LightEventsListenerInterface;

/**
 * The LightEventsService class.
 */
class LightEventsService
{


    /**
     * This property holds the listeners for this instance.
     * It's an array of priority => listenerGroup.
     * Each listenerGroup is an array of listeners.
     *
     * Each listener is either:
     * - a LightEventsListenerInterface instance
     * - a callable, with signature:
     *      - f ( mixed data, string event ) // same as LightEventsListenerInterface->process
     *
     * @var array
     */
    protected $listeners;

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * This property holds the dispatchedEvents for this instance.
     * @var array
     */
    protected $dispatchedEvents;


    /**
     * Builds the LightEventsService instance.
     */
    public function __construct()
    {
        $this->listeners = [];
        $this->dispatchedEvents = [];
        $this->container = null;
    }

    /**
     * Dispatches the given event along with the given data.
     *
     * @param string $event
     * @param $data
     * @throws \Exception
     */
    public function dispatch(string $event, $data = null)
    {
        if (array_key_exists($event, $this->listeners)) {

            $this->dispatchedEvents[] = $event;

            $listeners = $this->listeners[$event];
            krsort($listeners);
            $stopPropagation = false;


            foreach ($listeners as $listenerGroup) {
                foreach ($listenerGroup as $listener) {
                    if ($listener instanceof LightEventsListenerInterface) {
                        $this->onListenerProcessBefore($listener, $event, $data);
                        $listener->process($data, $event, $stopPropagation);
                    } elseif (is_callable($listener)) {
                        $this->onListenerProcessBefore($listener, $event, $data);
                        call_user_func_array($listener, [$data, $event, &$stopPropagation]);
                    } else {
                        $type = gettype($listener);
                        throw new LightEventsException("Invalid listener for event $event, with type $type.");
                    }
                    if (true === $stopPropagation) {
                        return;
                    }
                }
            }
        }
    }


    /**
     * Registers one or more listener(s) (either a callable or a LightEventsListenerInterface instance).
     *
     * @param string|array $eventName
     * @param $listener
     * @param int $priority = 0
     */
    public function registerListener($eventName, $listener, int $priority = 0)
    {
        if ($listener instanceof LightServiceContainerAwareInterface) {
            $listener->setContainer($this->container);
        }


        if (false === is_array($eventName)) {
            $eventName = [$eventName];
        }
        foreach ($eventName as $event) {
            if (false === array_key_exists($event, $this->listeners)) {
                $this->listeners[$event] = [];
            }
            if (false === array_key_exists($priority, $this->listeners[$event])) {
                $this->listeners[$event][$priority] = [];
            }
            $this->listeners[$event][$priority][] = $listener;
        }
    }


    /**
     * Returns the dispatchedEvents of this instance, in the order they appeared.
     *
     * @return array
     */
    public function getDispatchedEvents(): array
    {
        return array_unique($this->dispatchedEvents);
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
     * A hook called just before a listener is triggered.
     *
     * @param $listener
     * @param string $event
     * @param $data
     *
     * @overrideMe
     */
    protected function onListenerProcessBefore($listener, string $event, $data)
    {

    }

}