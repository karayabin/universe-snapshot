<?php


namespace Ling\Light_Crud\AjaxHandler;


use Ling\Bat\ArrayTool;
use Ling\Light_AjaxHandler\Handler\BaseLightAjaxHandler;
use Ling\Light_Crud\Exception\LightCrudException;
use Ling\Light_Crud\Service\LightCrudService;

/**
 * The LightCrudAjaxHandler class.
 */
class LightCrudAjaxHandler extends BaseLightAjaxHandler
{


    /**
     * @implementation
     */
    public function doHandle(string $actionId, array $params): array
    {
        $response = [];
        switch ($actionId) {
            case "delete_rows":
                $response = $this->executeDeleteRows($params);
                break;
            default:
                throw new LightCrudException("LightCrudAjaxHandler: Unknown action $actionId.");
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
        throw new LightCrudException($msg);
    }


    /**
     * Deletes the rows given in the params.
     *
     *
     * @param array $params
     * @return array
     * @throws \Exception
     */
    protected function executeDeleteRows(array $params): array
    {
        ArrayTool::arrayKeyExistAll([
            'contextIdentifier',
            'table',
            'rics',
        ], $params, true);

        $contextId = $params['contextIdentifier'];
        $table = $params['table'];
        $rics = $params['rics'];

        /**
         * @var $crud LightCrudService
         */
        $crud = $this->container->get('crud');
        $crud->execute($contextId, $table, 'deleteMultiple', [
            'rics' => $rics,
        ]);
        return [];
    }
}