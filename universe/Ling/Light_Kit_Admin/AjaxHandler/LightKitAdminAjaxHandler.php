<?php


namespace Ling\Light_Kit_Admin\AjaxHandler;


use Ling\Light\Http\HttpRequestInterface;
use Ling\Light_AjaxHandler\Handler\BaseLightAjaxHandler;
use Ling\Light_Kit_Admin\Exception\LightKitAdminException;
use Ling\Light_Kit_Admin\Realist\ListActionHandler\LightKitAdminListActionHandler;

/**
 * The LightKitAdminAjaxHandler class.
 */
class LightKitAdminAjaxHandler extends BaseLightAjaxHandler
{


    /**
     * @implementation
     */
    protected function doHandle(string $action, HttpRequestInterface $request): array
    {
        $post = $request->getPost();
        $get = $request->getGet();
        $params = array_replace($get, $post);


        /**
         * We use the dash as a namespace separator
         */
        $p = explode('-', $action, 2);
        $namespace = $p[0];


        $response = [];
        switch ($namespace) {
            //--------------------------------------------
            // LIST ITEM GROUP ACTIONS, LIST GENERAL ACTIONS
            //--------------------------------------------
            case "realist":
                $lah = new LightKitAdminListActionHandler();
                $lah->setContainer($this->container);
                $response = $lah->execute($action, $params);
                break;
            default:
                throw new LightKitAdminException("LightKitAdminAjaxHandler: Unknown action $action.");
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
}