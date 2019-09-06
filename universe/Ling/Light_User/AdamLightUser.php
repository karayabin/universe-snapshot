<?php


namespace Ling\Light_User;


/**
 * The AdamLightUser class.
 *
 * Adam is the first light user.
 * He is always valid, he has all the rights, and his identifier is adam.
 *
 */
class AdamLightUser implements LightUserInterface
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