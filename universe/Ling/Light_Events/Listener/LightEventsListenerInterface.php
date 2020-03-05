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
     * If the stopPropagation flag is set to true, this will stop the dispatcher and no
     * other listener will be called.
     *
     *
     * @param $data
     * @param string $event
     * The called event.
     * @param bool $stopPropagation = false
     *
     * @return mixed
     */
    public function process($data, string $event, bool &$stopPropagation = false);
}