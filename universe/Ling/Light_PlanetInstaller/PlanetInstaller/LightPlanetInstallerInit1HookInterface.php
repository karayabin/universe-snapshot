<?php


namespace Ling\Light_PlanetInstaller\PlanetInstaller;


use Ling\CliTools\Output\OutputInterface;

/**
 * The LightPlanetInstallerInit1HookInterface interface.
 */
interface LightPlanetInstallerInit1HookInterface
{


    /**
     * Executes the init 1 phase of the install command.
     *
     * See the @page(Light_PlanetInstaller conception notes) for more details.
     *
     * @param string $appDir
     * @param OutputInterface $output
     *
     * @return void
     */
    public function init1(string $appDir, OutputInterface $output): void;


    /**
     * Undoes the init 1 phase.
     *
     * @param string $appDir
     * @param OutputInterface $output
     */
    public function undoInit1(string $appDir, OutputInterface $output): void;
}