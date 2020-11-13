<?php


namespace Ling\Light_ChloroformExtension\AjaxHandler;


use Ling\Light\Http\HttpRequestInterface;
use Ling\Light_AjaxHandler\Handler\BaseLightAjaxHandler;
use Ling\Light_AjaxHandler\Handler\ContainerAwareLightAjaxHandler;
use Ling\Light_ChloroformExtension\Exception\LightChloroformExtensionException;
use Ling\Light_ChloroformExtension\Field\TableList\TableListService;
use Ling\Light_ChloroformExtension\Service\LightChloroformExtensionService;
use Ling\Light_CsrfSession\Service\LightCsrfSessionService;
use Ling\Light_MicroPermission\Service\LightMicroPermissionService;

/**
 * The LightChloroformExtensionAjaxHandler class.
 */
class LightChloroformExtensionAjaxHandler extends BaseLightAjaxHandler
{


    /**
     * @implementation
     */
    public function doHandle(string $action, HttpRequestInterface $request): array
    {
        $params = $request->getPost();
        $response = [];
        switch ($action) {
            case "table_list.autocomplete":

                if (array_key_exists("tableListId", $params)) {


                    $tableListId = $params['tableListId'];
                    $searchExpression = $params['q'] ?? '';


                    /**
                     * @var $chloroformX LightChloroformExtensionService
                     */
                    $chloroformX = $this->container->get('chloroform_extension');

                    /**
                     * @var $tableList TableListService
                     */
                    $tableList = $chloroformX->getTableListService($tableListId);


                    //--------------------------------------------
                    //
                    //--------------------------------------------
                    $rows = $tableList->getItems($searchExpression);
                    $response = [
                        "type" => 'success',
                        "rows" => $rows,
                    ];


                } else {
                    throw new LightChloroformExtensionException("Missing parameter tableListIdentifier for action $action.");
                }
                break;
            default:
                throw new LightChloroformExtensionException("LightChloroformExtensionAjaxHandler: Unknown action $action.");
                break;
        }
        return $response;
    }


}