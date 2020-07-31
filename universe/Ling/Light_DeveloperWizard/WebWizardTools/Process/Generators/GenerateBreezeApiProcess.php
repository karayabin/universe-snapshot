<?php


namespace Ling\Light_DeveloperWizard\WebWizardTools\Process\Generators;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\BDotTool;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_DeveloperWizard\Helper\DeveloperWizardBreezeGeneratorHelper;
use Ling\Light_DeveloperWizard\Tool\DeveloperWizardFileTool;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\LightDeveloperWizardBaseProcess;
use Ling\SqlWizard\Util\MysqlStructureReader;
use Ling\WebWizardTools\Process\WebWizardToolsProcess;


/**
 * The GenerateBreezeApiProcess class.
 */
class GenerateBreezeApiProcess extends LightDeveloperWizardBaseProcess
{

    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->setName("generate-breeze-api");
        $this->setLabel("Generate the api from the create file (using Ling Breeze Generator 2)");
    }


    /**
     * @overrides
     */
    public function prepare()
    {
        parent::prepare();
        $createFileExists = $this->getContextVar("createFileExists");
        if (false === $createFileExists) {
            return 'Missing <a target="_blank" href="https://github.com/lingtalfi/TheBar/blob/master/discussions/create-file.md">create file.</a>';
        }

    }

    /**
     * @implementation
     */
    protected function doExecute(array $options = [])
    {

        $createFileExists = $this->getContextVar("createFileExists");
        $planetDir = $this->getContextVar("planetDir");
        $createFile = $this->getContextVar("createFile");
        $galaxy = $this->getContextVar("galaxy");
        $planet = $this->getContextVar("planet");
        /**
         * @var $container LightServiceContainerInterface
         */
        $container = $this->getContextVar("container");
        $appDir = $container->getApplicationDir();


        if (true === $createFileExists) {

            $tablePrefix = $this->getTablePrefix($planetDir, $createFile);
            $this->infoMessage("Using the table prefix: $tablePrefix.");


            $genConfPath = $appDir . "/config/data/$planet/Light_BreezeGenerator/$tablePrefix.generated.byml";
            if (false === file_exists($genConfPath)) {
                $this->infoMessage("Creating generator conf file in $genConfPath.");
                DeveloperWizardBreezeGeneratorHelper::spawnConfFile($genConfPath, [
                    "galaxyName" => $galaxy,
                    "planetName" => $planet,
                    "createFilePath" => $createFile,
                    "prefix" => $tablePrefix,
                    "otherPrefixes" => [], // collecting all prefixes from db?
                ]);
            }

            $genConf = BabyYamlUtil::readFile($genConfPath);
            $this->infoMessage("Generating api based on the configuration file $genConfPath.");
            $container->get("breeze_generator")->setConf(['tmpId' => $genConf])->generate("tmpId");


        } else {
            $this->errorMessage("Create file not found, cannot generate the api.");
        }

    }


}