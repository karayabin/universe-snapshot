<?php


namespace Ling\Light_UserData\Controller;


use Ling\Bat\FileSystemTool;
use Ling\Bat\MimeTypeTool;
use Ling\Light\Controller\LightController;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponse;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_UserData\Service\LightUserDataService;
use Ling\Panda_Headers\Panda_Headers_Tool;


/**
 * The LightUserDataController class.
 */
class LightUserDataController extends LightController
{

    /**
     * Returns the file identified by the given id,
     * or throws an exception.
     *
     *
     * The id is the resource identifier.
     *
     * If the file is private and the visitor (asking for the file) isn't the owner,
     * then an exception will be thrown also.
     *
     *
     *
     * @param string $id
     * @param HttpRequestInterface $request
     * @throws \Exception
     */
    public function render(string $id, HttpRequestInterface $request): HttpResponseInterface
    {


        $get = $request->getGet();

        $getMetaInfo = (bool)($get['m'] ?? false);


        $original = (bool)($get['o'] ?? false);
        $configId = $get['c'] ?? null;
        $useVirtual = (bool)($get['v'] ?? false);


        $options = [
            'addExtraInfo' => $getMetaInfo,
            'original' => $original,
            'configId' => $configId,
            'vm' => $useVirtual,
        ];


        /**
         * @var $userDataService LightUserDataService
         */
        $userDataService = $this->getContainer()->get("user_data");
        $info = $userDataService->getResourceInfoByResourceIdentifier($id, $options);


        $file = $info['abs_path'];
        $relPath = $info['rel_path'];


        $extension = FileSystemTool::getFileExtension($relPath);

        $found = true;
        $mime = MimeTypeTool::getMimeType($file);
        if (false === $found) {
            $this->getContainer()->get('logger')->log("Mime type not found in MimeTypeTool::getMimeTypeByFileExtension with extension $extension.", "todo");
        }


        $response = new HttpResponse(file_get_contents($file));

        $response->setContentType($mime);

//        $response->setFileName($relPath);

        if (true === $getMetaInfo) {

            Panda_Headers_Tool::attachHeaders([
                "is_private" => $info['is_private'],
                "date_creation" => $info['date_creation'],
                "date_last_update" => $info['date_last_update'],
                "original_url" => $info['original_url'],
                "tags" => $info['tags'],
                "name" => $info['filename'],
                "directory" => $info['dir'],
            ], $response);
        }

//        az($response);

        return $response;

    }
}