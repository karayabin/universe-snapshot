<?php


namespace Ling\Light_Cli\CliTools\Program;

/**
 * The LightCliApplicationInterface interface.
 */
interface LightCliApplicationInterface
{


    /**
     * Returns the appId of the application.
     * @return string
     */
    public function getAppId(): string;


    /**
     * Returns the array of commands provided by the application.
     *
     * @return LightCliCommandInterface[]
     */
    public function getCommands(): array;
}