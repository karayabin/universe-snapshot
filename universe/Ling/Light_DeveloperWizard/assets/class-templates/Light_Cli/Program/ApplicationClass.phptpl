<?php


namespace Ling\Light_PlanetInstallerXXX\CliTools\Program;

use Ling\CliTools\Command\CommandInterface;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light_Cli\CliTools\Program\LightCliBaseApplication;
use Ling\Light_PlanetInstallerXXX\CliTools\Command\LightPlanetInstallerBaseCommand;
use Ling\Light_PlanetInstallerXXX\Exception\LightPlanetInstallerException;
use Ling\Light_PlanetInstallerXXX\Helper\LpiHelper;

/**
 * The LightPlanetInstallerApplication class.
 *
 *
 * Nomenclature
 * ----------------
 *
 * ### planetInfo
 * The planetInfo array is an array with the following structure:
 *
 * - 0: planet path     (string)
 * - 1: galaxy name     (string)
 * - 2: planet name     (string)
 * - 3: real version number  (string)
 *
 *
 *
 */
class LightPlanetInstallerApplication extends LightCliBaseApplication
{


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->registerCommand("Ling\Light_PlanetInstallerXXX\CliTools\Command\DemoCommand", "demo_command");
        $this->registerCommand("Ling\Light_PlanetInstallerXXX\CliTools\Command\HelpCommand", "help");
    }



    //--------------------------------------------
    // LightCliBaseApplication
    //--------------------------------------------
    /**
     * @implementation
     */
    public function getAppId(): string
    {
        return LpiHelper::getAppId();
    }





    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @overrides
     */
    protected function onCommandInstantiated(CommandInterface $command)
    {
        if ($command instanceof LightServiceContainerAwareInterface) {
            $command->setContainer($this->container);
        }
        if ($command instanceof LightPlanetInstallerBaseCommand) {
            $command->setApplication($this);
        } else {
            throw new LightPlanetInstallerException("All commands must inherit LightPlanetInstallerBaseCommand.");
        }
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an exception.
     *
     * @param string $msg
     * @param int|null $code
     * @throws \Exception
     */
    private function error(string $msg, int $code = null)
    {
        throw new LightPlanetInstallerException($msg, $code);
    }


}