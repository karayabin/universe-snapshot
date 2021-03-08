<?php


namespace Ling\Light_DeveloperWizard\WebWizardTools\Process\ServiceClass;


use Ling\Bat\CaseTool;
use Ling\Bat\ClassTool;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\LightDeveloperWizardCommonProcess;


/**
 * The AddServiceLingBreeze2GetFactoryMethodProcess class.
 */
class AddServiceLingBreeze2GetFactoryMethodProcess extends LightDeveloperWizardCommonProcess
{


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->setName("create-service-get-factory-method");
        $this->setLabel("Adds a (LingBreeze 2) getFactory method to the service if it doesn't exist.");
        $this->setLearnMoreByHash('add-getfactory-method');
    }


    /**
     * @overrides
     */
    public function prepare()
    {
        parent::prepare();
        $classPath = $this->util->getBasicServiceClassPath();
        if (false === file_exists($classPath)) {
            return 'Missing the service class file (' . $this->getSymbolicPath($classPath) . ').';
        }


        $planet = $this->util->getPlanetName();
        $galaxy = $this->util->getGalaxyName();
        $factoryName = 'Custom' . CaseTool::toFlexiblePascal($planet) . 'ApiFactory';
        $factoryClass = $galaxy . "\\" . $planet . '\\Api\\Custom\\' . $factoryName;
        if (false === ClassTool::isLoaded($factoryClass)) {
            return "Factory class not found ($factoryClass). You can add it using the <a target='_blank' href='https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/task-details.md#generate-breeze-api'>Generate Breeze api</a> task";
        }

    }


    /**
     * @implementation
     */
    protected function doExecute(array $options = [])
    {


        $util = $this->util;
        $galaxyName = $this->getContextVar("galaxy");
        $planetName = $this->getContextVar("planet");


        //--------------------------------------------
        // UPDATE SERVICE CLASS
        //--------------------------------------------
        $pan = $this->getFryingPanByFile($util->getBasicServiceClassPath());



        $this->addServiceContainer($pan);
        $this->addServiceFactory($pan, $galaxyName, $planetName);
        $pan->cook();
    }

}