<?php


namespace Ling\Light_User;


/**
 * The RefreshableLightUserInterface interface.
 * See more info in the @page(conception page).
 */
interface RefreshableLightUserInterface extends LightUserInterface
{

    /**
     * Refreshes the user.
     *
     * Often, this means add some time to the validity expiration time of the user.
     *
     *
     *
     * @return void
     */
    public function refresh();

    /**
     * Sets the duration of this user' session in seconds.
     *
     *
     * @param int $durationInSeconds
     * @return mixed
     */
    public function setSessionDuration(int $durationInSeconds);


    /**
     * Returns the duration of this user' session in seconds.
     *
     * @return int
     */
    public function getSessionDuration(): int;
}
