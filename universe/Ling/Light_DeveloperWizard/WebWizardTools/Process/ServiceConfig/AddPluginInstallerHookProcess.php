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
        $this->setLearnMoreByHash('add-plugin_installer-hook');
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


            $serviceName = $util->getServiceName();
            $planet = $util->getPlanetName();

            if (true === $util->configHasHook('plugin_installer', [
                    "with" => [
                        'method' => 'registerPlugin',
                        'args' => [
                            'plugin' => $planet,
                        ],
                    ],
                ])) {
                $this->setDisabledReason("The service config file already has a hook to the \"$serviceName\" service (for planet \"$planet\").");
            }
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