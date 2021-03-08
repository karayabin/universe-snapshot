<?php


namespace Ling\Light_DeveloperWizard\WebWizardTools\Process\Database;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\LightDeveloperWizardBaseProcess;


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
        $this->setLearnMoreByHash('add-standard-permissions');
    }

    /**
     * @overrides
     */
    public function prepare()
    {
        parent::prepare();
        $planet = $this->getContextVar("planet");
        if (true === str_starts_with($planet, "Light_Kit_Admin_")) {
            $this->setDisabledReason("Usually a Light_Kit_Admin plugin doesn't have standard permission of its own (it's rather the <a target='_blank' href='https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/pages/lka-plugins.md#light-kit-admin-source-and-port-plugin'>source plugin</a> that has them). If you really need this, please do it manually.");
        }


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