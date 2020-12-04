<?php


namespace Ling\Light_DeveloperWizard\WebWizardTools\Process\Light_Kit_Admin;


/**
 * The CreateLkaGeneratorConfigProcess class.
 *
 */
class CreateLkaGeneratorConfigProcess extends LightKitAdminBaseProcess
{


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->setName("create-lka-generator-config");
        $this->setLabel("Creates the lka generator config file.");
        $this->setLearnMoreByHash('create-lka-generator-config');
    }


    /**
     * @overrides
     */
    public function prepare()
    {

        parent::prepare();
        $this->mustBeLkaPlanet();
        $this->hostPlanetHasCreateFile();
    }

    /**
     * @implementation
     */
    protected function doExecute(array $options = [])
    {
        $planet = $this->getContextVar("planet");
        $galaxy = $this->getContextVar("galaxy");

        $this->createLkaGeneratorConfigFile([
            'galaxy' => $galaxy,
            'planet' => $planet,
        ], [
            'recreateEverything' => true,
        ]);


    }
}