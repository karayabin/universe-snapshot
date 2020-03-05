<?php


namespace Ling\Light_ChloroformExtension\Service;

use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_ChloroformExtension\Exception\LightChloroformExtensionException;
use Ling\Light_ChloroformExtension\Field\TableList\TableListFieldConfigurationHandlerInterface;
use Ling\Light_ChloroformExtension\Field\TableList\TableListService;

/**
 * The LightChloroformExtensionService class.
 */
class LightChloroformExtensionService
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * This property holds the configurationHandlers for this instance.
     * It's an array of pluginName => TableListFieldConfigurationHandlerInterface.
     * @var TableListFieldConfigurationHandlerInterface[]
     */
    protected $tableListConfigurationHandlers;




    /**
     * Builds the LightChloroformExtensionService instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->tableListConfigurationHandlers = [];
    }


    /**
     * Registers a table list configuration handler for the given plugin name.
     * @param string $pluginName
     * @param TableListFieldConfigurationHandlerInterface $handler
     */
    public function registerTableListConfigurationHandler(string $pluginName, TableListFieldConfigurationHandlerInterface $handler)
    {
        if ($handler instanceof LightServiceContainerAwareInterface) {
            $handler->setContainer($this->container);
        }
        $this->tableListConfigurationHandlers[$pluginName] = $handler;
    }


    /**
     * Returns the table list service based on the given table list identifier.
     *
     * @param string $tableListIdentifier
     * @return TableListService
     * @throws \Exception
     */
    public function getTableListService(string $tableListIdentifier): TableListService
    {
        list($pluginName, $pluginId) = explode(".", $tableListIdentifier, 2);
        if (array_key_exists($pluginName, $this->tableListConfigurationHandlers)) {
            $handler = $this->tableListConfigurationHandlers[$pluginName];
            $service = new TableListService();
            $service->setContainer($this->container);
            $service->setConfigurationHandler($handler);
            $service->setPluginId($pluginId);
            return $service;
        }
        throw new LightChloroformExtensionException("Plugin for tableList not registered: $pluginName, with identifier $tableListIdentifier.");
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