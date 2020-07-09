<?php


namespace Ling\Light_UserDatabase\Api\Custom\Interfaces;

use Ling\Light_UserDatabase\Api\Generated\Interfaces\PermissionApiInterface;


/**
 * The CustomPermissionApiInterface interface.
 */
interface CustomPermissionApiInterface extends PermissionApiInterface
{
    /**
     * Returns the permission names bound to the given user id.
     *
     * @param int $id
     * @return array
     */
    public function getPermissionNamesByUserId(int $id): array;
}
