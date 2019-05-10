<?php


namespace Ling\Light_User;


/**
 * The LightUserInterface interface.
 * See more info in the @page(conception page).
 */
interface LightUserInterface
{


    /**
     * Returns whether the user is valid.
     * @return bool
     */
    public function isValid(): bool;

    /**
     * Returns the identifier of the user,
     * or false if the user is not valid.
     *
     *
     * @return string|false
     */
    public function getIdentifier();


    /**
     * Returns whether the user has the given right.
     *
     * @param string $right
     * @return bool
     */
    public function hasRight(string $right): bool;
}
