<?php


namespace Ling\Light_UserDatabase;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\ArrayTool;
use Ling\Bat\FileSystemTool;
use Ling\Light\Core\Light;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light_Initializer\Initializer\LightInitializerInterface;
use Ling\Light_PasswordProtector\Service\LightPasswordProtector;
use Ling\Light_UserDatabase\Api\BabyYaml\BabyYamlPermissionApi;
use Ling\Light_UserDatabase\Api\BabyYaml\BabyYamlPermissionGroupApi;
use Ling\Light_UserDatabase\Api\BabyYaml\BabyYamlPermissionGroupHasPermissionApi;
use Ling\Light_UserDatabase\Api\BabyYaml\BabyYamlUserHasPermissionGroupApi;
use Ling\Light_UserDatabase\Api\PermissionApiInterface;
use Ling\Light_UserDatabase\Api\PermissionGroupApiInterface;
use Ling\Light_UserDatabase\Api\PermissionGroupHasPermissionApiInterface;
use Ling\Light_UserDatabase\Api\UserHasPermissionGroupApiInterface;
use Ling\Light_UserDatabase\Exception\LightUserDatabaseException;
use Ling\Light_UserDatabase\Tool\LightWebsiteUserDatabaseTool;

/**
 * The BabyYamlLightWebsiteUserDatabase interface.
 *
 * In this implementation, we are using a babyYaml file to store the users.
 * There is no default location (i.e. you must set it yourself), but we recommend the following path:
 * - $app_dir/config/user_database/database.byml
 *
 *
 * The file is created if it doesn't exist (provided that you have set the file location), using the @page(initializer service).
 *
 * Also, a root user is created along with the file, so that the maintainer can connect directly to the gui
 * when this plugin is first installed, and without having to create the user manually.
 *
 *
 *
 *
 *
 *
 */
class BabyYamlLightWebsiteUserDatabase implements LightWebsiteUserDatabaseInterface, LightInitializerInterface
{

    /**
     * This property holds the path to the babyYaml file containing the user database.
     * @var string
     */
    protected $file;


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
     * This property holds the registered new user's profiles for this instance.
     * @var array
     */
    protected $newUserProfiles;


    /**
     * This property holds the cached/configured _permissionApi for this instance.
     * @var PermissionApiInterface
     */
    protected $_permissionApi;

    /**
     * This property holds the cached/configured _permissionGroupApi for this instance.
     * @var PermissionGroupApiInterface
     */
    protected $_permissionGroupApi;

    /**
     * This property holds the cached/configured _permissionGroupHasPermissionApi for this instance.
     * @var PermissionGroupHasPermissionApiInterface
     */
    protected $_permissionGroupHasPermissionApi;

    /**
     * This property holds the cached/configured _userHasPermissionGroupApi for this instance.
     * @var UserHasPermissionGroupApiInterface
     */
    protected $_userHasPermissionGroupApi;


    /**
     * Builds the BabyYamlLightUserDatabase instance.
     */
    public function __construct()
    {
        $this->file = null;
        $this->root_identifier = "root";
        $this->root_password = "root";
        $this->root_pseudo = "root";
        $this->root_avatar_url = "";
        $this->root_extra = [];
        $this->passwordProtector = null;
        $this->newUserProfiles = [];
        $this->_permissionApi = null;
        $this->_permissionGroupApi = null;
        $this->_permissionGroupHasPermissionApi = null;
        $this->_userHasPermissionGroupApi = null;
    }

