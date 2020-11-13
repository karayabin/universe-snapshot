<?php


namespace Ling\Light_UserData\VirtualFileSystem;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\FileSystemTool;
use Ling\Bat\FileTool;
use Ling\Bat\TagTool;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_UploadGems\GemHelper\GemHelperTool;
use Ling\Light_UserData\Exception\LightUserDataException;
use Ling\Light_UserData\Helper\LightUserDataHelper;
use Ling\Light_UserData\Service\LightUserDataService;
use Ling\Light_UserManager\Service\LightUserManagerService;

/**
 * The LightUserDataVirtualFileSystem class.
 *
 *
 * Our filesystem structure looks like this:
 *
 * - $baseDir:
 * ----- $contextId
 * --------- commit_list.byml
 * --------- files/
 * ------------- $relPath
 *
 *
 *
 */
class LightUserDataVirtualFileSystem
{
    /**
     * This property holds the baseDir for this instance.
     * @var string
     */
    protected $baseDir;

    /**
     * This property holds the contextId for this instance.
     * @var string
     */
    protected $contextId;

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * This property hold the cache for the commit file.
     * @var array=null
     */
    private $_content;

    /**
     * This property holds the cache for default files info.
     * @var array
     */
    private $_defaultFileCache;


    /**
     * Builds the LightUserDataVirtualFileSystem instance.
     */
    public function __construct()
    {
        $this->baseDir = "/tmp";
        $this->contextId = "not_set";
        $this->container = null;
        $this->_content = null;
        $this->_defaultFileCache = [];
    }

    /**
     * Sets the baseDir.
     *
     * @param string $baseDir
     */
    public function setBaseDir(string $baseDir)
    {
        $this->baseDir = $baseDir;
    }

    /**
     * Sets the contextId.
     *
     * @param string $contextId
     */
    public function setContextId(string $contextId)
    {
        /**
         * Note: I replace colon with dots, because on mac apparently the colon is replaced with slash, which
         * ends up creating directories which name contain slashes, which confuses me.
         *
         * The potential problem with this replacement is legit name conflicts, so I will watch this thread,
         * but in the meantime, this replacement works for me...
         */
        $this->contextId = str_replace(':', '.', $contextId);
    }

    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Removes the file identified by the given resource id.
     * If the file doesn't exist, the method does nothing and doesn't complain.
     *
     * Technical details: we try to play nice and we remove the resource from both
     * the commit.byml file and the virtual file system, to avoid any potential sync problems.
     *
     * @param string $resourceId
     */
    public function removeResourceById(string $resourceId)
    {
        $conf = $this->getCommitListContent();
        $changeDetected = false;


        if (true === $this->isDefaultFile($resourceId)) {
            if (false === in_array($resourceId, $conf['to_remove'], true)) {
                $conf['to_remove'][] = $resourceId;
                $changeDetected = true;
            }
        }
        $sections = [
            'to_add',
            'to_update',
        ];
        foreach ($sections as $section) {
            $resources = $conf[$section];
            if (array_key_exists($resourceId, $resources)) {
                $changeDetected = true;
                $resource = $resources[$resourceId];
                $this->removeFileItemsFiles($resource['files']);

                /**
                 * Remove from commit.byml
                 */
                unset($conf[$section][$resourceId]);
                break;
            }
        }

        if (true === $changeDetected) {
            $this->updateCommitListContent($conf);
        }

        //--------------------------------------------
        // REMOVING EMPTY DIRS
        //--------------------------------------------
        $dir = $this->getFilesDirectory();
        if (file_exists($dir)) {
            FileSystemTool::cleanDir($dir);
        }

    }


    /**
     * Resets the virtual file server for the configured context id.
     */
    public function reset()
    {
        $contextDir = $this->baseDir . "/" . $this->contextId;
        FileSystemTool::remove($contextDir);
    }


    /**
     * Returns the current weight of all files uploaded by the user so far.
     *
     * @return int
     */
    public function getCurrentCapacity(): int
    {
        $filesDir = $this->getFilesDirectory();
        return FileSystemTool::getDirectorySize($filesDir);
    }


