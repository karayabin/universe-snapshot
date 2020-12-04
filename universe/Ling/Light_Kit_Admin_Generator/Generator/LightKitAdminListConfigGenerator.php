<?php


namespace Ling\Light_Kit_Admin_Generator\Generator;


use Ling\Light_Kit_Admin\Helper\LightKitAdminHelper;
use Ling\Light_RealGenerator\Generator\ListConfigGenerator;
use Ling\Light_TablePrefixInfo\Service\LightTablePrefixInfoService;
use Ling\SqlWizard\Tool\SqlWizardGeneralTool;
use Ling\UniverseTools\PlanetTool;


/**
 * The LightKitAdminListConfigGenerator class.
 */
class LightKitAdminListConfigGenerator extends ListConfigGenerator
{

    /**
     * @overrides
     */
    protected function getCrossColumnPluginName(string $pluginName, $rfTable, $crossColumnHubLinkTablePrefix2Plugin): string
    {

        $fkTablePrefix = SqlWizardGeneralTool::getTablePrefix($rfTable);


        /**
         * If the user didn't define it manually,
         * we can guess it from the table prefix info.
         */
        if (false === array_key_exists($fkTablePrefix, $crossColumnHubLinkTablePrefix2Plugin)) {
            /**
             * @var $ti LightTablePrefixInfoService
             */
            $ti = $this->container->get("table_prefix_info");
            if (null !== ($info = $ti->getPrefixInfo($fkTablePrefix))) {
                $planetId = $info['planetId'];
                list($galaxy, $planet) = PlanetTool::extractPlanetId($planetId);
                $lkaPlanet = LightKitAdminHelper::getLkaPlanetNameByPlanet($planet);
                return $galaxy . "/" . $lkaPlanet;
            }
        }


        return $crossPluginName = parent::getCrossColumnPluginName($pluginName, $rfTable, $crossColumnHubLinkTablePrefix2Plugin);
    }


}