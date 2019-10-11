<?php


namespace Ling\Light_Kit_Admin\AjaxHandler;


use Ling\Light_AjaxHandler\Handler\ContainerAwareLightAjaxHandler;
use Ling\Light_Kit_Admin\Exception\LightKitAdminException;
use Ling\Light_Realist\Service\LightRealistService;

/**
 * The LightKitAdminAjaxHandler class.
 */
class LightKitAdminAjaxHandler extends ContainerAwareLightAjaxHandler
{


    /**
     * @implementation
     */
    public function handle(string $actionId, array $params): array
    {
        $response = [];
        switch ($actionId) {
            //--------------------------------------------
            // LIST ACTIONS
            //--------------------------------------------
            case "realist-delete_rows":
            case "realist-print":
                //
            case "realist-rows_to_ods":
            case "realist-rows_to_xlsx":
            case "realist-rows_to_xls":
            case "realist-rows_to_html":
            case "realist-rows_to_csv":
            case "realist-rows_to_pdf":
                $response = $this->executeListAction($actionId, $params);
                break;
            //--------------------------------------------
            // GENERAL LIST ACTIONS
            //--------------------------------------------
            case "realist-generate_random_rows":
            case "realist-save_table":
            case "realist-load_table":
                $response = $this->executeListGeneralAction($actionId, $params);
                break;
            default:
                throw new LightKitAdminException("LightKitAdminAjaxHandler: Unknown action $actionId.");
                break;
        }
        return $response;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an error message.
     * @param string $msg
     * @throws \Exception
     *
     */
    protected function error(string $msg)
    {
        throw new LightKitAdminException($msg);
    }


    /**
     * Executes the list action identified by the given action name and returns the expected ajax response.
     *
     *
     * @param string $actionName
     * @param array $params
     * @return array
     * @throws \Exception
     */
    protected function executeListAction(string $actionName, array $params): array
    {
        /**
         * @var $realist LightRealistService
         */
        $realist = $this->container->get('realist');
        return $realist->executeListAction("Light_Kit_Admin." . $actionName, $params);
    }


    /**
     * Executes the list general action identified by the given action name and returns the expected ajax response.
     *
     *
     * @param string $actionName
     * @param array $params
     * @return array
     * @throws \Exception
     */
    protected function executeListGeneralAction(string $actionName, array $params): array
    {
        /**
         * @var $realist LightRealistService
         */
        $realist = $this->container->get('realist');
        return $realist->executeListGeneralAction("Light_Kit_Admin." . $actionName, $params);
    }
}