<?php


namespace Ling\Light_ControllerHub\Light_PlanetInstaller;


use Ling\CliTools\Output\OutputInterface;
use Ling\Light_EasyRoute\Helper\LightEasyRouteHelper;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightBasePlanetInstaller;


/**
 * The LightControllerHubPlanetInstaller class.
 */
class LightControllerHubPlanetInstaller extends LightBasePlanetInstaller
{


    /**
     * @overrides
     */
    public function onMapCopyAfter(string $appDir, OutputInterface $output): void
    {


        $output->write("Light_ControllerHub: copying Light_EasyRoute routes to master...");
        LightEasyRouteHelper::copyRoutesFromPluginToMaster($appDir, "Light_ControllerHub");
        $output->write("<success>ok.</success>" . PHP_EOL);
    }


}