<?php


namespace Authenticate\UserStore;


use ArrayToString\ArrayToStringTool;
use Authenticate\User\User;
use Authenticate\User\UserInterface;
use Bat\FileSystemTool;

/**
 * This class stores the user in a file.
 *
 *
 * $users = [
 *      "id_of_me_user" => [
 *          'name' => "me",
 *          'pass' => "me",
 *          'profile' => "root",
 *          //        'extra' => [],
 *      ],
 * ];
 *
 */
class FileUserStore implements UserStoreInterface
{

    private $file;

    public static function create()
    {
        return new static();
    }

    public function setFile($file)
    {
        $this->file = $file;
        return $this;
    }


    /**
     * @return false|UserInterface
     */
    public function getUserByCredentials($name, $pass)
    {
        $store = $this->getStore();
        foreach ($store as $id => $userInfo) {
            if (
                $name === $userInfo['name'] &&
                $pass === $userInfo['pass']
            ) {
                return $this->getUserByInfo($id, $userInfo);
            }
        }
        return false;
    }

    /**
     * @return false|UserInterface
     */
    public function getUser($id)
    {
        $store = $this->getStore();
        if (array_key_exists($id, $store)) {
            $userInfo = $store[$id];
            return $this->getUserByInfo($id, $userInfo);
        }
        return false;
    }


    public function getUsers()
    {
        return $this->getStore();
    }

    /**
     * $profile: the profile string
     * @return string, the user id
     */
    public function createUser($name, $pass, $profile, array $extra = [])
    {
        $users = $this->getStore();

        // find unique index (next natural index)
        $max = 0;
        foreach ($users as $k => $v) {
            if (is_integer($k) && $k > $max) {
                $max = $k;
            }
        }
        $index = $max + 1;


        $users[$index] = [
            "name" => $name,
            "pass" => $pass,
            "profile" => $profile,
            "extra" => $extra,
        ];
        return $this->writeUsers($users);
    }

    public function destroyUser($id)
    {
        $users = $this->getStore();
        unset($users[$id]);
        return $this->writeUsers($users);
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function getStore()
    {
        $users = [];
        if (file_exists($this->file)) {
            include $this->file;
        }
        return $users;
    }

    private function getUserByInfo($id, array $info)
    {

        $user = User::create()
            ->setId($id)
            ->setProfile($info['profile'])
            ->setName($info['name'])
            ->setPass($info['pass']);
        if (array_key_exists("extra", $info)) {
            $user->setExtra($info['extra']);
        }
        return $user;
    }

    private function writeUsers(array $users)
    {
        $sUsers = ArrayToStringTool::toPhpArray($users);
        $s = <<<EEE
<?php

\$users = $sUsers;
EEE;
        return FileSystemTool::mkfile($this->file, $s);

    }
}