<?php


namespace Ling\Light_UserData\FileManager;


use Ling\Bat\CaseTool;
use Ling\Bat\FileSystemTool;
use Ling\Bat\StringTool;
use Ling\Bat\TagTool;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_UserData\Exception\LightUserDataFileManagerHandlerException;
use Ling\Light_UserData\Service\LightUserDataService;
use Ling\Light_UserManager\Service\LightUserManagerService;
use Ling\Light_ZouUploader\ZouUploader;

/**
 * The LightUserDataFileManagerHandler class.
 *
 * The goal of this class is to handle the @page(file manager protocol) for the Light_UserData plugin.
 * We don't use a virtual file server.
 * Instead, all interactions are directly written in the real file system and with the real database.
 *
 *
 */
class LightUserDataDirectFileManagerHandler implements LightUserDataFileManagerHandlerInterface
{


    /**
     * This property holds the service for this instance.
     * @var LightUserDataService
     */
    protected $service;

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the LightUserDataDirectFileManagerHandler instance.
     */
    public function __construct()
    {
        $this->service = null;
        $this->container = null;
    }

    /**
     * Sets the service.
     *
     * @param LightUserDataService $service
     */
    public function setService(LightUserDataService $service)
    {
        $this->service = $service;
        $this->container = $service->getContainer();
    }


