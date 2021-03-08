<?php


namespace Ling\Light_Kit_Admin_UserDatabase\Light_PlanetInstaller;


use Ling\CliTools\Output\OutputInterface;
use Ling\Light_EasyRoute\Helper\LightEasyRouteHelper;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightBasePlanetInstaller;


/**
 * The LightKitAdminUserDatabasePlanetInstaller class.
 */
class LightKitAdminUserDatabasePlanetInstaller extends LightBasePlanetInstaller
{


    /**
     * @overrides
     */
    public function onMapCopyAfter(string $appDir, OutputInterface $output): void
    {


        $output->write("Light_Kit_Admin_UserDatabase: copying Light_EasyRoute routes to master...");
        LightEasyRouteHelper::copyRoutesFromPluginToMaster($appDir, "Light_Kit_Admin_UserDatabase");
        $output->write("<success>ok.</success>" . PHP_EOL);
    }


}