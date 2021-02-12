<?php


namespace Ling\Light_PlanetInstaller\PlanetInstaller;


use Ling\CliTools\Output\OutputInterface;

/**
 * The LightPlanetInstallerInterface interface.
 */
interface LightPlanetInstallerInterface
{


    /**
     * This hook is executed during an [install](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary).
     * It was first designed to allow  plugin authors to configure their light's service's conf file before the "logic installs" starts.
     *
     * @param string $appDir
     * @param OutputInterface $output
     *
     * @return void
     */
    public function onMapCopyAfter(string $appDir, OutputInterface $output): void;
}