    /**
     * Sets the file.
     *
     * @param string $file
     */
    public function setFile(string $file)
    {
        $this->file = $file;
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @implementation
     */
    public function getUserInfoByCredentials(string $identifier, string $password)
    {
        $users = $this->getUsers();
        foreach ($users as $user) {
            if ($identifier === $user['identifier']) {


                // check the password
                if (null === $this->passwordProtector) {
                    if ($password !== $user['password']) {
                        return false;
                    }
                } else {
                    if (false === $this->passwordProtector->passwordVerify($password, $user['password'])) {
                        return false;
                    }
                }


                //--------------------------------------------
                // ADDING PERMISSIONS TO THE USER INFO ARRAY
                //--------------------------------------------
                $rights = $this->getPermissionApi()->getPermissionNamesByUserId($user['id']);
                if (in_array('*', $rights, true)) {
                    $rights = ["*"];
                }
                $user['rights'] = $rights;
                return $user;
            }
        }
        return false;
    }

    /**
     * @implementation
     */
    public function getUserInfoByIdentifier(string $identifier)
    {
        $users = $this->getUsers();
        foreach ($users as $user) {
            if ($identifier === $user['identifier']) {
                return $user;
            }
        }
        return false;
    }

    /**
     * @implementation
     */
    public function getUserInfoById(int $id)
    {
        $users = $this->getUsers();
        foreach ($users as $user) {
            if ($id === $user['id']) {
                return $user;
            }
        }
        return false;
    }

    /**
     * @implementation
     */
    public function addUser(array $userInfo)
    {
        $users = $this->getUsers();
        $defaults = [
            "identifier" => "",
            "password" => "",
            "pseudo" => "",
            "avatar_url" => "",
            "extra" => [],
        ];
        $array = ArrayTool::superimpose($userInfo, $defaults);

        if (null !== $this->passwordProtector) {
            $array['password'] = $this->passwordProtector->passwordHash($array['password']);
        }


        $identifier = $array['identifier'];

        // checking that the identifier is unique
        $id = 1;
        foreach ($users as $user) {
            if ($identifier === $user['identifier']) {
                throw new LightUserDatabaseException("An user with the identifier $identifier already exists.");
            }
            if ($user['id'] > $id) {
                $id = (int)$user['id'];
            }
        }

        $userInfo = array_replace($userInfo, [
            "id" => ++$id,
        ]);
        $users[] = $userInfo;

        $this->updateUsers($users);


        //--------------------------------------------
        // PROFILES
        //--------------------------------------------
        $allProfiles = LightWebsiteUserDatabaseTool::resolveProfiles($this->newUserProfiles, $userInfo);

        foreach ($allProfiles as $profile) {
            $profileId = $this->getPermissionGroupApi()->getPermissionGroupIdByName($profile);
            $this->getUserHasPermissionGroupApi()->insertUserHasPermissionGroup([
                "user_id" => $id,
                "permission_group_id" => $profileId,
            ]);
        }

        return (int)$id;

    }

    /**
     * @implementation
     */
    public function updateUser(string $identifier, array $userInfo)
    {
        $users = $this->getUsers();
        foreach ($users as $index => $user) {
            if ($identifier === $user['identifier']) {

                unset($userInfo['id']); // make sure the user cannot update her id.
                unset($userInfo['identifier']); // make sure the user cannot update her identifier.


                if (null !== $this->passwordProtector) {
                    if (array_key_exists("password", $userInfo)) {
                        $userInfo['password'] = $this->passwordProtector->passwordHash($userInfo['password']);
                    }
                }
                $users[$index] = ArrayTool::superimpose($userInfo, $user);
                break;
            }
        }
        $this->updateUsers($users);
    }

    /**
     * @implementation
     */
    public function updateUserById(int $id, array $userInfo)
    {
        $users = $this->getUsers();
        foreach ($users as $index => $user) {
            if ($id === $user['id']) {

                unset($userInfo['id']); // make sure the user cannot update her id.
                unset($userInfo['identifier']); // make sure the user cannot update her identifier.


                if (null !== $this->passwordProtector) {
                    if (array_key_exists("password", $userInfo)) {
                        $userInfo['password'] = $this->passwordProtector->passwordHash($userInfo['password']);
                    }
                }


                $users[$index] = ArrayTool::superimpose($userInfo, $user);
                break;
            }
        }
        $this->updateUsers($users);
    }

    /**
     * @implementation
     */
    public function deleteUser(string $identifier)
    {
        $users = $this->getUsers();
        foreach ($users as $index => $user) {
            if ($identifier === $user['identifier']) {
                unset($users[$index]);
                break;
            }
        }
        $this->updateUsers($users);
    }

    /**
     * @implementation
     */
    public function deleteUserById(int $id)
    {
        $users = $this->getUsers();
        foreach ($users as $index => $user) {
            if ($id === $user['id']) {
                unset($users[$index]);
                break;
            }
        }
        $this->updateUsers($users);
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @implementation
     */
    public function registerNewUserProfile($profile)
    {
        $this->newUserProfiles[] = $profile;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @implementation
     */
    public function getPermissionApi(): PermissionApiInterface
    {
        if (null === $this->_permissionApi) {
            $this->_permissionApi = new BabyYamlPermissionApi();
            $this->_permissionApi->setFile($this->file);
        }
        return $this->_permissionApi;
    }

    /**
     * @implementation
     */
    public function getPermissionGroupApi(): PermissionGroupApiInterface
    {
        if (null === $this->_permissionGroupApi) {
            $this->_permissionGroupApi = new BabyYamlPermissionGroupApi();
            $this->_permissionGroupApi->setFile($this->file);
        }
        return $this->_permissionGroupApi;
    }

    /**
     * @implementation
     */
    public function getPermissionGroupHasPermissionApi(): PermissionGroupHasPermissionApiInterface
    {
        if (null === $this->_permissionGroupHasPermissionApi) {
            $this->_permissionGroupHasPermissionApi = new BabyYamlPermissionGroupHasPermissionApi();
            $this->_permissionGroupHasPermissionApi->setFile($this->file);
        }
        return $this->_permissionGroupHasPermissionApi;
    }

    /**
     * @implementation
     */
    public function getUserHasPermissionGroupApi(): UserHasPermissionGroupApiInterface
    {
        if (null === $this->_userHasPermissionGroupApi) {
            $this->_userHasPermissionGroupApi = new BabyYamlUserHasPermissionGroupApi();
            $this->_userHasPermissionGroupApi->setFile($this->file);
        }
        return $this->_userHasPermissionGroupApi;
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @implementation
     */
    public function initialize(Light $light, HttpRequestInterface $httpRequest)
    {
        if (null !== $this->file) {


            /**
             * In this implementation, we go all in or all out.
             * If the file doesn't exist, we create it,
             * if it does, we do nothing.
             *
             * In other words, to trigger the core of this initialize method,
             * one needs to remove the database file first.
             */
            if (false === is_file($this->file)) {


                $data = BabyYamlUtil::readFile(__DIR__ . "/assets/fixtures/database-model.byml");


                $password = $this->root_password;
                if (null !== $this->passwordProtector) {
                    $password = $this->passwordProtector->passwordHash($password);
                }


                $data["users"][] = [
                    'id' => 1, // note: the 1 is hardcoded in the database model
                    'identifier' => $this->root_identifier,
                    'pseudo' => $this->root_pseudo,
                    'password' => $password,
                    'avatar_url' => $this->root_avatar_url,
                    'extra' => $this->root_extra,
                ];
                FileSystemTool::mkfile($this->file, BabyYamlUtil::getBabyYamlString($data));
            }
        } else {
            throw new LightUserDatabaseException("The file location is not set.");
        }

    }

    //--------------------------------------------
    //
    //--------------------------------------------
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
     * Checks that the file has been set correctly,
     * and returns the list of all users.
     *
     * @throws LightUserDatabaseException
     */
    protected function getUsers()
    {
        if (null === $this->file) {
            throw new LightUserDatabaseException("File not set.");
        }
        $conf = BabyYamlUtil::readFile($this->file);
        return $conf['users'];
    }


    /**
     * Update the database with the new given users array.
     *
     * @param array $users
     */
    protected function updateUsers(array $users)
    {
        BabyYamlUtil::writeFile(["users" => $users], $this->file);
    }
}