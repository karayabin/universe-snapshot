<?php


namespace Ling\Light_UserData\AjaxHandler;


use Ling\Light\Http\HttpRequestInterface;
use Ling\Light_AjaxHandler\Handler\BaseLightAjaxHandler;
use Ling\Light_UploadGems\Service\LightUploadGemsService;
use Ling\Light_UserData\Exception\LightUserDataException;

class LightUserDataAjaxHandler extends BaseLightAjaxHandler
{

    /**
     * @implementation
     */
    protected function doHandle(string $action, HttpRequestInterface $request): array
    {
//        a("OK HERE", __FILE__);


        //--------------------------------------------
        // IMPLEMENTATION OF FILE MANAGER PROTOCOL
        //--------------------------------------------
        // https://github.com/lingtalfi/TheBar/blob/master/discussions/file-manager-protocol.md
        switch ($action) {
            case "add":

                /**
                 * @var $gemService LightUploadGemsService
                 */
                $gemService = $this->container->get("upload_gems");


                $gemId = $request->getPostValue("configId");
                $phpFile = $request->getFilesValue("file");
                $gemService->checkPhpFile($phpFile);
                $helper = $gemService->getHelper($gemId);
                $filename = $request->getPostValue("file") ?? $phpFile['name'];
                $helper->setFilename($filename);
                az($filename);




                break;
            default:
                $this->error("Unknown action \"$action\".");
                break;
        }




        az($action, $request->getPost());
        return [];
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an error message.
     *
     * @param string $msg
     * @throws \Exception
     */
    private function error(string $msg)
    {
        throw new LightUserDataException("LightUserDataAjaxHandler error: " . $msg);
    }
}