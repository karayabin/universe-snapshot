<?php


namespace Ling\Light_DeveloperWizard\WebWizardTools\Process\ServiceConfig;


use Ling\Light_DeveloperWizard\WebWizardTools\Process\LightDeveloperWizardCommonProcess;


/**
 * The AddPluginInstallerHookProcess class.
 */
class AddPluginInstallerHookProcess extends LightDeveloperWizardCommonProcess
{


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->setName("add-plugin_installer-hook");
        $this->setLabel("Adds a hook to the plugin_installer service.");
        $this->setLearnMore('See the <a href="https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/task-details.md#add-plugin_installer-hook">Add plugin_install hook task detail</a>.');
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
        $serviceName = $util->getServiceName();

        $this->addServiceConfigHook('plugin_installer', [
            'method' => 'registerPlugin',
            'args' => [
                'plugin' => $planet,
                'installer' => '@service(' . $serviceName . ')',
            ],
        ], [
            "plugin" => $planet,
        ]);

    }

}