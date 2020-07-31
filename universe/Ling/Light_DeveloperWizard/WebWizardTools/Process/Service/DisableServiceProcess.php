<?php


namespace Ling\Light_DeveloperWizard\WebWizardTools\Process\Service;


use Ling\Bat\FileSystemTool;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\LightDeveloperWizardCommonProcess;

/**
 * The DisableServiceProcess class.
 */
class DisableServiceProcess extends LightDeveloperWizardCommonProcess
{


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->setName("disable-service");
        $this->setLabel("Disables a service.");
        $this->setLearnMore('See the <a href="https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/task-details.md#disable-service">Disable service task detail</a>.');
    }


    /**
     * @overrides
     */
    public function prepare()
    {
        parent::prepare();
        $util = $this->util;
        $confFile = $util->getBasicServiceConfigPath();
        if (false === file_exists($confFile)) {
            $x = $this->getSymbolicPath($confFile);
            $this->setDisabledReason("Service config file missing ($x not found).");
        }

    }


    /**
     * @implementation
     */
    protected function doExecute(array $options = [])
    {
        $util = $this->util;
        $planet = $util->getPlanetName();
        $appDir = $this->container->getApplicationDir();

        $confFile = $appDir . "/config/services/$planet.byml";
        $x = $this->getSymbolicPath($confFile);
        if (file_exists($confFile)) {
            $this->infoMessage("Renaming \"$x\" to \"$x.dis\".");
            FileSystemTool::rename($confFile, $confFile . ".dis");
        } else {
            $this->infoMessage("Service config file not found: the service is not enabled.");
        }
    }

}