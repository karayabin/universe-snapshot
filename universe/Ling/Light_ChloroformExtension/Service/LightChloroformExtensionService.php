<?php


namespace Ling\Light_ChloroformExtension\Service;

use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_ChloroformExtension\Field\TableList\TableListService;
use Ling\Light_Nugget\Service\LightNuggetService;
use Ling\Light_Realform\Service\LightRealformService;

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
     * Builds the LightChloroformExtensionService instance.
     */
    public function __construct()
    {
        $this->container = null;
    }


    /**
     *
     * Returns the @page(table list configuration item) corresponding to the given identifier.
     * The identifier is either the nuggetId or the nuggetDirectiveId.
     *
     * See the @page(Light_ChloroformExtension conception notes) for more details.
     * See the @page(Light_Nugget conception notes) for more details.
     *
     * @param string $identifier
     * @return array
     * @throws \Exception
     */
    public function getConfigurationItem(string $identifier): array
    {

        $p = explode(":", $identifier);
        if (3 === count($p)) {
            /**
             * @var $rf LightRealformService
             */
            $rf = $this->container->get('realform');
            return $rf->getNuggetDirective($identifier);
        }

        /**
         * @var $ng LightNuggetService
         */
        $ng = $this->container->get("nugget");
        return $ng->getNugget($identifier, "Light_ChloroformExtension/tablelist");

    }

    /**
     * Returns the table list service based on the given table list identifier or directive id.
     *
     * @param string $tableListIdentifierOrDirectiveId
     * @return TableListService
     * @throws \Exception
     */
    public function getTableListService(string $tableListIdentifierOrDirectiveId): TableListService
    {
        $nugget = $this->getConfigurationItem($tableListIdentifierOrDirectiveId);
        $service = new TableListService();
        $service->setContainer($this->container);
        $service->setNugget($nugget);
        return $service;
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