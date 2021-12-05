<?php


namespace Ling\Light_DeveloperWizard\WebWizardTools\Process\Light_PlanetInstaller;


use Ling\Light_DeveloperWizard\Exception\LightDeveloperWizardException;
use Ling\Light_DeveloperWizard\Helper\DeveloperWizardLightPlanetInstallerHelper;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\LightDeveloperWizardCommonProcess;


/**
 * The CreatePlanetInstallerExtendingLightDatabaseBasePlanetInstaller class.
 */
class CreatePlanetInstallerExtendingLightDatabaseBasePlanetInstaller extends LightDeveloperWizardCommonProcess
{


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->setName("create-light_planetinstaller-class-with-database");
        $this->setLabel("Creates a light planet installer class with database.");
        $this->setLearnMoreByHash('create-light_planetinstaller-class-with-database');
    }


    /**
     * @implementation
     */
    protected function doExecute(array $options = [])
    {
        //--------------------------------------------
        // PLANET
        //--------------------------------------------
        $planet = $this->getContextVar("planet");
        $galaxy = $this->getContextVar("galaxy");
        $appDir = $this->container->getApplicationDir();

        try {
            $this->message("Creating planet installer...", "info");
            DeveloperWizardLightPlanetInstallerHelper::createPlanetInstaller($galaxy, $planet, $appDir);


        } catch (LightDeveloperWizardException $e) {
            $this->message($e->getMessage(), "warning");
        } catch (\Exception $e) {
            $this->errorMessage("An exception occurred: " . $e->getMessage());
        }

    }


}