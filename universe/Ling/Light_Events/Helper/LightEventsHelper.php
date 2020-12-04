<?php


namespace Ling\Light_Events\Helper;


use Ling\Light\Events\LightEvent;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The LightEventsHelper class.
 */
class LightEventsHelper
{

    /**
     * Dispatches the $eventName event using a LightEvent object filled with the given $variables.
     *
     * See the [LightEvent class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent.md) for more details.
     *
     *
     * @param LightServiceContainerInterface $container
     * @param $eventName
     * @param array $variables
     */
    public static function dispatchEvent(LightServiceContainerInterface $container, $eventName, array $variables)
    {
        $ev = $container->get("events");
        $event = LightEvent::createByContainer($container);
        foreach ($variables as $k => $v) {
            $event->setVar($k, $v);
        }
        $ev->dispatch($eventName, $event);
    }
}