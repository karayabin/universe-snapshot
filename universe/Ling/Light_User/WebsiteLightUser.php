<?php


namespace Ling\Light_User;


/**
 * The WebsiteLightUser class.
 *
 * This is the first website user, and a typical one.
 *
 * A website user has to login by providing credentials:
 * - an email
 * - a password
 *
 * The following properties are attached to the website user:
 *
 * - avatar_url: the url of the avatar image (or null if there is no avatar for this user)
 * - email: the email of the user. This is also considered as an identifier (a unique string identifying a given user)
 * - pseudo: string, or null if the website user doesn't use a pseudo
 * - connect_time: timestamp (or false by default) of the moment when the user was first connected.
 *              This allows us to know exactly how long an user is connected at any time.
 * - last_refresh_time: timestamp of the moment when the user was last refreshed (or false by default).
 *
 *
 * Also, the user can be configured:
 *
 * - session_duration: the number of seconds to wait to turn a valid idle user into an invalid user
 *              The default is 300 (i.e. 5 minutes)
 *
 *
 *
 *
 *
 * A website user is a @concept(refreshable user).
 *
 *
 *
 */
class WebsiteLightUser implements RefreshableLightUserInterface
{


    /**
     * This property holds the email of the user.
     * @var string
     */
    protected $email;

    /**
     * This property holds the avatar_url of the user, or null if the user doesn't have an avatar.
     * @var string|null
     */
    protected $avatar_url;

    /**
     * This property holds the pseudo of the user (or null if the user doesn't have a pseudo).
     * @var string|null
     */
    protected $pseudo;

    /**
     * This property holds the timestamp when the user first connected (or false by default).
     * @var int|false
     */
    protected $connect_time;

    /**
     * This property holds the timestamp when the user was last refreshed.
     * See the @concept(refresh concept) for more details.
     *
     * @var int|false
     */
    protected $last_refresh_time;

    /**
     * This property holds the number of seconds to wait before turning an idle valid user into
     * an invalid user.
     *
     * @var int = 500
     */
    protected $session_duration;

    /**
     * This property holds the rights for this user.
     * See the @concept(rights concept) for more details.
     *
     * @var array
     */
    protected $rights;


    /**
     * Builds the WebsiteLightUser instance.
     */
    public function __construct()
    {
        $this->email = null;
        $this->avatar_url = null;
        $this->pseudo = null;
        $this->connect_time = false;
        $this->last_refresh_time = false;
        $this->session_duration = 500;
        $this->rights = [];
    }


    /**
     * @implementation
     */
    public function isValid(): bool
    {
        if (false !== $this->last_refresh_time) {
            return (($this->last_refresh_time + $this->session_duration) > time());
        }
        return false;
    }

    /**
     * @implementation
     */
    public function getIdentifier()
    {
        if (null !== $this->email) {
            return $this->email;
        }
        return false;
    }

    /**
     * @implementation
     */
    public function hasRight(string $right): bool
    {

        if (in_array('*', $this->rights, true)) {
            return true;
        }

        foreach ($this->rights as $r) {
            if ($right === $r) {
                return true;
            } elseif ('.*' === substr($r, -2)) {
                $namespace = substr($r, 0, -2);
                if (0 === strpos($right . ".", $namespace)) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * @implementation
     */
    public function refresh()
    {
        if (false !== $this->last_refresh_time) {
            $this->last_refresh_time = time();
        }
    }


    /**
     * Connects the user (i.e. stores it in the session).
     * Note: you should only use this method once just after the user credentials
     * have been checked.
     *
     *
     *
     *
     * @return void
     */
    public function connect()
    {
        $this->connect_time = time();
        $this->last_refresh_time = $this->connect_time;
    }


    /**
     * Disconnects the current user.
     * Note: if the user is already disconnected, the method does nothing.
     *
     *
     * @return void
     */
    public function disconnect()
    {
        $this->connect_time = false;
        $this->last_refresh_time = false;
    }



    //--------------------------------------------
    // GETTERS / SETTERS
    //--------------------------------------------
    /**
     * Returns the email of this instance.
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Sets the email.
     *
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * Returns the avatar_url of this instance.
     *
     * @return string|null
     */
    public function getAvatarUrl(): ?string
    {
        return $this->avatar_url;
    }

    /**
     * Sets the avatar_url.
     *
     * @param string $avatar_url
     */
    public function setAvatarUrl(string $avatar_url)
    {
        $this->avatar_url = $avatar_url;
    }

    /**
     * Returns the pseudo of this instance.
     *
     * @return string|null
     */
    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    /**
     * Sets the pseudo.
     *
     * @param string $pseudo
     */
    public function setPseudo(string $pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * Returns the connect_time of this instance.
     *
     * @return false|int
     */
    public function getConnectTime()
    {
        return $this->connect_time;
    }

    /**
     * Sets the connect_time.
     *
     * @param int $connect_time
     */
    public function setConnectTime(int $connect_time)
    {
        $this->connect_time = $connect_time;
    }

    /**
     * Returns the last_refresh_time of this instance.
     *
     * @return false|int
     */
    public function getLastRefreshTime()
    {
        return $this->last_refresh_time;
    }

    /**
     * Sets the last_refresh_time.
     *
     * @param int $last_refresh_time
     */
    public function setLastRefreshTime(int $last_refresh_time)
    {
        $this->last_refresh_time = $last_refresh_time;
    }

    /**
     * Returns the session_duration of this instance.
     *
     * @return int
     */
    public function getSessionDuration(): int
    {
        return $this->session_duration;
    }

    /**
     * Sets the session_duration.
     *
     * @param int $session_duration
     */
    public function setSessionDuration(int $session_duration)
    {
        $this->session_duration = $session_duration;
    }

    /**
     * Returns the rights of this instance.
     *
     * @return array
     */
    public function getRights(): array
    {
        return $this->rights;
    }

    /**
     * Sets the rights.
     *
     * @param array $rights
     */
    public function setRights(array $rights)
    {
        $this->rights = $rights;
    }


}