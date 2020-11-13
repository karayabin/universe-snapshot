<?php


namespace Ling\Light_UserData\FileManager;


use Ling\Bat\ConvertTool;
use Ling\Bat\FileSystemTool;
use Ling\Bat\UriTool;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_UploadGems\GemHelper\GemHelper;
use Ling\Light_UserData\Exception\LightUserDataFileManagerHandlerException;
use Ling\Light_UserData\Service\LightUserDataService;
use Ling\Light_UserData\TemporaryVirtualFileSystem\LightUserDataTemporaryVirtualFileSystem;
use Ling\Light_UserManager\Service\LightUserManagerService;
use Ling\Light_ZouUploader\ZouUploader;

/**
 * The LightUserDataFileManagerHandlerStacking class.
 *
 * The goal of this class is to handle the @page(file manager protocol) for the Light_UserData plugin.
 *
 * This class use a stacking vfs, which is not recommended.
 * Check out the @page(TemporaryVirtualFileSystem conceptions notes) for more details.
 *
 *
 *
 * This class is deprecated, I keep it just in case I need a reference to the commit method below.
 *
 */
class LightUserDataFileManagerHandlerStacking
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
     * Builds the LightUserDataFileManagerHandler instance.
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
     * Commits the operations found in the virtual file server.
     *
     * @throws \Exception
     */
    public function commit()
    {
        $contextId = $this->getVirtualServerContextId();
        $vfs = $this->getVirtualServerInstance();
        $ops = $vfs->commit($contextId, [
            "reset" => false,
        ]);


        foreach ($ops as $op) {
            $type = $op['type'];


            switch ($type) {
                case "add":
                case "update":


                    //--------------------------------------------
                    // REGULAR
                    //--------------------------------------------
                    $resourceId = $op['id'];
                    $meta = $op['meta'];
                    $meta['dir'] = $meta['directory'];
                    $meta['resourceId'] = $resourceId;
                    $meta['is_private'] = (int)$meta['is_private'];
                    $hasOriginal = $meta['has_original'] ?? false;
                    $meta['file_path'] = $op['abs_path'];
                    if (true === $hasOriginal) {
                        $meta['original_file_path'] = $meta['original_abs_path'];
                    }
                    $this->service->save($meta);


                    //--------------------------------------------
                    // RELATED
                    //--------------------------------------------
                    $related = $meta['related'] ?? [];


                    /**
                     * This happens when the user updates an existing file which was not defined in the vfs,
                     * and the user doesn't update the binary file, but just the meta info such as is_private for instance.
                     * In this case, the vfs will not provide the necessary/expected related (see the related-files.md for more info) entries
                     * which would lead to sync problems.
                     *
                     * So to fix this, when that happens we recreate the related entries directly from the database,
                     * so that the logic below still works fine.
                     */
                    if ('update' === $type && null === $op['path']) {
                        $related = [];


                        // convert them to vfs format
                        $dbRelated = $this->service->getFactory()->getResourceApi()->getRelatedByResourceIdentifier($resourceId);
                        foreach ($dbRelated as $dbRel) {
                            $related[] = [
                                "directory" => $dbRel['dir'],
                                "filename" => $dbRel['filename'],
                                "abs_path" => null,
                            ];
                        }

                    }


                    if ($related) {
                        foreach ($related as $index => $item) {
                            $relatedMeta = $meta;
                            unset($relatedMeta['original_file_path']);
                            $relatedMeta['dir'] = $item['directory'];
                            $relatedMeta['filename'] = $item['filename'];
                            $relatedMeta['resourceId'] = $resourceId . '-' . $index;
                            $relatedMeta['has_original'] = false;
                            $relatedMeta['file_path'] = $item['abs_path'];
                            $this->service->save($relatedMeta);
                        }
                    }


                    break;
                case 'remove':
                    /**
                     * We want to:
                     * - remove the entries from the database
                     * - remove the files from the filesystem
                     */

                    //--------------------------------------------
                    // remove entries in the database
                    //--------------------------------------------
                    $resourceId = $op['id'];
                    $rows = $this->service->getFactory()->getResourceApi()->getSourceAndRelatedByResourceIdentifier($resourceId);
                    $ids = [];
                    foreach ($rows as $row) {
                        $ids[] = $row['id'];
                    }
                    $this->service->getFactory()->getResourceApi()->deleteResourceByIds($ids);;


                    //--------------------------------------------
                    // remove files from the file system
                    //--------------------------------------------
                    $this->service->removeAllFilesByResourceIdentifier($resourceId);
                    break;
                default:
                    $this->error("Unknown operation type: \"$type\".");
                    break;
            }
        }
        $vfs->reset($contextId);
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
                $contextId = $this->getVirtualServerContextId();
                $vfs = $this->getVirtualServerInstance();
                $vfs->reset($contextId);

                break;
            case "delete":

                $url = $request->getPostValue("url");
                $configId = $request->getPostValue("configId", false);
                $isVirtual = false;
                if (null !== $configId) {
                    $config = $this->container->get('upload_gems')->getHelper($configId)->getCustomConfig();
                    $isVirtual = (bool)($config['useVfs'] ?? false);
                }


                if (true === $isVirtual) {
                    $resourceId = $this->service->getIdentifierByUrl($url);
                    $contextId = $this->getVirtualServerContextId();
                    $vfs = $this->getVirtualServerInstance();
                    $vfs->remove($contextId, $resourceId);

                } else {
                    $this->service->removeResourceByUrl($url);
                }
                break;
            case "add":
            case "update":


                /**
                 * @var $um LightUserManagerService
                 */
                $um = $this->container->get("user_manager");
                $user = $um->getValidWebsiteUser();


                // part of the file manager protocol response...
                $success['is_fully_uploaded'] = 0;

                /**
                 * General approach is to reject asap, so that in case of chunk upload, the user can have
                 * a message error asap (e.g. you don't want to wait an 1G file upload to see an extension error).
                 */

                // get all mandatory properties first
                $configId = $request->getPostValue("configId");
                $phpFile = $request->getFilesValue("file", false) ?? null;
                $gemService = $this->container->get("upload_gems");
                $gemHelper = $gemService->getHelper($configId);
                $config = $gemHelper->getCustomConfig();
                $useVfs = $config['useVfs'] ?? false;


                //--------------------------------------------
                // EARLY MAX CAPACITY CHECK
                //--------------------------------------------
                /**
                 * We need to do this to avoid the following problem:
                 * a user keeps uploading chunks with different names every time, thus trying to upload more
                 * than the allowed max file size (if we didn't check the max file size before every chunk is uploaded).
                 */
                if (false === $useVfs) {
                    $maxBytes = $this->service->getMaximumCapacityByUser($user);
                    $prodBytes = $this->service->getCurrentCapacityByUser($user);
                    if ($prodBytes > $maxBytes) {
                        $this->error("Maximum storage capacity limit reached (" . ConvertTool::convertBytes($maxBytes, "h") . "). Please remove some files on your account before uploading new ones.");
                    }

                }


                $url = null;
                if ("update" === $action) {
                    $url = $request->getPostValue("url");
                } else {
                    if (null === $phpFile) {
                        $this->error("With the add action, the file parameter is mandatory.");
                    }
                }


                //--------------------------------------------
                // FILENAME BASED VALIDATION
                //--------------------------------------------
                $filename = $request->getPostValue("filename", false);
                if (null === $filename && 'add' === $action) {
                    $filename = $phpFile['name'];
                }

                $filename = $gemHelper->applyNameTransform($filename);
                $res = $gemHelper->applyNameValidation($filename);
                if (is_string($res)) {
                    $this->error($res);
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
                    $uploadedFile = sys_get_temp_dir() . "/LightUserDataFileManagerHandler-$userId-$configId";
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


                    $relPath = $this->getDestinationPath($request, $gemHelper);


                    // generic vars
                    $acceptKeepOriginal = $config['acceptKeepOriginal'];
                    $keepOriginal = (bool)$request->getPostValue("keep_original", false);
                    $willKeepOriginal = (true === $acceptKeepOriginal && true === $keepOriginal);


                    $tags = $request->getPostValue("tags", false) ?? [];
                    if ('' === $tags) {
                        $tags = [];
                    }


                    $filename = basename($relPath);
                    $directory = dirname($relPath);
                    $meta = [
                        "filename" => $filename,
                        "directory" => $directory,
                        "tags" => $tags,
                        "is_private" => (bool)$request->getPostValue("is_private", false),
                    ];


                    if (true === $useVfs)
                        //--------------------------------------------
                        // VIRTUAL FILESYSTEM
                        //--------------------------------------------
                    {

                        $contextId = $this->getVirtualServerContextId();
                        $vfs = $this->getVirtualServerInstance();


                        //--------------------------------------------
                        // QUICK/DIRTY MAX CAPACITY ESTIMATION
                        //--------------------------------------------
                        if (null !== $uploadedFile) {
                            $vfsBytes = $vfs->getCurrentCapacity($contextId, ['add' => true]);
                            $maxBytes = $this->service->getMaximumCapacityByUser($user);
                            $prodBytes = $this->service->getCurrentCapacityByUser($user);
                            $curBytes = $vfsBytes + $prodBytes;
                            if (false !== ($fileBytes = filesize($uploadedFile))) {
                                $curBytes += $fileBytes;
                            }
                            if ($curBytes >= $maxBytes) {
                                $currentHuman = ConvertTool::convertBytes($vfsBytes + $prodBytes, 'h');
                                $maxHuman = ConvertTool::convertBytes($maxBytes, 'h');
                                $fileHuman = ConvertTool::convertBytes($fileBytes, 'h');
                                $this->error("Max capacity reached. Your current directory contains $currentHuman of data, and you're trying to upload a file that weights $fileHuman, but your maximum allowed capacity is $maxHuman. Please consider removing some files, or uploading a lighter file.");
                                unlink($uploadedFile);
                            }
                        }


                        $options = [
                            "keepOriginal" => $willKeepOriginal,
                            "move" => true,
                            "gemHelper" => $gemHelper,
                        ];

                        //--------------------------------------------
                        // ACTION ADD
                        //--------------------------------------------
                        if ('add' === $action) {


                            $ret = $vfs->add($contextId, $uploadedFile, $meta, $options);
                            $url = UriTool::appendParams($this->service->getResourceUrlByResourceIdentifier($ret['id']), [
//                                "c" => $configId,
                            ]);
                            $originalUrl = null;
                            $hasOriginal = $ret['meta']['has_original'] ?? false;
                            if (true === $hasOriginal) {
                                $originalUrl = UriTool::appendParams($url, [
                                    'o' => 1,
                                ]);
                            }

                            $_success = [
                                "is_fully_uploaded" => 1,
                                "url" => $url,

                                "filename" => $ret['meta']['filename'],
                                "directory" => $ret['meta']['directory'],
                                "tags" => $ret['meta']['tags'],
                                "is_private" => (int)$ret['meta']['is_private'],
                                "original_url" => $originalUrl,
                            ];
                        } else {
                            //--------------------------------------------
                            // ACTION UPDATE
                            //--------------------------------------------
                            $fileId = $this->service->getIdentifierByUrl($url, false);

                            /**
                             * support for external urls.
                             * Note that the file must be provided to claim that support.
                             */
                            if (false === $fileId) {
                                $fileId = $this->service->getNewResourceIdentifier();
                            }

                            $ret = $vfs->update($contextId, $fileId, $uploadedFile, $meta, $options);

                            $url = UriTool::appendParams($this->service->getResourceUrlByResourceIdentifier($ret['id']), [
//                                "c" => $configId,
                            ]);
                            $originalUrl = null;
                            $hasOriginal = $ret['meta']['has_original'] ?? false;
                            if (true === $hasOriginal) {
                                $originalUrl = UriTool::appendParams($url, [
                                    'o' => 1,
                                ]);
                            }


                            $_success = [
                                "is_fully_uploaded" => 1,
                                "url" => $url,
                                "filename" => $ret['meta']['filename'],
                                "directory" => $ret['meta']['directory'],
                                "tags" => $ret['meta']['tags'],
                                "is_private" => (int)$ret['meta']['is_private'],
                                "original_url" => $originalUrl,
                            ];
                        }


                    } else
                        //--------------------------------------------
                        // REGULAR SYSTEM
                        //--------------------------------------------
                    {


                        if ('update' === $action) {
                            $resourceId = $this->service->getIdentifierByUrl($url);
                            $meta['resourceId'] = $resourceId;
                        } else {
                            if (false === $hasFileAttached) {
                                $this->error("No file provided with the add action.");
                            }
                        }


                        $meta['file_path'] = $uploadedFile;


                        $ret = $this->service->save($meta, [
                            'keep_original' => $willKeepOriginal,
                        ]);


                        //--------------------------------------------
                        // RELATED
                        //--------------------------------------------
                        $userDir = $this->service->getUserDir();
                        $info = $this->service->getResourceInfoByResourceIdentifier($ret['resource_identifier']);
                        $absPath = $info['abs_path'];
                        $prefixDir = $userDir . "/files/";
                        $resourceId = $ret['resource_identifier'];
                        $relatedFilesDir = $userDir . "/files/" . $resourceId . "-";

                        $gemHelper->applyCopies($absPath, [
                            'onBeforeCopy' => function () use ($relatedFilesDir) {
                                FileSystemTool::remove($relatedFilesDir);
                            },
                            'onDstReady' => function (&$dst, $copyIndex, $copyItem) use ($absPath, $prefixDir, $relatedFilesDir, $resourceId, $meta) {


                                $p = explode($prefixDir, $dst);
                                if (2 === count($p)) {


                                    $path = array_pop($p);

                                    $dirname = $copyItem['dir'] ?? dirname($path);
                                    $filename = $copyItem['filename'] ?? basename($path);


                                    $copyMeta = $meta;
                                    $copyMeta["resourceId"] = $resourceId . "-" . $copyIndex;
                                    $copyMeta["filename"] = $filename;
                                    $copyMeta["dir"] = $dirname;
                                    $copyMeta["file_path"] = $dst;
                                    $this->service->save($copyMeta, [
                                        'check_msc' => false,
                                        'treat_file' => false,
                                    ]);
                                    $dst = $relatedFilesDir . "/$copyIndex";

                                } else {
                                    $this->error("The copy does not seem to be located under the server's files directory, resourceId=$resourceId, copy index=$copyIndex.");
                                }

                            }
                        ]);


                        $url = $this->service->getResourceUrlByResourceIdentifier($ret['resource_identifier']);
                        $originalUrl = null;
                        $originalFile = $userDir . "/original/" . $ret['resource_identifier'];
                        if (file_exists($originalFile)) {
                            $originalUrl = UriTool::appendParams($url, [
                                'o' => 1,
                            ]);
                        }

                        $_success = [
                            "is_fully_uploaded" => 1,
                            "url" => $url,

                            "filename" => $ret['filename'],
                            "directory" => $ret['dir'],
                            "tags" => $ret['tags'],
                            "is_private" => (int)$ret['is_private'],
                            "original_url" => $originalUrl,
                        ];

                    }


                } else {
                    // a chunk has been uploaded
                }


                /**
                 * Remove the tmp file.
                 */
                if (true === $hasFileAttached && file_exists($uploadedFile)) {
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
     * Returns the resource info for the given resource.
     * The resource info is an array described in LightUserDataService->getResourceInfoByResourceIdentifier.
     *
     *
     * The options are:
     * - original: bool, whether to return the path of the original file (if any) instead of the regular file
     * - addExtraInfo: bool=false (see the getResourceInfoByResourceIdentifier method for more info)
     *
     *
     * @param string $resourceId
     * @param array $options
     */
    public function getResourceInfoFromVirtualMachine(string $resourceId, array $options = [])
    {

        $addExtraInfo = (bool)($options['addExtraInfo'] ?? false);
        $useOriginal = $options['original'] ?? false;


        $contextId = $this->getVirtualServerContextId();
        $vfs = $this->getVirtualServerInstance();
        $vmInfo = $vfs->get($contextId, $resourceId, [
            'realpath' => true,
            'original' => $useOriginal,
        ]);
        $absPath = $vmInfo['realpath'];
        $meta = $vmInfo['meta'];


        $relPath = $meta['directory'] . "/" . $meta['filename'];
        $ret = [
            'abs_path' => $absPath,
            'rel_path' => $relPath,
        ];
        $ret['is_private'] = $meta['is_private'];
        $hasOriginal = $ret['meta']['has_original'] ?? false;
        if (true === $hasOriginal) {
            $ret['original_url'] = UriTool::appendParams($this->service->getResourceUrlByResourceIdentifier($resourceId), [
                'o' => 1,
            ]);
        } else {
            $ret['original_url'] = null;
        }


        if (true === $addExtraInfo) {
            $ret['tags'] = $meta['tags'];
        }
        return $ret;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the relative destination path (from the user directory) for the file based on the given request and uploadGem helper.
     *
     * We use internal heuristics, just look at the code to see how we do it.
     *
     * @param HttpRequestInterface $request
     * @param GemHelper $helper
     * @return string
     * @throws \Exception
     */
    protected function getDestinationPath(HttpRequestInterface $request, GemHelper $helper): string
    {
        $path = $helper->getCustomConfigValue("path"); // mandatory
        $filename = "";


        if (false !== strpos($path, '{filename}')) {
            $phpFile = $request->getFilesValue("file", false);
            $filename = $request->getPostValue("filename", false);
            if (null === $filename && null !== $phpFile) {
                $filename = $phpFile['name'];

            }
            if (null === $filename) {
                $this->error("filename not defined.");
            }
            $filename = $helper->applyNameTransform($filename);

            /**
             * Not required since we use a flat filesystem
             */
//            if (false === FileSystemTool::isValidFilename($filename)) {
//                $this->error("Invalid filename: \"$filename\".");
//            }

        }
        return str_replace([
            '{filename}',
        ], [
            $filename,
        ], $path);
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
     * Returns a vfs instance.
     *
     * @return LightUserDataTemporaryVirtualFileSystem
     * @throws \Exception
     */
    private function getVirtualServerInstance(): LightUserDataTemporaryVirtualFileSystem
    {
        $o = new LightUserDataTemporaryVirtualFileSystem();
        $o->setContainer($this->container);
        $o->setRootDir($this->container->get("user_data")->getRootDir() . "/vm");
        return $o;
    }


    /**
     * Returns the context id for the vfs.
     *
     * @return string
     * @throws \Exception
     */
    private function getVirtualServerContextId()
    {
        /**
         * @var $um LightUserManagerService
         */
        $um = $this->container->get("user_manager");
        return $um->getValidWebsiteUser()->getIdentifier();
    }
}