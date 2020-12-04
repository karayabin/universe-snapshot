<?php


namespace Ling\Light_DeveloperWizard\WebWizardTools\Process\Light_Kit_Admin;


use Ling\Light_DeveloperWizard\Helper\DeveloperWizardLkaHelper;

/**
 * The CreateLkaPlanetProcess class.
 *
 */
class CreateLkaPlanetProcess extends LightKitAdminBaseProcess
{


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->setName("create-lka-planet");
        $this->setLabel("Creates the lka planet (from the source planet).");
        $this->setLearnMoreByHash('create-lka-planet');
    }


    /**
     * @overrides
     */
    public function prepare()
    {
        parent::prepare();
        $this->hasCreateFile();
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
        $newPlanetName = DeveloperWizardLkaHelper::getLkaPlanetNameByPlanet($planet);


        $this->generateLkaPlanet([
            'galaxy' => $galaxy,
            'planet' => $newPlanetName,
        ]);


    }
}