<?php


namespace Ling\Light_UserData\Service;


use Ling\Bat\FileSystemTool;
use Ling\Bat\HashTool;
use Ling\DirScanner\YorgDirScannerTool;
use Ling\Light\Core\Light;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\ReverseRouter\LightReverseRouterInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Initializer\Initializer\LightInitializerInterface;
use Ling\Light_PluginDatabaseInstaller\Service\LightPluginDatabaseInstallerService;
use Ling\Light_User\LightUserInterface;
use Ling\Light_UserData\Api\LightUserDataApiFactory;
use Ling\Light_UserData\Exception\LightUserDataException;
use Ling\Light_UserDatabase\LightWebsiteUserDatabaseInterface;
use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;
use Ling\SimplePdoWrapper\Util\MysqlInfoUtil;

/**
 * The LightUserDataService class.
 *
 * For more details, refer to the @page(conception notes).
 */
class LightUserDataService implements LightInitializerInterface
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
     * This property holds the name of the plugin used to handle the microPermissions for the classes located in the Api/ directory.
     * @var string
     */
    protected $microPermissionPlugin;


    /**
     * This property holds the directoryKey for this instance.
     * @var string
     */
    private $directoryKey;


    /**
     * Builds the LightUserDataService instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->rootDir = null;
        $this->currentUser = null;
        $this->obfuscationAlgorithm = "default";
        $this->obfuscationSecret = 'abc';
        $this->factory = new LightUserDataApiFactory();
        $this->microPermissionPlugin = null;
        $this->directoryKey = "directory";
        $this->directoryKey = "directory";
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @implementation
     */
    public function initialize(Light $light, HttpRequestInterface $httpRequest)
    {
        /**
         * @var $pih LightPluginDatabaseInstallerService
         */
        $pih = $this->container->get("plugin_database_installer");
        if (false === $pih->isInstalled("Light_UserData")) {
            $pih->install("Light_UserData");
        }

    }

    /**
     * Installs the database part of this planet.
     *
     * @throws \Exception
     */
    public function installDatabase()
    {

        /**
         * @var $db SimplePdoWrapperInterface
         */
        $db = $this->container->get("database");


        $util = new MysqlInfoUtil();
        $util->setWrapper($db);
        if (false === $util->hasTable("luda_directory_map")) {


            /**
             * We cannot put this statement inside the transaction, because of the mysql implicit commit rule:
             * https://dev.mysql.com/doc/refman/8.0/en/implicit-commit.html
             */
            $db->executeStatement(file_get_contents(__DIR__ . "/../assets/fixtures/recreate-structure.sql"));
            $this->refreshReferences();

        }
    }


    /**
     * Uninstalls the database part of this planet.
     *
     * @throws \Exception
     */
    public function uninstallDatabase()
    {
        /**
         * @var $db SimplePdoWrapperInterface
         */
        $db = $this->container->get('database');

        $db->executeStatement("DROP table if exists luda_resource_has_tag");
        $db->executeStatement("DROP table if exists luda_resource");
        $db->executeStatement("DROP table if exists luda_tag");
        $db->executeStatement("DROP table if exists luda_directory_map");


        //--------------------------------------------
        // REMOVING REFERENCES FROM THE LUD_USER TABLE
        //--------------------------------------------
        /**
         * @var $exception \Exception
         */
        $exception = null;
        $res = $db->transaction(function () {
            /**
             * @var $userDb LightWebsiteUserDatabaseInterface
             */
            $userDb = $this->container->get("user_database");
            $rows = $userDb->getAllUserInfo();
            foreach ($rows as $row) {
                $extra = $row['extra'];
                unset($extra[$this->directoryKey]);
                $row['extra'] = $extra;
                $userDb->updateUserById($row['id'], $row);
            }
        }, $exception);

        if (false === $res) {
            throw $exception;
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
        $this->factory->setPdoWrapper($container->get("database"));
    }

    /**
     * Sets the microPermissionPlugin.
     *
     * @param string $microPermissionPlugin
     */
    public function setMicroPermissionPlugin(string $microPermissionPlugin)
    {
        $this->microPermissionPlugin = $microPermissionPlugin;
        $this->factory->setMicroPermissionPlugin($microPermissionPlugin);
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
        $dir = $this->getUserDir();
        if (null !== $directory) {
            $dir .= "/" . $directory;
        }
        return YorgDirScannerTool::getFilesWithoutExtension($dir, "private", false, true, true);
    }


    /**
     * Saves the data for the current user to the given relative path,
     * and returns the url of the saved resource.
     *
     * The available options are:
     * - tags: an array of tags to bind to the given resource
     * - is_private: bool=false
     *
     *
     *
     * @param string $path
     * @param string $data
     * @param array $options
     * @return string
     * @throws \Exception
     */
    public function save(string $path, string $data, array $options = []): string
    {

        $this->getUserDir(); // assuming the user calling the save method owns the file (for now...)
        $tags = $options['tags'] ?? [];
        $is_private = $options['is_private'] ?? false;
        $userIdentifier = $this->getUserIdentifier();


        /**
         * @var $db SimplePdoWrapperInterface
         */
        $db = $this->container->get("database");
        /**
         * @var $exception \Exception
         */
        $exception = null;
        $res = $db->transaction(function () use ($tags, $path, $userIdentifier) {
            $resourceId = $this->factory->getResourceApi()->insertResource([
                "real_path" => $userIdentifier . "/" . $path,
            ]);

            if ($tags) {
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


        $userDir = $this->getUserDir();
        $file = $userDir . "/$path";
        FileSystemTool::mkfile($file, $data);

        if (true === $is_private) {
            FileSystemTool::mkfile($file . ".private", $data);
        }


        //--------------------------------------------
        // RETURNING THE LINK
        //--------------------------------------------
        $userId = basename($userDir);
        return $this->getResourceUrl($userId, $path);
    }


    /**
     * Returns the url to access the resource identified by the given userIdentifier and relativePath.
     * The relativePath is the path relative from the user directory.
     *
     *
     * @param string $userIdentifier
     * @param string $relativePath
     * @return string
     * @throws LightUserDataException
     * @throws \Exception
     */
    public function getResourceUrl(string $userIdentifier, string $relativePath): string
    {
        $file = $this->rootDir . "/" . $userIdentifier . "/" . $relativePath;

        if (file_exists($file)) {


            $row = $this->factory->getDirectoryMapApi()->getDirectoryMapByRealName($userIdentifier);
            if (null !== $row) {
                $obfuscatedName = $row['obfuscated_name'];

                /**
                 * @var $rr LightReverseRouterInterface
                 */
                $rr = $this->container->get('reverse_router');
                return $rr->getUrl("luda_route-virtual_server", [
                    "file" => $relativePath,
                    "id" => $obfuscatedName,
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
                ]);


            } else {
                throw new LightUserDataException("A problem occurred with the file $relativePath, the given user identifier wasn't found in the database. You might want to refresh the references, or maybe the user has been deleted?");
            }

        } else {
            // don't expose the user identifier in the error message, because that error message could be displayed to the user...
            throw new LightUserDataException("File does not exist: $relativePath.");
        }
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
     * Returns whether the given file is private or not.
     *
     * The given file is an absolute path.
     *
     * @param string $file
     * @return bool
     */
    public function isPrivate(string $file): bool
    {
        return file_exists($file . ".private");
    }


    /**
     *
     * This method will do two things:
     *
     * - recreate the correlation between user identifier and directory names in the luda_directory_map table
     * - update the lud_user table (@page(Light_UserDatabase)) to add the extra.directory property
     *
     * You should call this method every time you change the obfuscating method.
     *
     *
     */
    public function refreshReferences()
    {

        /**
         * @var $db SimplePdoWrapperInterface
         */
        $db = $this->container->get("database");

        /**
         * @var $exception \Exception
         */
        $exception = null;
        $res = $db->transaction(function () {

            $api = $this->factory->getDirectoryMapApi();
            /**
             * @var $userDb LightWebsiteUserDatabaseInterface
             */
            $userDb = $this->container->get("user_database");
            $rows = $userDb->getAllUserInfo();
            foreach ($rows as $row) {
                $identifier = $row['identifier'];
                $string = $identifier . $this->obfuscationSecret;
                $algorithmOptions = [];
                $obfuscated = password_hash($string, HashTool::getPasswordHashAlgorithm($this->obfuscationAlgorithm), $algorithmOptions);

                $api->insertDirectoryMap([
                    "obfuscated_name" => $obfuscated,
                    "real_name" => $identifier,
                ], false);


                $extra = $row['extra'];
                $extra[$this->directoryKey] = $obfuscated;
                $row['extra'] = $extra;
                unset($row['password']);
                $userDb->updateUserById($row['id'], $row);
            }


        }, $exception);

        if (false === $res) {
            throw $exception;
        }
    }


    /**
     * Returns the real name of the user directory, which obfuscated name was given,
     * or returns false if no directory matches.
     *
     * @param string $obfuscatedName
     * @return string|false
     * @throws \Exception
     */
    public function getUserRealDirectoryName(string $obfuscatedName)
    {
        $row = $this->factory->getDirectoryMapApi()->getDirectoryMapByObfuscatedName($obfuscatedName);
        if (null !== $row) {
            return $row['real_name'];
        }
        return false;

    }

    /**
     * Returns the obfuscated name of the user directory, which identifier was given,
     * or returns false in case of no match.
     *
     * @param string $userId
     * @return string|false
     * @throws \Exception
     */
    public function getUserObfuscatedDirectoryName(string $userId)
    {
        $row = $this->factory->getDirectoryMapApi()->getDirectoryMapByRealName($userId);
        if (null !== $row) {
            return $row['obfuscated_name'];
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
    public function rename(string $oldRealPath, string $newRealPath, $userOrIdentifier = null)
    {

        $userIdentifier = $this->getUserIdentifierByUserOrIdentifier($userOrIdentifier);

        $realResource = $userIdentifier . "/" . $oldRealPath;

        // updating the database
        $row = $this->factory->getResourceApi()->getResourceByRealPath($realResource, null, true);
        $resourceId = $row['id'];

        $newResource = $userIdentifier . "/" . $newRealPath;
        $row['real_path'] = $newResource;

        // is there already an entry with the new fileName? if so update that entry, otherwise update the old entry.
        $alreadyExistingRow = $this->factory->getResourceApi()->getResourceByRealPath($newResource);
        if (null !== $alreadyExistingRow) {
            // should be the case when you updating a row, using the symbolic file name system with 2svp
            $this->factory->getResourceApi()->deleteResourceById($resourceId);
        } else {
            // should be the case when you insert a row for the first time, using the symbolic file name system with 2svp
            $this->factory->getResourceApi()->updateResourceById($resourceId, $row);
        }


        // updating the filesystem
        $oldFile = $this->rootDir . "/" . $realResource;
        $newFile = $this->rootDir . "/" . $newResource;
        FileSystemTool::move($oldFile, $newFile);

    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the directory path of the current user.
     * @return string
     * @throws \Exception
     */
    protected function getUserDir(): string
    {
        $identifier = $this->getUserIdentifier();
        return $this->rootDir . "/" . $identifier;
    }


    /**
     * Returns the @page(current user) identifier.
     *
     * @return string
     * @throws \Exception
     */
    protected function getUserIdentifier(): string
    {
        $user = $this->currentUser;
        if (null === $user) {
            $user = $this->container->get("user_manager")->getUser();
        }
        return $user->getIdentifier();
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

}