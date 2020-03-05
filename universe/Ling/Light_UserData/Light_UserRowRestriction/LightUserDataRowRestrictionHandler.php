<?php


namespace Ling\Light_UserData\Light_UserRowRestriction;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_User\LightUserInterface;
use Ling\Light_User\WebsiteLightUser;
use Ling\Light_UserData\Exception\LightUserDataException;
use Ling\Light_UserRowRestriction\RowRestrictionHandler\RowRestrictionHandlerInterface;
use Ling\Light_UserRowRestriction\Service\LightUserRowRestrictionService;

/**
 * The LightUserDataRowRestrictionHandler class.
 */
class LightUserDataRowRestrictionHandler implements RowRestrictionHandlerInterface
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
    public function checkRestriction(LightUserInterface $user, string $table, string $crudType, ...$args)
    {
        /**
         * @var $user WebsiteLightUser
         */
        if (true === $user->hasRight("Light_UserData.admin")) { // our admin can do anything
            return;
        }
        if (false === $user->hasRight("Light_UserData.user")) { // you need to be an user of our service to do anything
            throw new LightUserDataException("Row restriction violation: you need the Light_UserData.user right to create in this table.");
        }



        $this->checkValidWebsiteUser($user);


        if (LightUserRowRestrictionService::MODE_STRICT === LightUserRowRestrictionService::$mode) {

            /**
             * Only Light_UserData.admin can alter tables for now.
             */
            if (true === $user->hasRight("Light_UserData.user")) {
                $this->error("The Light_UserData user is not allowed to alter this table.");
            }
        } elseif (LightUserRowRestrictionService::MODE_PERMISSIVE === LightUserRowRestrictionService::$mode) {


            if ('read' === $crudType) { // we don't have sensitive info in our tables
                return;
            }


            $this->error("Permissive restrictions Not implemented yet.");
            /**
             * Todo: finish the script below before removing the error...
             */

            //--------------------------------------------
            // NON ADMIN REGULAR USER RESTRICTIONS BELOW...
            //--------------------------------------------
            /**
             * The read crud type is ok, we allow anybody to read from all tables.
             */
            switch ($crudType) {
                case "create":
                    switch ($table) {
                        case "luda_resource":
                            /**
                             * A user can only create a resource that she owns.
                             */
                            $fields = $args[1];
                            $desiredUserId = (int)($fields['lud_user_id'] ?? 0);
                            if ((int)$user->getId() !== $desiredUserId) {
                                throw new LightUserDataException("Row restriction violation: you cannot create a record for another user.");
                            }
                            break;
                        case "luda_tag":
                            /**
                             * A user can create any tag
                             */
                            break;
                        case "luda_resource_has_tag":
                            /**
                             * A user can only create a binding that she owns.
                             */
                            $fields = $args[1];
                            $resourceId = (int)($fields['resource_id'] ?? null);
                            if ($resourceId) {

                                /**
                                 * @var $db LightDatabaseService
                                 */
                                $db = $this->container->get("database");

                                $res = $db->fetch("select lud_user_id from luda_resource where id=$resourceId", [], \PDO::FETCH_COLUMN);
                                if ((int)$res !== (int)$user->getId()) {
                                    $this->error("Row restriction violation: you don't own the luda_resource row with resource_id=$resourceId.");
                                }
                            } else {
                                $this->error("Row restriction violation: resource_id not provided.");
                            }
                            break;
                    }
                    break;
                default:
                    break;
            }

        }
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Checks that the given user is a valid WebsiteLightUser, and throws an exception if that's not the case.
     *
     * @param LightUserInterface $user
     * @throws \Exception
     */
    protected function checkValidWebsiteUser(LightUserInterface $user)
    {
        if (false === $user instanceof WebsiteLightUser) {
            $this->error("Incorrect user, we only treat WebsiteLightUser users for now.");
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
        throw new LightUserDataException($msg);
    }
}