    /**
     * Handles the given @page(file manager protocol) action, and returns the appropriate response.
     *
     * Or throws an exception in case of error.
     *
     * @param string $action
     * @param HttpRequestInterface $request
     * @throws \Exception
     */
    public function handle(string $action, HttpRequestInterface $request)
    {


        // acp handling
        $_success = [];


        switch ($action) {
            case "reset":
                /**
                 * The reset operation is not available on this server, which uses a direct interaction with a real server.
                 * If you need the reset operation, you should use a virtual server instead.
                 */
                $this->error("The reset operation is not available on this server.");
                break;
            case "delete":
                $url = $request->getPostValue("url");
                $this->service->removeResourceByUrl($url);
                break;
            case "add":
            case "update":
                // part of the file manager protocol response...
                $success['is_fully_uploaded'] = 0;

                /**
                 * @var $um LightUserManagerService
                 */
                $um = $this->container->get("user_manager");
                $user = $um->getValidWebsiteUser();
                $configId = $request->getPostValue("configId");
                $phpFile = $request->getFilesValue("file", false) ?? null;
                $gemService = $this->container->get("upload_gems");
                $gemHelper = $gemService->getHelper($configId);

                $customConfig = $gemHelper->getCustomConfig();
                $acceptKeepOriginal = $customConfig['acceptKeepOriginal'];
                $canonicalName = $customConfig['canonicalName'] ?? null;

                $filename = $request->getPostValue("filename", false);
                $directory = $request->getPostValue("directory", false);
                $updateUrl = $request->getPostValue("url", false);
                $tags = $request->getPostValue("tags", false) ?? [];
                $keepOriginal = (bool)$request->getPostValue("keep_original", false);
                $willKeepOriginal = (true === $acceptKeepOriginal && true === $keepOriginal);


                if ('' === $tags) {
                    $tags = [];
                }
                $isPrivate = (bool)$request->getPostValue("is_private", false);


                if ('add' === $action) {
                    if (null === $phpFile) {
                        $this->error("With the add action, the file parameter is mandatory.");
                    }
                    if (null === $filename) {
                        $filename = $phpFile['name'];
                    }
                } else { // update action
                    if (null === $updateUrl) {
                        /**
                         * Note: in previous version, I handled support for external urls,
                         * but I think it's not really useful now, so I can throw this error
                         * without thinking too much about it.
                         */
                        $this->error("With the update action, you must provide the url.");
                    }
                }


                //--------------------------------------------
                // NAME VALIDATION
                //--------------------------------------------
                $filename = $gemHelper->applyNameTransform($filename);
                $res = $gemHelper->applyNameValidation($filename);
                if (is_string($res)) {
                    $this->error($res);
                }

                // adding our own security check
                $filename = FileSystemTool::removeTraversalDots($filename);
                $filename = basename($filename); // remove slashes
                $directory = FileSystemTool::removeTraversalDots($directory);
                $basename = FileSystemTool::getBasename($filename);
                if (true === StringTool::endsWith($basename, "--ORIGINAL")) {
                    $this->error("Forbidden operation: the basename can't end with the \"--ORIGINAL\" suffix. See our documentation for more info.");
                }


                //--------------------------------------------
                // CHUNK VALIDATION
                //--------------------------------------------
                if (null !== $phpFile) {
                    $res = $gemHelper->applyChunkValidation($phpFile['tmp_name']);
                    if (is_string($res)) {
                        $this->error($res);
                    }
                }


                //--------------------------------------------
                // WAIT UNTIL THE FILE IS UPLOADED..
                //--------------------------------------------
                $hasFileAttached = (null !== $phpFile);

                if (true === $hasFileAttached) {

                    $userId = $user->getIdentifier();

                    $uploadedFile = rtrim(sys_get_temp_dir(), '/') . "/LightUserDataFileManagerHandler-" . CaseTool::toPortableFilename("$userId-$configId");
                    $zou = new ZouUploader();
                    $zou->setOptions([
                        "override" => true,
                    ]);
                    $zou->setDestinationPath($uploadedFile);
                } else {
                    $uploadedFile = null;
                }


                if (false === $hasFileAttached || true === $zou->isUploaded($request)) {
                    //--------------------------------------------
                    // FILE VALIDATION
                    //--------------------------------------------
                    if (null !== $uploadedFile) {
                        $ret = $gemHelper->applyValidation($uploadedFile);
                        if (is_string($ret)) {
                            unlink($uploadedFile);
                            $this->error($ret);
                        }
                    }


                }



                $userRelPath = $filename;
                if (false === empty($directory)) {
                    $userRelPath = $directory . "/" . $userRelPath;
                }


                if ('add' === $action) {


                    // check size only for add operation, see loose max storage capacity in our conception notes
                    $this->service->checkUserMaxStorageCapacity();

                    //--------------------------------------------
                    // ADD OPERATION
                    //--------------------------------------------
                    $resourceIdentifier = $this->storeUserFile([
                        "src_path" => $uploadedFile,
                        "user_rel_path" => $userRelPath,
                        "tags" => $tags,
                        "is_private" => $isPrivate,
                        "files" => $customConfig['files'],
                        "keep_original" => $willKeepOriginal, // isn't it always true with add operation?
                        "canonical_name" => $canonicalName,
                    ]);

                } else {

                    //--------------------------------------------
                    // UPDATE OPERATION
                    //--------------------------------------------
                    $resourceIdentifier = $this->service->getResourceIdentifierByUrl($updateUrl);
                    $this->storeUserFile([
                        "resource_identifier" => $resourceIdentifier,
                        "src_path" => $uploadedFile,
                        "user_rel_path" => $userRelPath,
                        "tags" => $tags,
                        "is_private" => $isPrivate,
                        "files" => $customConfig['files'],
                        "keep_original" => $willKeepOriginal,
                    ]);

                }

                $info = $this->service->getResourceInfoByResourceIdentifier($resourceIdentifier, ['tags' => true]);

                $_success = [
                    "is_fully_uploaded" => 1,
                    "directory" => $info['directory'],
                    "name" => $info['filename'],
                    "url" => $this->service->getUrlByResourceIdentifier($resourceIdentifier, [
//                        'v' => 1,
//                        'c' => $configId,
                    ]),
                    "is_private" => (int)$info['is_private'],
                    "tags" => $info['tags'],
                    "original_url" => $info['original_url'],
                ];


                //--------------------------------------------
                // DON'T FORGET TO REMOVE THE TMP FILE
                //--------------------------------------------
                /**
                 * Otherwise you end up filling up your server with unnecessary files, and might have unexpected problems if you
                 * run out of space.
                 */
                if (null !== $uploadedFile && file_exists($uploadedFile)) {
                    unlink($uploadedFile);
                }

                break;
            default:
                $this->error("Unhandled action \"$action\": this is not part of the fileManager protocol.");

                break;
        }


        //--------------------------------------------
        // ACP HANDLING?
        //--------------------------------------------
        return array_merge($_success, ["type" => 'success']);
    }





    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Stores the file described in the given params, and returns the corresponding resourceId.
     * The file will be stored on the real server, both on the file system and in the database.
     *
     * Parameters are:
     *
     * - ?resource_identifier: string.
     *      If null, it's an "add" operation.
     *      If set, it's an "update" operation.
     * - src_path: string|null, the absolute path of the source file.
     *      If null, it means the user hasn't provided a file (i.e. he just wants to update the meta data).
     * - user_rel_path: string, the relative path where the user wants to store the file.
     *      It's relative to the user dir.
     *      This is used as a suggestion while processing the "files" property.
     *      This is also the expression which we extract the "Upload file" tags from (i.e. NOT the tags property below).
     *      See the @page("Upload file configuration" section of the user data file manager document) for more info about "upload file" tags.
     * - tags: array of tag names to attach to the source file
     * - is_private: bool, whether the source file is considered private
     * - files: array of file items.
     *      See the files property of the ["Upload file configuration" section in the user-data-file-manager.md document](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/user-data-file-manager.md) for more details.
     * - keep_original: bool=false. Whether to keep the original. This will work only with images. The source file will be used
     *      as the source of the copy.
     * - canonical_name: string|null. The canonical name of this resource. It's used with the "add" operation only.
     *
     *
     *
     *
     * @param array $params
     * @return string
     */
    protected function storeUserFile(array $params): string
    {
        $resourceIdentifier = $params['resource_identifier'] ?? null;
        $fileItems = $params['files'];
        $userRelPath = $params['user_rel_path'];
        $srcPath = $params['src_path'];
        $keepOriginal = $params['keep_original'] ?? false;
        $isPrivate = $params['is_private'];
        $tags = $params['tags'];
        $canonicalName = $params['canonical_name'] ?? null;


        $this->resolveFileItems($fileItems, $userRelPath);


        if (null === $resourceIdentifier) {
            //--------------------------------------------
            // ADD OPERATION
            //--------------------------------------------

            /**
             * Store them in the database...
             */
            $info = $this->service->createResourceByFileItems($fileItems, [
                'is_private' => $isPrivate,
                'tags' => $tags,
                'source_path' => $srcPath,
                'keep_original' => $keepOriginal,
                'canonical_name' => $canonicalName,
            ]);
            $resourceIdentifier = $info['resource_identifier'];

        } else {
            //--------------------------------------------
            // UPDATE OPERATION
            //--------------------------------------------
            $this->service->updateResourceByFileItems($resourceIdentifier, $fileItems, [
                'is_private' => $isPrivate,
                'tags' => $tags,
                'source_path' => $srcPath,
                'keep_original' => $keepOriginal,
            ]);
        }
        return $resourceIdentifier;
    }





    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Extracts the upload file tags from the given userRelPath, and injects them in the "path" property of the given file items.
     *
     * See the @page("Upload file configuration" section of the user data file manager document) for more details.
     *
     * @param array $fileItems
     * @param string $userRelPath
     */
    private function resolveFileItems(array &$fileItems, string $userRelPath)
    {

        $userRelPath = FileSystemTool::removeTraversalDots($userRelPath);
        $tags = [
            'directory' => dirname($userRelPath),
            'filename' => basename($userRelPath),
            'basename' => FileSystemTool::getBasename($userRelPath),
            'extension' => FileSystemTool::getFileExtension($userRelPath),
        ];
        foreach ($fileItems as $k => $fileItem) {
            $fileItems[$k]['path'] = TagTool::injectTags($fileItem['path'], $tags);
        }
    }


    /**
     * Throws an exception.
     *
     * @param string $msg
     * @param int $code = 0
     * @throws \Exception
     */
    private function error(string $msg, int $code = 0)
    {
        throw new LightUserDataFileManagerHandlerException("LightUserDataFileManagerHandler error: " . $msg, $code);
    }
}