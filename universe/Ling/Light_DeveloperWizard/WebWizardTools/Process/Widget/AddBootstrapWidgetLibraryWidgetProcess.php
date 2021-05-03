<?php


namespace Ling\Light_DeveloperWizard\WebWizardTools\Process\Widget;


use Ling\Light_DeveloperWizard\WebWizardTools\Process\LightDeveloperWizardCommonProcess;


/**
 * The AddBootstrapWidgetLibraryWidgetProcess class.
 */
class AddBootstrapWidgetLibraryWidgetProcess extends LightDeveloperWizardCommonProcess
{


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->setName("add-bwl-widget");
        $this->setLabel("Add Light_Kit_BootstrapWidgetLibrary widget.");
        $this->setLearnMoreByHash('add-bwl-widget');
    }


    /**
     * @implementation
     */
    protected function doExecute(array $options = [])
    {

        /**
         * todo: here...
         * todo: here...
         * todo: here...
         * todo: here...
         * todo: here...
         */
        $this->infoMessage("Adding widget to the <b>Light_Kit_BootstrapWidgetLibrary</b> planet.");
        az($options);


    }

}