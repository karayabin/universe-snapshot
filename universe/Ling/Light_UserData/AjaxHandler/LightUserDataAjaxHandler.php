<?php


namespace Ling\Light_UserData\AjaxHandler;


use Ling\Light\Http\HttpRequestInterface;
use Ling\Light_AjaxHandler\Handler\BaseLightAjaxHandler;
use Ling\Light_UserData\Exception\LightUserDataException;
use Ling\Light_UserData\Service\LightUserDataService;


/**
 * The LightUserDataAjaxHandler class.
 */
class LightUserDataAjaxHandler extends BaseLightAjaxHandler
{

    /**
     * @implementation
     */
    protected function doHandle(string $action, HttpRequestInterface $request): array
    {
//        a("OK HERE", __FILE__);

        $response = [];
        //--------------------------------------------
        // IMPLEMENTATION OF FILE MANAGER PROTOCOL
        //--------------------------------------------
        // https://github.com/lingtalfi/TheBar/blob/master/discussions/file-manager-protocol.md
        switch ($action) {
            case "add":
            case "delete":
            case "update":
            case "reset":
                $handler = $this->container->get("user_data")->getFileManagerHandler();
                $response = $handler->handle($action, $request);
                break;
            case "get-backup-files-info":
                $table = $request->getPostValue("table");


                /**
                 * @var $userData LightUserDataService
                 */
                $userData = $this->container->get("user_data");

                $backupDir = $userData->getOption("backup_dir");
                $backupDir = str_replace('$table', $table, $backupDir);

                $items = $userData->listByDirectory($backupDir);

                $files = [];
                foreach ($items as $item) {
                    $files[$item['resource_file_id']] = $item['path'];
                }
                return [
                    "type" => 'success',
                    "backup_list" => $files,
                    "backup_dir" => $backupDir,
                ];

                break;
            default:
                $this->error("Unknown action \"$action\".");
                break;
        }

        return $response;
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