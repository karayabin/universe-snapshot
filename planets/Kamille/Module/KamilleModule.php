<?php


namespace Kamille\Module;


use ApplicationItemManager\ApplicationItemManagerInterface;
use ApplicationItemManager\Aware\ApplicationItemManagerAwareInterface;
use Kamille\Architecture\ApplicationParameters\ApplicationParameters;

use Kamille\Module\Exception\KamilleModuleException;
use Kamille\Services\XConfig;
use Kamille\Utils\ModuleUtils\ModuleInstallTool;
use Output\ProgramOutputAwareInterface;
use Output\ProgramOutputInterface;


/**
 * This class helps you implementing basic module install tasks, like:
 * - mapping the module files to the application
 *      (just create a files/app directory inside your module directory)
 *
 *
 * But there is a philosophy that comes with it (that's the price to pay).
 * So the philosophy is that a module install/uninstall is composed of steps.
 *
 * Each module uses a certain number of steps (depending on the module);
 * the idea is to be able to display the following to the user:
 *
 * - step 1/5: installing files
 * - step 2/5: installing database
 * - ...
 *
 * So the benefit of having steps is that we have some kind of map/synopsis,
 * and we know in advance HOW MANY steps are required, which is the useful information
 * this philosophy try to promote.
 *
 * Some steps are registered automatically by this class (for files/app for instance, and other
 * auto mechanisms); and you need to register your own steps with the registerSteps method.
 *
 *
 *
 */
abstract class KamilleModule implements ProgramOutputAwareInterface, ModuleInterface, ApplicationItemManagerAwareInterface
{

    /**
     * @var ApplicationItemManagerInterface
     */
    private $widgetApplicationItemManager;
    /**
     * @var ProgramOutputInterface $output
     */
    protected $output;
    /**
     * @var array of id => label
     */
    private $steps;
    private $hooksActive;


    public function __construct()
    {
        $this->steps = [];
        $this->hooksActive = true;
    }


    public function install()
    {
        $steps = [];
        $this->collectAutoSteps($steps, 'install');
        $this->registerSteps($steps, 'install');
        $this->steps = $steps;


        $this->installAuto();
        $this->installModule();
    }

