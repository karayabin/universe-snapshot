<?php


namespace Ling\Light_UserDatabase;


use Ling\Bat\ArrayTool;
use Ling\Light\Core\Light;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light_Database\LightDatabasePdoWrapper;
use Ling\Light_Initializer\Initializer\LightInitializerInterface;
use Ling\Light_PasswordProtector\Service\LightPasswordProtector;
use Ling\MysqlCreateTableUtil\Column\Column;
use Ling\MysqlCreateTableUtil\Column\PrimaryKeyAutoIncrementedColumn;
use Ling\MysqlCreateTableUtil\MysqlCreateTableUtil;
use Ling\SimplePdoWrapper\Util\MysqlInfoUtil;
use Ling\SqlWizard\Tool\MysqlSerializeTool;

/**
 * The MysqlLightWebsiteUserDatabase interface.
 *
 * In this implementation, we use a table named "user" by default.
 *
 * The "user" table is created if it doesn't exist, using the @page(initializer service).
 *
 * Also, a root user is created along with the table, so that the maintainer can connect directly to the gui
 * without having to create the user manually (the serialized arrays make it annoying to create user manually
 * even with tools like phpMyAdmin).
 *
 * Tip: to create the root user manually (via phpMyAdmin for instance), use the following for serialized keys:
 * - rights: a:1:{i:0;s:1:"*";}
 * - extra: a:0:{}
 *
 *
 *
 *
 */
class MysqlLightWebsiteUserDatabase implements LightWebsiteUserDatabaseInterface, LightInitializerInterface
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
     * Builds the MysqlLightUserDatabase instance.
     */
    public function __construct()
    {
        $this->database = null;
        $this->table = "user";
        $this->pdoWrapper = null;
        $this->root_identifier = "root";
        $this->root_password = "root";
        $this->root_pseudo = "root";
        $this->root_avatar_url = "";
        $this->root_extra = [];
        $this->passwordProtector = null;
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
            "identifier" => "",
            "password" => "",
            "pseudo" => "",
            "avatar_url" => "",
            "rights" => [],
            "extra" => [],
        ];
        $array = ArrayTool::superimpose($userInfo, $defaults);

        if (null !== $this->passwordProtector) {
            $array['password'] = $this->passwordProtector->passwordHash($array['password']);
        }


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
            $util->addColumn(Column::create()->name("identifier")->type('varchar')->typeSize(128)->notNullable()->uniqueIndex());
            $util->addColumn(Column::create()->name("pseudo")->type('varchar')->typeSize(64)->notNullable());
            $util->addColumn(Column::create()->name("password")->type('varchar')->typeSize(64)->notNullable());
            $util->addColumn(Column::create()->name("avatar_url")->type('varchar')->typeSize(512)->notNullable());
            $util->addColumn(Column::create()->name("rights")->type('text')->notNullable());
            $util->addColumn(Column::create()->name("extra")->type('text')->notNullable());
            $stmt = $util->render();
            $this->pdoWrapper->executeStatement($stmt);

            $this->addUser([
                'identifier' => $this->root_identifier,
                'pseudo' => $this->root_pseudo,
                'password' => $this->root_password,
                'avatar_url' => $this->root_avatar_url,
                'extra' => $this->root_extra,
                'rights' => ['*'],
            ]);

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