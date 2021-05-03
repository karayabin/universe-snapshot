<?php


namespace Ling\Light_UserDatabase;


use Ling\ArrayToString\ArrayToStringTool;
use Ling\Bat\ArrayTool;
use Ling\Light\Events\LightEvent;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_Events\Service\LightEventsService;
use Ling\Light_PasswordProtector\Service\LightPasswordProtector;
use Ling\Light_PluginInstaller\PluginInstaller\PluginInstallerInterface;
use Ling\Light_PluginInstaller\Service\LightPluginInstallerService;
use Ling\Light_UserDatabase\Api\Custom\CustomLightUserDatabaseApiFactory;
use Ling\Light_UserDatabase\Exception\LightUserDatabaseException;
use Ling\SimplePdoWrapper\Util\Where;
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
class MysqlLightWebsiteUserDatabase implements LightWebsiteUserDatabaseInterface
{


    /**
     * This property holds the database for this instance.
     * If null, this class will try to use the default database.
     *
     * @var string|null = null
     */
    protected $database;




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
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * This property holds the pdoWrapper for this instance.
     * @var LightDatabaseService
     */
    protected $pdoWrapper;


    /**
     * This property holds the factory for this instance.
     * @var CustomLightUserDatabaseApiFactory
     */
    private $factory;




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
     * Builds the MysqlLightUserDatabase instance.
     */
    public function __construct()
    {

        $this->database = null;
        $this->table = "lud_user";


        $this->passwordProtector = null;
        $this->isInstallMode = false;


        $this->factory = null;
        $this->container = null;
        $this->pdoWrapper = null;
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
            $rights = $this->getFactory()->getPermissionApi()->getPermissionNamesByUserId($ret['id']);
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
            "email" => "",
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
            $dispatcher->dispatch('Ling.Light_UserDatabase.on_new_user_before', $event);
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
    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
        /**
         * @var $databaseService LightDatabaseService
         */
        $databaseService = $container->get("database");
        $this->pdoWrapper = $databaseService;
    }


    /**
     * Returns the factory for this plugin's api.
     *
     * @return CustomLightUserDatabaseApiFactory
     */
    public function getFactory(): CustomLightUserDatabaseApiFactory
    {
        if (null === $this->factory) {
            $this->factory = new CustomLightUserDatabaseApiFactory();
            $this->factory->setContainer($this->container);
            $this->factory->setPdoWrapper($this->pdoWrapper);
        }
        return $this->factory;
    }


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