<?php


namespace Ling\Light_UserData\Service;


use Ling\Bat\ConvertTool;
use Ling\Bat\FileSystemTool;
use Ling\Bat\UriTool;
use Ling\DirScanner\YorgDirScannerTool;
use Ling\Light\Events\LightEvent;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_PluginInstaller\PluginInstaller\PluginInstallerInterface;
use Ling\Light_PluginInstaller\PluginInstaller\PluginPostInstallerInterface;
use Ling\Light_PluginInstaller\Service\LightPluginInstallerService;
use Ling\Light_ReverseRouter\Service\LightReverseRouterService;
use Ling\Light_User\LightUserInterface;
use Ling\Light_User\LightWebsiteUser;
use Ling\Light_UserData\Api\Custom\CustomLightUserDataApiFactory;
use Ling\Light_UserData\Exception\LightUserDataException;
use Ling\Light_UserData\Exception\LightUserDataResourceNotFoundException;
use Ling\Light_UserData\FileManager\LightUserDataFileManagerHandler;
use Ling\Light_UserDatabase\Service\LightUserDatabaseService;
use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;

/**
 * The LightUserDataService class.
 *
 * For more details, refer to the @page(conception notes).
 */
class LightUserDataService implements PluginInstallerInterface, PluginPostInstallerInterface
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * This property holds the rootDir for this instance.
     * @var string
     */
    protected $rootDir;

    /**
     * This property holds the currentUser for this instance.
     * @var LightUserInterface|null
     */
    protected $currentUser;

    /**
     * This property holds the obfuscationAlgorithm for this instance.
     *
     *
     * @var string=default
     */
    protected $obfuscationAlgorithm;

    /**
     * This property holds the obfuscationSecret for this instance.
     * @var string=abc
     */
    protected $obfuscationSecret;

    /**
     * This property holds the factory for this instance.
     * @var CustomLightUserDataApiFactory
     */
    protected $factory;


    /**
     * This property holds the directoryKey for this instance.
     * @var string
     */
    private $directoryKey;


    /**
     * This property holds the originalDirectoryName for this instance.
     * @var string
     */
    private $originalDirectoryName;

    /**
     * This property holds the fileManagerProtocolHandler for this instance.
     * @var LightUserDataFileManagerHandler
     */
    private $fileManagerProtocolHandler;


    /**
     * Builds the LightUserDataService instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->rootDir = null;
        $this->currentUser = null;
        $this->factory = new CustomLightUserDataApiFactory();
        $this->directoryKey = "directory";
        $this->originalDirectoryName = "__original__";
        $this->fileManagerProtocolHandler = null;
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @implementation
     */
    public function install()
    {


        /**
         * @var $installer LightPluginInstallerService
         */
        $installer = $this->container->get("plugin_installer");


        /**
         * @var $db SimplePdoWrapperInterface
         */
        $db = $this->container->get("database");

        /**
         * Here we do the following:
         *
         * - create the following tables:
         *      - luda_resource
         *      - luda_resource_has_tag
         *      - luda_tag
         *
         * - create the "Light_UserData.Light_UserData_MSC_10" plugin option with value = 20M
         * - bind the "Light_UserData.Light_UserData_MSC_10" plugin option to the "default" user group (see [Light_UserDatabase](https://github.com/lingtalfi/Light_UserDatabase) plugin for more details)
         * - creates the Light_UserData.user permission in the lud_permission table
         *
         *
         *
         */
        $installer->debugLog("user_data: synchronizing tables.");

        $installer->synchronizeByCreateFile("Light_UserData", __DIR__ . "/../assets/fixtures/recreate-structure.sql", [
            "scope" => [
                "luda_resource",
                "luda_resource_has_tag",
                "luda_tag",
            ],
        ]);


        /**
         * However for the part below, we can put all the statements in a transaction.
         */
        /**
         * @var $exception \Exception
         */
        $exception = null;
        $installer->debugLog("user_data: adding tables content.");
        $res = $db->transaction(function () {

            /**
             * @var $userDb LightUserDatabaseService
             */
            $userDb = $this->container->get('user_database');
            $optionId = $userDb->getPluginOptionApi()->insertPluginOption([
                "category" => 'Light_UserData.MSC',
                "name" => 'default',
                "value" => '20M',
                "description" => "The maximum storage capacity for the \"default\" user. Example: 20M, 50M, etc.",
            ]);


            $userDb->getUserGroupHasPluginOptionApi()->insertUserGroupHasPluginOption([
                'user_group_id' => $userDb->getUserGroupApi()->getUserGroupIdByName('default'),
                'plugin_option_id' => $optionId,
            ]);


            $userDb->getPermissionApi()->insertPermission([
                "name" => "Light_UserData.user",
            ]);

            $userDb->getPermissionApi()->insertPermission([
                "name" => "Light_UserData.admin",
            ]);


        }, $exception);

        if (false === $res) {
            throw $exception;
        }

    }


    /**
     * @implementation
     */
    public function uninstall()
    {
        /**
         * @var $installer LightPluginInstallerService
         */
        $installer = $this->container->get("plugin_installer");
        if ($installer->hasTable("lud_plugin_option")) {


            /**
             * @var $db SimplePdoWrapperInterface
             */
            $db = $this->container->get('database');

            $db->executeStatement("DROP table if exists luda_resource_has_tag");
            $db->executeStatement("DROP table if exists luda_resource");
            $db->executeStatement("DROP table if exists luda_tag");


            /**
             * @var $exception \Exception
             */
            $exception = null;
            $res = $db->transaction(function () {

                /**
                 * @var $userDb LightUserDatabaseService
                 */
                $userDb = $this->container->get("user_database");
                //--------------------------------------------
                // REMOVING THE OPTIONS
                //--------------------------------------------
                $userDb->getPluginOptionApi()->deletePluginOptionsByPluginName('Light_UserData');


                //--------------------------------------------
                // REMOVING THE PERMISSIONS
                //--------------------------------------------
                $userDb->getPermissionApi()->deletePermissionByName("Light_UserData.user");
                $userDb->getPermissionApi()->deletePermissionByName("Light_UserData.admin");


            }, $exception);

            if (false === $res) {
                throw $exception;
            }

        }

    }

    /**
     * @implementation
     */
    public function isInstalled(): bool
    {
        $installer = $this->container->get("plugin_installer");
        if (
            true === $installer->hasTable("luda_tag") &&
            true === $installer->hasTable("luda_resource") &&
            true === $installer->hasTable("luda_resource_has_tag")
        ) {
            return true;
        }
        return false;
    }


    /**
     * @implementation
     */
    public function getDependencies(): array
    {
        return [
            "Light_UserDatabase",
        ];
    }

    /**
     * @implementation
     */
    public function registerPostInstallerCallables(): array
    {
        return [
            [
                0,
                [$this, 'updateUserGroupHasPluginOptionTable']
            ],
        ];
    }








    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Listener for the @page(Light_Database.on_lud_user_group_create event).
     *
     * @param LightEvent $event
     * @throws \Exception
     */
    public function onUserGroupCreate(LightEvent $event)
    {

        /**
         * @var $installer LightPluginInstallerService
         */
        $installer = $this->container->get("plugin_installer");
        if (false === $installer->pluginsAreBeingInstalled()) {

            $groupId = $event->getVar("return");
            /**
             * @var $userDb LightUserDatabaseService
             */
            $userDb = $this->container->get("user_database");


            $pluginOptionId = $userDb->getPluginOptionApi()->getPluginOptionsColumn('id', [
                "category" => "Light_UserData.MSC",
                "name" => "default",
            ], []);


            $userDb->getUserGroupHasPluginOptionApi()->insertUserGroupHasPluginOption([
                'user_group_id' => $groupId,
                'plugin_option_id' => $pluginOptionId,
            ]);
        }
    }


    /**
     * Returns the Light_UserData factory.
     *
     * @return CustomLightUserDataApiFactory
     */
    public function getFactory(): CustomLightUserDataApiFactory
    {
        return $this->factory;
    }



    //--------------------------------------------
    //
    //--------------------------------------------


    /**
     * Returns the array of the files owned by the current user.
     * If the directory is specified, only the list of the files found in that directory will be returned.
     *
     * Relative paths (from the user's root directory) are returned.
     *
     *
     * @param string|null $directory
     * @return array
     * @throws \Exception
     */
    public function list(string $directory = null): array
    {
        $this->checkPermission();

        $dir = $this->getUserDir();
        if (null !== $directory) {
            $dir .= "/" . $directory;
        }
        if (is_dir($dir)) {
            return YorgDirScannerTool::getFilesWithoutExtension($dir, "private", false, true, true);
        }
        return [];
    }


    /**
     *
     *
     * Saves the given meta array, and returns an array of information related to the saved file.
     *
     *
     * If the maximum user storage capacity is reached, the resource is not uploaded and an exception is thrown.
     *
     *
     *
     * The save method has two modes:
     *
     * - insert mode
     * - update mode
     *
     * The insert mode is triggered when no "resourceId" is provided, or when the provided "resourceId" doesn't match
     * any entry in the database.
     *
     * If the resourceId is provided and match an existing entry in the database, then the update mode is executed.
     *
     *
     * The meta array contains the following properties, all optional, with their default values:
     *
     * - resourceId: string=null, the resource identifier
     * - dir: undefined
     * - directory: undefined (it's an alias of dir, use one or the other, dir has precedence)
     * - filename: undefined
     * - is_private: 0|1
     * - date_creation: (the current datetime)
     * - date_last_update: (the current datetime)
     * - tags: []
     *
     * - file: string=null, the binary data of the file, or alternately you can specify the "file_path" property instead.
     * - file_path: string=null, the path to the file, or alternately you can specify the "file" property instead.
     *      Note: this method will potentially move the **file_path** to another location, which means that after
     *      calling this method, file_exists (file_path) will return false.
     *
     * - original_file_path: string=null, the path to the original file if any. If passed, this method will store the original file in the
     *      original directory.
     *
     *
     * The file property (or file_path) is mandatory in insert mode.
     *
     *
     * Note: we've added the file_path and original_file_path properties to be able to move files rather than copying them (much faster if
     * the files are on the same drive), for when committing the virtual file server.
     * While the file property is still useful to deal with js gui interaction.
     *
     *
     * Both modes, when successful, will result in an alteration of the database, and possibly the filesystem (if a file was provided).
     *
     *
     *
     *
     * The available options are:
     *
     * - keep_original: bool=false. Whether to keep a copy of the given file.
     *      See the @page(the original file section in the conception notes).
     * - check_msc: bool=true. Whether to check the maximum storage capacity.
     * - treat_file: bool=true. Whether to treat the file on the filesystem.
     *      If false, the file won't be copied to its expected destination, and the original
     *      file won't be created. This option can be used by virtual file server which take
     *      care of that part.
     *
     *
     *
     * The returned array
     * ----------
     *
     * - resource_identifier: string, the resource identifier
     * - lud_user_id: string, the id of the user owning the file
     * - dir: string, the directory associated with the file
     * - filename: string, the filename associated with the file
     * - is_private: 0|1, whether the file is private or public
     * - date_creation: datetime, the datetime when the file was saved for the first time
     * - date_last_update: datetime, the datetime when the file was last saved
     * - tags: array, the tag associated with the file
     *
     *
     *
     * @param array $meta
     * @param array $options
     * @return array
     * @throws \Exception
     */
    public function save(array $meta = [], array $options = []): array
    {
        $ret = [];
//        az($path, $options);

        $this->checkPermission();
        $user = $this->getValidWebsiteUser();
        $userDir = $this->getUserDir(); // assuming the user calling the save method owns the file (for now...)
        $userId = $user->getId();
        $date = date("Y-m-d H:i:s");


        //
        $onFileNotExistThrowEx = true;
        $keepOriginal = $options['keep_original'] ?? false;
        $checkMsc = $options['check_msc'] ?? true;
        $treatFile = $options['treat_file'] ?? true;
        if (false === $treatFile) {
            $onFileNotExistThrowEx = false;
        }


        //
        $is_private = (int)(bool)($meta['is_private'] ?? false);
        $tags = $meta['tags'] ?? [];


        $resourceId = $meta['resourceId'] ?? null;
        $resourceFound = true;
        if (null !== $resourceId) {
            try {
                $resource = $this->getResourceInfoByResourceIdentifier($resourceId, [
                    "onFileNotExistThrowEx" => $onFileNotExistThrowEx,
                ]);
            } catch (LightUserDataResourceNotFoundException $e) {
                $resourceFound = false;
            }
        }


        $isAddOperation = (
            null === $resourceId ||
            (null !== $resourceId && false === $resourceFound)
        );


        //--------------------------------------------
        // ADD
        //--------------------------------------------
        if (true === $isAddOperation) {


            if (
                false === array_key_exists("file", $meta) &&
                false === array_key_exists("file_path", $meta)
            ) {
                $this->error("The \"add\" operation requires a \"file\" or \"file_path\" property which was not given.");
            }


            if (true === $checkMsc) {

                $fileSize = 0;
                if (array_key_exists("file", $meta)) {
                    $fileSize = strlen($meta['file']);
                } else {
                    $fileSize = filesize($meta['file_path']);
                    if (false === $fileSize) {
                        $this->error("Couldn't get the file size from the file_path: \"" . $meta['file_path'] . "\"");
                    }
                }
                $this->checkUserMaximumStorageLimit($fileSize, $user);
            }


            $resourceIdentifier = $resourceId ?? $this->getNewResourceIdentifier();

            $row = [
                "lud_user_id" => $userId,
                "resource_identifier" => $resourceIdentifier,
                //
                "dir" => $meta["dir"] ?? $meta["directory"] ?? 'undefined',
                "filename" => $meta["filename"] ?? 'undefined',
                "is_private" => $is_private,
                "date_creation" => $meta["date_creation"] ?? $date,
                "date_last_update" => $meta["date_last_update"] ?? $date,
            ];
        }
        //--------------------------------------------
        // UPDATE
        //--------------------------------------------
        else {

            if (false === $resourceFound) {
                $this->error("Resource not found in the database with resourceId=\"$resourceId\". Update cancelled.");
            }

            $oldFile = $resource['abs_path'];


            // check maximum storage capacity
            if (true === $checkMsc) {

                if (
                    array_key_exists("file", $meta) ||
                    array_key_exists("file_path", $meta)
                ) {


                    $fileSize = 0;
                    if (array_key_exists("file", $meta)) {
                        $fileSize = strlen($meta['file']);
                    } else {
                        if (null !== $meta['file_path']) {
                            $fileSize = filesize($meta['file_path']);
                            if (false === $fileSize) {
                                $this->error("Couldn't get the file size from the file_path: \"" . $meta['file_path'] . "\"");
                            }
                        } else {
                            /**
                             * The file hasn't changed, we do nothing.
                             */
                        }
                    }
                    if (0 !== $fileSize) {
                        $oldFileSize = 0;
                        if (file_exists($oldFile)) {
                            $oldFileSize = filesize($oldFile);
                        }
                        if ($fileSize > $oldFileSize) {
                            $nbBytesToAdd = $fileSize - $oldFileSize;
                            $this->checkUserMaximumStorageLimit($nbBytesToAdd, $user);
                        }
                    }
                }
            }


            $resourceIdentifier = $resource['resource_identifier'];

            // prepare resource to be updated in db
            $row = $resource;
            unset($row["abs_path"]);
            unset($row["rel_path"]);
            unset($row["user_identifier"]);
            unset($row["original_url"]);
            $row['is_private'] = $is_private;
            $row['date_last_update'] = $date;
            $row['filename'] = $meta['filename'];
            $row['dir'] = $meta['dir'] ?? $meta['directory'] ?? $resource['dir'];
        }


        if (array_key_exists('dir', $row)) {
            $this->checkDirname($row['dir']);
        }

        $relPath = $this->getBaseRelativePathByResourceIdentifier($resourceIdentifier);
        $filePath = $userDir . "/files/$relPath";


        /**
         * @var $db SimplePdoWrapperInterface
         */
        $db = $this->container->get("database");
        /**
         * @var $exception \Exception
         */
        $exception = null;
        $res = $db->transaction(function () use ($row, $date, $tags, $isAddOperation) {


            if (true === $isAddOperation) {
                $resourceId = $this->factory->getResourceApi()->insertResource($row);
            } else {
                $this->factory->getResourceApi()->updateResourceById($row['id'], $row);
                $resourceId = $row['id'];
            }


            //--------------------------------------------
            // TAGS
            //--------------------------------------------
            if ($tags) {
                if (false === $isAddOperation) {
                    $this->factory->getResourceHasTagApi()->deleteResourceHasTagByResourceId($resourceId);
//                    $this->factory->getTagApi()->removeUnusedTags(); // shall we?
                }

                foreach ($tags as $tag) {
                    $tagId = $this->factory->getTagApi()->insertTag([
                        "name" => $tag,
                    ]);

                    $this->factory->getResourceHasTagApi()->insertResourceHasTag([
                        "resource_id" => $resourceId,
                        "tag_id" => $tagId,
                    ]);
                }
            }

        }, $exception);


        if (false === $res) {
            throw $exception;
        }


        if (true === $treatFile) {


            if (
                array_key_exists("file", $meta) ||
                array_key_exists("file_path", $meta)
            ) {


                $fileHasChanged = true;
                if (
                    (true === array_key_exists("file_path", $meta) && null === $meta['file_path']) ||
                    (true === array_key_exists("file", $meta) && null === $meta['file'])
                ) {
                    $fileHasChanged = false;
                }


                if (true === $fileHasChanged) {

                    if (false === $isAddOperation) {
                        FileSystemTool::remove($oldFile);
                    }
                    if (array_key_exists("file_path", $meta)) {
                        if (file_exists($meta['file_path'])) {
                            FileSystemTool::move($meta['file_path'], $filePath);
                        } else {
                            $this->error("File does not exist: " . $meta['file_path']);
                        }
                    } else {
                        FileSystemTool::mkfile($filePath, $meta['file']);
                    }
                }
            }


            if (true === $keepOriginal) {
                if (false !== strpos($resourceIdentifier, "-")) {
                    $this->error("An original file cannot originate from a related file.");
                }
                $originalPath = $this->getOriginalPathFromAbsolutePath($filePath);
                if (array_key_exists("file", $meta)) {
                    FileSystemTool::mkfile($originalPath, $meta['file']);
                } elseif (array_key_exists("file_path", $meta)) {
                    FileSystemTool::mkfile($originalPath, file_get_contents($filePath));
                } else {
                    $this->error("Parameter file or file_path not defined: will not keep original.");
                }
            }


            if (array_key_exists("original_file_path", $meta)) {
                if (false !== strpos($resourceIdentifier, "-")) {
                    $this->error("An original file cannot originate from a related file.");
                }
                $originalPath = $userDir . "/original/$resourceIdentifier";;
                FileSystemTool::move($meta['original_file_path'], $originalPath);
            }
        }

        //--------------------------------------------
        // RETURNING THE ARRAY
        //--------------------------------------------
        $ret = $row;
        $ret['resource_identifier'] = $resourceIdentifier;
        $ret['tags'] = $tags;
        return $ret;
    }


    /**
     * Removes the resource which url is given from the database and the filesystem.
     * Throws an exception in case of a problem.
     *
     * It also removes the following files if found:
     * - original file (see the @page(original file) section for more details)
     * - related files (see the @page(related-files.md) document for more info)
     *
     *
     *
     * @param string $url
     * @throws \Exception
     */
    public function removeResourceByUrl(string $url)
    {
        $this->checkPermission();
        $info = $this->getResourceInfoByResourceUrl($url);
        $id = $info['id'];

        $path = $info['abs_path'];
        $resourceId = $info['resource_identifier'];
        $userDir = $this->getUserDir();
        $relatedDir = $userDir . "/files/$resourceId-";

        $resourceApi = $this->getFactory()->getResourceApi();
        $relatedIds = $resourceApi->getRelatedIdsByResourceIdentifier($resourceId);
        $resourceApi->deleteResourceByIds(array_merge([$id], $relatedIds));


        unlink($path);
        if (false !== ($originalPath = $this->getOriginalPathFromAbsolutePath($path))) {
            if (file_exists($originalPath)) {
                unlink($originalPath);
            }
        }
        FileSystemTool::remove($relatedDir);
    }


    /**
     * Removes all the files related to the given resource id.
     *
     * This includes:
     *
     * - the regular file
     * - the original file (see the original file section of the @page(Light_UserData conception notes) for more info.
     * - the related files (see the @page(related-files.md) document for more info)
     *
     *
     * @param string $resourceId
     * @param LightWebsiteUser|null $user
     */
    public function removeAllFilesByResourceIdentifier(string $resourceId, LightWebsiteUser $user = null)
    {

        if (null === $user) {
            $user = $this->getValidWebsiteUser();
        }
        $userDir = $this->rootDir . "/users/" . $user->getIdentifier();

        // remove regular file
        $f = $userDir . "/files/$resourceId";
        FileSystemTool::remove($f);


        // related files
        $d = $userDir . "/files/$resourceId-";
        FileSystemTool::remove($d);


        // original file
        $f = $userDir . "/original/$resourceId";
        FileSystemTool::remove($f);
    }


    /**
     * Removes the resources on the filesystem that aren't referenced in the database,
     * for the user which identifier is given.
     *
     *
     * @param LightWebsiteUser $user
     * @return void
     */
    public function removeUnlinkedResourcesByUser(LightWebsiteUser $user): void
    {
        $userDir = $this->rootDir . "/users/" . $user->getIdentifier();
        $userResourceIdentifiers = $this->factory->getResourceApi()->getResourcesColumn("resource_identifier", [
            "lud_user_id" => $user->getId(),
        ]);
        $userFiles = YorgDirScannerTool::getFiles($userDir, true, true);
        $hasDelete = false;


        foreach ($userFiles as $f) {
            $basename = basename($f);
            $dir = basename(dirname($f));
            $identifier = $basename;
            if (
                'f' === substr($dir, 0, 1) &&
                '-' === substr($dir, -1) &&
                preg_match('!^[0-9]+$!', $basename)
            ) {
                $identifier = $dir . $basename;

            }

            if (false === in_array($identifier, $userResourceIdentifiers)) {
                unlink($userDir . "/" . $f);
                $hasDelete = true;
            }
        }

        if (true === $hasDelete) {
            FileSystemTool::cleanDir($userDir);
        }
    }


    /**
     * Returns the url to access the resource identified by the given $resourceIdentifier.
     *
     *
     * The options are:
     *
     * - original: bool=false, whether to query the original file instead
     *
     *
     * @param string $resourceIdentifier
     * @param array $options = []
     * @return string
     * @throws \Exception
     */
    public function getResourceUrlByResourceIdentifier(string $resourceIdentifier, array $options = []): string
    {

        $getOriginalUrl = $options['original'] ?? false;


        /**
         * @var $rr LightReverseRouterService
         */
        $rr = $this->container->get('reverse_router');
        $params = [
            "id" => $resourceIdentifier,
        ];
        if (true === $getOriginalUrl) {
            $params['o'] = "1";
        }


        /**
         * Useful to avoid browser cache related problems
         */
        $params['t'] = time();


        return $rr->getUrl("luda_route-virtual_server", $params);

    }


    /**
     * Returns an info array matching the file which resourceIdentifier is given.
     *
     * Throws an exception if the file is private and the user calling the file is not the owner.
     *
     * The info array contains the following:
     *
     * - abs_path: string, absolute path to the file
     * - rel_path: string, relative path to the file (from the user directory)
     * - is_private: bool, whether the file is private
     * - original_url: string|null. The url to the original file (which might be saved, or not, depending on the configuration).
     *      If no original url was saved, then false is returned
     * - date_creation: string, the mysql datetime when the file was first registered in the system. Not available in the virtual machine (at least for now).
     * - date_last_update: string, the mysql datetime when the file was last updated in the system. Not available in the virtual machine (at least for now).
     *
     *
     * Also, if the addExtraInfo option (see below) is set to true, the following extra information is returned:
     * - tags: array, the tag names bound to the resource
     *
     *
     *
     * Personal note: I didnt' include the date_creation and date_last_update info from the virtual machine because I was lazy and I didn't think that was essential:
     * my vision is to provide those information in the file manager gui, which does not use the vm. We will see how this evolves in the future, and if the vm
     * does need this info.
     *
     *
     * The available options are:
     * - addExtraInfo: bool=false. If true, adds meta information to the returned array (see notes above).
     * - original: bool=false. If true, the file paths (absolute and relative) reference the original image rather than the processed one.
     *      Note: the original image is kept only depending on the plugin configuration.
     * - vm: bool=false. Whether to get the information from the virtual machine.
     * - onFileNotExistThrowEx: bool=true. If the file does not exist in the file system, by default an exception is thrown.
     *      To prevent the throwing of the exception, we can set this flag to false. The abs_path property will then be set to false.
     *
     *
     *
     *
     *
     * @param string $resourceIdentifier
     * The generic resource identifier. See the @page(related-files.md) document for more info.
     * @param array $options
     * @return array
     * @throws LightUserDataResourceNotFoundException
     * - When the resource is not found
     * @throws LightUserDataException
     * - When the user is not allowed to access the data
     * - When the file is missing but the entry exists in the database
     */
    public function getResourceInfoByResourceIdentifier(string $resourceIdentifier, array $options = []): array
    {

        $ret = null;

        $addExtraInfo = $options['addExtraInfo'] ?? false;
        $useOriginal = $options['original'] ?? false;
        $useVirtualMachine = $options['vm'] ?? null;
        $onFileNotExistThrowEx = $options['onFileNotExistThrowEx'] ?? true;

        if (true === $useVirtualMachine) {
            $handler = new LightUserDataFileManagerHandler();
            $handler->setService($this);
            $ret = $handler->getResourceInfoFromVirtualMachine($resourceIdentifier, $options);

        } else {


            $row = $this->factory->getResourceApi()->getResourceInfoByResourceIdentifier($resourceIdentifier);


            if (null !== $row) {


                if (true === $addExtraInfo) {
                    $row['tags'] = $this->factory->getTagApi()->getTagNamesByResourceResourceIdentifier($resourceIdentifier);
                }


                $user = null;
                if (1 === (int)$row['is_private']) {
                    $user = $this->getValidWebsiteUser();
                    if ($user->getId() !== (int)$row['lud_user_id']) {
                        throw new LightUserDataException("Access denied: this resource is private and you're not the owner.");
                    }
                }


                // using the flat file system and the related files convention (see the related files document for more info).
                $baseResourceId = $resourceIdentifier;
                $relPath = $this->getBaseRelativePathByResourceIdentifier($resourceIdentifier);

                $prefix = (true === $useOriginal) ? 'original' : 'files';
                $relPath = $prefix . "/" . $relPath;
                $absPath = $this->rootDir . "/users/" . $row['user_identifier'] . "/" . $relPath;


                $originalUrl = null;
                $originalFile = $this->rootDir . "/users/" . $row['user_identifier'] . "/original/$baseResourceId";
                if (file_exists($originalFile)) {
                    $originalUrl = $this->getResourceUrlByResourceIdentifier($row['resource_identifier'], [
                        'original' => true,
                    ]);
                }


                if (false === file_exists($absPath)) {
                    if (true === $onFileNotExistThrowEx) {
                        throw new LightUserDataException("File missing: resource found (resourceId=\"$resourceIdentifier\"), but the file was missing on the hard drive (path=\"$absPath\").");
                    }
                    $absPath = false;
                }


                $row['abs_path'] = $absPath;
                $row['rel_path'] = $relPath;
                $row['original_url'] = $originalUrl;


                $ret = $row;


            } else {
                throw new LightUserDataResourceNotFoundException("Row not found with resource identifier \"$resourceIdentifier\".");
            }
        }


        return $ret;
    }


    /**
     * Returns the resource info array its given url.
     * The resource info array structure is defined in the comments of the **getResourceInfoByResourceIdentifier** method
     * of this class.
     *
     *
     * @param string $url
     * @return array
     * @throws \Exception
     */
    public function getResourceInfoByResourceUrl(string $url): array
    {
        $identifier = $this->getIdentifierByUrl($url);
        return $this->getResourceInfoByResourceIdentifier($identifier);
    }


    /**
     * Returns the content of the file of the current user which relative path is given.
     * If the file doesn't exist, the method:
     *
     * - returns false if the throwEx flag is set to false
     * - throws an exception if the throwEx flag is set to true
     *
     *
     *
     * @param string $path
     * @param bool=true $throwEx
     * @return string|false
     * @throws \Exception
     */
    public function getContent(string $path, bool $throwEx = true)
    {
        $file = $this->getUserDir() . "/$path";
        if (file_exists($file)) {
            return file_get_contents($file);
        }
        if (true === $throwEx) {
            throw new LightUserDataException("File not found with path $path.");
        }
        return false;
    }


    /**
     * Removes the 2svp extension from the given resource, and returns the new resource name.
     *
     *
     * The resource is a relative path from the user directory to the desired file.
     *
     * Note: the user is identified by the given userOrIdentifier.
     *
     *
     *
     * In more details, this method:
     * - updates the resource in the luda_resource table
     * - renames the file on the file system
     *
     *
     * @param string $resource
     * @param LightUserInterface|string|null $userOrIdentifier
     * @return string
     * @throws \Exception
     */
    public function update2SvpResource(string $resource, $userOrIdentifier = null): string
    {
        $this->checkPermission();
        if (false !== strpos($resource, '.2svp')) {

            $userIdentifier = $this->getUserIdentifierByUserOrIdentifier($userOrIdentifier);
            $newResource = str_replace('.2svp', '', $resource);
            $this->rename($resource, $newResource, $userIdentifier);
            return $newResource;

        } else {
            throw new LightUserDataException("The given resource doesn't contain the \".2svp\" extension.");
        }
    }


    /**
     * Renames the file identified by oldRealPath to a new file identified by newRealPath.
     * If the file already exists, it will be replaced.
     *
     * This method will:
     *
     * - update the luda_resource.real_path column in the database.
     *          Or, if another entry already exists with this real_path, we remove the old entry (note: real_path is a unique index,
     *          so we can't have the same value more than once).
     *
     * - rename the file on the file system
     *
     * If the user is not passed, the @page(current user) will be assumed.
     *
     *
     * @param string $oldRealPath
     * @param string $newRealPath
     * @param LightUserInterface|string|null $userOrIdentifier
     * @throws \Exception
     */
