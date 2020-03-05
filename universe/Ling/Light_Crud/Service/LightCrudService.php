<?php


namespace Ling\Light_Crud\Service;


use Ling\Light\Events\LightEvent;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Crud\CrudRequestHandler\LightCrudRequestHandlerInterface;
use Ling\Light_Crud\Exception\LightCrudException;
use Ling\Light_Events\Service\LightEventsService;

/**
 * The LightCrudService class.
 */
class LightCrudService
{


    /**
     * This property holds the handlers for this instance.
     * An array of pluginIdentifier => LightCrudRequestHandlerInterface
     * @var LightCrudRequestHandlerInterface[]
     */
    protected $handlers;

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the LightCrudService instance.
     */
    public function __construct()
    {
        $this->handlers = [];
        $this->container = null;
    }

    /**
     * Registers a crud request handler.
     *
     * @param string $pluginIdentifier
     * @param LightCrudRequestHandlerInterface $handler
     */
    public function registerHandler(string $pluginIdentifier, LightCrudRequestHandlerInterface $handler)
    {
        if ($handler instanceof LightServiceContainerAwareInterface) {
            $handler->setContainer($this->container);
        }
        $this->handlers[$pluginIdentifier] = $handler;
    }


    /**
     * Executes the sql request and dispatches an event.
     *
     * See the @page(LightCrudRequestHandlerInterface) comments for a more details about the parameters.
     *
     *
     * @param string $contextIdentifier
     * @param string $table
     * @param string $action
     * @param array $params
     * @throws \Exception
     */
    public function execute(string $contextIdentifier, string $table, string $action, array $params = [])
    {
        $p = explode('.', $contextIdentifier, 2);
        $pluginIdentifier = array_shift($p);
        $pluginContextIdentifier = array_shift($p);
        if (array_key_exists($pluginIdentifier, $this->handlers)) {
            $handler = $this->handlers[$pluginIdentifier];
            $handler->execute($pluginContextIdentifier, $table, $action, $params);

        } else {
            throw new LightCrudException("LightCrudService: Unknown handler with pluginIdentifier \"$pluginIdentifier\".");
        }
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }
}