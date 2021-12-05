<?php


namespace Ling\Light_ErrorPop\Light_PlanetInstaller;

use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Logger\Helper\LightLoggerHelper;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightBasePlanetInstaller;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightPlanetInstallerInit2HookInterface;

/**
 * The LightErrorPopPlanetInstaller class.
 */
class LightErrorPopPlanetInstaller extends LightBasePlanetInstaller implements LightPlanetInstallerInit2HookInterface
{

    /**
     * @implementation
     */
    public function init2(string $appDir, OutputInterface $output, array $options = []): void
    {

        $planetDotName = "Ling.Light_ErrorPop";

        //--------------------------------------------
        // logger
        //--------------------------------------------
        $output->write("$planetDotName: registering Ling.Light_Logger listeners to open system...");
        LightLoggerHelper::copyListenersFromPluginToMaster($appDir, $planetDotName);
        $output->write("<success>ok.</success>" . PHP_EOL);
    }

    /**
     * @implementation
     */
    public function undoInit2(string $appDir, OutputInterface $output, array $options = []): void
    {
        $planetDotName = "Ling.Light_ErrorPop";

        //--------------------------------------------
        // logger
        //--------------------------------------------
        $output->write("$planetDotName: unregistering Ling.Light_Logger listeners from open system...");
        LightLoggerHelper::removeListenersFromMaster($appDir, $planetDotName);
        $output->write("<success>ok.</success>" . PHP_EOL);
    }


}