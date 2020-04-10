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
     * table and parameters.
     *
     * An exception is thrown if that's not the case.
     *
     *
     *
     *
     *
     * @param LightUserInterface $user
     * @param string $table
     * @param mixed ...$args
     * @return void
     * @throws \Exception
     *
     */
    public function checkRestriction(LightUserInterface $user, string $table, ...$args);

}