<?php


namespace Ling\Light_DeveloperWizard\WebWizardTools\Process;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\WebWizardTools\Process\WebWizardToolsProcess;


/**
 * The AddStandardPermissionsProcess class.
 */
class AddStandardPermissionsProcess extends LightDeveloperWizardBaseProcess
{

    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->setName("add-standard-permissions");
        $this->setLabel("Add standard permissions");
        $this->setLearnMore("
       More about <a 
       target=\"_blank\"
       href=\"https://github.com/lingtalfi/TheBar/blob/master/discussions/light-standard-permissions.md\">
       light standard permissions
       </a>        
        ");
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
        $planet = $this->getContextVar("planet");
        if (true === $container->has("user_database")) {
            $pluginName = $planet;
            $permissionApi = $container->get("user_database")->getFactory()->getPermissionApi();

            $this->infoMessage("Adding standard permissions (in lud_permission) for plugin $pluginName.");
            $this->traceMessage("adding \"$pluginName.admin\" and \"$pluginName.user\" permissions to table \"lud_permission\".");
            $permissionApi->insertPermissions([
                [
                    "name" => "$pluginName.admin",
                ],
                [
                    "name" => "$pluginName.user",
                ],
            ]);

        } else {
            $this->errorMessage("This action requires that the user_database service is installed. Please consider installing the Light_UserDatabase planet: https://github.com/lingtalfi/Light_UserDatabase.");
        }
    }


}