<?php


namespace Ling\LingTalfi\Helper;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_DbSynchronizer\Helper\LightDbSynchronizerHelper;
use Ling\Light_PluginInstaller\Service\LightPluginInstallerService;
use Ling\Light_PluginInstaller\TableScope\TableScopeAwareInterface;
use Ling\UniverseTools\PlanetTool;

/**
 * The PluginInstallerSynchronizerHelper class.
 */
class PluginInstallerSynchronizerHelper
{

    /**
     * Synchronizes the plugin's table(s) in the database.
     *
     * It uses the Light_DbSynchronizer plugin under the hood.
     *
     *
     * @param LightServiceContainerInterface $jo
     * @param string $planetDotName
     * @param LightServiceContainerInterface $container
     */
    public static function synchronizeDatabaseByPlanetDotName(string $planetDotName, LightServiceContainerInterface $container)
    {
        list($galaxy, $planet) = PlanetTool::extractPlanetDotName($planetDotName);

        $scope = self::getTableScope($planetDotName, $container);
        LightDbSynchronizerHelper::synchronizePlanetCreateFile("$galaxy.$planet", $container, [
            'scope' => $scope,
        ]);
    }

    //--------------------------------------------
    //
    //--------------------------------------------

    /**
     * Returns the [table scope](https://github.com/lingtalfi/TheBar/blob/master/discussions/table-scope.md) for the given plugin.
     *
     * @param string $planetDotName
     * @param LightServiceContainerInterface $container
     * @return array
     * @throws \Exception
     */
    private static function getTableScope(string $planetDotName, LightServiceContainerInterface $container): array
    {
        /**
         * @var $pi LightPluginInstallerService
         */
        $pi = $container->get("plugin_installer");
        $installer = $pi->getInstallerInstance($planetDotName);

        if ($installer instanceof TableScopeAwareInterface) {
            $scope = $installer->getTableScope();
        } else {
            list($galaxy, $planet) = PlanetTool::extractPlanetDotName($planetDotName);
            $createFile = $container->getApplicationDir() . "/universe/$galaxy/$planet/assets/fixtures/create-structure.sql";
            $scope = LightDbSynchronizerHelper::guessScopeByCreateFile($createFile, $container);
        }
        return $scope;
    }
}