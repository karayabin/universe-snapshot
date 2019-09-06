<?php


namespace Ling\Light_Kit_Admin\Realist\ActionHandler;


use Ling\Light_Realist\ActionHandler\LightRealistAbstractActionHandler;


/**
 * The LightKitAdminRealistActionHandler class.
 */
class LightKitAdminRealistActionHandler extends LightRealistAbstractActionHandler
{


    /**
     * Builds the LightKitAdminRealistActionHandler instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->handledIds = [
            "Light_Kit_Admin-action1",
        ];

    }

    /**
     * @implementation
     */
    public function execute(string $actionId, array $params = [])
    {
        switch ($actionId) {
            case "Light_Kit_Admin-action1":
                break;
            default:
                break;
        }
        az(__FILE__, "ok here", $actionId, $params);
    }


}