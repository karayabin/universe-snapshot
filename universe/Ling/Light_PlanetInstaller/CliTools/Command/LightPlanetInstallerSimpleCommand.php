<?php


namespace Ling\Light_PlanetInstaller\CliTools\Command;

/**
 * The LightPlanetInstallerSimpleCommand class.
 */
abstract class LightPlanetInstallerSimpleCommand extends LightPlanetInstallerBaseCommand
{


    /**
     * Builds the LightPlanetInstallerSimpleCommand instance.
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Writes a message to the current output.
     * @param string $msg
     */
    public function msg(string $msg)
    {
        $this->application->getCurrentOutput()->write($msg);
    }

    /**
     * Writes an error message to the current output.
     * @param string $msg
     */
    public function msgError(string $msg)
    {
        $this->application->getCurrentOutput()->write("<error>$msg</error>");
    }

    /**
     * Writes a success message to the current output.
     * @param string $msg
     */
    public function msgSuccess(string $msg)
    {
        $this->application->getCurrentOutput()->write("<success>$msg</success>");
    }

    /**
     * Writes a warning message to the current output.
     * @param string $msg
     */
    public function msgWarning(string $msg)
    {
        $this->application->getCurrentOutput()->write("<warning>$msg</warning>");
    }

    /**
     * Writes an info message to the current output.
     * @param string $msg
     */
    public function msgInfo(string $msg)
    {
        $this->application->getCurrentOutput()->write("<info>$msg</info>");
    }

    /**
     * Writes a debug message to the current output.
     * @param string $msg
     */
    public function msgDebug(string $msg)
    {
        $this->application->getCurrentOutput()->write("<debug>$msg</debug>");
    }


}