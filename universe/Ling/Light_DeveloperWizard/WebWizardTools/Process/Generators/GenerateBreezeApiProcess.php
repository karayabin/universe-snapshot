<?php


namespace Ling\Light_DeveloperWizard\WebWizardTools\Process\Generators;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;


/**
 * The GenerateBreezeApiProcess class.
 */
class GenerateBreezeApiProcess extends GenerateBreezeBaseProcess
{

    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->setName("generate-breeze-api");
        $this->setLabel("Generate breeze2 api from the create file");
        $this->setLearnMoreByHash('generate-breeze-api');
    }


    /**
     * @implementation
     */
    protected function doExecute(array $options = [])
    {

        /**
         * @var $container LightServiceContainerInterface
         */
        $container = $this->getContextVar("container");


        $tablePrefix = $this->getMainTablePrefix();
        $this->infoMessage("Using the table prefix: $tablePrefix.");


        $genConfPath = $this->getGeneratorConfigPath();
        if (false === file_exists($genConfPath)) {
            $this->generateBreezeConfig();
        }

        $genConf = BabyYamlUtil::readFile($genConfPath);
        $this->infoMessage("Generating api based on the configuration file $genConfPath.");
        $container->get("breeze_generator")->setConf(['tmpId' => $genConf])->generate("tmpId");


    }


}