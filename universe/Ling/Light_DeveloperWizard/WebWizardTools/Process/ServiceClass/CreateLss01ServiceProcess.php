<?php


namespace Ling\Light_DeveloperWizard\WebWizardTools\Process\ServiceClass;


use Ling\Bat\FileSystemTool;
use Ling\ClassCooker\FryingPan\Ingredient\ParentIngredient;


/**
 * The CreateLss01ServiceProcess class.
 */
class CreateLss01ServiceProcess extends CreateServiceProcess
{


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->setName("create-lss01-service");
        $this->setLabel("Create a lss01 service.");
        $this->setLearnMoreByHash('create-lss01-service-process');
    }


    /**
     * @implementation
     */
    protected function doExecute(array $options = [])
    {


        $util = $this->util;


        $planetIdentifier = $util->getPlanetIdentifier();
        $hasClassFile = $util->hasBasicServiceClassFile();
        $galaxyName = $this->getContextVar("galaxy");


        //--------------------------------------------
        // SERVICE CLASS
        //--------------------------------------------
        if (true === $hasClassFile) {
            $this->infoMessage("The service class for planet $planetIdentifier was already created.");


            $pan = $this->getFryingPanByFile($util->getBasicServiceClassPath());
            $planet = $util->getPlanetName();
            $tightName = $util->getTightPlanetName();
            $useStatementClass = "Ling\Light_LingStandardService\Service\LightLingStandardService01";
            $pan->addIngredient(ParentIngredient::create()->setValue('LightLingStandardService01', [
                'useStatement' => $useStatementClass,
            ]));

            $this->addServiceFactory($pan, $galaxyName, $planet);

            $pan->cook();


        } else {

            $this->infoMessage("Creating <a  target='_blank' href=\"https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#ling-standard-service-01\">lss01 service class</a> for planet $planetIdentifier.");
            $tpl = __DIR__ . "/../../../assets/class-templates/Service/Lss01ServiceClass.phptpl";
            $planet = $util->getPlanetName();
            $tightName = $util->getTightPlanetName();


            $content = file_get_contents($tpl);
            $content = str_replace([
                "Light_XXX",
                "LightXXX",
            ], [
                $planet,
                $tightName,
            ], $content);
            $dstPath = $util->getBasicServiceClassPath();
            FileSystemTool::mkfile($dstPath, $content);
        }


        $this->createExceptionClass();
        $this->createBasicConfigFile();


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