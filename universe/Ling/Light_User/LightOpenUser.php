<?php


namespace Ling\Light_User;


/**
 * The LightOpenUser class.
 *
 * This is a website user, he is a @concept(refreshable user).
 *
 * You can attach any property to it.
 *
 *
 */
class LightOpenUser implements RefreshableLightUserInterface
{


    /**
     * This property holds the timestamp when the user first connected (or false by default).
     * @var int|false
     */
    private int|false $connect_time;

    /**
     * This property holds the timestamp when the user was last refreshed.
     * See the @concept(refresh concept) for more details.
     *
     * @var int|false
     */
    private int|false $last_refresh_time;

    /**
     * This property holds the number of seconds to wait before turning an idle valid user into
     * an invalid user.
     *
     * @var int = 500
     */
    private int $session_duration;


    /**
     * This property holds the props for this instance.
     * @var array
     */
    private array $props;


    /**
     * Builds the LightWebsiteUser instance.
     */
    public function __construct()
    {
        $this->connect_time = false;
        $this->last_refresh_time = false;
        $this->session_duration = 500;
        $this->props = [];
    }


    //--------------------------------------------
    // RefreshableLightUserInterface
    //--------------------------------------------
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
     * @implementation
     */
    public function setSessionDuration(int $durationInSeconds)
    {
        $this->session_duration = $durationInSeconds;
    }

    /**
     * @implementation
     */
    public function getSessionDuration(): int
    {
        return $this->session_duration;
    }






    //--------------------------------------------
    // LightUserInterface
    //--------------------------------------------
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
    public function hasRight(string $right): bool
    {
        return true;
    }

    /**
     * @implementation
     */
    public function getIdentifier()
    {
        return "Ling/Light_User/LightOpenUser";
    }





    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Connects the user (i.e. stores it in the session).
     * Note: you should only use this method once just after the user credentials
     * have been checked.
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


    /**
     * Returns the properties attached to this instance.
     *
     * @return array
     */
    public function getProps(): array
    {
        return $this->props;
    }

    /**
     * Sets the props.
     *
     * @param array $props
     */
    public function setProps(array $props)
    {
        $this->props = $props;
    }

    /**
     * Adds a property to this instance, and returns the instance.
     *
     * @param string $key
     * @param mixed $value
     * @return $this
     */
    public function addProp(string $key, mixed $value): static
    {
        $this->props[$key] = $value;
        return $this;
    }

    /**
     * Returns the value of the given property, or the default value if that property is not found.
     *
     * @param string $key
     * @param mixed|null $default
     * @return mixed
     */
    public function getProp(string $key, mixed $default = null): mixed
    {
        return $this->props[$key] ?? $default;
    }


}