    /**
     * Adds a file to the virtual server, updates the commit file accordingly, and returns the resourceId.
     *
     * Params are the same as the storeEntry method, with the following differences:
     * - src_path: is mandatory (i.e. not null)
     *
     *
     *
     *
     *
     *
     * @param array $params
     * @return string
     */
    public function add(array $params): string
    {
        return $this->storeEntry($params);
    }


    /**
     * Stores an entry in the commit file, either in the to_add section or the to_update section, depending on the given params and options.
     *
     * The params are:
     * - src_path: string|null, the absolute path of the source file to store,  or null if you don't need to store a file.
     * - user_rel_path: string, the base relative path, relative to the user dir, as provided by the user.
     *      This is used as a suggestion while processing the "files" property.
     *      This is also the expression which we extract the "Upload file" tags from (i.e. NOT the tags property below).
     *      See the @page("Upload file configuration" section of the user data file manager document) for more info about "upload file" tags.
     * - tags: array of tag names to attach to the source file
     * - is_private: bool, whether the source file is considered private
     * - files: array, where to really put the file and related. It can use the filename as a reference/helper.
     *      See the ["Upload file configuration" section of the user-data-file-manager.md document](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/user-data-file-manager.md) for more details.
     * - keep_original: bool=false. Whether to keep the original. This will work only with images. The source file will be used
     *      as the source of the copy.
     *
     *
     *
     *
     * Available options are:
     * - resourceId: the resourceId to use. If not specified, one will be generated automatically.
     * - section: string=to_add, the name of the section to update. It can be one of:
     *      - to_add
     *      - to_update
     * - dry: bool=false. If true, the file variations will not be created, but the paths in the commit file will be updated (and point to non existing files).
     *
     *
     *
     * See the [source file section of our conception notes](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/conception-notes.md#the-source-file) for more details
     * about the source file.
     *
     *
     * @param array $params
     * @param array $options
     * @return string
     * @throws \Exception
     */
    private function storeEntry(array $params, array $options = []): string
    {


        $content = $this->getCommitListContent();
        $section = $options['section'] ?? "to_add";
        $dry = $options['dry'] ?? false;
        $filesDirectory = $this->getFilesDirectory();

        /**
         * @var $ud LightUserDataService
         */
        $ud = $this->container->get("user_data");

        $sourceWasFound = false;
        $srcPath = $params['src_path'];
        $userRelPath = $params['user_rel_path'];
        $tags = $params['tags'];
        $isPrivate = $params['is_private'];
        $keepOriginal = $params['keep_original'] ?? false;

        $files = $params['files'];
        if (empty($files)) {
            $this->error("There is no concrete variation attached to this resource ($userRelPath). Aborting the add operation...");
        }


        //--------------------------------------------
        // CREATE THE FILE VARIATIONS
        //--------------------------------------------
        $variations = [];
        $nbFiles = count($files);
        foreach ($files as $fInfo) {
            $nickname = $this->getFileItemProperty($fInfo, "nickname");
            $path = $this->getFileItemProperty($fInfo, "path");
            $imageTransformer = $fInfo['imageTransformer'] ?? null;
            $isSource = (1 === $nbFiles) ? true : $fInfo['is_source'] ?? false;
            $path = $this->createCopy($path, $userRelPath, $srcPath, [
                'imageTransformer' => $imageTransformer,
                'dry' => $dry,
            ]);
            $variations[] = [
                "path" => $path,
                "nickname" => $nickname,
                "is_source" => (int)$isSource,
            ];


            if (false === $dry && true === $isSource) {
                $sourceWasFound = true;

                //--------------------------------------------
                // ORIGINAL IMAGE COPY
                //--------------------------------------------
                if (true === $keepOriginal) {
                    $srcFilePath = $filesDirectory . "/" . $path;
                    if (false === file_exists($srcFilePath)) {
                        $this->error("Oops, for some reason this file wasn't found: \"$srcFilePath\".");
                    }

                    if (false === FileTool::isImage($srcPath)) {
                        /**
                         * Should we really complain if it's not an image?
                         */
                        $this->error("Will not save the file as an original, since it's not an image: \"$srcPath\".");
                    }
                    $oriPath = LightUserDataHelper::getOriginalPath($srcFilePath);
                    FileSystemTool::copyFile($srcPath, $oriPath);
                }
            }
        }


        if (false === $dry && false === $sourceWasFound) {
            $this->error("No source file was defined in the given file configuration.");
        }


        //--------------------------------------------
        // UPDATE THE COMMIT FILE
        //--------------------------------------------
        $resourceId = $options['resourceId'] ?? $ud->getNewResourceIdentifier();
        $content[$section][$resourceId] = [
            "tags" => $tags,
            "is_private" => $isPrivate,
            "files" => $variations,
        ];

        $this->updateCommitListContent($content);
        return $resourceId;
    }

