<?php


namespace Ling\Light_UserData\Service;


use Ling\Bat\ConvertTool;
use Ling\Bat\FileSystemTool;
use Ling\Bat\FileTool;
use Ling\DirScanner\YorgDirScannerTool;
use Ling\Light\Events\LightEvent;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_AjaxFileUploadManager\Exception\LightAjaxFileUploadManagerException;
use Ling\Light_AjaxFileUploadManager\Service\LightAjaxFileUploadManagerService;
use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_PluginInstaller\PluginInstaller\PluginInstallerInterface;
use Ling\Light_PluginInstaller\Service\LightPluginInstallerService;
use Ling\Light_ReverseRouter\Service\LightReverseRouterService;
use Ling\Light_User\LightUserInterface;
use Ling\Light_User\LightWebsiteUser;
use Ling\Light_UserData\Api\LightUserDataApiFactory;
use Ling\Light_UserData\Exception\LightUserDataException;
use Ling\Light_UserData\VirtualMachine\LightUserDataBabyYamlVirtualMachine;
use Ling\Light_UserData\VirtualMachine\LightUserDataVirtualMachineInterface;
use Ling\Light_UserDatabase\Service\LightUserDatabaseService;
use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;

/**
 * The LightUserDataService class.
 *
 * For more details, refer to the @page(conception notes).
 */
