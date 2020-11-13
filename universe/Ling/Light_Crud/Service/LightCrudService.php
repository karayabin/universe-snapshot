<?php


namespace Ling\Light_Crud\Service;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Crud\CrudRequestHandler\LightBaseCrudRequestHandler;

/**
 * The LightCrudService class.
 */
class LightCrudService
{


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
        $this->container = null;
    }


    /**
     * Executes the given crud action for the given table.
     *
     * See the @page(LightCrudRequestHandlerInterface) comments for a more details about the parameters.
     *
     *
     * @param string $table
     * @param string $action
     * @param array $params
     * @throws \Exception
     */
    public function execute(string $table, string $action, array $params = [])
    {
        $handler = new LightBaseCrudRequestHandler();
        $handler->setContainer($this->container);
        $handler->execute($table, $action, $params);
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