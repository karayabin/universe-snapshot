<?php


namespace Ling\Light_UserDatabase;


use Ling\ArrayToString\ArrayToStringTool;
use Ling\Bat\ArrayTool;
use Ling\Light\Events\LightEvent;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Events\Service\LightEventsService;
use Ling\Light_PasswordProtector\Service\LightPasswordProtector;
use Ling\Light_PluginInstaller\PluginInstaller\PluginInstallerInterface;
use Ling\Light_PluginInstaller\Service\LightPluginInstallerService;
use Ling\Light_UserDatabase\Api\Mysql\LightUserDatabaseApiFactory;
use Ling\Light_UserDatabase\Exception\LightUserDatabaseException;
use Ling\SqlWizard\Tool\MysqlSerializeTool;

/**
 * The MysqlLightWebsiteUserDatabase interface.
 *
 * In this implementation, we create the tables if they don't exist, using the @page(initializer service).
 * The created tables are the ones defined in the @page(Light_UserDatabase conception notes).
 *
 *
 * Also, a root user is created along with the "user" table, so that the maintainer can connect directly to the gui
 * without having to create the user manually (the serialized arrays make it annoying to create user manually
 * even with tools like phpMyAdmin).
 *
 *
 *
 */
class MysqlLightWebsiteUserDatabase extends LightUserDatabaseApiFactory implements LightWebsiteUserDatabaseInterface, PluginInstallerInterface
{


    /**
     * This property holds the database for this instance.
     * If null, this class will try to use the default database.
     *
     * @var string|null = null
     */
    protected $database;


    /**
     * This property holds the identifier for the default root user.
     *
     * @var string = root
     */
    protected $root_identifier;

    /**
     * This property holds the password for the default root user.
     * @var string = root
     */
    protected $root_password;


    /**
     * This property holds the pseudo for the default root user.
     * @var string = root
     */
    protected $root_pseudo;

    /**
     * This property holds the avatar_url for the default root user.
     * @var string = ""
     */
    protected $root_avatar_url;

    /**
     * This property holds the extra array for the default root user.
     * @var array
     */
    protected $root_extra;


    /**
     * This property holds the @page(passwordProtector) for this instance.
     * If set, the password will automatically be hashed when necessary, which concerns the following methods:
     * - getUserInfoByCredentials
     * - addUser
     * - updateUser
     * - updateUserById
     *
     *
     *
     * @var LightPasswordProtector|null
     */
    protected $passwordProtector;


    /**
     * This property holds the name table containing all the users.
     *
     * @var string = lud_user
     */
    private $table;

    /**
     * This property holds the isInstallMode for this instance.
     * @var bool=false
     */
    private $isInstallMode;

    /**
     * This property holds the forceInstall for this instance.
     * @var bool = false
     */
    private $forceInstall;


    /**
     * Builds the MysqlLightUserDatabase instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->database = null;
        $this->table = "lud_user";

        $this->root_identifier = "root";
        $this->root_password = "root";
        $this->root_pseudo = "root";
        $this->root_avatar_url = "";
        $this->root_extra = [];
        $this->passwordProtector = null;
        $this->isInstallMode = false;
        $this->forceInstall = false;
    }

    /**
     * @overrides
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
        $this->pdoWrapper = $container->get("database");
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @implementation
     */
    public function getUserInfoByCredentials(string $identifier, string $password)
    {


        $table = $this->dQuoteTable($this->table);
        $ret = $this->pdoWrapper->fetch("select * from $table where identifier=:identifier", [
            "identifier" => $identifier,
        ]);


        if (false !== $ret) {

            // check the password
            if (null === $this->passwordProtector) {
                if ($password !== $ret['password']) {
                    return false;
                }
            } else {
                if (false === $this->passwordProtector->passwordVerify($password, $ret['password'])) {
                    return false;
                }
            }

            $this->unserialize($ret);


            //--------------------------------------------
            // ADDING PERMISSIONS TO THE USER INFO ARRAY
            //--------------------------------------------
            $rights = $this->getPermissionApi()->getPermissionNamesByUserId($ret['id']);
            if (in_array('*', $rights, true)) {
                $rights = ["*"];
            }
            $ret['rights'] = $rights;
        }
        return $ret;
    }

    /**
     * @implementation
     */
    public function getUserInfoByIdentifier(string $identifier)
    {
        $table = $this->dQuoteTable($this->table);
        $ret = $this->pdoWrapper->fetch("select * from $table where identifier=:identifier", [
            "identifier" => $identifier,
        ]);
        if (false !== $ret) {
            $this->unserialize($ret);
        }
        return $ret;
    }

