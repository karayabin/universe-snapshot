<?php


namespace Ling\Light_DeveloperWizard\WebWizardTools\Process\Service;


use Ling\Bat\FileSystemTool;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\LightDeveloperWizardCommonProcess;

/**
 * The EnableServiceProcess class.
 */
class EnableServiceProcess extends LightDeveloperWizardCommonProcess
{


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->setName("enable-service");
        $this->setLabel("Enables a service.");
        $this->setLearnMore('See the <a href="https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/task-details.md#enable-service">Enable service task detail</a>.');
    }

    /**
     * @overrides
     */
    public function prepare()
    {
        parent::prepare();
        $util = $this->util;
        $confFile = $util->getBasicServiceConfigPath() . '.dis';
        if (false === file_exists($confFile)) {
            $x = $this->getSymbolicPath($confFile);
            $this->setDisabledReason("Disabled service config file missing ($x not found).");
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
        if (file_exists($confFile . ".dis")) {
            $this->infoMessage("Renaming \"$x.dis\" to \"$x\".");
            FileSystemTool::rename($confFile . ".dis", $confFile);
        } else {
            $this->infoMessage("File \"$x.dis\" not found, cannot be re-enabled.");
        }


    }

}