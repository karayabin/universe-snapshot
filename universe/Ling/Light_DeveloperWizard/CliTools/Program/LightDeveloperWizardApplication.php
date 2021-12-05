<?php


namespace Ling\Light_DeveloperWizard\CliTools\Program;

use Ling\CliTools\Command\CommandInterface;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light_Cli\CliTools\Program\LightCliBaseApplication;
use Ling\Light_DeveloperWizard\CliTools\Command\LightDeveloperWizardBaseCommand;
use Ling\Light_DeveloperWizard\Exception\LightDeveloperWizardException;
use Ling\Light_DeveloperWizard\Helper\LightDeveloperWizardHelper;

/**
 * The LightDeveloperWizardApplication class.
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
class LightDeveloperWizardApplication extends LightCliBaseApplication
{


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->registerCommand("Ling\Light_DeveloperWizard\CliTools\Command\CreateControllerCommand", "create_controller");
        $this->registerCommand("Ling\Light_DeveloperWizard\CliTools\Command\HelpCommand", "help");
    }



    //--------------------------------------------
    // LightCliBaseApplication
    //--------------------------------------------
    /**
     * @implementation
     */
    public function getAppId(): string
    {
        return LightDeveloperWizardHelper::getAppId();
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
        if ($command instanceof LightDeveloperWizardBaseCommand) {
            $command->setApplication($this);
        } else {
            throw new LightDeveloperWizardException("All commands must inherit LightDeveloperWizardBaseCommand.");
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
        throw new LightDeveloperWizardException($msg, $code);
    }


}