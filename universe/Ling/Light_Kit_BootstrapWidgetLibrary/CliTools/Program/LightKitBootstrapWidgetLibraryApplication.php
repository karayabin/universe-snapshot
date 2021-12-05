<?php


namespace Ling\Light_Kit_BootstrapWidgetLibrary\CliTools\Program;

use Ling\CliTools\Command\CommandInterface;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light_Cli\CliTools\Program\LightCliBaseApplication;
use Ling\Light_Kit_BootstrapWidgetLibrary\CliTools\Command\LightKitBootstrapWidgetLibraryBaseCommand;
use Ling\Light_Kit_BootstrapWidgetLibrary\Exception\LightKitBootstrapWidgetLibraryException;
use Ling\Light_Kit_BootstrapWidgetLibrary\Helper\LightKitBootstrapWidgetLibraryHelper;

/**
 * The LightKitBootstrapWidgetLibraryApplication class.
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
class LightKitBootstrapWidgetLibraryApplication extends LightCliBaseApplication
{


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->registerCommand("Ling\Light_Kit_BootstrapWidgetLibrary\CliTools\Command\CreateWidgetCommand", "create_widget");
        $this->registerCommand("Ling\Light_Kit_BootstrapWidgetLibrary\CliTools\Command\HelpCommand", "help");
    }



    //--------------------------------------------
    // LightCliBaseApplication
    //--------------------------------------------
    /**
     * @implementation
     */
    public function getAppId(): string
    {
        return LightKitBootstrapWidgetLibraryHelper::getAppId();
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
        if ($command instanceof LightKitBootstrapWidgetLibraryBaseCommand) {
            $command->setApplication($this);
        } else {
            throw new LightKitBootstrapWidgetLibraryException("All commands must inherit LightKitBootstrapWidgetLibraryBaseCommand.");
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
        throw new LightKitBootstrapWidgetLibraryException($msg, $code);
    }


}