    /**
     *
     * Updates the information of the virtual file identified by the given resourceId in the commit file.
     * If the file is also modified, it will update the file and all its variations in the virtual file system.
     *
     *
     * Params are:
     * - src_path: string|null. The absolute path of the source file to add.
     *      This is null when the user/client doesn't provide a file.
     *
     * - user_rel_path: the base relative path, relative to the user dir, as provided by the user.
     *      This is used as a suggestion while processing the "files" property.
     * - tags: array of tag names to attach to the source file
     * - is_private: bool, whether the source file is considered private
     * - files: array, where to really put the file and related. It can use the filename as a reference/helper.
     *      See the ["Upload file configuration" section of the user-data-file-manager.md document](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/user-data-file-manager.md) for more details.
     * - keep_original: bool=false. Whether to keep the given file as the (new) original. This will work only with images. The source file will be used
     *      as the source of the copy.
     *
     *
     *
     * @param string $resourceId
     * @param array $params
     */
    public function update(string $resourceId, array $params)
    {


        $isDefaultFile = $this->isDefaultFile($resourceId);
        $srcPath = $params['src_path'];
        $fileWasProvided = (null !== $srcPath);
        $content = $this->getCommitListContent();
        $userRelPath = $params['user_rel_path'];
        $files = $params['files'];

        if (true === $isDefaultFile) {
            $section = "to_update";
        } else {
            $section = "to_add";
        }


        $resources = $content[$section];
        if (array_key_exists($resourceId, $resources)) {

            /**
             * If the user doesn't provide a file, but the entry exists in the to_update section, this means
             * that the user already used the gui to upload a file previously, and so the entry (in to_update) has been created and files
             * exist already on the vfs, and now the user updates the file again, but this time just the meta-data (i.e. not the file).
             * In that case, we move the old files to the new location (if the name has changed).
             *
             */
            $resource = $resources[$resourceId];
            $this->updateResourceFilePaths($resource, $files, $userRelPath);
        }


        $this->storeEntry($params, [
            "resourceId" => $resourceId,
            "dry" => !$fileWasProvided,
            "section" => $section,
        ]);

    }


