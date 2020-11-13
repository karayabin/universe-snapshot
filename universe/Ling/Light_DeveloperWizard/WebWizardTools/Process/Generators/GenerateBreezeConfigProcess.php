<?php


namespace Ling\Light_DeveloperWizard\WebWizardTools\Process\Generators;


/**
 * The GenerateBreezeConfigProcess class.
 */
class GenerateBreezeConfigProcess extends GenerateBreezeBaseProcess
{

    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->setName("generate-breeze-config");
        $this->setLabel("Generate breeze2 config from the create file");
        $this->setLearnMoreByHash('generate-breeze-config');
    }


    /**
     * @implementation
     */
    protected function doExecute(array $options = [])
    {
        $this->generateBreezeConfig();
    }


}