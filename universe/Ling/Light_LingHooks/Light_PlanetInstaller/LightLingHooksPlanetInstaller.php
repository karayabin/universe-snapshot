<?php


namespace Ling\Light_LingHooks\Light_PlanetInstaller;


use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Events\Helper\LightEventsHelper;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightBasePlanetInstaller;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightPlanetInstallerInit2HookInterface;


/**
 * The LightLingHooksPlanetInstaller class.
 */
class LightLingHooksPlanetInstaller extends LightBasePlanetInstaller implements LightPlanetInstallerInit2HookInterface
{


    /**
     * @implementation
     */
    public function init2(string $appDir, OutputInterface $output, array $options = []): void
    {
        $planetDotName = "Ling.Light_LingHooks";
        //--------------------------------------------
        // events
        //--------------------------------------------
        $output->write("$planetDotName: registering open events...");
        LightEventsHelper::registerOpenEventByPlanet($this->container, $planetDotName);
        $output->write("<success>ok.</success>" . PHP_EOL);


    }


    /**
     * @implementation
     */
    public function undoInit2(string $appDir, OutputInterface $output, array $options = []): void
    {
        $planetDotName = "Ling.Light_LingHooks";
        //--------------------------------------------
        // events
        //--------------------------------------------
        $output->write("$planetDotName: unregistering open events...");
        LightEventsHelper::unregisterOpenEventByPlanet($this->container, $planetDotName);
        $output->write("<success>ok.</success>" . PHP_EOL);


    }


}