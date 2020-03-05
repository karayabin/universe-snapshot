<?php


namespace Ling\Light_CsrfSession\Service;


/**
 * The LightCsrfSessionService class.
 */
class LightCsrfSessionService
{

    /**
     * This property holds the sessionName for this instance.
     * You probably should never change it.
     *
     * @var string=light_csrf_session
     */
    private $sessionName;

    /**
     * This property holds the salt for this instance.
     * @var string
     */
    protected $salt;


    /**
     * Builds the LightCsrfSessionService instance.
     */
    public function __construct()
    {
        $this->sessionName = "light_csrf_session";
        $this->salt = 'abc';
    }


    /**
     * Returns the csrf token value stored in the session.
     *
     * @return string
     * @throws \Exception
     */
    public function getToken(): string
    {
        $this->startSession();
        return $_SESSION[$this->sessionName];
    }


    /**
     * Returns whether the given token is valid.
     *
     * @param string $token
     * @return bool
     * @throws \Exception
     */
    public function isValid(string $token): bool
    {
        $this->startSession();
        return $token === $_SESSION[$this->sessionName];
    }

    /**
     * Sets the salt.
     *
     * @param string $salt
     */
    public function setSalt(string $salt)
    {
        $this->salt = $salt;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Ensures that the php session has started.
     * @throws \Exception
     */
    protected function startSession()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (false === array_key_exists($this->sessionName, $_SESSION)) {
            $token = md5(uniqid($this->salt . random_bytes(12)));
            $_SESSION[$this->sessionName] = $token;
        }
    }
}