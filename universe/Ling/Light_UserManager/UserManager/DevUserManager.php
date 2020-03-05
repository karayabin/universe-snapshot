<?php


namespace Ling\Light_UserManager\UserManager;


use Ling\Light_User\LightUserInterface;
use Ling\Light_UserManager\Exception\LightUserManagerException;

/**
 * The DevUserManager class.
 * This class was created by a dev for a dev.
 *
 * It just returns the user instance that we provide to it beforehand.
 *
 *
 */
class DevUserManager implements LightUserManagerInterface
{


    /**
     * This property holds the user instance.
     *
     * @var LightUserInterface
     */
    protected $user;


    /**
     * Builds the DevUserManager instance.
     */
    public function __construct()
    {
        $this->user = null;
    }


    /**
     * @implementation
     */
    public function getUser(): LightUserInterface
    {
        if (null === $this->user) {
            throw new LightUserManagerException("User not set.");
        }
        return $this->user;
    }

    /**
     * @implementation
     */
    public function destroyUser()
    {
        $this->user = null;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the user.
     *
     * @param LightUserInterface $user
     */
    public function setUser(LightUserInterface $user)
    {
        $this->user = $user;
    }


}