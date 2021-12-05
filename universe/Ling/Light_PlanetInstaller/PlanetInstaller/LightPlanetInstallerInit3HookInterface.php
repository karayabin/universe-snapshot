<?php


namespace Ling\Light_PlanetInstaller\PlanetInstaller;


use Ling\CliTools\Output\OutputInterface;

/**
 * The LightPlanetInstallerInit3HookInterface interface.
 */
interface LightPlanetInstallerInit3HookInterface
{


    /**
     * Executes the init 3 phase of the install command.
     *
     * See the @page(Light_PlanetInstaller conception notes) for more details.
     *
     * @param string $appDir
     * @param OutputInterface $output
     * @param array $options
     *
     * @return void
     */
    public function init3(string $appDir, OutputInterface $output, array $options = []): void;


    /**
     * Undoes the init 3 phase.
     *
     * Available options are:
     *
     * - isUpgrade: bool=false. Whether the calling process comes from the upgrade command.
     *
     *
     * @param string $appDir
     * @param OutputInterface $output
     * @param array $options
     */
    public function undoInit3(string $appDir, OutputInterface $output, array $options = []): void;
}