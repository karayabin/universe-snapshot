<?php


namespace Ling\Light_AjaxHandler\Light_PlanetInstaller;


use Ling\CliTools\Output\OutputInterface;
use Ling\Light_EasyRoute\Helper\LightEasyRouteHelper;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightBasePlanetInstaller;


/**
 * The LightAjaxHandlerPlanetInstaller class.
 */
class LightAjaxHandlerPlanetInstaller extends LightBasePlanetInstaller
{


    /**
     * @overrides
     */
    public function onMapCopyAfter(string $appDir, OutputInterface $output): void
    {


        $output->write("Light_AjaxHandler: copying Light_EasyRoute routes to master...");
        LightEasyRouteHelper::copyRoutesFromPluginToMaster($appDir, "Light_AjaxHandler");
        $output->write("<success>ok.</success>" . PHP_EOL);
    }


}