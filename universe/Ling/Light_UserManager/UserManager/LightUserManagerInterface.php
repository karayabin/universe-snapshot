<?php


namespace Ling\Light_UserManager\UserManager;


use Ling\Light_User\LightUserInterface;
use Ling\Light_UserManager\Exception\LightUserManagerException;

/**
 * The LightUserManagerInterface interface.
 */
interface LightUserManagerInterface
{

    /**
     * Returns a light user instance, according to the settings of this instance.
     *
     * @return LightUserInterface
     * @throws LightUserManagerException
     */
    public function getUser(): LightUserInterface;
}