    public function uninstall()
    {
        $steps = [];
        $this->collectAutoSteps($steps, 'uninstall');
        $this->registerSteps($steps, 'uninstall');
        $this->steps = $steps;

        $this->uninstallAuto();
        $this->uninstallModule();
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    public function setProgramOutput(ProgramOutputInterface $output)
    {
        $this->output = $output;
        return $this;
    }

    /**
     * Note: maybe we don't need to pass the whole itemManager to
     * this class, we just need an interface with the installWidget method.
     *
     * So, as for now, I'm passing the whole ApplicationItemManager, but
     * consider this as a private mean, you should't rely on that,
     * I might change it in the future.
     */
    public function setApplicationItemManager(ApplicationItemManagerInterface $widgetApplicationItemManager)
    {
        $this->widgetApplicationItemManager = $widgetApplicationItemManager;
        return $this;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    protected function installModule()
    {

    }

    protected function uninstallModule()
    {

    }


    /**
     * @param $type , string (install|uninstall)
     */
    protected function registerSteps(array &$steps, $type)
    {

    }


    protected function startStep($stepId)
    {
        if (array_key_exists($stepId, $this->steps)) {
            $label = $this->getStepLabel($stepId);
            $this->getOutput()->notice($label, false);
        } else {
            throw new KamilleModuleException("step $stepId doesn't exist");
        }
    }


    protected function stopStep($stepId, $text = "done")
    {
        if (array_key_exists($stepId, $this->steps)) {
            if ("done" === $text) {
                $counter = $this->getStepCounter($stepId);
//                $msg = $counter . " " . $text; // try that if you prefer..?
                $msg = $text;
                $this->getOutput()->success($msg);
            } else {
                $this->getOutput()->info($text);
            }
        } else {
            throw new KamilleModuleException("step $stepId doesn't exist");
        }
    }


    protected function collectAutoSteps(array &$steps, $type)
    {
        if (true === $this->useConfig()) {
            if ('install' === $type) {
                $steps['config'] = "Copying module config file";
            } else {
                $steps['config'] = "Removing module config file";
            }
        }
        if (true === $this->useRoutsy()) {
            if ('install' === $type) {
                $steps['routsy'] = "Copying routsy configuration to the application";
            } else {
                $steps['routsy'] = "Removing routsy configuration from the application";
            }
        }
        if (true === $this->useAutoFiles()) {
            if ('install' === $type) {
                $steps['files'] = "Installing files";
            } else {
                $steps['files'] = "Uninstalling files";
            }
        }
        if (true === $this->useXServices()) {
            if ('install' === $type) {
                $steps['xservices'] = "Installing services";
            } else {
                $steps['xservices'] = "Uninstalling services";
            }
        }
        if (true === $this->useHooks()) {
            if ('install' === $type) {
                $steps['hooks'] = "Installing hooks";
            } else {
                $steps['hooks'] = "Uninstalling hooks";
            }
        }
        if (true === $this->useControllers()) {
            if ('install' === $type) {
                $steps['controllers'] = "Installing controllers";
            } else {
                $steps['controllers'] = "Uninstalling controllers";
            }
        }

        if (true === $this->useWidgets()) {
            if ('install' === $type) {
                $steps['widgets'] = "Installing widgets";
            } else {
                /**
                 * Actually, let the user remove the widgets herself,
                 * if it's a module dependent widget, you should use the file system (files/app)
                 * to bring/remove your widgets to the app.
                 *
                 * But here, we are installing standalone widgets that might be used by other modules.
                 */
//                $steps['widgets'] = "Uninstalling widgets";
            }
        }

        if (true === $this->useProfiles()) {
            if ('install' === $type) {
                $steps['profiles'] = "Installing Authenticate profiles";
            } else {
                $steps['profiles'] = "Uninstalling Authenticate profiles";
            }
        }

        if (true === $this->useDatabase()) {
            if ('install' === $type) {
                $steps['database'] = "Installing database";
            } else {
                $steps['database'] = "Uninstalling database";
            }
        }
    }

    protected function installAuto()
    {
        if (true === $this->useConfig()) {
            $this->startStep('config');
            ModuleInstallTool::installConfig($this);
            $this->stopStep('config', "done");
        }

        if (true === $this->useRoutsy()) {
            $this->startStep('routsy');
            ModuleInstallTool::installRoutsy($this);
            $this->stopStep('routsy', "done");
        }

        if (true === $this->useAutoFiles()) {
            $this->startStep('files');
            ModuleInstallTool::installFiles($this);
            $this->stopStep('files', "done");
        }

        if (true === $this->useXServices()) {
            $this->startStep('xservices');
            $n = $this->getModuleName();
            $moduleName = 'Module\\' . $n . '\\' . $n . "Services";
            ModuleInstallTool::bindModuleServices($moduleName);
            $this->stopStep('xservices', "done");
        }

        if (true === $this->useHooks()) {
            $this->startStep('hooks');
            $n = $this->getModuleName();
            $moduleName = 'Module\\' . $n . '\\' . $n . "Hooks";
            ModuleInstallTool::bindModuleHooks($moduleName);
            $this->stopStep('hooks', "done");
        }


        if (true === $this->useControllers()) {
            $this->startStep('controllers');
            $moduleName = $this->getModuleName();
            ModuleInstallTool::installControllers($moduleName);
            $this->stopStep('controllers', "done");
        }

        if (true === $this->useWidgets()) {
            $this->startStep('widgets');
            $this->output->notice(""); // just br
            ModuleInstallTool::installWidgets($this->widgetApplicationItemManager, $this->getWidgets());
            $this->stopStep('widgets', "done");
        }

        if (true === $this->useProfiles()) {
            $this->startStep('profiles');
            $this->output->notice(""); // just br
            ModuleInstallTool::installProfiles($this);
            $this->stopStep('profiles', "done");
        }

        if (true === $this->useDatabase()) {
            $this->startStep('database');
            $this->output->notice(""); // just br
            $this->installDatabase();
            $this->stopStep('database', "done");
        }
    }


    protected function uninstallAuto()
    {
        if (true === $this->useConfig()) {
            $this->startStep('config');
            $this->handleStep(function () {
                ModuleInstallTool::uninstallConfig($this);
            });
            $this->stopStep('config', "done");
        }

        if (true === $this->useRoutsy()) {
            $this->startStep('routsy');
            $this->handleStep(function () {
                ModuleInstallTool::uninstallRoutsy($this);
            });
            $this->stopStep('routsy', "done");
        }


        if (true === $this->useAutoFiles()) {
            $this->startStep('files');
            $this->handleStep(function () {
                ModuleInstallTool::uninstallFiles($this);
            });
            $this->stopStep('files', "done");
        }

        if (true === $this->useXServices()) {
            $this->startStep('xservices');
            $this->handleStep(function () {
                $n = $this->getModuleName();
                $moduleName = 'Module\\' . $n . '\\' . $n . "Services";
                ModuleInstallTool::unbindModuleServices($moduleName);
            });
            $this->stopStep('xservices', "done");
        }

        if (true === $this->useHooks()) {
            $this->startStep('hooks');
            $this->handleStep(function () {
                $n = $this->getModuleName();
                $moduleName = 'Module\\' . $n . '\\' . $n . "Hooks";
                ModuleInstallTool::unbindModuleHooks($moduleName);
            });
            $this->stopStep('hooks', "done");
        }


        if (true === $this->useControllers()) {
            $this->startStep('controllers');
            /**
             * you don't want to remove userland code, do you?
             */
//            $moduleName = $this->getModuleName();
//            ModuleInstallTool::uninstallControllers($moduleName);
            $this->stopStep('controllers', "skipped, don't want to remove userland code");
        }

        if (true === $this->useProfiles()) {
            $this->startStep('profiles');
            $this->output->notice(""); // just br
            ModuleInstallTool::uninstallProfiles($this);
            $this->stopStep('profiles', "done");
        }

        if (true === $this->useDatabase()) {
            $this->startStep('database');
            $this->output->notice(""); // just br
            $this->uninstallDatabase();
            $this->stopStep('database', "done");
        }

    }



    //--------------------------------------------
    //
    //--------------------------------------------
    protected function getPlanets()
    {
        /**
         * Override this if your module uses planets.
         * Not implemented yet.
         */
        return [];
    }

    protected function getWidgets()
    {
        /**
         * Override this if your module uses widgets
         */
        return [];
    }


    /**
     * This is experimental and might be removed in the future,
     * don't use/override it: it's just a memo for me.
     *
     * Basically, the idea is that your module is saying:
     * Hi, I will be using layout convention lnc1 (https://github.com/lingtalfi/layout-naming-conventions),
     * and therefore I expect some files to be there (basically the lnc1 files for the _default_ theme):
     *
     * - theme/_default_/layouts/sandwich_1c/default.php
     * - theme/_default_/layouts/sandwich_2c/default.php
     * - ...
     * and
     * - www/theme/_default_/layouts/sandwich_2c.default.css
     * - ...
     *
     *
     */
    protected function getLayoutConventionName()
    {
        return 'lnc1';
    }

    protected function disableHooks()
    {
        $this->hooksActive = false;
        return $this;
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    private function useAutoFiles()
    {
        $d = $this->getModuleDir();
        $f = $d . "/files/app";
        return (file_exists($f));
    }

    private function useConfig()
    {
        $d = $this->getModuleDir();
        $f = $d . "/conf.php";
        return (file_exists($f));
    }

    private function useRoutsy()
    {
        $d = $this->getModuleDir();
        $f = $d . "/routsy";
        return (is_dir($f));
    }

    private function useWidgets()
    {
        return (count($this->getWidgets()) > 0);
    }

    private function useControllers()
    {
        $d = $this->getModuleDir();
        $f = $d . "/Controller";
        return (file_exists($f));
    }


    private function useXServices()
    {
        $d = $this->getModuleDir();
        $n = $this->getModuleName();
        $f = $d . "/$n" . "Services.php";
        return (file_exists($f));
    }

    private function useHooks()
    {
        if (true === $this->hooksActive) {
            $d = $this->getModuleDir();
            $n = $this->getModuleName();
            $f = $d . "/$n" . "Hooks.php";
            return (file_exists($f));
        }
        return false;
    }

    private function useProfiles()
    {
        $d = $this->getModuleDir();
        $f = $d . "/profiles.php";
        return (file_exists($f));
    }

    private function useDatabase()
    {
        return (
            method_exists($this, "installDatabase") &&
            method_exists($this, "uninstallDatabase")
        );
    }

    private function getModuleName()
    {
        $className = get_called_class();
        $p = explode('\\', $className);
        array_shift($p); // drop the Module prefix
        return $p[0];
    }

    private function getModuleDir()
    {
        $moduleName = $this->getModuleName();
        $appDir = ApplicationParameters::get("app_dir");
        return $appDir . "/class-modules/$moduleName";
    }

    /**
     * @return ProgramOutputInterface
     */
    private function getOutput()
    {
        return $this->output;
    }

    private function getStepLabel($stepId)
    {
        $n = 0;
        $label = null;
        foreach ($this->steps as $id => $label) {
            $n++;
            if ($id === $stepId) {
                break;
            }
        }
        $count = count($this->steps);
        $msg = "----> Step $n/$count: $label ... ";
        return $msg;
    }


    private function getStepCounter($stepId)
    {
        $n = 0;
        $label = null;
        foreach ($this->steps as $id => $label) {
            $n++;
            if ($id === $stepId) {
                break;
            }
        }
        $count = count($this->steps);
        $msg = "$n/$count";
        return $msg;
    }


    private function handleStep($fn)
    {
        try {
            call_user_func($fn);
        } catch (\Exception $e) {
            $debug = ApplicationParameters::get("debug");
            if (true === $debug) {
                echo $e;
            } else {
                throw $e;
            }
        }
    }
}