<?php


namespace Kamille\Mvc\WidgetInstaller;

use Kamille\Architecture\ApplicationParameters\ApplicationParameters;
use Kamille\Mvc\WidgetInstaller\Exception\KamilleWidgetInstallerException;
use Kamille\Utils\ModuleUtils\WidgetInstallerTool;
use Output\ProgramOutputAwareInterface;
use Output\ProgramOutputInterface;


/**
 * This class helps you implementing basic widgets install tasks, like:
 * - mapping the module files to the application
 *      (just create a files/app directory inside your module directory)
 *
 *
 * But there is a philosophy that comes with it (that's the price to pay).
 * So the philosophy is that a widget install/uninstall is composed of steps.
 *
 * Each widget uses a certain number of steps (depending on the widget);
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
abstract class KamilleWidgetInstaller implements ProgramOutputAwareInterface, WidgetInstallerInterface
{
    /**
     * @var ProgramOutputInterface $output
     */
    private $output;
    /**
     * @var array of id => label
     */
    private $steps;


    public function __construct()
    {
        $this->steps = [];
    }


    public function install()
    {
        $steps = [];
        $this->collectAutoSteps($steps, 'install');
        $this->registerSteps($steps, 'install');
        $this->steps = $steps;


        $this->installAuto();
        $this->installWidget();
    }

    public function uninstall()
    {
        $steps = [];
        $this->collectAutoSteps($steps, 'uninstall');
        $this->registerSteps($steps, 'uninstall');
        $this->steps = $steps;

        $this->uninstallAuto();
        $this->uninstallWidget();
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    public function setProgramOutput(ProgramOutputInterface $output)
    {
        $this->output = $output;
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function installWidget()
    {

    }

    protected function uninstallWidget()
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
            throw new KamilleWidgetInstallerException("step $stepId doesn't exist");
        }
    }


    protected function stopStep($stepId, $text = "done")
    {
        if (array_key_exists($stepId, $this->steps)) {
            if ("done" === $text) {
                $this->getOutput()->success($text);
            }
        } else {
            throw new KamilleWidgetInstallerException("step $stepId doesn't exist");
        }
    }


    protected function collectAutoSteps(array &$steps, $type)
    {
        if (true === $this->useAutoFiles()) {
            if ('install' === $type) {
                $steps['files'] = "Installing files";
            } else {
                $steps['files'] = "Uninstalling files";
            }
        }
    }

    protected function installAuto()
    {
        if (true === $this->useAutoFiles()) {
            $this->startStep('files');
            WidgetInstallerTool::installFiles($this);
            $this->stopStep('files', "done");
        }
    }

    protected function uninstallAuto()
    {
        if (true === $this->useAutoFiles()) {
            $this->startStep('files');
            WidgetInstallerTool::uninstallFiles($this);
            $this->stopStep('files', "done");
        }
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    protected function getPlanets()
    {
        /**
         * Override this if your widget uses planets.
         * Not implemented yet.
         */
        return [];
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    private function useAutoFiles()
    {
        $d = $this->getWidgetDir();
        $f = $d . "/files/app";
        return (file_exists($f));
    }


    private function getWidgetName()
    {
        $className = get_called_class();
        $p = explode('\\', $className);
        array_shift($p); // drop the Widget prefix
        return $p[0];
    }

    private function getWidgetDir()
    {
        $moduleName = $this->getWidgetName();
        $appDir = ApplicationParameters::get("app_dir");
        return $appDir . "/class-widgets/$moduleName";
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

}