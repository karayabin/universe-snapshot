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
     * @param array $options
     *
     * @return void
     */
    public function init1(string $appDir, OutputInterface $output, array $options = []): void;


    /**
     * Undoes the init 1 phase.
     *
     * @param string $appDir
     * @param OutputInterface $output
     * @param array $options
     */
    public function undoInit1(string $appDir, OutputInterface $output, array $options = []): void;
}