class LightUserDataService implements PluginInstallerInterface
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
     * @var LightUserDataApiFactory
     */
    protected $factory;


    /**
     * This property holds the virtualMachine for this instance.
     * @var LightUserDataVirtualMachineInterface
     */
    protected $virtualMachine;


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
     * Builds the LightUserDataService instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->rootDir = null;
        $this->currentUser = null;
        $this->virtualMachine = new LightUserDataBabyYamlVirtualMachine();
        $this->virtualMachine->setUserDataService($this);
        $this->factory = new LightUserDataApiFactory();
        $this->directoryKey = "directory";
        $this->originalDirectoryName = "__original__";
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
        if (false === $installer->hasTable("luda_resource")) {

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


            /**
             * We cannot put this statement inside the transaction, because of the mysql implicit commit rule:
             * https://dev.mysql.com/doc/refman/8.0/en/implicit-commit.html
             */
            $db->executeStatement(file_get_contents(__DIR__ . "/../assets/fixtures/recreate-structure.sql"));


            /**
             * However for the part below, we can put all the statements in a transaction.
             */
            /**
             * @var $exception \Exception
             */
            $exception = null;
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
    public function getDependencies(): array
    {
        return [
            "Light_UserDatabase",
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
        $this->doInitialize();
        $groupId = $event->getVar("return");
        /**
         * @var $userDb LightUserDatabaseService
         */
        $userDb = $this->container->get("user_database");


        $pluginOption = $userDb->getPluginOptionApi()->getPluginOption([
            "category" => "Light_UserData.MSC",
            "name" => "default",
        ], [], null, true);


        $userDb->getUserGroupHasPluginOptionApi()->insertUserGroupHasPluginOption([
            'user_group_id' => $groupId,
            'plugin_option_id' => $pluginOption['id'],
        ]);
    }


    /**
     * Returns the Light_USerData factory.
     *
     * @return LightUserDataApiFactory
     */
    public function getFactory(): LightUserDataApiFactory
    {
        return $this->factory;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the virtual machine.
     * See more details in @page(the virtual machine conception notes).
     * @return LightUserDataVirtualMachineInterface
     */
    public function getVirtualMachine(): LightUserDataVirtualMachineInterface
    {
        return $this->virtualMachine;
    }


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
     * The save method has two modes:
     *
     * - insert mode
     * - update mode
     *
     * In both cases, the database is updated accordingly.
     *
     *
     * ### insert mode
     *
     * The goal is to add a new file to the hard drive.
     * The destination of that file is given by the path argument.
     * If the destination file doesn't exist already, it will be created.
     * Otherwise if the destination file already exists on the hard drive, this method will throw an exception by default, forcing
     * the user to remove a file before using it.
     * If you want to replace the already existing file, use the overwrite option and set it to true.
     *
     *
     * ### update mode
     *
     * The goal is to update an already existing file.
     * The new destination of that file is given by the path argument.
     * The old/existing file to replace is identified by the **url** passed via the options array.
     * Passing the url option will trigger this method to use the update mode, otherwise the insert mode
     * is assumed by default.
     * If the destination already exists on the hard drive AND IS THE SAME as the old/existing file, then the file will be updated normally.
     * However if the destination already exists on the hard drive AND IS NOT THE SAME as the old/existing file, then by default
     * this method will throw an exception, forcing the user to remove a file before using it.
     * If you want this method to replace the already existing file without warning, use the overwrite option and set it to true.
     *
     *
     *
     * If the maximum user storage capacity is reached, the resource is not uploaded and an exception is thrown.
     *
     * The available options are:
     * - tags: an array of tags to bind to the given resource
     * - is_private: bool=false
     * - overwrite: bool=false. Whether to overwrite an existing file. If false (by default), will throw an exception instead of replacing the file.
     *      The only case were overwriting a file is ok even when overwrite=false is when in update mode if the new and old file have the same name.
     *      See my update notes above for more details.
     * - keep_original: bool=false. Whether to keep a copy of the given file (the copy is kept in the __original__ directory of the user).
     *      See the @page(the original file section in the conception notes).
     * - virtual_context_id: string=null. If set, this method uses the virtual storage. If null, it doesn't.
     *      See @page(the virtual storage conception notes) for more details.
     *
     *
     * @param string $path
     * The relative path, from the user dir, to the resource.
     *
     * @param string $data
     * @param array $options
     * @return string
     * @throws \Exception
     */
    public function save(string $path, string $data, array $options = []): string
    {
//        az($path, $options);

        $this->checkPermission();
        $user = $this->getValidWebsiteUser();
        $userDir = $this->getUserDir(); // assuming the user calling the save method owns the file (for now...)

        $this->checkUserMaximumStorageLimit(strlen($data), $user);

        $tags = $options['tags'] ?? [];
        $overwrite = $options['overwrite'] ?? false;
        $virtualContextId = $options['virtual_context_id'] ?? null;
        $keepOriginal = $options['keep_original'] ?? false;
        $is_private = (int)(bool)($options['is_private'] ?? false);
        $userId = $user->getId();
        $resourceIdentifier = $this->getNewResourceIdentifier();
        $file = $userDir . "/$path";
        if (false === FileSystemTool::isValidFilename($path, true)) {
            throw new LightUserDataException("Invalid path provided: $path.");
        }


        $oldFile = null;
        $resource = null;
        $isUpdate = (array_key_exists('url', $options)) ? true : false;
        $date = date("Y-m-d H:i:s");


        if (true == $isUpdate) {
            $resource = $this->getResourceInfoByResourceUrl($options['url']);
            $oldFile = $resource['abs_path'];

            // prepare resource to be updated in db
            unset($resource["abs_path"]);
            unset($resource["rel_path"]);
            unset($resource["user_identifier"]);
            unset($resource["original_url"]);
            $resource['is_private'] = $is_private;
            $resource['dir'] = dirname($path);
            $resource['filename'] = basename($path);
            $resource['date_last_update'] = $date;
            $resourceIdentifier = $resource['resource_identifier'];

        }


        //--------------------------------------------
        // CHECKING THAT THE FILE DOES NOT EXIST OR CAN BE OVERWRITTEN
        //--------------------------------------------
        if (null === $virtualContextId) {
            if (false === $overwrite && file_exists($file)) {
                if (true === $isUpdate && realpath($oldFile) === realpath($file)) {
                    // update of a file with the same name is allowed
                } else {
                    throw new LightUserDataException("Permission denied. The file already exists. You cannot overwrite the file; it's forbidden by the server configuration.");
                }
            }
        }

        $insertRow = [
            "lud_user_id" => $userId,
            "resource_identifier" => $resourceIdentifier,
            "dir" => dirname($path),
            "filename" => basename($path),
            "is_private" => $is_private,
            "date_creation" => $date,
            "date_last_update" => $date,
        ];

        if (null === $virtualContextId) {


            /**
             * @var $db SimplePdoWrapperInterface
             */
            $db = $this->container->get("database");
            /**
             * @var $exception \Exception
             */
            $exception = null;
            $res = $db->transaction(function () use ($insertRow, $date, $tags, $resource, $isUpdate) {


                if (false === $isUpdate) {
                    $resourceId = $this->factory->getResourceApi()->insertResource($insertRow);
                } else {
                    $this->factory->getResourceApi()->updateResourceById($resource['id'], $resource);
                    $resourceId = $resource['id'];
                }


                //--------------------------------------------
                // TAGS
                //--------------------------------------------
                if ($tags) {
                    if (true === $isUpdate) {
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

            if (true === $isUpdate) {
                FileSystemTool::remove($oldFile);
            }

            // create or overwrite the file
            FileSystemTool::mkfile($file, $data);
            if (false === $isUpdate && true === $keepOriginal) {
                if (false !== ($originalFile = $this->getOriginalPathFromAbsolutePath($file))) {
                    FileSystemTool::mkfile($originalFile, $data);
                }
            }

        } else {
            //--------------------------------------------
            // VIRTUAL SYSTEM
            //--------------------------------------------
            if (false === $isUpdate) {
                $this->virtualMachine->executeInsert($virtualContextId, $resourceIdentifier, $path, $data, $insertRow, [
                    "tags" => $tags,
                    "overwrite" => $overwrite,
                    "keep_original" => $keepOriginal,
                ]);
            } else {
                az(__FILE__, "here");
                $storage->executeUpdate($insertRow, $resource, $tags);
            }
        }

        //--------------------------------------------
        // RETURNING THE LINK
        //--------------------------------------------
//        az(__FILE__, "pp");
        return $this->getResourceUrlByResourceIdentifier($resourceIdentifier, [
            'virtual' => $virtualContextId,
        ]);
    }


    /**
     * Removes the resource which url is given from the database and the filesystem.
     * Throws an exception in case of a problem.
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
        $this->factory->getResourceApi()->deleteResourceById($id);
        unlink($path);

        if (false !== ($originalPath = $this->getOriginalPathFromAbsolutePath($path))) {
            unlink($originalPath);
        }
    }


    /**
     * Returns the url to access the resource identified by the given $resourceIdentifier.
     *
     *
     * The options are:
     *
     * - virtual: string=null, the virtual context id, use this if you want to query the virtual file instead. Note: usually, this is only
     *      for js tools, you probably don't need that.
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
        $virtualContextId = $options['virtual'] ?? null;


        /**
         * @var $rr LightReverseRouterService
         */
        $rr = $this->container->get('reverse_router');
        $params = [
            "id" => $resourceIdentifier,
            /**
             * I like to add a random parameter, to force the browser reloading the image every time.
             * That's because I was creating an user form where the user could upload his avatar via ajax,
             * and the file was delivered by this method, but the avatar didn't refresh (browser optimization I suppose)
             * until I refreshed the page.
             * So now with this random trick (t=$random), the browser is forced to reload the image,
             * and the form works fine.
             *
             */
            "t" => time(),
        ];
        if (true === $getOriginalUrl) {
            $params['original'] = "1";
        }
        if (null !== $virtualContextId) {
            $params['vm'] = $virtualContextId;
        }
        return $rr->getUrl("luda_route-virtual_server", $params);

    }


    /**
     * Returns an info array matching the file which resourceIdentifier is given.
     *
     * Throws an exception if the file is private and the user calling the file is not the owner.
     *
     * The info array is a resource row, with the additional fields added to it:
     *
     * - abs_path: absolute path to the file
     * - rel_path: relative path to the file (from the user directory).
     * - user_identifier: the user identifier
     * - original_url: string|false. The url to the original file (which might be saved, or not, depending on the configuration).
     *      If no original url was saved, then false is returned.
     *
     *
     * The available options are:
     * - addExtraInfo: bool=false. If true, the following entries are added to the returned array:
     *      - tags: array of tag names bound to that resource
     * - original: bool=false. If true, the file paths (absolute and relative) reference the original image rather than the processed one.
     *      Note: the original image is kept only depending on the plugin configuration.
     * - vm: string=null. The virtual context id to use. If so, it's assumed that the current user owns the file and that she is
     *      currently interacting with a gui that allows her to manager her own files.
     *
     *
     *
     *
     *
     * @param string $resourceIdentifier
     * @param array $options
     * @return array
     * @throws LightUserDataException
     */
    public function getResourceInfoByResourceIdentifier(string $resourceIdentifier, array $options = []): array
    {


        $addExtraInfo = $options['addExtraInfo'] ?? false;
        $useOriginal = $options['original'] ?? false;
        $virtualContextId = $options['vm'] ?? null;
        $vmHasRow = false;
        $row = false;


        if (null !== $virtualContextId) {
            $row = $this->virtualMachine->getResourceRowByResourceIdentifier($virtualContextId, $resourceIdentifier);
            if (false !== $row) {
                $vmHasRow = true;
                $tags = $row['tags'];
                $row = $row['row'];
                if (true === $addExtraInfo) {
                    $row['tags'] = $tags;
                }
            }
        }


        /**
         * Note: when the vm is used, since the vm only records changes, it might not have info about file
         * that the user didn't change, that's why we use the api as a fallback of the vm for the fetch operation.
         * See more in my virtual-machine notes (next to the conception notes of this plugin).
         */
        if (false === $row) {
            $row = $this->factory->getResourceApi()->getResourceInfoByResourceIdentifier($resourceIdentifier);
            if (null === $row) {
                throw new LightUserDataException("Row not found with resource identifier \"$resourceIdentifier\".");
            }
            if (true === $addExtraInfo) {
                $row['tags'] = $this->factory->getTagApi()->getTagNamesByResourceResourceIdentifier($resourceIdentifier);
            }
        }


        if (false !== $row) {
            $user = null;
            if (1 === (int)$row['is_private']) {
                $user = $this->getValidWebsiteUser();
                if ($user->getId() !== (int)$row['lud_user_id']) {
                    throw new LightUserDataException("Access denied: this resource is private and you're not the owner.");
                }
            }


            $relPath = $row['dir'] . "/" . $row['filename'];


            if (false === $vmHasRow) {
                $file = $this->rootDir . "/" . $row['user_identifier'] . "/" . $relPath;
                $originalDir = $this->rootDir . "/$this->originalDirectoryName/" . $row['user_identifier'];
            } else {
                $storageDir = $this->virtualMachine->getStorageDirectory($virtualContextId);
                $file = $storageDir . "/$relPath";
                $originalDir = $this->virtualMachine->getOriginalDirectory($virtualContextId);
            }
            $originalFile = $originalDir . "/" . $relPath;

            if (true === $useOriginal) {
                $file = $originalFile;
            }

            $originalUrl = (true === file_exists($originalFile)) ? $this->getResourceUrlByResourceIdentifier($row['resource_identifier'], [
                'original' => true,
                'vm' => (null !== $virtualContextId),
            ]) : false;


            if (false === file_exists($file)) {
                throw new LightUserDataException("File missing: resource found, but the file was missing on the hard drive.");
            }
            $row['abs_path'] = $file;
            $row['rel_path'] = $relPath;
            $row['original_url'] = $originalUrl;


            return $row;
        } else {
            throw new LightUserDataException("Resource not found with resource identifier \"$resourceIdentifier\".");
        }
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
     * Handles the @page(Light_UserData ajax file uploader action) and returns the appropriate response (depending on the action settings).
     *
     *
     *
     * @param array $action
     * @param array|null $phpFileItem
     * @param array $params
     * @param string $confItemId
     *
     * @return array|null
     * @throws \Exception
     */
    public function handleAjaxFileUploaderAction(array $action, ?array $phpFileItem, array $params, string $confItemId)
    {

//        az($action, $phpFileItem, $params, $confItemId);

        /**
         * @var $afum LightAjaxFileUploadManagerService
         */
        $afum = $this->container->get("ajax_file_upload_manager");

        $ret = null;

        $protocol = $action['protocol'] ?? null;
        $useFileEditor = ("fileEditor" === $protocol);


        //--------------------------------------------
        // NAME TRANSFORM FEATURE
        //--------------------------------------------
        $name = $phpFileItem['name'];
        if (true === $useFileEditor) {
            if (false === array_key_exists("filename", $params)) {
                throw new LightAjaxFileUploadManagerException("Missing parameter filename, required by the \"fileEditor\" protocol.");
            }
            $name = $params['filename'];
        }
        if (array_key_exists('nameTransformer', $action)) {
            $name = $afum->getTransformedName($name, $action['nameTransformer']);
        }


        //--------------------------------------------
        // REMOVE ACTION
        //--------------------------------------------
        if (true === $useFileEditor) {
            $fileEditorAction = $params['action'] ?? "add";
            if ('remove' === $fileEditorAction) {

                if (false === array_key_exists("url", $params)) {
                    throw new LightAjaxFileUploadManagerException("Missing parameter \"url\" for fileEditor.remove action.");
                }

                $url = $params['url'];
                $this->removeResourceByUrl($url);
                return [
                    "ok" => "1",
                ];
            }
        }


        //--------------------------------------------
        // ACTION VALIDATION
        //--------------------------------------------
        if (
            array_key_exists("maxFileNameLength", $action) &&
            array_key_exists("filename", $params)
        ) {
            $name = $params['filename'];
            $maxLen = $action['maxFileNameLength'];
            $nameLen = strlen($name);
            if ($nameLen > $maxLen) {
                throw new LightAjaxFileUploadManagerException("File name too long ($name). Maximum of $maxLen characters allowed ($nameLen given).");
            }
        }


        //--------------------------------------------
        // NAME TRANSFORM
        //--------------------------------------------
        if (null === $phpFileItem) {
            throw new LightAjaxFileUploadManagerException("Invalid phpFileItem given with \"use_Light_UserData\" action and add/update intent.");
        }


        //--------------------------------------------
        // FILENAME SANITIZATION
        //--------------------------------------------
        $allowSlashInFilename = $action['allowSlashInFilename'] ?? false;
        if (false === FileSystemTool::isValidFilename($name, $allowSlashInFilename)) {
            throw new LightAjaxFileUploadManagerException("Invalid filename \"$name\". Try to use only alphanumerical characters and underscore, and dash.");
        }


        //--------------------------------------------
        // STORING FILE IN THE FILESYSTEM AND DATABASE
        //--------------------------------------------
        if (array_key_exists("path", $action)) {
            $defaultIsPrivate = false;
            if (true === $useFileEditor) {
                $defaultIsPrivate = $params['is_private'] ?? false;
                $defaultIsPrivate = (bool)$defaultIsPrivate;
            }
            $isPrivate = $action['isPrivate'] ?? $defaultIsPrivate;
            $use2Svp = $action['use_2svp'] ?? false;
            $tags = $action['tags'] ?? $params['tags'] ?? [];
            $path = $action['path'];
            $oldPath = null; // only used with action=update


            if (false !== strpos($path, '{extension}')) {
                $extension = FileSystemTool::getFileExtension($name);
                if ('' === $extension) {
                    throw new LightAjaxFileUploadManagerException("An extension is required for the file name: " . $name);
                }
                $path = str_replace('{extension}', $extension, $path);
            }
            $path = str_replace('{filename}', $name, $path);


            if (true === $use2Svp) {
                $p = explode('.', $path, 2);
                $path = $p[0] . '.2svp';
                if (2 === count($p)) {
                    $path .= '.' . $p[1];
                }
            }


            //--------------------------------------------
            // IMAGE TRANSFORM
            //--------------------------------------------
            $fileTmpPath = $phpFileItem['tmp_name'];
            $fileTmpPathDest = $fileTmpPath;
            if (true === FileTool::isImage($fileTmpPath)) {
                if (array_key_exists("imageTransformer", $action)) {
                    $afum->transformImage($fileTmpPath, $fileTmpPathDest, $action['imageTransformer'], $phpFileItem['name']);
                }
            }


            $vid = null;
            $useVm = $action['useVirtualMachine'] ?? true;
            if (true === $useVm) {
                $vid = $confItemId;
            }
            $options = [
                "is_private" => $isPrivate,
                "tags" => $tags,
                "overwrite" => $action['overwrite'] ?? false,
                "keep_original" => $action['keepOriginal'] ?? false,
                "virtual_context_id" => $vid,
            ];

            if (true === $useFileEditor && 'update' === $fileEditorAction) {
                if (false === array_key_exists("url", $params)) {
                    throw new LightAjaxFileUploadManagerException("Missing parameter url, required by the \"fileEditor\" protocol for the update action.");
                }
                $options['url'] = $params['url'];

            }


            $url = $this->save($path, file_get_contents($phpFileItem['tmp_name']), $options);
            unlink($phpFileItem['tmp_name']); // do never forget this!!!
            return [
                "url" => $url,
            ];


        } else {
            throw new LightAjaxFileUploadManagerException("The \"path\" key is not defined.");
        }
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
        return $this->rootDir . "/" . $identifier;
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
     *
     * @param string $url
     * @return string
     * @throws \Exception
     */
    public function getIdentifierByUrl(string $url): string
    {
        $components = parse_url($url);
        if (is_array($components) && array_key_exists('query', $components)) {
            $query = $components['query'];
            $params = [];
            parse_str($query, $params);
            if (array_key_exists("id", $params)) {
                return $params['id'];
            } else {
                throw new LightUserDataException("Invalid url given, missing \"id\" parameter: \"$url\".");
            }
        } else {
            throw new LightUserDataException("Invalid url given: \"$url\".");
        }
    }



    //--------------------------------------------
    //
    //--------------------------------------------

    /**
     * Returns the resource identifier using the given resource id.
     *
     * @return string
     */
    protected function getNewResourceIdentifier(): string
    {
        return "f" . microtime(true) . "-" . rand(0, 1000);
    }


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
     * The working horse behind the initialize method.
     * See the initialize method of this class for more details.
     *
     *
     * @throws \Exception
     */
    private function doInitialize()
    {
        /**
         * @var $installer LightPluginInstallerService
         */
        $installer = $this->container->get("plugin_installer");
        $installer->install("Light_UserData");
    }


    /**
     * Returns the path of the original copy of a given file, or false if that file doesn't exist.
     *
     * @param string $path
     * @return string|false
     */
    private function getOriginalPathFromAbsolutePath(string $path)
    {
        if (0 === strpos($path, $this->rootDir)) {
            $p = explode($this->rootDir, $path, 2);
            $rel = array_pop($p);
            return $this->rootDir . "/$this->originalDirectoryName" . $rel;
        }
        return false;
    }
}