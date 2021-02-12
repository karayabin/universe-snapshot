<?php


namespace Ling\Light_Cli\CliTools\Program;

/**
 * The LightCliApplicationAwareInterface interface.
 */
interface LightCliApplicationAwareInterface
{

    /**
     * Sets the application.
     * @param LightCliApplicationInterface $app
     * @return void
     */
    public function setApplication(LightCliApplicationInterface $app);
}