    /**
     * Returns an array of information about the source file identified by the given resource id.
     * The array contains the following information:
     *
     * - directory: string, relative directory path (relative to the user directory) of the source file.
     * - name: string, @page(filename) of the source file.
     * - url: string, the url of the source file.
     * - is_private: bool, whether the source file is private.
     * - tags: array of tags used by the resource containing the source file.
     * - original_url: string|null, the url pointing to the original image if any, or null if non applicable.
     * - abs_path: string, absolute path to the source file.
     *
     *
     * Available options are:
     * - original: bool=false. Whether to use the original image of the given resourceId.
     *
     *
     * @param string $resourceId
     * @param array $options
     * @return array
     */
    public function getSourceFileInfoByResourceId(string $resourceId, array $options = []): array
    {
        $ret = [];
        $content = $this->getCommitListContent();

        if (array_key_exists($resourceId, $content['to_add'])) {
            $ret = $this->compileInfoByResourceItem($resourceId, $content['to_add'][$resourceId], $options);
        } elseif (array_key_exists($resourceId, $content['to_update'])) {
            $ret = $this->compileInfoByResourceItem($resourceId, $content['to_update'][$resourceId], $options);
        }
        return $ret;
    }





    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Creates a copy of the file which source and dest are given, on the virtual server, and returns the resolved relative path (i.e. after the tags have been injected into it).
     *
     *
     *
     * The userRelPath variable is the relative path suggested by the user.
     * We will extract tags from it, and replace those tags in the given relativePath.
     * The extracted tags are defined in [the "upload file configuration" section of the user data file manager document](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/user-data-file-manager.md#upload-file-configuration).
     *
     *
     * Available options are:
     * - imageTransformer: string=null, defines how to transform the image.
     *      See the [Light_UploadGems planet documentation](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/pages/conception-notes.md) for more info.
     * - dry: bool=false, if true, the concrete file will not be created/copied.
     *
     * @param string $relativePath
     * @param string $userRelPath
     * @param string|null $fileSrc
     * @param array $options
     */
    private function createCopy(string $relativePath, string $userRelPath, string $fileSrc = null, array $options = []): string
    {
        $imageTransformer = $options['imageTransformer'] ?? null;
        $dry = $options['dry'] ?? false;
        $dir = $this->getFilesDirectory();
        $relativePath = $this->resolveFilePath($userRelPath, $relativePath);
        $file = $dir . "/" . $relativePath;


        if (false === $dry) {
            if (null !== $imageTransformer) {
                GemHelperTool::transformImage($fileSrc, $file, $imageTransformer);
            } else {
                FileSystemTool::copyFile($fileSrc, $file);
            }
        }
        return $relativePath;
    }


    /**
     * Extracts the tags out of the given userRelPath, then injects them in the given relativePath and returns the corresponding resolved relative path.
     *
     * @param string $userRelPath
     * @param string $relativePath
     * @return string
     */
    private function resolveFilePath(string $userRelPath, string $relativePath): string
    {
        $userRelPath = FileSystemTool::removeTraversalDots($userRelPath);
        $tags = [
            'directory' => dirname($userRelPath),
            'filename' => basename($userRelPath),
            'basename' => FileSystemTool::getBasename($userRelPath),
            'extension' => FileSystemTool::getFileExtension($userRelPath),
        ];

        return TagTool::injectTags($relativePath, $tags);
    }


    /**
     * Returns the configuration contained in the commit list file for the configured contextId.
     *
     * If the commit file doesn't exist yet, it will be created.
     *
     * @return array
     */
    private function getCommitListContent()
    {
        if (null === $this->_content) {
            /**
             * Note: we might add light execute notation processing later, so be sure to use only this method
             * to get the content of the commit file.
             */
            $f = $this->getCommitListPath();
            if (false === file_exists($f)) {
                BabyYamlUtil::writeFile([
                    "to_remove" => [],
                    "to_add" => [],
                    "to_update" => [],
                ], $f);
            }
            $this->_content = BabyYamlUtil::readFile($f);
        }
        return $this->_content;
    }

    /**
     * Replaces the commit_list.byml content with the given array.
     * You should only use this method to update the content of the commit file (because we handle a cache internally).
     *
     * @param array $conf
     */
    private function updateCommitListContent(array $conf)
    {
        $f = $this->getCommitListPath();
        BabyYamlUtil::writeFile($conf, $f);
        $this->_content = null;
    }

    /**
     * Returns the absolute path to the commit list file.
     *
     * @return string
     */
    private function getCommitListPath(): string
    {
        return $this->baseDir . "/" . $this->contextId . "/commit_list.byml";
    }

    /**
     * Returns the absolute path of the file which relative path was given.
     * Note: we remove traversal dots (if any) from the given relative path.
     *
     *
     * @param string $relPath
     * @return string
     */
    private function getFileAbsolutePathByRelativePath(string $relPath): string
    {
        return $this->getFilesDirectory() . "/" . FileSystemTool::removeTraversalDots($relPath);
    }

    /**
     * Returns the given property defined in the given file item, or throws an exception otherwise.
     *
     * @param array $fileItem
     * @param string $property
     * @return string
     * @throws \Exception
     */
    private function getFileItemProperty(array $fileItem, string $property): string
    {
        if (array_key_exists($property, $fileItem)) {
            return $fileItem[$property];
        }
        $this->error("The \"$property\" property wasn't found for the given fileItem. Please review your configuration (contextId=$this->contextId).");
    }


    /**
     * Removes the files on the virtual server, which are bound to the given resource array.
     *
     * @param array $resource
     */
    private function removeFilesByResource(array $resource)
    {
        $oldFiles = $resource['files'] ?? [];
        $dir = $this->getFilesDirectory();
        foreach ($oldFiles as $fileItem) {
            $path = $dir . "/" . $fileItem['path'];
            if (true === (bool)$fileItem['is_source']) {
                $oriPath = LightUserDataHelper::getOriginalPath($path);
                unlink($oriPath);
            }
            unlink($path);
        }
    }

    /**
     * Renames the files defined in the given oldResource, moves them to where they are defined in the given fileItems array, and updates the oldResource.
     *
     * Hints:
     * - oldResource comes from the commit file
     * - fileItems comes from the uploadGems config (it can use tags, they will be resolved)
     *
     *
     * @param array $oldResource
     * @param array $fileItems
     * @param string $userRelPath
     */
    private function updateResourceFilePaths(array &$oldResource, array $fileItems, string $userRelPath)
    {
        $oldFiles = $oldResource['files'];
        $nbOldFiles = count($oldFiles);
        $nbFiles = count($fileItems);

        if ($nbOldFiles !== $nbFiles) {
            $this->error("The number of files to update must be the same as the number of file items in the config.");
        }


        //--------------------------------------------
        // UPDATING THE PATHS, AND RENAMING THE FILES
        //--------------------------------------------
        foreach ($fileItems as $index => $fileItem) {


            $path = $this->getFileItemProperty($fileItem, "path");
            $isSource = $fileItem['is_source'] ?? false;

            $newPath = $this->resolveFilePath($userRelPath, $path);
            $oldPath = $oldFiles[$index]["path"];


            // rename the file
            $oldPathAbs = $this->getFileAbsolutePathByRelativePath($oldPath);
            $newPathAbs = $this->getFileAbsolutePathByRelativePath($newPath);
            if (false !== file_exists($oldPathAbs)) {
                // we don't complain if the file doesn't exist, because this could be an update of meta only on a file that was already updated
                FileSystemTool::move($oldPathAbs, $newPathAbs);
            }

            // update the config array
            $oldResource['files'][$index]['path'] = $newPath;


            if (true === $isSource) {
                /**
                 * Copying the original image, if it exists.
                 * Assuming the old source file has the same index as the new source file.
                 *
                 */
                $oriOldPath = LightUserDataHelper::getOriginalPath($oldPathAbs);
                if (file_exists($oriOldPath)) {
                    $oriNewPath = LightUserDataHelper::getOriginalPath($newPathAbs);
                    FileSystemTool::move($oriOldPath, $oriNewPath);
                }


            }
        }
    }

    /**
     * Removes the files defined in the given file items.
     *
     * @param array $fileItems
     */
    private function removeFileItemsFiles(array $fileItems)
    {

        foreach ($fileItems as $fileItem) {
            // relPath can be non existing in some cases of update (if the user doesn't provide a file...)
            $relPath = $fileItem['path'] ?? null;
            if (null !== $relPath) {
                $path = $this->getFileAbsolutePathByRelativePath($relPath);
                /**
                 * Remove from filesystem
                 */
                if (file_exists($path)) {
                    unlink($path);
                }

                /**
                 * Remove the original image if it exists
                 */
                if (true === (bool)$fileItem['is_source']) {
                    $oriPath = LightUserDataHelper::getOriginalPath($path);
                    if (file_exists($oriPath)) {
                        unlink($oriPath);
                    }
                }
            }
        }
    }


    /**
     * Returns an array of information from the given resource item.
     * The information is described in the getSourceFileInfoByResourceId method's comment,
     * but all properties are optional and are returned only if found.
     *
     * Also, the absolute path for a "default file", if it's not in changed by the user (and found on the vfs),
     * is the abs path from the real server.
     *
     * Available options are:
     * - original: bool=false. Whether to return the original image in the absolute path.
     *
     *
     *
     *
     * @param string $resourceId
     * @param array $resourceItem
     * @param array $options
     * @return array
     */
    private function compileInfoByResourceItem(string $resourceId, array $resourceItem, array $options = []): array
    {
        $useOriginal = $options['original'] ?? false;
        $isDefaultFile = $this->isDefaultFile($resourceId);

        $files = $resourceItem['files'];
        $ret = [
            "is_private" => $resourceItem['is_private'],
            "tags" => $resourceItem['tags'],
        ];
        if ($files) {
            $found = false;
            foreach ($files as $item) {
                if (true === (bool)$item['is_source']) {
                    $found = true;


                    /**
                     * @var $ud LightUserDataService
                     */
                    $ud = $this->container->get("user_data");

                    $path = $item['path'];
                    $absPath = $this->getFileAbsolutePathByRelativePath($path);

                    if (true === $useOriginal) {
                        $absPath = LightUserDataHelper::getOriginalPath($absPath);
                    }


                    /**
                     * For "default files", as long as the user doesn't update the file binary, we take it from the real server.
                     */
                    if (true === $isDefaultFile && false === file_exists($absPath)) {
                        $absPath = $ud->getResourcePathByResourceIdentifier($resourceId, [
                            'original' => $useOriginal,
                        ]);
                    }


                    $ret = array_merge($ret, [
                        "abs_path" => $absPath,
                        "directory" => dirname($path),
                        "name" => basename($path),
                        "url" => $ud->getUrlByResourceIdentifier($resourceId),
                        "original_url" => $ud->getUrlByResourceIdentifier($resourceId, [
                            'urlParams' => [
                                'o' => 1,
                                'c' => $this->getConfigId(),
                            ],
                        ]),
                    ]);
                    break;
                }
            }
            if (false === $found) {
                $this->error("Configuration error: no source file defined, but files array is not empty (resourceId=$resourceId).");
            }
        }

        return $ret;
    }


    /**
     * Returns the absolute path to the "files" directory for the configured context.
     * @return string
     */
    private function getFilesDirectory(): string
    {
        return $this->baseDir . "/" . $this->contextId . "/files";
    }


    /**
     * Returns whether the file, which resource identifier is given, is a default file.
     * See our @page(default file/new file concept) for more details.
     *
     *
     * @param string $resourceIdentifier
     * @return bool
     */
    private function isDefaultFile(string $resourceIdentifier): bool
    {
        if (false === array_key_exists($resourceIdentifier, $this->_defaultFileCache)) {

            /**
             * @var $ud LightUserDataService
             */
            $ud = $this->container->get("user_data");
            /**
             * @var $um LightUserManagerService
             */
            $um = $this->container->get("user_manager");
            $this->_defaultFileCache[$resourceIdentifier] = $ud->userHasResource($resourceIdentifier, $um->getValidWebsiteUser());
        }
        return $this->_defaultFileCache[$resourceIdentifier];
    }


    /**
     * Returns the current config id.
     * @return string
     */
    private function getConfigId(): string
    {
        $p = explode('-', $this->contextId);
        return array_pop($p);
    }

    /**
     * Throws an exception.
     * @param string $msg
     * @throws \Exception
     */
    private function error(string $msg)
    {
        throw new LightUserDataException($msg);
    }
}