<?php


namespace Ling\Light_DeveloperWizard\WebWizardTools\Process\Planet;


use Ling\Bat\FileSystemTool;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\LightDeveloperWizardCommonProcess;

/**
 * The CreateConceptionNotesProcess class.
 */
class CreateConceptionNotesProcess extends LightDeveloperWizardCommonProcess
{


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->setName("create-conception-notes");
        $this->setLabel("Creates the conception notes for this planet.");
        $this->setLearnMoreByHash('create-conception-notes');
        $this->mustBeLight = false;
    }


    /**
     * @implementation
     */
    protected function doExecute(array $options = [])
    {
        $util = $this->util;
        $planet = $util->getPlanetName();
        $galaxy = $util->getGalaxyName();

        $appDir = $this->container->getApplicationDir();


        $path = $appDir . "/universe/$galaxy/$planet/personal/mydoc/pages/conception-notes.md";
        $date = date('Y-m-d');
        $content = <<<EEE
$planet, conception notes
================
$date



EEE;

        FileSystemTool::mkfile($path, $content);
        $this->infoMessage("Creating conception notes at " . $this->getSymbolicPath($path) . ".");

    }

}