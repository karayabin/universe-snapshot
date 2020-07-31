<?php


namespace Ling\Light_DeveloperWizard\WebWizardTools\Process\Service;


use Ling\Bat\ClassTool;
use Ling\Bat\FileSystemTool;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\LightDeveloperWizardCommonProcess;
use Ling\Light_PluginInstaller\PluginInstaller\PluginInstallerInterface;
use Ling\Light_PluginInstaller\Service\LightPluginInstallerService;

/**
 * The RemoveServiceProcess class.
 */
class RemoveServiceProcess extends LightDeveloperWizardCommonProcess
{


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->setName("remove-service");
        $this->setLabel("Removes a service completely.");
        $this->setLearnMore('See the <a href="https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/task-details.md#remove-service">Remove service task detail</a>.');
    }


    /**
     * @implementation
     */
    protected function doExecute(array $options = [])
    {
        $util = $this->util;
        $planet = $util->getPlanetName();
        $galaxy = $util->getGalaxyName();
        $cacheDir = '/tmp/Light_DeveloperWizard/RemoveServiceProcess-backup';
        FileSystemTool::mkdir($cacheDir);

        $appDir = $this->container->getApplicationDir();
        $entriesToRemove = [
            $appDir . "/config/data/$planet",
            $appDir . "/config/services/$planet.byml",
            $appDir . "/config/services/$planet.byml.dis",
            $appDir . "/templates/$planet",
            $appDir . "/universe/$galaxy/$planet",
            $appDir . "/www/plugins/$planet",
        ];



        if(true === $this->container->has('plugin_installer')){
            /**
             * @var $pluginInstaller LightPluginInstallerService
             */
            $pluginInstaller = $this->container->get('plugin_installer');
            if(true===$pluginInstaller->isRegistered($planet)){
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