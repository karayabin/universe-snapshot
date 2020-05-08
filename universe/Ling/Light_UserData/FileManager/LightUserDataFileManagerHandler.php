<?php


namespace Ling\Light_UserData\FileManager;


use Ling\Bat\FileSystemTool;
use Ling\Bat\UriTool;
use Ling\CheapLogger\CheapLogger;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_UploadGems\GemHelper\GemHelperInterface;
use Ling\Light_UserData\Exception\LightUserDataFileManagerHandlerException;
use Ling\Light_UserData\Service\LightUserDataService;
use Ling\Light_UserData\TemporaryVirtualFileSystem\LightUserDataTemporaryVirtualFileSystem;
use Ling\Light_ZouUploader\ZouUploader;
use Ling\TemporaryVirtualFileSystem\TemporaryVirtualFileSystemInterface;

/**
 * The LightUserDataFileManagerHandler class.
 *
 * The goal of this class is to handle the @page(file manager protocol) for the Light_UserData plugin.
 *
 */
class LightUserDataFileManagerHandler
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
                $contextId = $this->getVirtualServerContextId($configId);
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

                    $contextId = $this->getVirtualServerContextId($configId);
                    $vfs = $this->getVirtualServerInstance();
                    $vfs->remove($contextId, $resourceId);

                } else {
                    $this->error("not handled yet with real server.");
                }
                break;
            case "add":
            case "update":

                // part of the file manager protocol response...
                $success['is_fully_uploaded'] = 0;

                /**
                 * General approach is to reject asap, so that in case of chunk upload, the user can have
                 * a message error asap (e.g. you don't want to wait an 1G file upload to see an extension error).
                 */

                // get all mandatory properties first
                $configId = $request->getPostValue("configId");
                $phpFile = $request->getFilesValue("file");
                $gemService = $this->container->get("upload_gems");
                $gemHelper = $gemService->getHelper($configId);
                $url = null;
                if ("update" === $action) {
                    $url = $request->getPostValue("url");
                }


                //--------------------------------------------
                // FILENAME BASED VALIDATION
                //--------------------------------------------
                $filename = $request->getPostValue("filename", false) ?? $phpFile['name'];
                $filename = $gemHelper->applyNameTransform($filename);
                $res = $gemHelper->applyNameValidation($filename);
                if (false === $res) {
                    $this->error($res);
                }

                //--------------------------------------------
                // WAIT UNTIL THE FILE IS UPLOADED..
                //--------------------------------------------
                $uploadedFile = FileSystemTool::mkTmpFile("", '');
                $zou = new ZouUploader();
                $zou->setOptions([
                    "override" => true,
                ]);
                $zou->setDestinationPath($uploadedFile);

                if (true === $zou->isUploaded($request)) {


                    $config = $gemHelper->getCustomConfig();


                    $relPath = $this->getDestinationPath($request, $gemHelper);
                    $useVfs = $config['useVfs'] ?? false;


                    if (true === $useVfs)
                        //--------------------------------------------
                        // VIRTUAL FILESYSTEM
                        //--------------------------------------------
                    {

                        $contextId = $this->getVirtualServerContextId($configId);
                        $vfs = $this->getVirtualServerInstance();


                        $tags = $request->getPostValue("tags", false) ?? [];



                        $filename = basename($relPath);
                        $directory = dirname($relPath);
                        $meta = [
                            "filename" => $filename,
                            "directory" => $directory,
                            "tags" => $tags,
                            "is_private" => (bool)$request->getPostValue("is_private", false),
                        ];


                        if ('add' === $action) {

                            $options = [
                                "keepOriginal" => $config['keepOriginal'] ?? false,
                                "move" => true,
                            ];

                            $ret = $vfs->add($contextId, $uploadedFile, $meta, $options);


                            /**
                             * Todo: apply copies...
                             * Todo: apply copies...
                             * Todo: apply copies...
                             * Todo: apply copies...
                             * Todo: apply copies...
                             */


                            $_success = [
                                "is_fully_uploaded" => 1,
                                "url" => UriTool::appendParams($this->service->getResourceUrlByResourceIdentifier($ret['id']), [
                                    "c" => $configId,
                                ]),
                                "filename" => $ret['meta']['filename'],
                                "directory" => $ret['meta']['directory'],
                                "tags" => $ret['meta']['tags'],
                                "is_private" => (int)$ret['meta']['is_private'],
                            ];
                        } else // action = update
                        {
                            $fileId = $this->service->getIdentifierByUrl($url);
                            $vfs->update($contextId, $fileId, $uploadedFile, $meta);
                        }


                    } else
                        //--------------------------------------------
                        // REGULAR SYSTEM
                        //--------------------------------------------
                    {


                        $this->error("This is not implemented yet: regular system.");
                    }


                } else {
                    // a chunk has been uploaded
                }


                /**
                 * Remove the tmp file.
                 */
                if (file_exists($uploadedFile)) {
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
     * @param string $configId
     * @param array $options
     */
    public function getResourceInfoFromVirtualMachine(string $resourceId, string $configId, array $options = [])
    {
        /**
         * todo: original option.
         */
        $addExtraInfo = (bool)($options['addExtraInfo'] ?? false);


        $contextId = $this->getVirtualServerContextId($configId);
        $vfs = $this->getVirtualServerInstance();
        $vmInfo = $vfs->get($contextId, $resourceId, ['realpath' => true]);
        $absPath = $vmInfo['realpath'];
        $meta = $vmInfo['meta'];
        $relPath = $meta['directory'] . "/" . $meta['filename'];
        $ret = [
            'abs_path' => $absPath,
            'rel_path' => $relPath,
        ];
        if (true === $addExtraInfo) {
            $ret['is_private'] = $meta['is_private'];
            $ret['original_url'] = false;
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
     * @param GemHelperInterface $helper
     * @return string
     * @throws \Exception
     */
    protected function getDestinationPath(HttpRequestInterface $request, GemHelperInterface $helper): string
    {
        $path = $helper->getCustomConfigValue("path"); // mandatory
        $filename = "";


        if (false !== strpos($path, '{filename}')) {
            $phpFile = $request->getFilesValue("file");
            $filename = $request->getPostValue("filename", false) ?? $phpFile['name'];
            $filename = $helper->applyNameTransform($filename);

            if (false === FileSystemTool::isValidFilename($filename)) {
                $this->error("Invalid filename: \"$filename\".");
            }

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
     * @return TemporaryVirtualFileSystemInterface
     * @throws \Exception
     */
    private function getVirtualServerInstance(): TemporaryVirtualFileSystemInterface
    {
        $o = new LightUserDataTemporaryVirtualFileSystem();
        $o->setContainer($this->container);
        $o->setRootDir($this->container->get("user_data")->getRootDir() . "/vm");
        return $o;
    }


    /**
     * Returns the context id for the vfs.
     *
     * @param string $configId
     * @return string
     * @throws \Exception
     */
    private function getVirtualServerContextId(string $configId)
    {
        $userId = $this->container->get("user_data")->getValidWebsiteUser()->getIdentifier();
        return $userId . "-" . $configId;
    }
}