<?php


namespace Ling\Light_UserData\Controller;


use Ling\Bat\FileSystemTool;
use Ling\Bat\MimeTypeTool;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponse;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_HttpError\Controller\LightHttpErrorController;
use Ling\Light_UserData\Exception\LightUserDataException;
use Ling\Light_UserData\FileManager\LightUserDataVirtualFileManagerHandler;
use Ling\Light_UserData\Service\LightUserDataService;
use Ling\Panda_Headers\Panda_Headers_Tool;


/**
 * The LightUserDataController class.
 */
class LightUserDataController extends LightHttpErrorController
{

    /**
     * @overrides
     */
    protected function doRender(HttpRequestInterface $request): HttpResponseInterface
    {
        /**
         * Returns the file identified by the given resource id, or throws an exception.
         *
         *
         * If the file is private and the visitor (asking for the file) isn't the owner,
         * then an exception will be thrown also.
         *
         */


        $get = $request->getGet();
        $resourceIdentifier = $request->getGetValue("id");
        $getMetaInfo = (bool)($get['m'] ?? false);
        $nickname = ($get['n'] ?? null);
        $configId = $get['c'] ?? null;
        $original = (bool)($get['o'] ?? false);
        $useVirtual = (bool)($get['v'] ?? false);
        $httpErrorCode = null;


        if (true === $useVirtual) {
            //--------------------------------------------
            // FETCHING RESOURCE FROM VIRTUAL SERVER
            //--------------------------------------------
            $ud = $this->getContainer()->get("user_data");
            $handler = $ud->getFileManagerHandler();
            if (false === $handler instanceof LightUserDataVirtualFileManagerHandler) {
                throw new LightUserDataException("The service is not configured yet to use a virtual server. Please review your service configuration.");
            }
            $getMetaInfo = true;
            if (null === $configId) {
                throw new LightUserDataException("Cannot reach the file on this virtual server: the configId value wasn't passed.");
            }
            $vfs = $handler->getVirtualServerInstance($configId);
            $info = $vfs->getSourceFileInfoByResourceId($resourceIdentifier, [
                'original' => $original,
            ]);
            $info['date_creation'] = null;
            $info['date_last_update'] = null;


        } else {
            //--------------------------------------------
            // FETCHING RESOURCE FROM REAL SERVER
            //--------------------------------------------
            /**
             * The reasons for fetching resources from the real server include:
             *
             * - access the resource from a web user's perspective (i.e. display the image, access the pdf, ...)
             * - in the file manager form, provide the resource information so that the file manager form control can display the meta
             *              to the user while he's editing the file (hence the addExtraInfo toggle)
             *
             */


            /**
             * @var $userDataService LightUserDataService
             */
            $userDataService = $this->getContainer()->get("user_data");
            $options = [];
            if (true === $getMetaInfo) {
                $options['tags'] = true;
            }
            if (true === $original) {
                $options['original'] = true;
            }
            if (null !== $nickname) {
                $options['nickname'] = $nickname;
            }
            $info = $userDataService->getResourceInfoByResourceIdentifier($resourceIdentifier, $options);

            if (false === $info) {
                $httpErrorCode = 404;
            }
        }


        //--------------------------------------------
        // RETURNING THE FILE AND INFORMATION
        //--------------------------------------------
        if (null === $httpErrorCode) {

            /**
             * We use info polymorphism here...
             */
            $file = $info['abs_path'];

            $extension = FileSystemTool::getFileExtension($file);

            $found = true;
            $mime = MimeTypeTool::getMimeType($file);
            if (false === $found) {
                $this->getContainer()->get('logger')->log("Mime type not found in MimeTypeTool::getMimeTypeByFileExtension with extension $extension.", "todo");
            }

            if (false === file_exists($file)) {
                throw new LightUserDataException("File not found: $file.");
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
                    /**
                     * if you wonder why the property we send is "name" instead of "filename", that's because a js File object has a name property,
                     * and with this system the js client was developed first.
                     */
                    "name" => $info['filename'],
                    "directory" => $info['directory'],
                ], $response);
            }
        } else {
            $response = new HttpResponse("", $httpErrorCode);
        }

        return $response;

    }
}