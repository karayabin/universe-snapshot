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
     *
     * @return void
     */
    public function init3(string $appDir, OutputInterface $output): void;


    /**
     * Undoes the init 3 phase.
     *
     * @param string $appDir
     * @param OutputInterface $output
     */
    public function undoInit3(string $appDir, OutputInterface $output): void;
}