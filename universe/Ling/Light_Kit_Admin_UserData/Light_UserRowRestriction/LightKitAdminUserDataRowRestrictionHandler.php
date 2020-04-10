<?php


namespace Ling\Light_Kit_Admin_UserData\Light_UserRowRestriction;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Kit_Admin_UserData\Exception\LightKitAdminUserDataException;
use Ling\Light_User\LightUserInterface;
use Ling\Light_User\LightWebsiteUser;
use Ling\Light_UserRowRestriction\RowRestrictionHandler\RowRestrictionHandlerInterface;

/**
 * The LightKitAdminUserDataRowRestrictionHandler class.
 */
class LightKitAdminUserDataRowRestrictionHandler implements RowRestrictionHandlerInterface
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the LightUserDataRowRestrictionHandler instance.
     */
    public function __construct()
    {
        $this->container = null;
    }

    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }





    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @implementation
     */
    public function checkRestriction(LightUserInterface $user, string $table, ...$args)
    {
        /**
         * @var $user LightWebsiteUser
         */
        if (true === $user->hasRight("Light_UserData.admin")) { // our admin can do anything
            return;
        }
        if (false === $user->hasRight("Light_UserData.user")) { // you need to be an user of our service to do anything
            $this->error("Row restriction violation: you need the Light_UserData.user right to create in this table.");
        }


        $this->checkValidWebsiteUser($user);


        /**
         * Only Light_UserData.admin can alter tables for now.
         */
        if (true === $user->hasRight("Light_UserData.user")) {
            $this->error("The Light_UserData user is not allowed to read/alter this table.");
        }
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Checks that the given user is a valid LightWebsiteUser, and throws an exception if that's not the case.
     *
     * @param LightUserInterface $user
     * @throws \Exception
     */
    protected function checkValidWebsiteUser(LightUserInterface $user)
    {
        if (false === $user instanceof LightWebsiteUser) {
            $this->error("Incorrect user, we only treat LightWebsiteUser users for now.");
        }
        if (false === $user->isValid()) {
            $this->error("Invalid user, the user is not connected.");
        }
    }


    /**
     * Throws an exception with the given message.
     * @param string $msg
     * @throws \Exception
     */
    protected function error(string $msg)
    {
        throw new LightKitAdminUserDataException("Light_Kit_Admin_UserData: " . $msg);
    }
}