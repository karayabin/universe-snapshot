<?php


namespace Ling\Light_UserManager\Service;

use Ling\Light_User\LightUserInterface;
use Ling\Light_User\RefreshableLightUserInterface;
use Ling\Light_UserManager\UserManager\AnyUserManager;

/**
 * The LightUserManagerService class.
 */
class LightUserManagerService extends AnyUserManager
{


    /**
     * Sets the session duration for all users at once, if they are refreshable (i.e. non refreshable users generally don't have session duration property).
     *
     * Note: if null, we do nothing, so each refreshable user keeps its own session duration.
     *
     * The default is null.
     *
     *
     * @var int | null
     */
    private int|null $sessionDuration;


    /**
     * This property holds the prepareUserCallbacks for this instance.
     * Those callbacks are executed at the end of the getUser method.
     *
     * Thus, each callback gives you the opportunity to prepare the user.
     * For instance, you could connect the user automatically if he's got a valid remember_me token.
     *
     * Each callback takes the user instance as its sole argument.
     *
     * @var array
     */
    private array $prepareUserCallbacks;


    /**
     * Builds the LightUserManagerService instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->prepareUserCallbacks = [];
        $this->sessionDuration = null;
    }


    /**
     * Adds a prepareUser callback.
     *
     * @param callable $callback
     */
    public function addPrepareUserCallback(callable $callback)
    {
        $this->prepareUserCallbacks[] = $callback;
    }


    /**
     * @overrides
     */
    public function getUser(): LightUserInterface
    {
        $user = parent::getUser();


        if (
            null !== $this->sessionDuration &&
            true === $user instanceof RefreshableLightUserInterface
        ) {
            $user->setSessionDuration($this->sessionDuration);
        }


        foreach ($this->prepareUserCallbacks as $cb) {
            $cb($user);
        }
        return $user;
    }

    /**
     * Sets the sessionDuration.
     *
     * @param int $sessionDuration
     */
    public function setSessionDuration(int $sessionDuration)
    {
        $this->sessionDuration = $sessionDuration;
    }

}