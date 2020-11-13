<?php


namespace Ling\Light_UserManager\UserManager;


use Ling\Light_User\LightUserInterface;
use Ling\Light_User\LightWebsiteUser;
use Ling\Light_User\RefreshableLightUserInterface;
use Ling\Light_UserManager\Exception\LightUserManagerException;

/**
 * The WebsiteUserManager class.
 *
 * This class returns a refreshed website user ( @page(LightWebsiteUser) ).
 *
 * Under the hood, the website user is stored in a php session.
 *
 *
 *
 *
 *
 */
class WebsiteUserManager implements LightUserManagerInterface
{


    /**
     * This property holds the sessionKey for this instance.
     * The sessionKey is the key in the php session which holds
     * the user object.
     *
     *
     * @var string = WebsiteUserManager
     */
    protected $sessionKey;

    /**
     * Builds the WebsiteUserManager instance.
     */
    public function __construct()
    {
        $this->sessionKey = "WebsiteUserManager";
    }



    //--------------------------------------------
    // LightUserManagerInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function getUser(): LightUserInterface
    {
        $this->startPhpSession();

        if (array_key_exists($this->sessionKey, $_SESSION)) {
            $sessionUser = $_SESSION[$this->sessionKey];
        } else {
            $sessionUser = new LightWebsiteUser();
            $_SESSION[$this->sessionKey] = $sessionUser;
        }


        if ($sessionUser instanceof RefreshableLightUserInterface) {
            $sessionUser->refresh();
        }

        return $sessionUser;
    }




    /**
     * @implementation
     */
    public function destroyUser()
    {
        $this->startPhpSession();
        unset($_SESSION[$this->sessionKey]);
    }



    //--------------------------------------------
    //
    //--------------------------------------------

    /**
     * Returns a valid website user, or throws an exception if either:
     * - the user is not valid
     * - the user is not a LightWebsiteUser
     *
     *
     * @return LightWebsiteUser
     * @throws \Exception
     */
    public function getValidWebsiteUser(): LightWebsiteUser
    {
        $user = $this->getUser();

        if (false === $user->isValid()) {
            throw new LightUserManagerException("The user is not valid.");
        }
        if (false === $user instanceof LightWebsiteUser) {
            throw new LightUserManagerException("The user is not an instance of LightWebsiteUser.");
        }
        return $user;
    }







    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the user.
     * This method can be useful for testing purpose,
     * but in a prod app, you will generally not need it.
     *
     *
     * @param LightUserInterface $user
     */
    public function setUser(LightUserInterface $user)
    {
        $this->startPhpSession();
        $_SESSION[$this->sessionKey] = $user;
    }



    /**
     * Sets the user only if there is no user in the session.
     *
     * This method can be useful for testing purpose,
     * but in a prod app, you will generally not need it.
     *
     *
     * @param LightUserInterface $user
     */
    public function setUserOnce(LightUserInterface $user)
    {
        $this->startPhpSession();
        if (false === array_key_exists($this->sessionKey, $_SESSION)) {
            $_SESSION[$this->sessionKey] = $user;
        }
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Starts the php session if it's not already started.
     * @return void
     */
    private function startPhpSession()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
}