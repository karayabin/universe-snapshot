<?php


namespace Ling\Light_404Logger\Service;

use Ling\Light\Events\LightEvent;
use Ling\Light\Exception\LightException;
use Ling\Light_Logger\Service\LightLoggerService;

/**
 * The Light404LoggerService class.
 */
class Light404LoggerService
{

    /**
     * The callable used to react to the @page(Ling.Light.on_unhandled_exception_caught event).
     *
     * It will internally dispatch a logger message on the 404 channel,
     * using @page(the Light_Logger service), and we treat that message using a logger listener (Light404LoggerListener).
     *
     * See the configuration of the Light404LoggerListener in the service configuration file.
     *
     *
     * @param LightEvent $event
     * @param string $eventName
     * @throws \Exception
     */
    public function onExceptionCaught(LightEvent $event, string $eventName)
    {
        $exception = $event->getVar('exception', null, true);
        if ($exception instanceof LightException) {
            if ("404" === $exception->getLightErrorCode()) {
                $httpRequest = $event->getHttpRequest();

                /**
                 * @var $logger LightLoggerService
                 */
                $logger = $event->getContainer()->get('logger');
                $logger->log($httpRequest, "404");
            }
        }
    }
}