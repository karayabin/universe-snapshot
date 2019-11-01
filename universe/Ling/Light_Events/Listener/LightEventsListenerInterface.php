<?php


namespace Ling\Light_Events\Listener;


/**
 * The LightEventsListenerInterface interface.
 */
interface LightEventsListenerInterface
{

    /**
     * Process the given data.
     *
     *
     * @param $data
     * @param string $event
     * The called event.
     *
     * @return mixed
     */
    public function process($data, string $event);
}