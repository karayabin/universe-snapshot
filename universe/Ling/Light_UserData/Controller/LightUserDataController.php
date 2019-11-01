<?php


namespace Ling\Light_UserData\Controller;


use Ling\Bat\FileSystemTool;
use Ling\Bat\MimeTypeTool;
use Ling\Light\Controller\LightController;
use Ling\Light\Http\HttpResponse;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_User\LightUserInterface;
use Ling\Light_UserData\Exception\LightUserDataException;
use Ling\Light_UserData\Service\LightUserDataService;


/**
 * The LightUserDataController class.
 */
class LightUserDataController extends LightController
{

    /**
     * Returns the file identified by the given file and id,
     * or throws an exception.
     *
     * The file is the relative path from the user directory to the desired file.
     *
     * The id is the obfuscated user directory name.
     *
     * If the file is private and the visitor (asking for the file) isn't the owner,
     * then an exception will be thrown also.
     *
     *
     *
     * @param string $file
     * @param string $id
     * @return HttpResponseInterface
     * @throws \Exception
     */
    public function render(string $file, string $id): HttpResponseInterface
    {
        /**
         * @var $userDataService LightUserDataService
         */
        $userDataService = $this->getContainer()->get("user_data");
        $realDirName = $userDataService->getUserRealDirectoryName($id);
        if (false !== $realDirName) {
            $baseDir = $userDataService->getRootDir() . "/" . $realDirName;
            $file = $baseDir . "/" . $file;
            if (true === FileSystemTool::isDirectoryTraversalSafe($file, $baseDir)) {


                //--------------------------------------------
                // ACCESS GRANTED?
                //--------------------------------------------
                $accessGranted = false;
                if (false === $userDataService->isPrivate($file)) {
                    $accessGranted = true;
                } else {
                    /**
                     * @var $user LightUserInterface
                     */
                    $user = $this->getContainer()->get("user_manager")->getUser();
                    if ($realDirName === $user->getIdentifier()) {
                        $accessGranted = true;
                    }
                }

                if (true === $accessGranted) {

                    $extension = FileSystemTool::getFileExtension($file);


                    $found = true;
                    $mime = MimeTypeTool::getMimeTypeByFileExtension($extension, null, $found);
                    if (false === $found) {
                        $this->getContainer()->get('logger')->log("Mime type not found in MimeTypeTool::getMimeTypeByFileExtension with extension $extension.", "todo");
                    }


                    $response = new HttpResponse(file_get_contents($file));
                    $response->setMimeType($mime);
                    $response->setFileName(basename($file));
                    return $response;


                } else {
                    throw new LightUserDataException("Access denied to file: $file, with id: $id.");
                }

            } else {
                throw new LightUserDataException("The file does not exist or is invalid (file: $file, id: $id).");
            }
        } else {
            throw new LightUserDataException("The file you are requesting does not exist (file: $file, id: $id).");
        }

    }
}