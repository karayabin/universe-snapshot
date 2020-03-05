<?php


namespace Ling\Light_Events\Service;


use Ling\Bat\DebugTool;
use Ling\Light_Events\Listener\LightEventsListenerInterface;
use Ling\Light_Logger\LightLoggerService;

/**
 * The DebugLightEventsService class.
 */
class DebugLightEventsService extends LightEventsService
{
    /**
     * @overrides
     */
    protected function onListenerProcessBefore($listener, string $event, $data)
    {

        $listenerName = null;
        if ($listener instanceof LightEventsListenerInterface) {
            $listenerName = get_class($listener);
        }
        else{
            $listenerName = DebugTool::toString($listener);
        }
        $sentence = "Calling listener $listenerName on event $event.";

        /**
         * @var $logger LightLoggerService
         */
        $logger = $this->container->get("logger");
        $logger->debug($sentence);
    }

}