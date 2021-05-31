<?php


namespace Ling\Light_DeveloperWizard\WebWizardTools\Process\ServiceClass;


use Ling\Bat\FileSystemTool;
use Ling\ClassCooker\FryingPan\Ingredient\MethodIngredient;
use Ling\ClassCooker\FryingPan\Ingredient\UseStatementIngredient;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\LightDeveloperWizardCommonProcess;


/**
 * The CreateServiceProcess class.
 */
class CreateServiceProcess extends LightDeveloperWizardCommonProcess
{


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->setName("create-basic-service");
        $this->setLabel("Create a basic service.");
        $this->setLearnMoreByHash('create-service-process');
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
            $useStatementClass = "$galaxyName\\$planet\Exception\\${tightName}Exception";
            $pan->addIngredient(UseStatementIngredient::create()->setValue($useStatementClass));


            $this->addServiceContainer($pan);
            $this->addServiceOptions($pan, $planet);


            $pan->addIngredient(MethodIngredient::create()->setValue("error", [
                'template' => '
    /**
     * Throws an exception.
     *
     * @param string $msg
     * @param int|null $code
     * @throws \Exception
     */
    private function error(string $msg, int $code = null)
    {
        throw new ' . $tightName . 'Exception(static::class . ": " . $msg, $code);
    }
    
',
            ]));


            $pan->cook();


        } else {

            $this->infoMessage("Creating <a target='_blank' href=\"https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#basic-service\">basic service class</a> for planet $planetIdentifier.");
            $tpl = __DIR__ . "/../../../assets/class-templates/Service/BasicServiceClass.phptpl";
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


    }


    /**
     * Creates the exception class (of the @page(basic service convention)) if necessary.
     */
    protected function createExceptionClass()
    {

        $util = $this->util;
        $hasExceptionFile = $util->hasBasicServiceExceptionFile();
        $planetIdentifier = $util->getPlanetIdentifier();

        //--------------------------------------------
        // EXCEPTION CLASS
        //--------------------------------------------
        if (true === $hasExceptionFile) {
            $this->infoMessage("The planet $planetIdentifier already has an exception class.");

        } else {
            $this->infoMessage("Creating <a target='_blank' href=\"https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#basic-service\">basic service exception</a> for planet $planetIdentifier.");
            $tpl = __DIR__ . "/../../../assets/class-templates/Exception/BasicException.phptpl";

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
            $dstPath = $util->getBasicServiceExceptionPath();
            FileSystemTool::mkfile($dstPath, $content);
        }

    }


    /**
     * Creates @page(the basic service config file) if not there already.
     */
    protected function createBasicConfigFile()
    {

        $util = $this->util;
        $hasServiceConfigFile = $util->hasBasicServiceConfigFile();
        $planetIdentifier = $util->getPlanetIdentifier();

        //--------------------------------------------
        // SERVICE CONFIG FILE
        //--------------------------------------------
        if (true === $hasServiceConfigFile) {
            $this->infoMessage("The planet $planetIdentifier already has a service config file.");

        } else {
            $dstPath = $util->getBasicServiceConfigPath();

            $this->infoMessage("Creating <a target='_blank' href=\"https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#basic-service\">basic service config file</a> for planet $planetIdentifier.");
            $tpl = __DIR__ . "/../../../assets/conf-template/services/basic-service.byml";

            $planet = $util->getPlanetName();
            $tightName = $util->getTightPlanetName();
            $serviceName = $util->getServiceName();


            $content = file_get_contents($tpl);
            $content = str_replace([
                "task_xxx",
                "Light_XXX",
                "LightXXX",
            ], [
                $serviceName,
                $planet,
                $tightName,
            ], $content);
            FileSystemTool::mkfile($dstPath, $content);
        }
    }


}