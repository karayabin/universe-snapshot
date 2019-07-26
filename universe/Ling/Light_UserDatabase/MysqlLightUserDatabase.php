<?php


namespace Ling\Light_UserDatabase;


use Ling\Light\Core\Light;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light_Database\LightDatabasePdoWrapper;
use Ling\Light_Initializer\Initializer\LightInitializerInterface;
use Ling\MysqlCreateTableUtil\Column\Column;
use Ling\MysqlCreateTableUtil\Column\PrimaryKeyAutoIncrementedColumn;
use Ling\MysqlCreateTableUtil\MysqlCreateTableUtil;
use Ling\SimplePdoWrapper\Util\MysqlInfoUtil;
use Ling\SqlWizard\Tool\MysqlSerializeTool;

/**
 * The MysqlLightUserDatabase interface.
 *
 * In this implementation, we use a table named "user" by default, with the following columns:
 *
 * - id: a mysql identifier
 * - user_id: the user identifier (could be an email...)
 * - password: the password of the user
 * - rights: the rights of the user (it's a php serialized array)
 * - avatar_url: the url of the avatar
 * - pseudo: a pseudo for the user
 * - extra: any other fields that you might like (it's a php serialized array)
 *
 *
 * The table is created if it doesn't exist, using the @page(initializer service).
 *
 * Also, a root user is created along with the table, so that the maintainer can connect directly to the gui
 * without having to create the user manually (the serialized arrays make it annoying to create user manually
 * even with tools like phpMyAdmin).
 *
 * Tip: to create the root user manually, use the following for serialized keys:
 * - rights: a:1:{i:0;s:1:"*";}
 * - extra: a:0:{}
 *
 *
 *
 *
 */
class MysqlLightUserDatabase implements LightUserDatabaseInterface, LightInitializerInterface
{


    /**
     * This property holds the database for this instance.
     * If null, this class will try to use the default database.
     *
     * @var string|null = null
     */
    protected $database;

    /**
     * This property holds the name table containing all the users.
     *
     * @var string = user
     */
    protected $table;

    /**
     * This property holds the pdoWrapper for this instance.
     * The pdoWrapper is provided by the @page(Light_Database plugin)
     * @var LightDatabasePdoWrapper
     */
    protected $pdoWrapper;


    /**
     * This property holds the root_username for this instance.
     *
     * @var string = root
     */
    protected $root_username;

    /**
     * This property holds the root_password for this instance.
     * @var string = root
     */
    protected $root_password;


    /**
     * Builds the MysqlLightUserDatabase instance.
     */
    public function __construct()
    {
        $this->database = null;
        $this->table = "user";
        $this->pdoWrapper = null;
        $this->root_username = "root";
        $this->root_password = "root";
    }

    /**
     * Sets the pdoWrapper.
     *
     * @param LightDatabasePdoWrapper $pdoWrapper
     */
    public function setPdoWrapper(LightDatabasePdoWrapper $pdoWrapper)
    {
        $this->pdoWrapper = $pdoWrapper;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @implementation
     */
    public function getUserInfo(string $identifier, string $password)
    {
        $table = $this->dQuoteTable($this->table);
        $ret = $this->pdoWrapper->fetch("select * from $table where user_id=:user_id and `password`=:pass", [
            "user_id" => $identifier,
            "pass" => $password,
        ]);
        if (false !== $ret) {
            $this->unserialize($ret);
        }
        return $ret;
    }

    /**
     * @implementation
     */
    public function addUser(string $identifier, string $password, array $userInfo)
    {
        $table = $this->dQuoteTable($this->table);

        unset($userInfo['id']);
        unset($userInfo['user_id']);
        unset($userInfo['password']);

        $array = array_merge($userInfo, [
            "user_id" => $identifier,
            "password" => $password,
        ]);
        $array = array_replace([
            "rights" => [],
            "extra" => [],
            "avatar_url" => "",
            "pseudo" => "",
        ], $array);
        $this->serialize($array);


        $this->pdoWrapper->insert($table, $array);
    }

    /**
     * @implementation
     */
    public function updateUser(string $identifier, array $userInfo)
    {
        $table = $this->dQuoteTable($this->table);

        unset($userInfo['id']);
        unset($userInfo['user_id']);

        $this->serialize($userInfo);


        $this->pdoWrapper->update($table, $userInfo, [
            "user_id" => $identifier,
        ]);
    }

    /**
     * @implementation
     */
    public function deleteUser(string $identifier)
    {
        $table = $this->dQuoteTable($this->table);
        $this->pdoWrapper->delete($table, [
            "user_id" => $identifier,
        ]);
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @implementation
     */
    public function initialize(Light $light, HttpRequestInterface $httpRequest)
    {
        $util = new MysqlInfoUtil();
        $util->setWrapper($this->pdoWrapper);
        /**
         * If the plugin is loaded for the first time,
         * we create the user table, and a root user, so that the user can connect.
         *
         */
        if (false === $util->hasTable($this->table)) {
            $util = MysqlCreateTableUtil::create($this->table, $this->database);
            $util->addColumn(PrimaryKeyAutoIncrementedColumn::create()->name("id"));
            $util->addColumn(Column::create()->name("user_id")->type('varchar')->typeSize(128)->notNullable()->uniqueIndex());
            $util->addColumn(Column::create()->name("password")->type('varchar')->typeSize(64)->notNullable());
            $util->addColumn(Column::create()->name("rights")->type('text')->notNullable());
            $util->addColumn(Column::create()->name("avatar_url")->type('varchar')->typeSize(512)->notNullable());
            $util->addColumn(Column::create()->name("pseudo")->type('varchar')->typeSize(64)->notNullable());
            $util->addColumn(Column::create()->name("extra")->type('text')->notNullable());
            $stmt = $util->render();
            $this->pdoWrapper->executeStatement($stmt);

            $this->addUser($this->root_username, $this->root_password, ['rights' => ['*']]);

        }

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
        MysqlSerializeTool::unserialize($array, ['rights', 'extra']);
    }

    /**
     * Serializes the relevant keys from the given array (i.e. "rights" and "extra" keys).
     *
     * @param array $array
     */
    protected function serialize(array &$array)
    {
        MysqlSerializeTool::serialize($array, ['rights', 'extra']);
    }
}