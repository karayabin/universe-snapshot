<?php


namespace Ling\Light_AjaxHandler\Light_PlanetInstaller;


use Ling\CliTools\Output\OutputInterface;
use Ling\Light_EasyRoute\Helper\LightEasyRouteHelper;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightBasePlanetInstaller;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightPlanetInstallerInit2HookInterface;


/**
 * The LightAjaxHandlerPlanetInstaller class.
 */
class LightAjaxHandlerPlanetInstaller extends LightBasePlanetInstaller implements LightPlanetInstallerInit2HookInterface
{


    /**
     * @implementation
     */
    public function init2(string $appDir, OutputInterface $output, array $options = []): void
    {
        $output->write("Ling.Light_AjaxHandler: copying Ling.Light_EasyRoute routes to master...");
        LightEasyRouteHelper::copyRoutesFromPluginToMaster($appDir, "Ling.Light_AjaxHandler");
        $output->write("<success>ok.</success>" . PHP_EOL);
    }


    /**
     * @implementation
     */
    public function undoInit2(string $appDir, OutputInterface $output, array $options = []): void
    {
        $output->write("Ling.Light_AjaxHandler: removing Ling.Light_EasyRoute routes from master...");
        LightEasyRouteHelper::removeRoutesFromMaster($appDir, "Ling.Light_AjaxHandler");
        $output->write("<success>ok.</success>" . PHP_EOL);
    }


}