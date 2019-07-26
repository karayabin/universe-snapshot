<?php


namespace Ling\Light_UserDatabase;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Light_UserDatabase\Exception\LightUserDatabaseException;

/**
 * The BabyYamlLightUserDatabase interface.
 *
 * In this implementation:
 * - the key for the user identifier is: "id"
 * - the key for the user password is: "pass"
 *
 *
 */
class BabyYamlLightUserDatabase implements LightUserDatabaseInterface
{

    /**
     * This property holds the path to the babyYaml file containing the user database.
     * @var string
     */
    protected $file;


    /**
     * Builds the BabyYamlLightUserDatabase instance.
     */
    public function __construct()
    {
        $this->file = null;
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
    public function getUserInfo(string $identifier, string $password)
    {
        $users = $this->getUsers();
        foreach ($users as $user) {
            if ($identifier === $user['id'] && $password === $user['pass']) {
                return $user;
            }
        }
        return false;
    }

    /**
     * @implementation
     */
    public function addUser(string $identifier, string $password, array $userInfo)
    {
        $users = $this->getUsers();

        // checking that the identifier is unique
        foreach ($users as $user) {
            if ($identifier === $user['id']) {
                throw new LightUserDatabaseException("An user with the identifier $identifier already exists.");
            }
        }

        $users[] = array_merge($userInfo, [
            "id" => $identifier,
            "pass" => $password,
        ]);
        $this->updateUsers($users);

    }

    /**
     * @implementation
     */
    public function updateUser(string $identifier, array $userInfo)
    {
        $users = $this->getUsers();
        foreach ($users as $index => $user) {
            if ($identifier === $user['id']) {
                unset($userInfo['id']); // make sure the user cannot update her identifier.
                $users[$index] = array_merge(["id" => $identifier], $userInfo);
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
            if ($identifier === $user['id']) {
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