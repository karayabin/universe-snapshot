<?php


namespace Ling\Light_UserData\FileManager;


use Ling\Bat\CaseTool;
use Ling\Bat\ConvertTool;
use Ling\Bat\FileSystemTool;
use Ling\Bat\StringTool;
use Ling\Bat\UriTool;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_UserData\Exception\LightUserDataFileManagerHandlerException;
use Ling\Light_UserData\Service\LightUserDataService;
use Ling\Light_UserData\VirtualFileSystem\LightUserDataVirtualFileSystem;
use Ling\Light_UserManager\Service\LightUserManagerService;
use Ling\Light_ZouUploader\ZouUploader;

/**
 * The LightUserDataFileManagerHandler class.
 *
 * The goal of this class is to handle the @page(file manager protocol) for the Light_UserData plugin.
 *
 * WARNING: this class is not fully implemented, the commit method isn't written: as I was about to write it,
 * I basically changed my mind and thought that a vfs based solution was adding too much complexity compared to the benefits it provides,
 * and so I switched to a direct interaction with the real server, which is very logical, and thus intuitive, much more maintainable
 * from the dev's perspective, and the user probably won't notice...
 *
 * So instead of this class, you should use the LightUserDataDirectFileManagerHandler instead.
 * But in memory of all the (conception) efforts I put into this class, I keep this just in case, or if I change my mind again,
 * I won't have to start from scratch...
 *
 *
 */
class LightUserDataVirtualFileManagerHandler implements LightUserDataFileManagerHandlerInterface
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
     * This property holds the vfsCache for this instance.
     * @var LightUserDataVirtualFileSystem
     */
    private $vfsCache;


    /**
     * Builds the LightUserDataVirtualFileManagerHandler instance.
     */
    public function __construct()
    {
        $this->service = null;
        $this->container = null;
        $this->vfsCache = null;
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
     * Commits the operations found in the virtual file server.
     *
     * @throws \Exception
     */
    public function commit()
    {
        throw new \Exception("todo: commit");
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
                $configId = $request->getPostValue("configId");
                $vfs = $this->getVirtualServerInstance($configId);
                $vfs->reset();
                break;
            case "delete":
                $url = $request->getPostValue("url");
                $configId = $request->getPostValue("configId");
                $vfs = $this->getVirtualServerInstance($configId);
                $resourceId = $this->service->getResourceIdentifierByUrl($url);
                $vfs->removeResourceById($resourceId);

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
                $vfs = $this->getVirtualServerInstance($configId);
                $phpFile = $request->getFilesValue("file", false) ?? null;
                $gemService = $this->container->get("upload_gems");
                $gemHelper = $gemService->getHelper($configId);

                $customConfig = $gemHelper->getCustomConfig();
                $acceptKeepOriginal = $customConfig['acceptKeepOriginal'];

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

                //--------------------------------------------
                // MAX CAPACITY CHECK
                //--------------------------------------------
                if (null !== $uploadedFile) {
                    $this->checkMaxCapacity($configId, $uploadedFile);
                }


                $userRelPath = $filename;
                if (false === empty($directory)) {
                    $userRelPath = $directory . "/" . $userRelPath;
                }


                if ('add' === $action) {
                    $resourceId = $vfs->add([
                        "src_path" => $uploadedFile,
                        "user_rel_path" => $userRelPath,
                        "tags" => $tags,
                        "is_private" => $isPrivate,
                        "files" => $customConfig['files'],
                        "keep_original" => $willKeepOriginal, // isn't it always true with add operation?
                    ]);

                } else {
                    $resourceId = $this->service->getResourceIdentifierByUrl($updateUrl);
                    $vfs->update($resourceId, [
                        "src_path" => $uploadedFile,
                        "user_rel_path" => $userRelPath,
                        "tags" => $tags,
                        "is_private" => $isPrivate,
                        "files" => $customConfig['files'],
                        "keep_original" => $willKeepOriginal, // isn't it always true with add operation?
                    ]);

                }

                $info = $vfs->getSourceFileInfoByResourceId($resourceId);

                $_success = [
                    "is_fully_uploaded" => 1,
                    "directory" => $info['directory'],
                    "filename" => $info['name'],
                    "url" => UriTool::appendParams($info['url'], [
                        'v' => 1,
                        'c' => $configId,
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


    /**
     * Returns the configured LightUserDataVirtualFileSystem instance.
     *
     * @param string $configId
     * @return LightUserDataVirtualFileSystem
     * @throws \Exception
     */
    public function getVirtualServerInstance(string $configId): LightUserDataVirtualFileSystem
    {
        if (null === $this->vfsCache) {
            /**
             * @var $um LightUserManagerService
             */
            $um = $this->container->get("user_manager");
            $userId = $um->getValidWebsiteUser()->getIdentifier();
            $o = new LightUserDataVirtualFileSystem();
            $o->setBaseDir($this->service->getRootDir() . '/vm');
            $o->setContextId($userId . "-" . $configId);
            $o->setContainer($this->container);
            $this->vfsCache = $o;
        }
        return $this->vfsCache;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an exception.
     *
     * @param string $msg
     * @throws \Exception
     */
    private function error(string $msg)
    {
        throw new LightUserDataFileManagerHandlerException("LightUserDataFileManagerHandler error: " . $msg);
    }


    /**
     * Checks whether the maximum capacity is or will be exceeded. If so throws an exception.
     *
     * If a file is being uploaded (i.e. uploadedFile not null), and the max capacity will be exceeded, the file
     * will be deleted.
     *
     *
     * @param string $configId
     * @param string|null $uploadedFile
     * @throws \Exception
     */
    private function checkMaxCapacity(string $configId, string $uploadedFile = null)
    {

        /**
         * @var $um LightUserManagerService
         */
        $um = $this->container->get("user_manager");
        $user = $um->getValidWebsiteUser();


        $vfs = $this->getVirtualServerInstance($configId);
        $vfsBytes = $vfs->getCurrentCapacity();
        $maxBytes = $this->service->getMaximumCapacityByUser($user);
        $prodBytes = $this->service->getCurrentCapacityByUser($user);
        $curBytes = $vfsBytes + $prodBytes;
        if (null !== $uploadedFile) {
            if (false !== ($fileBytes = filesize($uploadedFile))) {
                $curBytes += $fileBytes;
            }
        }
        if ($curBytes >= $maxBytes) {
            $currentHuman = ConvertTool::convertBytes($vfsBytes + $prodBytes, 'h');
            $maxHuman = ConvertTool::convertBytes($maxBytes, 'h');
            if (null !== $uploadedFile) {
                $fileHuman = ConvertTool::convertBytes($fileBytes, 'h');
                unlink($uploadedFile);
                $this->error("Max capacity reached. Your current directory contains $currentHuman of data, and you're trying to upload a file that weights $fileHuman, but your maximum allowed capacity is $maxHuman. Please consider removing some files, or uploading a lighter file.");
            } else {
                $this->error("Max capacity of $maxHuman reached. Please consider removing some files, or uploading a lighter file.");
            }
        }

    }
}