    /**
     * @implementation
     */
    public function getUserInfoById(int $id)
    {
        $table = $this->dQuoteTable($this->table);
        $ret = $this->pdoWrapper->fetch("select * from $table where id=$id");
        if (false !== $ret) {
            $this->unserialize($ret);
        }
        return $ret;
    }

    /**
     * @implementation
     */
    public function addUser(array $userInfo)
    {
        $table = $this->dQuoteTable($this->table);
        $defaults = [
            "user_group_id" => null,
            "identifier" => "",
            "password" => "",
            "pseudo" => "",
            "avatar_url" => "",
            "extra" => [],
        ];
        $array = ArrayTool::superimpose($userInfo, $defaults);


        if (false === $this->isInstallMode) {
            /**
             * @var $dispatcher LightEventsService
             */
            $dispatcher = $this->container->get('events');
            $event = LightEvent::createByContainer($this->container);
            $event->setVar('userInfo', $array);
            $dispatcher->dispatch('Light_UserDatabase.on_new_user_before', $event);
            $array = $event->getVar('userInfo');
        }


        if (null !== $this->passwordProtector) {
            $array['password'] = $this->passwordProtector->passwordHash($array['password']);
        }

        $this->serialize($array);
        $userId = $this->pdoWrapper->insert($table, $array);
        if (false === $userId) {
            $error = $this->pdoWrapper->getError();
            $sErrorDetails = '';
            if (null !== $error) {
                $sErrorDetails = ArrayToStringTool::toInlinePhpArray($error);
            }
            throw new LightUserDatabaseException("An error occurred with the database while inserting the user " . $array['identifier'] . ": $sErrorDetails.");
        }

        return (int)$userId;
    }

    /**
     * @implementation
     */
    public function updateUser(string $identifier, array $userInfo)
    {
        $table = $this->dQuoteTable($this->table);

        unset($userInfo['id']);
        unset($userInfo['identifier']);


        if (null !== $this->passwordProtector) {
            if (array_key_exists("password", $userInfo)) {
                $userInfo['password'] = $this->passwordProtector->passwordHash($userInfo['password']);
            }
        }

        $this->serialize($userInfo);


        $this->pdoWrapper->update($table, $userInfo, [
            "identifier" => $identifier,
        ]);
    }


    /**
     * @implementation
     */
    public function updateUserById(int $id, array $userInfo)
    {
        $table = $this->dQuoteTable($this->table);

        unset($userInfo['id']);
        unset($userInfo['identifier']);

        if (null !== $this->passwordProtector) {
            if (array_key_exists("password", $userInfo)) {
                $userInfo['password'] = $this->passwordProtector->passwordHash($userInfo['password']);
            }
        }
        $this->serialize($userInfo);


        $this->pdoWrapper->update($table, $userInfo, [
            "id" => $id,
        ]);
    }

    /**
     * @implementation
     */
    public function deleteUser(string $identifier)
    {
        $table = $this->dQuoteTable($this->table);
        $this->pdoWrapper->delete($table, [
            "identifier" => $identifier,
        ]);
    }

    /**
     * @implementation
     */
    public function deleteUserById(int $id)
    {
        $table = $this->dQuoteTable($this->table);
        $this->pdoWrapper->delete($table, [
            "id" => $id,
        ]);
    }


    /**
     * @implementation
     */
    public function getAllUserInfo(): array
    {
        $ret = [];
        $table = $this->dQuoteTable($this->table);
        $rows = $this->pdoWrapper->fetchAll("select * from $table");
        foreach ($rows as $k => $row) {
            $this->unserialize($row);
            $ret[$k] = $row;
        }
        return $ret;
    }


    /**
     * @implementation
     */
    public function getAllUserIds(): array
    {
        $ret = [];
        $table = $this->dQuoteTable($this->table);
        return $this->pdoWrapper->fetchAll("select id from $table", [], \PDO::FETCH_COLUMN);
    }

    //--------------------------------------------
    //
    //--------------------------------------------





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

