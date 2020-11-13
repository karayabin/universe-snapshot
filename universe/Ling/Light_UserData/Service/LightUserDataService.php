<?php


namespace Ling\Light_UserData\Service;


use Ling\Bat\ConvertTool;
use Ling\Bat\DateTool;
use Ling\Bat\FileSystemTool;
use Ling\Bat\UriTool;
use Ling\ExceptionCodes\ExceptionCode;
use Ling\Light\Events\LightEvent;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_PluginInstaller\PluginInstaller\PluginInstallerInterface;
use Ling\Light_PluginInstaller\PluginInstaller\PluginPostInstallerInterface;
use Ling\Light_PluginInstaller\Service\LightPluginInstallerService;
use Ling\Light_ReverseRouter\Service\LightReverseRouterService;
use Ling\Light_UploadGems\GemHelper\GemHelperTool;
use Ling\Light_User\LightUserInterface;
use Ling\Light_User\LightWebsiteUser;
use Ling\Light_UserData\Api\Custom\CustomLightUserDataApiFactory;
use Ling\Light_UserData\Exception\LightUserDataException;
use Ling\Light_UserData\FileManager\LightUserDataDirectFileManagerHandler;
use Ling\Light_UserData\FileManager\LightUserDataFileManagerHandlerInterface;
use Ling\Light_UserData\Helper\LightUserDataHelper;
use Ling\Light_UserDatabase\Service\LightUserDatabaseService;
use Ling\Light_UserManager\Service\LightUserManagerService;
use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;
use Ling\SimplePdoWrapper\Util\SimplePdoGenericHelper;
use Ling\SimplePdoWrapper\Util\Where;

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
     * This property holds the factory for this instance.
     * @var CustomLightUserDataApiFactory
     */
    protected $factory;


    /**
     * This property holds the fileManagerProtocolHandler for this instance.
     * @var LightUserDataFileManagerHandlerInterface
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
            $factory = $userDb->getFactory();
            $optionId = $factory->getPluginOptionApi()->insertPluginOption([
                "category" => 'Light_UserData.MSC',
                "name" => 'default',
                "value" => '20M',
                "description" => "The maximum storage capacity for the \"default\" user. Example: 20M, 50M, etc.",
            ]);


            $factory->getUserGroupHasPluginOptionApi()->insertUserGroupHasPluginOption([
                'user_group_id' => $factory->getUserGroupApi()->getUserGroupIdByName('default'),
                'plugin_option_id' => $optionId,
            ]);


            $factory->getPermissionApi()->insertPermission([
                "name" => "Light_UserData.user",
            ]);

            $factory->getPermissionApi()->insertPermission([
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
                $factory = $userDb->getFactory();
                //--------------------------------------------
                // REMOVING THE OPTIONS
                //--------------------------------------------
                $factory->getPluginOptionApi()->deletePluginOptionsByPluginName('Light_UserData');


                //--------------------------------------------
                // REMOVING THE PERMISSIONS
                //--------------------------------------------
                $factory->getPermissionApi()->deletePermissionByName("Light_UserData.user");
                $factory->getPermissionApi()->deletePermissionByName("Light_UserData.admin");


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


    /**
     * Returns the file manager handler instance used by this service.
     *
     * @return LightUserDataFileManagerHandlerInterface
     */
    public function getFileManagerHandler(): LightUserDataFileManagerHandlerInterface
    {
        if (null === $this->fileManagerProtocolHandler) {
            $handler = new LightUserDataDirectFileManagerHandler();
            $handler->setService($this);
            $this->fileManagerProtocolHandler = $handler;
        }
        return $this->fileManagerProtocolHandler;
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


            $pluginOptionId = $userDb->getFactory()->getPluginOptionApi()->getPluginOptionsColumn('id', [
                "category" => "Light_UserData.MSC",
                "name" => "default",
            ], []);


            $userDb->getFactory()->getUserGroupHasPluginOptionApi()->insertUserGroupHasPluginOption([
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
     * Returns an array of information about the resource files contained in the given directory.
     * Each item is an array with the following structure:
     *
     * - resource_file_id: string, the id of the resource file entry
     * - path: string, the relative path of the resource file (relative to the user directory)
     *
     *
     * @param string $directory
     * @return array
     */
    public function listByDirectory(string $directory): array
    {
        /**
         * Note: this method doesn't return the rows directly because
         * I thought maybe later I would return more properties...
         */
        $ret = [];


        $userId = $this->getValidWebsiteUser()->getId();
        $components = [
            Where::inst()->key("path")->startsWith($directory . "/"),
        ];
        $rows = $this->getFactory()->getResourceFileApi()->fetchAllByUserId($userId, $components);
        foreach ($rows as $row) {
            $ret[] = [
                'resource_file_id' => $row['id'],
                'path' => $row['path'],
            ];
        }

        return $ret;


    }

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

        $option = $udb->getFactory()->getPluginOptionApi()->getOptionByCategoryAndUserId("Light_UserData.MSC", $userId);
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
     * Checks that the current user's directory doesn't exceed his/her maximum capacity storage.
     * If it does exceed that limit, we throw an exception.
     *
     * @throws \Exception
     *
     */
    public function checkUserMaxStorageCapacity()
    {
        $user = $this->getValidWebsiteUser();
        $current = $this->getCurrentCapacityByUser($user);
        $max = $this->getMaximumCapacityByUser($user);
        if ($current > $max) {
            $maxHuman = ConvertTool::convertBytes($max, 'h');
            $currentHuman = ConvertTool::convertBytes($current, 'h');
            $this->error("Maximum capacity exceeded. You cannot add file anymore. Your maximum capacity storage is $maxHuman, and you've already used $currentHuman.");
        }
    }


    /**
     * Returns whether the given user owns the resource which identifier was given.
     *
     * @param string $resourceIdentifier
     * @param LightWebsiteUser|null $user
     * @return bool
     * @throws \Exception
     */
    public function userHasResource(string $resourceIdentifier, LightWebsiteUser $user = null): bool
    {
        if (null === $user) {
            $user = $this->getValidWebsiteUser();
        }
        $api = $this->getFactory()->getResourceApi();
        $resourceExists = $api->hasResourceByResourceIdentifier($resourceIdentifier);

        list($userId, $canonical) = LightUserDataHelper::extractResourceIdentifier($resourceIdentifier);
        return $resourceExists && ((int)$user->getId() === (int)$userId);
    }


    /**
     * Checks that the given user owns the current resource, and throws an exception if that's not the case.
     *
     * If the given user is null, the current valid user will be used by default.
     *
     * @param string $resourceIdentifier
     * @param LightWebsiteUser|null $user
     * @throws \Exception
     */
    public function checkUserHasResource(string $resourceIdentifier, LightWebsiteUser $user = null)
    {
        if (false === $this->userHasResource($resourceIdentifier)) {
            $this->error("Forbidden: you cannot remove resource with identifier $resourceIdentifier, because you don't own it.", ExceptionCode::FORBIDDEN);
        }
    }


    /**
     * Removes the resource which url was given, if the user owns it.
     *
     * Doesn't complain if the resource wasn't found.
     *
     *
     * @param string $url
     * @throws \Exception
     */
    public function removeResourceByUrl(string $url)
    {
        $userDir = $this->getUserDir();
        $resourceIdentifier = $this->getResourceIdentifierByUrl($url);
        $this->checkUserHasResource($resourceIdentifier);

        list($userId, $canonical) = LightUserDataHelper::extractResourceIdentifier($resourceIdentifier);


        $info = $this->getResourceInfoByResourceIdentifier($resourceIdentifier);


        //--------------------------------------------
        // REMOVING PHYSICAL FILES FROM THE FILESYSTEM
        //--------------------------------------------
        if (false !== $info) {
            $files = $info['files'];
            foreach ($files as $item) {
                $isSource = $item['is_source'];
                $path = $item['path'];
                $absPath = $userDir . "/" . $path;

                if (true === $isSource) {
                    $oriPath = LightUserDataHelper::getOriginalPath($absPath);
                    if (true === file_exists($oriPath)) {
                        unlink($oriPath);
                    }
                }
                if (true === file_exists($absPath)) {
                    unlink($absPath);
                }
            }
        }


        //--------------------------------------------
        // REMOVING RESOURCE FROM THE DATABASE
        //--------------------------------------------
        $this->getFactory()->getResourceApi()->deleteResourceByLudUserIdAndCanonical($userId, $canonical);
    }


    /**
     * Returns the absolute path to the source file of the resource which identifier is given.
     * Throws an exception if the file doesn't exist in the database.
     *
     * Available options are:
     * - original: bool=false. Whether to try the original image first.
     *      If this is true:
     *          - if the original image exists, its path will be returned
     *          - otherwise the normal image's path will be returned
     *
     *
     *
     * @param string $resourceIdentifier
     * @param array $options
     * @return string
     */
    public function getResourcePathByResourceIdentifier(string $resourceIdentifier, array $options = []): string
    {
        $original = $options['original'] ?? false;

        $api = $this->getFactory()->getResourceApi();
        $row = $api->getSourceFilePathInfoByResourceIdentifier($resourceIdentifier);
        if (false === $row) {
            $this->error("The source file was not found with resourceIdentifier=$resourceIdentifier.");
        }

        $userIdentifier = $row['user_identifier'];
        $relPath = $row['path'];
        $userDir = $this->getUserDir($userIdentifier);

        $absPath = $userDir . "/" . $relPath;
        if (true === $original) {
            $absPath2 = LightUserDataHelper::getOriginalPath($absPath);
            if (file_exists($absPath2)) {
                $absPath = $absPath2;
            }
        }
        return $absPath;
    }


    /**
     * Returns a @page(resource info array) for the given resource id, or false if the resource info wasn't found.
     *
     * Available options are:
     * - tags: bool=false, whether to append the array of tags to the resulting array
     * - nickname: string=null, if set, the nickname of the file which info to return.
     *      If not set, the source file's info will be returned.
     * - original: bool=false, If true, the abs_path property will be pointing to the original file, if found, or otherwise
     *      the regular file.
     *
     *
     *
     * @param string $resourceId
     * @param array $options
     * @return array|false
     */
    public function getResourceInfoByResourceIdentifier(string $resourceId, array $options = [])
    {
        $nickname = $options['nickname'] ?? null;
        $original = $options['original'] ?? false;

        $row = $this->factory->getResourceApi()->getBaseResourceInfoByResourceIdentifier($resourceId, $options);
        if (false === $row) {
            return false;
        }

        $path = null;
        $files = $row['files'];
        foreach ($files as $item) {
            if (null === $nickname) {
                if (true === $item['is_source']) {
                    $path = $item['path'];
                    break;
                }
            } elseif ($item['nickname'] === $nickname) {
                $path = $item['path'];
                break;
            }
        }

        if (null == $path) {
            $s = "No source file found for resource \"$resourceId\"";
            if (null !== $nickname) {
                $s .= " and nickname=$nickname";
            }
            $s .= ".";
            $this->error($s);
        }

        $row['directory'] = dirname($path);
        $row['filename'] = basename($path);
        $userIdentifier = $row['user_identifier'];
        $userDir = $this->getUserDir($userIdentifier);


        $absPath = $userDir . "/" . $path;
        if (true === $original) {
            $absPath2 = LightUserDataHelper::getOriginalPath($absPath);
            if (true === file_exists($absPath2)) {
                $absPath = $absPath2;
            }
        }

        $row['abs_path'] = $absPath;
        $row['original_url'] = $this->getUrlByResourceIdentifier($resourceId, ['urlParams' => [
            "o" => 1,
        ]]);
        return $row;
    }


    /**
     * Returns the url to access the resource identified by the given $resourceIdentifier.
     *
     *
     * The options are:
     *
     * - urlParams: array of key/value, the url parameters to add.
     *
     *
     * @param string $resourceIdentifier
     * @param array $options = []
     * @return string
     * @throws \Exception
     */
    public function getUrlByResourceIdentifier(string $resourceIdentifier, array $options = []): string
    {

        $urlParams = $options['urlParams'] ?? [];

        /**
         * @var $rr LightReverseRouterService
         */
        $rr = $this->container->get('reverse_router');
        $params = [
            "id" => $resourceIdentifier,
        ];
        /**
         * Useful to avoid browser cache related problems
         */
        $params['t'] = time();
        $params = array_merge($params, $urlParams);
        return $rr->getUrl("luda_route-web_access", $params);

    }


    /**
     * Returns the url of the web access service.
     *
     * @return string
     * @throws \Exception
     */
    public function getWebAccessServiceUrl(): string
    {
        /**
         * @var $rr LightReverseRouterService
         */
        $rr = $this->container->get('reverse_router');
        return $rr->getUrl("luda_route-web_access");
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
     * Returns the absolute path to the directory of the given user.
     *
     * The given user can be one of the following:
     * - a LightWebsiteUser instance
     * - an user identifier (lud_user.identifier)
     * - null, in which case the current user will be used
     *
     *
     * @param LightWebsiteUser|string|null $userOrUserIdentifier
     * @return string
     * @throws \Exception
     */
    public function getUserDir($userOrUserIdentifier = null): string
    {

        if (is_string($userOrUserIdentifier)) {
            $identifier = $userOrUserIdentifier;
        } else {
            $user = null;
            if (null === $userOrUserIdentifier) {
                $user = $this->getValidWebsiteUser();
            } elseif ($userOrUserIdentifier instanceof LightWebsiteUser) {
                $user = $userOrUserIdentifier;
            }
            $identifier = $user->getIdentifier();
        }
        return $this->rootDir . "/users/" . $identifier;
    }


//    /**
//     * Sets a temporary user.
//     *
//     * @param LightUserInterface $user
//     */
//    public function setTemporaryUser(LightUserInterface $user)
//    {
//        $this->currentUser = $user;
//    }
//
//    /**
//     * Unsets the temporary user if any.
//     */
//    public function unsetTemporaryUser()
//    {
//        $this->currentUser = null;
//    }


    //--------------------------------------------
    // LOGICAL API
    //--------------------------------------------
    /**
     * Creates the resource described by the given fileItems in the database, and returns an info array.
     * The info array contains the following:
     *
     * - resource_identifier: string, the resource identifier of the created resource.
     *
     *
     * Note: the file items path must be already resolved.
     *
     * Available options are:
     * - tags: array of tags to attach to the resource.
     * - is_private: bool=false. Whether the resource is private or public.
     * - source_path: string, path to the binary file to add.
     * - keep_original: bool=false, whether to create an original copy for this file.
     * - canonical_name: string|null, the canonical name of this resource.
     *
     *
     *
     * See the @page(files property of the upload file section) for more details about the fileItems.
     *
     *
     * @param array $fileItems
     * @param array $options
     */
    public function createResourceByFileItems(array $fileItems, array $options = []): array
    {
        $isPrivate = $options['is_private'] ?? false;
        $source_path = $options['source_path'];
        $keep_original = $options['keep_original'] ?? false;
        $tags = $options['tags'] ?? [];
        $canonicalName = $options['canonical_name'] ?? null;


        /**
         * @var $um LightUserManagerService
         */
        $um = $this->container->get('user_manager');
        $userId = $um->getValidWebsiteUser()->getId();

        /**
         * @var $db LightDatabaseService
         */
        $db = $this->container->get("database");
        /**
         * @var $exception \Exception
         */
        $exception = null;
        $resourceId = null;
        $resourceIdentifier = null;
        $res = $db->transaction(function () use (&$resourceId, &$resourceIdentifier, $db, $isPrivate, $tags, $fileItems, $userId, $canonicalName) {


            //--------------------------------------------
            // CREATE THE RESOURCE FIRST
            //--------------------------------------------

            if (null === $canonicalName) {
                $canonicalName = $this->getNewResourceIdentifier();
            }


            $resourceIdentifier = LightUserDataHelper::implodeResourceIdentifier($userId, $canonicalName);


            $datetime = DateTool::getMysqlDatetime();
            $resourceApi = $this->getFactory()->getResourceApi();
            $resourceId = $resourceApi->insertResource([
                'lud_user_id' => $userId,
                'canonical' => $canonicalName,
                'is_private' => (int)$isPrivate,
                'date_creation' => $datetime,
                'date_last_update' => $datetime,
            ], false);


            //--------------------------------------------
            // CREATE THE TAGS
            //--------------------------------------------
            $this->storeTagsByResourceId($resourceId, $tags);


            //--------------------------------------------
            // CREATE THE FILE VARIATIONS
            //--------------------------------------------
            $fileApi = $this->getFactory()->getResourceFileApi();
            foreach ($fileItems as $fileItem) {
                $fileApi->insertResourceFile([
                    "luda_resource_id" => $resourceId,
                    "path" => $fileItem['path'],
                    "nickname" => $fileItem['nickname'],
                    "is_source" => (int)$fileItem['is_source'],
                ]);
            }


        }, $exception);


        if (false === $res) {
            throw $exception;
        }


        /**
         * ...then create the files on the filesystem (after the db insert is ok)
         */
        $this->createFileItems($source_path, $fileItems, [
            'original' => $keep_original,
        ]);


        return [
            'resource_identifier' => $resourceIdentifier,
        ];

    }


    /**
     * Updates the resource (in the database) which identifier is given, and which is described by the given fileItems.
     *
     *
     * Note: the file items path must be already resolved.
     *
     * Available options are:
     * - tags: array of tags to attach to the resource.
     * - is_private: bool=false. Whether the resource is private or public.
     * - ?source_path: string. The path to the new file.
     *      If defined, this file will replace the old ones on the filesystem, and the db info is updated.
     *      If not defined, we just update the db info and (potentially) rename the old files on the filesystem.
     * - keep_original: bool=false, whether to create an original copy for this file.
     *
     *
     * See the @page(files property of the upload file section of the user data file manager document) for more details about the fileItems.
     *
     *
     * @param string $resourceIdentifier
     * @param array $fileItems
     * @param array $options
     */
    public function updateResourceByFileItems(string $resourceIdentifier, array $fileItems, array $options = [])
    {
        $isPrivate = $options['is_private'] ?? false;
        $source_path = $options['source_path'] ?? null;
        $keep_original = $options['keep_original'] ?? false;
        $tags = $options['tags'] ?? [];


        /**
         * @var $um LightUserManagerService
         */
        $um = $this->container->get('user_manager');
        $userId = $um->getValidWebsiteUser()->getId();


        //--------------------------------------------
        // GET THE OLD RESOURCE FIRST
        //--------------------------------------------
        $oldResourceInfo = $this->getResourceInfoByResourceIdentifier($resourceIdentifier);
        if (false === $oldResourceInfo) {
            $this->error("Row not found, with resourceIdentifier=$resourceIdentifier.");
        }


        if ((int)$userId !== (int)$oldResourceInfo['lud_user_id']) {
            $this->error("Forbidden operation: you don't own the resource you're trying to update (identifier=$resourceIdentifier).", ExceptionCode::FORBIDDEN);
        }


        /**
         * @var $db LightDatabaseService
         */
        $db = $this->container->get("database");


        /**
         * @var $exception \Exception
         */
        $exception = null;
        $res = $db->transaction(function () use ($source_path, $oldResourceInfo, $resourceIdentifier, $db, $isPrivate, $tags, $keep_original, $fileItems, $userId) {

            $resourceId = $oldResourceInfo['id'];


            $userDir = $this->getUserDir();

            $fileWasProvided = (null !== $source_path);


            //--------------------------------------------
            // NO FILE PROVIDED
            //--------------------------------------------
            if (false === $fileWasProvided) {
                /**
                 * If the file is not provided, we rely on the fact that the configFiles and the old files from the db are in the same order (i.e. that the user
                 * didn't change the configFiles). Not optimal, but for now that's what we are using.
                 */
                $nbFiles = count($fileItems);
                $oldFiles = $oldResourceInfo['files'];
                $nbOldFiles = count($oldFiles);
                if ($nbFiles !== $nbOldFiles) {
                    /**
                     * This shouldn't happen, because in this conception the dev should update the files/database whenever he changes
                     * the files configuration.
                     */
                    $this->error("The config files defines " . $nbFiles . " files, but the current file to update has " . $nbOldFiles . " variations. Don't know how to handle this. Please contact the webmaster.");
                }
            }


            //--------------------------------------------
            // UPDATE THE RESOURCE
            //--------------------------------------------
            $datetime = DateTool::getMysqlDatetime();
            $resourceApi = $this->getFactory()->getResourceApi();
            $resourceApi->updateResourceById($resourceId, [
                'is_private' => (int)$isPrivate,
                'date_last_update' => $datetime,
            ]);


            //--------------------------------------------
            // UPDATE THE FILE VARIATIONS
            //--------------------------------------------
            $fileApi = $this->getFactory()->getResourceFileApi();
            if (false === $fileWasProvided) {
                foreach ($fileItems as $k => $fileItem) {
                    $fileId = $oldFiles[$k]['id'];
                    $fileApi->updateResourceFileById($fileId, [
                        "path" => $fileItem['path'],
                        "nickname" => $fileItem['nickname'],
                        "is_source" => (int)$fileItem['is_source'],
                    ]);
                }
            } else {
                /**
                 * If the file is provided, we can simply delete/insert, so we avoid the old conf sync problem mentioned earlier in this method.
                 */
                $fileApi->deleteResourceFileByLudaResourceId($resourceId);

                foreach ($fileItems as $fileItem) {
                    $fileApi->insertResourceFile([
                        "luda_resource_id" => $resourceId,
                        "path" => $fileItem['path'],
                        "nickname" => $fileItem['nickname'],
                        "is_source" => (int)$fileItem['is_source'],
                    ]);
                }
            }


            //--------------------------------------------
            // UPDATE THE TAGS
            //--------------------------------------------
            $this->storeTagsByResourceId($resourceId, $tags);

            $oldFiles = $oldResourceInfo['files'];

            if (false === $fileWasProvided) {
                //--------------------------------------------
                // RENAME THE FILES
                //--------------------------------------------
                foreach ($fileItems as $k => $fileItem) {
                    $oldItem = $oldFiles[$k];
                    $isSource = $oldItem['is_source'];
                    $oldPath = $oldItem['path'];
                    $oldPathAbs = $userDir . "/" . $oldPath;
                    if (file_exists($oldPathAbs)) {
                        $newPathAbs = $userDir . "/" . $fileItem['path'];
                        FileSystemTool::move($oldPathAbs, $newPathAbs);
                        if (true === $isSource) {
                            $oldOriginal = LightUserDataHelper::getOriginalPath($oldPathAbs);
                            if (file_exists($oldOriginal)) {
                                $newOriginal = LightUserDataHelper::getOriginalPath($newPathAbs);
                                FileSystemTool::move($oldOriginal, $newOriginal);
                            }
                        }
                    }
                }
            } else {
                //--------------------------------------------
                // REMOVE THE OLD FILES
                //--------------------------------------------
                foreach ($fileItems as $k => $fileItem) {
                    $oldItem = $oldFiles[$k];
                    $isSource = $oldItem['is_source'];
                    $oldPath = $oldItem['path'];
                    $oldPathAbs = $userDir . "/" . $oldPath;
                    if (file_exists($oldPathAbs)) {
                        FileSystemTool::remove($oldPathAbs);

                        if (true === $isSource) {
                            $oldOriginal = LightUserDataHelper::getOriginalPath($oldPathAbs);
                            if (file_exists($oldOriginal)) {
                                /**
                                 * Here we are updating a file, and the user provided a file, and a keepOriginal flag.
                                 * The file provided by the user might be either a crop of the old file (in which case keepOriginal=false), or a new uploaded file (keepOriginal=true).
                                 * If we just crop the old file, we need to preserve the old original (so we rename it).
                                 * However if the user adds a new file, we need to replace the old original with the new one.
                                 */
                                if (true === $keep_original) {
                                    FileSystemTool::remove($oldOriginal);
                                } else {
                                    $newPathAbs = $userDir . "/" . $fileItem['path'];
                                    $newOriginal = LightUserDataHelper::getOriginalPath($newPathAbs);
                                    FileSystemTool::move($oldOriginal, $newOriginal);
                                }
                            }
                        }

                    }
                }


                //--------------------------------------------
                // THEN CREATE THE NEW FILES
                //--------------------------------------------
                $this->createFileItems($source_path, $fileItems, [
                    'original' => $keep_original,
                ]);
            }


        }, $exception);


        if (false === $res) {
            throw $exception;
        }

        return [
            'resource_identifier' => $resourceIdentifier,
        ];

    }


    /**
     * Returns a unique resource identifier that can be inserted in the database, as
     * the luda_resource.resouce_identifier value.
     *
     *
     *
     * @return string
     */
    public function getNewResourceIdentifier(): string
    {
        return SimplePdoGenericHelper::getUniqueIdentifier("f");
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
    public function getResourceIdentifierByUrl(string $url, bool $throwEx = true)
    {
        $params = UriTool::getParams($url);
        if (array_key_exists("id", $params)) {
            return $params['id'];
        }
        if (true === $throwEx) {
            $this->error("No resource identifier found in this url: \"$url\".");
        }
        return false;
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
     * Returns the @page(current user), which is a LightWebsiteUser.
     *
     * @return LightWebsiteUser
     * @throws \Exception
     */
    protected function getValidWebsiteUser(): LightWebsiteUser
    {
        $user = $this->currentUser;
        if (null === $user) {
            /**
             * @var $user LightWebsiteUser
             */
            $user = $this->container->get("user_manager")->getValidWebsiteUser();
            $this->currentUser = $user;
        }
        return $user;
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
     * Creates the tags in the database, and binds them to the resource which id is given.
     *
     * @param $resourceId
     * @param array $tags
     * @throws \Exception
     */
    private function storeTagsByResourceId($resourceId, array $tags)
    {
        $tagApi = $this->getFactory()->getTagApi();
        $resourceHasTagApi = $this->getFactory()->getResourceHasTagApi();


        // delete old tags first
        $resourceHasTagApi->deleteResourceHasTagByResourceId($resourceId);

        if ($tags) {
            foreach ($tags as $tag) {
                $idTag = $tagApi->insertTag([
                    "name" => $tag,
                ]);
                $resourceHasTagApi->insertResourceHasTag([
                    'resource_id' => $resourceId,
                    'tag_id' => $idTag,
                ]);
            }
        }
    }


    /**
     * Creates the given file items on the real server, using the given sourcePath as the source.
     * See the files property of @page(the upload file configuration of the user data file manager document) for more details.
     *
     * Available options are:
     * - original: bool=false. Whether to create an original copy of the source file.
     *      See the @page(source file section of our Light_UserData conception notes) for more details about the source file.
     *      See the @page(original image section of our Light_UserData conception notes) for more details about the "original" concept.
     *
     *
     *
     * @param string $sourcePath
     * @param array $fileItems
     * @param array $options
     */
    private function createFileItems(string $sourcePath, array $fileItems, array $options = [])
    {
        $keepOriginal = $options['original'] ?? false;


        $userDir = $this->getUserDir();
        foreach ($fileItems as $fileItem) {
            $imageTransformer = $fileItem['imageTransformer'] ?? null;
            $file = $userDir . "/" . $fileItem['path'];
            if (null !== $imageTransformer) {
                GemHelperTool::transformImage($sourcePath, $file, $imageTransformer);
            } else {
                FileSystemTool::copyFile($sourcePath, $file);
            }

            if (true === $keepOriginal && true === $fileItem['is_source']) {
                //--------------------------------------------
                // ORIGINAL IMAGE COPY
                //--------------------------------------------
                $oriPath = LightUserDataHelper::getOriginalPath($file);
                FileSystemTool::copyFile($sourcePath, $oriPath);
            }
        }
    }

    /**
     * Throws an exception.
     *
     * @param string $msg
     * @param int|null $code
     * @throws \Exception
     */
    private function error(string $msg, int $code = null)
    {
        throw new LightUserDataException($msg, $code);
    }
}