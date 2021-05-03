<?php


namespace Ling\Light_404Logger\Light_PlanetInstaller;


use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Events\Helper\LightEventsHelper;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightBasePlanetInstaller;


/**
 * The Light404LoggerPlanetInstaller class.
 */
class Light404LoggerPlanetInstaller extends LightBasePlanetInstaller
{


    /**
     * @overrides
     */
    public function onMapCopyAfter(string $appDir, OutputInterface $output): void
    {
        $planetDotName = "Ling.Light_404Logger";
        //--------------------------------------------
        // events
        //--------------------------------------------
        $output->write("$planetDotName: registering open events...");
        LightEventsHelper::registerOpenEventByPlanet($this->container, $planetDotName);
        $output->write("<success>ok.</success>" . PHP_EOL);


    }


}