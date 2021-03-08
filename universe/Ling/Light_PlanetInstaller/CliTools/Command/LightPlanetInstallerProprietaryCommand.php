<?php


namespace Ling\Light_PlanetInstaller\CliTools\Command;

use Ling\CliTools\Output\OutputInterface;
use Ling\Light_PlanetInstaller\Service\LightPlanetInstallerService;

/**
 * The LightPlanetInstallerProprietaryCommand class.
 */
abstract class LightPlanetInstallerProprietaryCommand extends LightPlanetInstallerBaseCommand
{


    /**
     * Executes the post assets/map phase for the given planet dir.
     * @param string $planetDotName
     * @param LightPlanetInstallerService $pis
     * @param OutputInterface $output
     */
    protected function postMapByPlanetDotName(string $planetDotName, LightPlanetInstallerService $pis, OutputInterface $output)
    {
        $planetInstaller = $pis->getInstallerInstance($planetDotName);
        if (null !== $planetInstaller) {
            $appDir = $this->application->getApplicationDirectory();
            $output->write("$planetDotName: executing post assets/map hook..." . PHP_EOL);
            $planetInstaller->onMapCopyAfter($appDir, $output);
        }
    }
}