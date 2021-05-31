<?php


namespace Ling\Light_PlanetInstaller\PlanetInstaller;


use Ling\CliTools\Output\OutputInterface;

/**
 * The LightPlanetInstallerInit2HookInterface interface.
 */
interface LightPlanetInstallerInit2HookInterface
{


    /**
     * Executes the init 2 phase of the install command.
     *
     * See the @page(Light_PlanetInstaller conception notes) for more details.
     *
     * @param string $appDir
     * @param OutputInterface $output
     *
     * @return void
     */
    public function init2(string $appDir, OutputInterface $output): void;


    /**
     * Undoes the init 2 phase.
     *
     * @param string $appDir
     * @param OutputInterface $output
     */
    public function undoInit2(string $appDir, OutputInterface $output): void;
}