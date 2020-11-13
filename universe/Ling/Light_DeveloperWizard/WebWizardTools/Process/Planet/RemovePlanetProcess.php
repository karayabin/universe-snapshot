<?php


namespace Ling\Light_DeveloperWizard\WebWizardTools\Process\Planet;


use Ling\Bat\FileSystemTool;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\LightDeveloperWizardCommonProcess;
use Ling\Light_PluginInstaller\Service\LightPluginInstallerService;

/**
 * The RemovePlanetProcess class.
 */
class RemovePlanetProcess extends LightDeveloperWizardCommonProcess
{


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->setName("remove-planet");
        $this->setLabel("Removes a light planet completely.");
        $this->setLearnMoreByHash('remove-planet');
    }


    /**
     * @implementation
     */
    protected function doExecute(array $options = [])
    {
        $util = $this->util;
        $planet = $util->getPlanetName();
        $galaxy = $util->getGalaxyName();
        $cacheDir = '/tmp/Light_DeveloperWizard/RemovePlanetProcess-backup';
        FileSystemTool::mkdir($cacheDir);

        $appDir = $this->container->getApplicationDir();
        $entriesToRemove = [
            $appDir . "/config/data/$planet",
            $appDir . "/config/services/$planet.byml",
            $appDir . "/config/services/$planet.byml.dis",
            $appDir . "/templates/$planet",
            $appDir . "/templates/Light_Mailer/$planet",
            $appDir . "/universe/$galaxy/$planet",
            $appDir . "/universe/LingTalfi/DocBuilder/$planet",
            $appDir . "/www/libs/universe/$galaxy/$planet",
            $appDir . "/www/plugins/$planet",
        ];


        if (true === $this->container->has('plugin_installer')) {
            /**
             * @var $pluginInstaller LightPluginInstallerService
             */
            $pluginInstaller = $this->container->get('plugin_installer');
            if (true === $pluginInstaller->isRegistered($planet)) {
                $pluginInstaller->uninstall($planet);
            }
        }


        $somethingRemoved = false;
        foreach ($entriesToRemove as $x) {
            $y = $this->getSymbolicPath($x);
            if (file_exists($x)) {
                $target = $cacheDir . substr($y, 5); // removing the [app] prefix
                $this->infoMessage("Removing \"$y\" entry.");
                if (is_dir($x)) {
                    FileSystemTool::copyDir($x, $target);
                } else {
                    FileSystemTool::copyFile($x, $target);
                }
                FileSystemTool::remove($x);
                $somethingRemoved = true;
            } else {
                $this->infoMessage("Entry \"$y\" was not found, skipping.");
            }
        }


        if (true === $somethingRemoved) {
            $this->importantMessage("If you accidentally triggered this task, a backup of your files is in the \"$cacheDir\" directory.");
        }
    }

}