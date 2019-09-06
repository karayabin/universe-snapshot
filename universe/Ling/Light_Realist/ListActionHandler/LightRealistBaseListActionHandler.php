<?php


namespace Ling\Light_Realist\ListActionHandler;


/**
 * The LightRealistBaseListActionHandler class.
 */
abstract class LightRealistBaseListActionHandler extends LightRealistAbstractListActionHandler
{


    /**
     * Builds the LightRealistBaseListActionHandler instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->handledIds = [
            "Light_Realist-rows_to_csv",
            "Light_Realist-delete_rows",
        ];
    }

    /**
     * @overrides
     */
    public function doExecute(string $actionId, array $params = []): array
    {
        switch ($actionId) {
            case "Light_Realist-rows_to_csv":
                return ["tarace"];
                break;
            case "Light_Realist-delete_rows":
                return ["tarace"];
                break;
            default:
                break;
        }
    }




}