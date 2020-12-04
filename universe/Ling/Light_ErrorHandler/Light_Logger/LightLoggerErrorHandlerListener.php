<?php


namespace Ling\Light_ErrorHandler\Light_Logger;

use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Logger\Listener\LightFileLoggerListener;

/**
 * The LightLoggerErrorHandlerListener class.
 */
class LightLoggerErrorHandlerListener extends LightFileLoggerListener
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
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
     * @overrides
     */
    public function listen($msg, string $channel)
    {

        $options = $this->container->get("error_handler")->getOptions();
        if (
            ('error_handler' === $channel && (true === ($options['handleErrors'] ?? false))) ||
            ('fatal_error_handler' === $channel && (true === ($options['handleFatalErrors'] ?? false))) ||
            ('error' === $channel && (true === ($options['handleLogErrors'] ?? false)))
        ) {
            parent::listen($msg, $channel);
        }
    }


}