        if (true === $this->forceInstall || false === $installer->hasTable($this->table)) {


            $this->isInstallMode = true; // we don't want other plugins to hook the new user creation.

            /**
             * We cannot put this statement inside the transaction, because of the mysql implicit commit rule:
             * https://dev.mysql.com/doc/refman/8.0/en/implicit-commit.html
             */
            $this->pdoWrapper->executeStatement(file_get_contents(__DIR__ . "/assets/fixtures/recreate-structure.sql"));


            /**
             * @var $exception \Exception
             */
            $exception = null;
            $res = $this->pdoWrapper->transaction(function () {


                /**
                 * We want to create the following:
                 * - the "default" user group
                 * - the "root" user (with group default)
                 * - the "root" permission group
                 * - the "*" permission
                 * - bind "*" permission to "root" permission group
                 * - bind "root" user to "root" permission group
                 *
                 */
                // default user group
                $userGroupId = $this->getUserGroupApi()->insertUserGroup([
                    "name" => "default",
                ]);


                // root user
                $userId = $this->addUser([
                    'user_group_id' => $userGroupId,
                    'identifier' => $this->root_identifier,
                    'pseudo' => $this->root_pseudo,
                    'password' => $this->root_password,
                    'avatar_url' => $this->root_avatar_url,
                    'extra' => $this->root_extra,
                ]);


                // root permission group
                $permGroupId = $this->getPermissionGroupApi()->insertPermissionGroup([
                    'name' => 'root',
                ]);


                // the * permission
                $permId = $this->getPermissionApi()->insertPermission([
                    'name' => '*',
                ]);

                // bind * permission to root permission group
                $this->getPermissionGroupHasPermissionApi()->insertPermissionGroupHasPermission([
                    "permission_group_id" => $permGroupId,
                    "permission_id" => $permId,
                ]);

                // bind root user to root permission group
                $this->getUserHasPermissionGroupApi()->insertUserHasPermissionGroup([
                    'user_id' => $userId,
                    'permission_group_id' => $permGroupId,
                ]);


            }, $exception);

            $this->isInstallMode = false;

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
        $this->pdoWrapper->executeStatement("DROP table if exists lud_permission_group_has_permission");
        $this->pdoWrapper->executeStatement("DROP table if exists lud_user_has_permission_group");
        $this->pdoWrapper->executeStatement("DROP table if exists lud_permission_group");
        $this->pdoWrapper->executeStatement("DROP table if exists lud_permission");
        $this->pdoWrapper->executeStatement("DROP table if exists lud_user_group_has_plugin_option");
        $this->pdoWrapper->executeStatement("DROP table if exists lud_plugin_option");
        $this->pdoWrapper->executeStatement("DROP table if exists " . $this->table);
        $this->pdoWrapper->executeStatement("DROP table if exists lud_user_group");
    }


    /**
     * @implementation
     */
    public function getDependencies(): array
    {
        return [];
    }





    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the database.
     *
     * @param string|null $database
     */
    public function setDatabase(?string $database)
    {
        $this->database = $database;
    }

    /**
     * Sets the table.
     *
     * @param string $table
     */
    public function setTable(string $table)
    {
        $this->table = $table;
    }

    /**
     * Sets the root_identifier.
     *
     * @param string $root_identifier
     */
    public function setRootIdentifier(string $root_identifier)
    {
        $this->root_identifier = $root_identifier;
    }

    /**
     * Sets the root_password.
     *
     * @param string $root_password
     */
    public function setRootPassword(string $root_password)
    {
        $this->root_password = $root_password;
    }

    /**
     * Sets the root_pseudo.
     *
     * @param string $root_pseudo
     */
    public function setRootPseudo(string $root_pseudo)
    {
        $this->root_pseudo = $root_pseudo;
    }

    /**
     * Sets the root_avatar_url.
     *
     * @param string $root_avatar_url
     */
    public function setRootAvatarUrl(string $root_avatar_url)
    {
        $this->root_avatar_url = $root_avatar_url;
    }

    /**
     * Sets the root_extra.
     *
     * @param array $root_extra
     */
    public function setRootExtra(array $root_extra)
    {
        $this->root_extra = $root_extra;
    }

    /**
     * Sets the passwordProtector.
     *
     * @param LightPasswordProtector $passwordProtector
     */
    public function setPasswordProtector(LightPasswordProtector $passwordProtector)
    {
        $this->passwordProtector = $passwordProtector;
    }


    /**
     * Returns the table name.
     *
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the double quote protected full version of the given table.
     * The result is meant to be used inside an sql query wrapped with double quotes.
     *
     *
     * @param string $table
     * @return string
     */
    protected function dQuoteTable(string $table)
    {
        $table = '`' . $table . '`';
        if (null !== $this->database) {
            $table = $this->database . "." . $table;
        }
        return $table;
    }


    /**
     * Unserializes the relevant keys from the given array (i.e. "rights" and "extra" keys).
     *
     * @param array $array
     */
    protected function unserialize(array &$array)
    {
        MysqlSerializeTool::unserialize($array, ['extra']);
    }

    /**
     * Serializes the relevant keys from the given array (i.e. "rights" and "extra" keys).
     *
     * @param array $array
     */
    protected function serialize(array &$array)
    {
        MysqlSerializeTool::serialize($array, ['extra']);
    }
}