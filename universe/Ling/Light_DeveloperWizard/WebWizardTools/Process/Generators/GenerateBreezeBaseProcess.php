<?php


namespace Ling\Light_DeveloperWizard\WebWizardTools\Process\Generators;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_DeveloperWizard\Helper\DeveloperWizardBreezeGeneratorHelper;
use Ling\Light_DeveloperWizard\Helper\DeveloperWizardGenericHelper;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\LightDeveloperWizardBaseProcess;


/**
 * The GenerateBreezeBaseProcess class.
 */
abstract class GenerateBreezeBaseProcess extends LightDeveloperWizardBaseProcess
{

    /**
     * This property holds the genConfigPath for this instance.
     * @var string = null
     */
    private $genConfigPath;

    /**
     * This property holds the genTablePrefixes for this instance.
     * The first prefix is the main prefix representing the plugin.
     *
     * @var array
     */
    private $genTablePrefixes;


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->genConfigPath = null;
        $this->genTablePrefixes = null;
    }


    /**
     * @overrides
     */
    public function prepare()
    {
        parent::prepare();
        $createFileExists = $this->getContextVar("createFileExists");
        if (false === $createFileExists) {
            $this->setDisabledReason('Missing <a target="_blank" href="https://github.com/lingtalfi/TheBar/blob/master/discussions/create-file.md">create file.</a>');
        }

    }







    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Generates the breeze generator config.
     * If it already exists, will overwrite it.
     *
     *
     * @return string
     * @throws \Exception
     */
    protected function generateBreezeConfig()
    {

        $genConfPath = $this->getGeneratorConfigPath();
        $this->infoMessage("Creating generator conf file in $genConfPath.");

        $galaxy = $this->getContextVar("galaxy");
        $planet = $this->getContextVar("planet");
        $createFile = $this->getContextVar("createFile");

        $prefixes = $this->getTablePrefixes();
        $mainPrefix = array_shift($prefixes);


        DeveloperWizardBreezeGeneratorHelper::spawnConfFile($genConfPath, [
            "galaxyName" => $galaxy,
            "planetName" => $planet,
            "createFilePath" => $createFile,
            "prefix" => $mainPrefix,
            "otherPrefixes" => $prefixes,
        ]);
        return null;
    }


    /**
     * Returns the path to the generator config which should be created.
     * @return string
     * @throws \Exception
     */
    protected function getGeneratorConfigPath(): string
    {
        if (null === $this->genConfigPath) {

            /**
             * @var $container LightServiceContainerInterface
             */
            $container = $this->getContextVar("container");
            $appDir = $container->getApplicationDir();
            $planet = $this->getContextVar("planet");
            $planetDir = $this->getContextVar("planetDir");
            $createFile = $this->getContextVar("createFile");
            $tablePrefix = DeveloperWizardGenericHelper::getTablePrefix($planetDir, $createFile);
            $this->genConfigPath = $appDir . "/config/data/$planet/Light_BreezeGenerator/$tablePrefix.generated.byml";
        }
        return $this->genConfigPath;
    }


    /**
     * Returns the main table prefix.
     * @return string
     * @throws \Exception
     */
    protected function getMainTablePrefix(): string
    {
        $prefixes = $this->getTablePrefixes();
        return array_shift($prefixes);
    }


    /**
     * Returns an array of table prefixes, based on the create file.
     * Throws an exception if the array is empty.
     *
     * The first prefix is the main table prefix.
     *
     * @return array
     * @throws \Exception
     */
    protected function getTablePrefixes(): array
    {
        if (null === $this->genTablePrefixes) {
            $container = $this->getContextVar("container");
            $createFile = $this->getContextVar("createFile");
            $this->genTablePrefixes = DeveloperWizardGenericHelper::getTablePrefixes($createFile, $container);
            if (count($this->genTablePrefixes) < 1) {
                $createFile = $this->getContextVar("createFile");
                $this->error("No table prefix found in the create file: $createFile.");
            }
        }
        return $this->genTablePrefixes;
    }
}