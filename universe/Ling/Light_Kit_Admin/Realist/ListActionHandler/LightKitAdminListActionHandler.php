<?php


namespace Ling\Light_Kit_Admin\Realist\ListActionHandler;


use Ling\Light_Realist\ListActionHandler\LightRealistBaseListActionHandler;


/**
 * The LightKitAdminListActionHandler class.
 */
class LightKitAdminListActionHandler extends LightRealistBaseListActionHandler
{

    /**
     * @implementation
     */
    public function getButton(string $actionId): string
    {
        switch ($actionId) {
            case "rows_to_csv":
                break;
            default:
                break;
        }
    }


}