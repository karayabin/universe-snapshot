<?php


namespace Ling\Light_ExceptionHandler\Service;


use Ling\Light\Events\LightEvent;
use Ling\Light_Logger\Service\LightLoggerService;

/**
 * The LightExceptionHandlerService class.
 */
class LightExceptionHandlerService
{


    /**
     * The callable used to react to some events (see the service configuration for more details).
     *
     * It will internally dispatch a logger message on the exception channel,
     * using @page(the Light_Logger service).
     *
     * Also, by default this plugin provides a logger listener which writes the exception traces
     * in a log file, which is by default in: ${app_dir}/log/exception.txt.
     *
     *
     *
     * @param LightEvent $event
     * @param string $eventName
     * @throws \Exception
     */
    public function onExceptionCaught(LightEvent $event, string $eventName)
    {

        $exception = $event->getVar('exception', null, true);


        /**
         * @var $logger LightLoggerService
         */
        $logger = $event->getContainer()->get('logger');
        $logger->log($exception, "exception");
    }
}