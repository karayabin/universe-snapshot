<?php


namespace Authenticate\User;


class User implements UserInterface
{

    private $_id;
    private $_profile;
    private $_name;
    private $_pass;
    private $_extra;

    public function __construct()
    {
        $this->_extra = [];
    }

    public static function create()
    {
        return new static();
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    public function id()
    {
        return $this->_id;
    }

    public function profile()
    {
        return $this->_profile;
    }

    public function name()
    {
        return $this->_name;
    }

    public function pass()
    {
        return $this->_pass;
    }

    public function get($key, $default = null)
    {
        if (array_key_exists($key, $this->_extra)) {
            return $this->_extra[$key];
        }
        return $default;
    }

    /**
     * @return array, all extra information about the user
     */
    public function all()
    {
        return array_merge($this->_extra, [
            "id" => $this->_id,
            "profile" => $this->_profile,
            "name" => $this->_name,
            "pass" => $this->_pass,
        ]);
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    public function setId($id)
    {
        $this->_id = $id;
        return $this;
    }

    public function setProfile($profile)
    {
        $this->_profile = $profile;
        return $this;
    }

    public function setName($name)
    {
        $this->_name = $name;
        return $this;
    }

    public function setPass($pass)
    {
        $this->_pass = $pass;
        return $this;
    }

    public function setExtra(array $extra)
    {
        $this->_extra = $extra;
        return $this;
    }
}