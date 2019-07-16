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
}
