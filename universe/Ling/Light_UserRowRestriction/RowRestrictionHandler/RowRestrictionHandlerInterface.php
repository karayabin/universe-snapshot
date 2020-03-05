<?php


namespace Ling\Light_UserRowRestriction\RowRestrictionHandler;


use Ling\Light_User\LightUserInterface;

/**
 * The RowRestrictionHandlerInterface interface.
 */
interface RowRestrictionHandlerInterface
{


    /**
     * Checks that the current user is allowed to execute the action she/he wants, which is described by the
     * table, crudType, eventName and args parameters.
     *
     * An exception is thrown if that's not the case.
     *
     * The crudType is one of:
     * - create
     * - read
     * - update (includes replace for now)
     * - delete
     *
     *
     *
     * @param LightUserInterface $user
     * @param string $table
     * @param string $crudType
     * @param mixed ...$args
     * @return void
     * @throws \Exception
     *
     */
    public function checkRestriction(LightUserInterface $user, string $table, string $crudType, ...$args);

}