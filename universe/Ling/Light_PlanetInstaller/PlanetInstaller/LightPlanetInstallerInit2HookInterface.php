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
     * @param array $options
     *
     * @return void
     */
    public function init2(string $appDir, OutputInterface $output, array $options = []): void;


    /**
     * Undoes the init 2 phase.
     *
     * @param string $appDir
     * @param OutputInterface $output
     * @param array $options
     */
    public function undoInit2(string $appDir, OutputInterface $output, array $options = []): void;
}