//    public function rename(string $oldRealPath, string $newRealPath, $userOrIdentifier = null)
//    {
//
//        $userIdentifier = $this->getUserIdentifierByUserOrIdentifier($userOrIdentifier);
//
//        $realResource = $userIdentifier . "/" . $oldRealPath;
//
//        // updating the database
//        $row = $this->factory->getResourceApi()->getResourceByRealPath($realResource, null, true);
//        $resourceId = $row['id'];
//
//        $newResource = $userIdentifier . "/" . $newRealPath;
//        $row['real_path'] = $newResource;
//
//        // is there already an entry with the new fileName? if so update that entry, otherwise update the old entry.
//        $alreadyExistingRow = $this->factory->getResourceApi()->getResourceByRealPath($newResource);
//        if (null !== $alreadyExistingRow) {
//            // should be the case when you updating a row, using the symbolic file name system with 2svp
//            $this->factory->getResourceApi()->deleteResourceById($resourceId);
//        } else {
//            // should be the case when you insert a row for the first time, using the symbolic file name system with 2svp
//            $this->factory->getResourceApi()->updateResourceById($resourceId, $row);
//        }
//
//
//        // updating the filesystem
//        $oldFile = $this->rootDir . "/" . $realResource;
//        $newFile = $this->rootDir . "/" . $newResource;
//        FileSystemTool::move($oldFile, $newFile);
//
//    }


    /**
     * Returns the maximum number of bytes that the given user is allowed to use.
     * Throws an exception if the user is not valid.
     *
     *
     * @param LightWebsiteUser $user
     * @return int
     * @throws \Exception
     */
    public function getMaximumCapacityByUser(LightWebsiteUser $user): int
    {
        if (false === $user->isValid()) {
            throw new LightUserDataException("Invalid user given.");
        }

        $userId = $user->getId();

        /**
         * @var $udb LightUserDatabaseService
         */
        $udb = $this->container->get("user_database");
        $option = $udb->getPluginOptionApi()->getOptionByCategoryAndUserId("Light_UserData.MSC", $userId);
        return ConvertTool::convertHumanSizeToBytes($option['value']);
    }


    /**
     * Returns the current storage space used by the given user, in bytes.
     *
     * @param LightWebsiteUser $user
     * @return int
     * @throws \Exception
     */
    public function getCurrentCapacityByUser(LightWebsiteUser $user): int
    {
        $dir = $this->getUserDir($user);
        if (is_dir($dir)) {
            return FileSystemTool::getDirectorySize($dir);
        }
        return 0;
    }


    /**
     * Handles the given @page(file manager protocol) action and returns the expected response.
     *
     *
     * @param string $action
     * @param HttpRequestInterface $request
     */
    public function handleFileManagerProtocol(string $action, HttpRequestInterface $request)
    {
        $handler = $this->getFileManagerProtocolHandler();
        return $handler->handle($action, $request);
    }


    /**
     * Returns a prepared instance of the file manager handler.
     * @return LightUserDataFileManagerHandler
     */
    public function getFileManagerProtocolHandler(): LightUserDataFileManagerHandler
    {
        if (null === $this->fileManagerProtocolHandler) {
            $handler = new LightUserDataFileManagerHandler();
            $handler->setService($this);
            $this->fileManagerProtocolHandler = $handler;
        }
        return $this->fileManagerProtocolHandler;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     * @throws \Exception
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;

        /**
         * @var $database LightDatabaseService
         */
        $database = $container->get("database");
        $this->factory->setPdoWrapper($database);
        $this->factory->setContainer($container);
    }

    /**
     * Returns the container instance attached to the service.
     *
     * @return LightServiceContainerInterface
     */
    public function getContainer(): LightServiceContainerInterface
    {
        return $this->container;
    }

    /**
     * Sets the obfuscation parameters to use.
     *
     * @param string $algoName
     * @param string $secret
     */
    public function setObfuscationParams(string $algoName, string $secret)
    {
        $this->obfuscationAlgorithm = $algoName;
        $this->obfuscationSecret = $secret;
    }

    /**
     * Sets the rootDir.
     *
     * @param string $rootDir
     */
    public function setRootDir(string $rootDir)
    {
        $this->rootDir = $rootDir;
    }

    /**
     * Returns the rootDir of this instance.
     *
     * @return string
     */
    public function getRootDir(): string
    {
        return $this->rootDir;
    }


    /**
     * Sets a temporary user.
     *
     * @param LightUserInterface $user
     */
    public function setTemporaryUser(LightUserInterface $user)
    {
        $this->currentUser = $user;
    }

    /**
     * Unsets the temporary user if any.
     */
    public function unsetTemporaryUser()
    {
        $this->currentUser = null;
    }


    /**
     * Returns the directory path of the current user.
     *
     * @param LightWebsiteUser|null $user
     * @return string
     * @throws \Exception
     */
    public function getUserDir(LightWebsiteUser $user = null): string
    {
        if (null === $user) {
            $user = $this->getValidWebsiteUser();
        }
        $identifier = $user->getIdentifier();
        return $this->rootDir . "/users/" . $identifier;
    }


    /**
     * Returns the @page(current user), which is a LightWebsiteUser.
     *
     * @return LightWebsiteUser
     * @throws \Exception
     */
    public function getValidWebsiteUser(): LightWebsiteUser
    {
        $user = $this->currentUser;
        if (null === $user) {
            /**
             * @var $user LightWebsiteUser
             */
            $user = $this->container->get("user_manager")->getUser();
            if (false === $user->isValid()) {
                throw new LightUserDataException("User not connected/valid.");
            }
            if (false === $user instanceof LightWebsiteUser) {
                $class = get_class($user);
                throw new LightUserDataException("User must be an instance of LightWebsiteUser, $class given.");
            }
            $this->currentUser = $user;
        }
        return $user;
    }

    /**
     * Returns the identifier from a given url.
     * If the identifier isn't recognized, then it either throws an exception or returns false,
     * depending on the value of the throwEx flag.
     *
     *
     *
     * @param string $url
     * @param bool $throwEx
     * @return string|false.
     * @throws \Exception
     */
    public function getIdentifierByUrl(string $url, bool $throwEx = true)
    {
        $params = UriTool::getParams($url);
        if (array_key_exists("id", $params)) {
            return $params['id'];
        }
        if (true === $throwEx) {
            $this->error("No resource id found in this url: \"$url\".");
        }
        return false;
    }


    /**
     * Returns the resource identifier using the given resource id.
     *
     * @return string
     */
    public function getNewResourceIdentifier(): string
    {
        return "f" . microtime(true) . "." . rand(0, 1000);
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the current user identifier, or throws an exception if the user is not valid.
     *
     * @return string
     * @throws \Exception
     */
    protected function getUserIdentifier(): string
    {
        return $this->getValidWebsiteUser()->getIdentifier();
    }


    /**
     * Returns the resource item from the database, identified by the given path (relative from the user directory)
     * and the given user (if null the connected user will be used by default),
     * or returns false if the resource was not found.
     *
     *
     *
     * Important: no validation is done on the path (i.e. we trust the input).
     *
     * @param string $path
     * @param LightWebsiteUser|null $user
     * @return array|false
     * @throws \Exception
     *
     */
    protected function getResourceByPath(string $path, LightWebsiteUser $user = null)
    {
        if (null === $user) {
            $user = $this->getValidWebsiteUser();
        }
        return $this->factory->getResourceApi()->getResource([
            "lud_user_id" => $user->getId(),
            "dir" => dirname($path),
            "filename" => basename($path),
        ], [], false);
    }


    /**
     * Checks that the maximum storage capacity limits of the given user will
     * be still honored after adding the given number of bytes.
     *
     * If not (if the max storage capacity limit would be violated), then an exception is thrown.
     *
     *
     * @param int $nbBytesToAdd
     * @param LightWebsiteUser|null $user
     * @throws \Exception
     */
    protected function checkUserMaximumStorageLimit(int $nbBytesToAdd, LightWebsiteUser $user = null)
    {
        if (null === $user) {
            $user = $this->getValidWebsiteUser();
        }
        $maxLimit = $this->getMaximumCapacityByUser($user);
        $currentSpaceUsed = $this->getCurrentCapacityByUser($user);

        if (($nbBytesToAdd + $currentSpaceUsed) > $maxLimit) {
            $sMaxLimit = ConvertTool::convertBytes($maxLimit, "h");
            $sCurrentSpaceUsed = ConvertTool::convertBytes($currentSpaceUsed, "h");
            throw new LightUserDataException("Maximum storage capacity violation. The current user maximum allowed space is $sMaxLimit, and the current space used is $sCurrentSpaceUsed.");
        }
    }


    /**
     * Checks that the current user has the given permission.
     * If the given permission is null (by default), it defaults to: "Light_UserData.user".
     * See the @page(Light_UserData permissions document) for more details.
     *
     *
     * @param string|null $permission
     * @throws \Exception
     */
    protected function checkPermission(string $permission = null)
    {
        if (null === $permission) {
            $permission = "Light_UserData.user";
        }
        $user = $this->getValidWebsiteUser();
        if (false === $user->hasRight($permission)) {
            throw new LightUserDataException("Permission denied: missing the Light_UserData.user permission.");
        }
    }


    /**
     * Makes sure every entry in the lud_user_group table is bound to our plugin's option(s).
     */
    protected function updateUserGroupHasPluginOptionTable()
    {
        /**
         * @var $userDb LightUserDatabaseService
         */
        $lud = $this->container->get("user_database");
        $api = $lud->getFactory();
        $ids = $api->getUserGroupApi()->getAllIds();
        $pluginOptionId = $lud->getPluginOptionApi()->getPluginOptionsColumn('id', [
            "category" => "Light_UserData.MSC",
            "name" => "default",
        ]);

        foreach ($ids as $id) {
            $api->getUserGroupHasPluginOptionApi()->insertUserGroupHasPluginOption([
                'user_group_id' => $id,
                'plugin_option_id' => $pluginOptionId,
            ]);
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the user identifier from the given userOrIdentifier.
     *
     *
     * @param LightUserInterface|string|null $userOrIdentifier
     * @return string
     * @throws \Exception
     */
    private function getUserIdentifierByUserOrIdentifier($userOrIdentifier): string
    {
        if (null === $userOrIdentifier) {
            $userIdentifier = $this->getUserIdentifier();
        } elseif (is_string($userOrIdentifier)) {
            $userIdentifier = $userOrIdentifier;
        } elseif ($userOrIdentifier instanceof LightUserInterface) {
            $userIdentifier = $userOrIdentifier->getIdentifier();
        } else {
            $type = gettype($userOrIdentifier);
            throw new LightUserDataException("Unable to guess userIdentifier from the given userOrIdentifier (type=$type).");
        }
        return $userIdentifier;
    }


    /**
     * Returns the path of the original copy of a given file
     *
     * @param string $path
     * @return string
     */
    private function getOriginalPathFromAbsolutePath(string $path): string
    {
        if (0 !== strpos($path, $this->rootDir)) {
            $this->error("Invalid path provided: it doesn't seem to be a child of the root dir: \"$path\".");
        }
        $p = explode($this->rootDir, $path, 2);
        $rel = array_pop($p);
        /**
         * Note: because of the line below,
         * the user shouldn't be able to create a relative path containing the /files/ or /original/ sub-paths.
         */
        $rel = str_replace("/files/", "/original/", $rel);
        return $this->rootDir . "/" . $rel;
    }


    /**
     * Returns the base relative path from the given resourceId.
     * This is like the relative bath, but without the files/original parent directory included.
     *
     *
     * @param string $resourceId
     * @return string
     */
    private function getBaseRelativePathByResourceIdentifier(string $resourceId): string
    {
        $isRelated = (false !== strpos($resourceId, '-'));
        if (false === $isRelated) {
            $relPath = $resourceId;
        } else {
            list($baseResourceId, $relatedFileIndex) = explode('-', $resourceId, 2);
            $relPath = $baseResourceId . "-/$relatedFileIndex";
        }
        return $relPath;
    }


    /**
     * Returns whether the given dirname is valid.
     * It's valid if it doesnt' contain the following subdirs:
     * - original
     * - files
     *
     *
     * @param string $dirName
     */
    private function checkDirname(string $dirName)
    {
        $forbidden = [
            "original",
            "files",
        ];
        $isValid = true;
        foreach ($forbidden as $test) {
            if ($test === $dirName) {
                $isValid = false;
            }

            if (preg_match('!^' . $test . '/!', $dirName)) {
                $isValid = false;
            }

            if (preg_match('!/' . $test . '(/|$)!', $dirName)) {
                $isValid = false;
            }
        }

        if (false === $isValid) {
            $this->error("The dirname must not contain the following subdirectories: original, files.");
        }
    }


    /**
     * Throws an exception.
     *
     * @param string $msg
     * @throws \Exception
     */
    private function error(string $msg)
    {
        throw new LightUserDataException($msg);
    }
}