<?php


namespace Ling\Light_DeveloperWizard\WebWizardTools\Process\ServiceConfig;


use Ling\Light_DeveloperWizard\Helper\ConfigHelper;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\LightDeveloperWizardCommonProcess;


/**
 * The SortHooksAlphabeticallyProcess class.
 */
class SortHooksAlphabeticallyProcess extends LightDeveloperWizardCommonProcess
{


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->setName("sort-hooks-alphabetically");
        $this->setLabel("Sorts the hooks found in the service config file alphabetically.");
        $this->setLearnMoreByHash('sort-hooks-alphabetically');
    }


    /**
     * @overrides
     */
    public function prepare()
    {
        parent::prepare();
        if (true === empty($this->getDisabledReason())) {
            $util = $this->util;
            $confFile = $util->getBasicServiceConfigPath();
            if (false === file_exists($confFile)) {
                $x = $this->getSymbolicPath($confFile);
                $this->setDisabledReason("Service config file missing ($x not found).");
            }
        }
    }

    /**
     * @implementation
     */
    protected function doExecute(array $options = [])
    {
        $confFile = $this->util->getBasicServiceConfigPath();
        ConfigHelper::sortHooks($confFile);
    }

}