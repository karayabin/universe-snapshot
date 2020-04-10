<?php


namespace Ling\Light_User;


/**
 * The LightAdamUser class.
 *
 * Adam is the first light user.
 * He is always valid, he has all the rights, and his identifier is adam.
 *
 */
class LightAdamUser implements LightUserInterface
{


    /**
     * @implementation
     */
    public function isValid(): bool
    {
        return true;
    }

    /**
     * @implementation
     */
    public function getIdentifier()
    {
        return "adam";
    }

    /**
     * @implementation
     */
    public function hasRight(string $right): bool
    {
        return true;
    }
}