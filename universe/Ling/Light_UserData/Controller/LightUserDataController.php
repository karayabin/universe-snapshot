<?php


namespace Ling\Light_UserData\Controller;


use Ling\Bat\FileSystemTool;
use Ling\Bat\MimeTypeTool;
use Ling\Light\Controller\LightController;
use Ling\Light\Http\HttpResponse;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_UserData\Service\LightUserDataService;


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
     * @return HttpResponseInterface
     * @throws \Exception
     */
    public function render(string $id): HttpResponseInterface
    {

        $getMetaInfo = (bool)($_GET['meta'] ?? false);
        $original = (bool)($_GET['original'] ?? false);

        $options = [
            'addExtraInfo' => $getMetaInfo,
            'original' => $original,
        ];


        /**
         * @var $userDataService LightUserDataService
         */
        $userDataService = $this->getContainer()->get("user_data");
        $info = $userDataService->getResourceInfoByResourceIdentifier($id, $options);


        $file = $info['abs_path'];
        $relPath = $info['rel_path'];


        $extension = FileSystemTool::getFileExtension($file);

        $found = true;
        $mime = MimeTypeTool::getMimeTypeByFileExtension($extension, null, $found);
        if (false === $found) {
            $this->getContainer()->get('logger')->log("Mime type not found in MimeTypeTool::getMimeTypeByFileExtension with extension $extension.", "todo");
        }


        $response = new HttpResponse(file_get_contents($file));
        $response->setMimeType($mime);
        $response->setFileName($relPath);

        if (true === $getMetaInfo) {

            $response->setHeader("fe_is_private", $info['is_private']);
            $response->setHeader("fe_date_creation", $info['date_creation']);
            $response->setHeader("fe_date_last_update", $info['date_last_update']);
            $response->setHeader("fe_protocol", "fileEditor");
            $response->setHeader("fe_original_url", $info['original_url']);
            $tags = $info['tags'];
            foreach ($tags as $tag) {
                $response->setHeader("fe_tags", $tag, false); // note: tag mustn't contain a comma with this implementation
            }
        }

        return $response;

    }
}