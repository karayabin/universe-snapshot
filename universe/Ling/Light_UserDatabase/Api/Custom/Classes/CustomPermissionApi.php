<?php


namespace Ling\Light_UserDatabase\Api\Custom\Classes;

use Ling\Light_UserDatabase\Api\Generated\Classes\PermissionApi;
use Ling\Light_UserDatabase\Api\Custom\Interfaces\CustomPermissionApiInterface;



/**
 * The CustomPermissionApi class.
 */
class CustomPermissionApi extends PermissionApi implements CustomPermissionApiInterface
{


    /**
     * Builds the CustomPermissionApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @implementation
     */
    public function getPermissionNamesByUserId(int $id): array
    {
        $ret = $this->pdoWrapper->fetchAll("
        
        select p.name from lud_user u
        inner join lud_user_has_permission_group uhg on uhg.user_id=u.id
        inner join lud_permission_group_has_permission php on php.permission_group_id=uhg.permission_group_id
        inner join lud_permission p on p.id=php.permission_id
         where u.id=:id", [
            "id" => $id,
        ], \PDO::FETCH_COLUMN);
        return $ret;
    }
}
