[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The UserHasPermissionGroupApiInterface class
================
2019-07-19 --> 2020-02-07






Introduction
============

The UserHasPermissionGroupApiInterface interface.
It implements the [ling standard object methods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-standard-object-methods.md) concept.



Class synopsis
==============


abstract class <span class="pl-k">UserHasPermissionGroupApiInterface</span>  {

- Methods
    - abstract public [insertUserHasPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserHasPermissionGroupApiInterface/insertUserHasPermissionGroup.md)(array $userHasPermissionGroup, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [getUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserHasPermissionGroupApiInterface/getUserHasPermissionGroupByUserIdAndPermissionGroupId.md)(int $user_id, int $permission_group_id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getUserHasPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserHasPermissionGroupApiInterface/getUserHasPermissionGroup.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getUserHasPermissionGroups](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserHasPermissionGroupApiInterface/getUserHasPermissionGroups.md)($where, ?array $markers = []) : array
    - abstract public [updateUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserHasPermissionGroupApiInterface/updateUserHasPermissionGroupByUserIdAndPermissionGroupId.md)(int $user_id, int $permission_group_id, array $userHasPermissionGroup) : void
    - abstract public [deleteUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserHasPermissionGroupApiInterface/deleteUserHasPermissionGroupByUserIdAndPermissionGroupId.md)(int $user_id, int $permission_group_id) : void
    - abstract public [deleteUserHasPermissionGroupByUserId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserHasPermissionGroupApiInterface/deleteUserHasPermissionGroupByUserId.md)(int $user_id) : void
    - abstract public [deleteUserHasPermissionGroupByPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserHasPermissionGroupApiInterface/deleteUserHasPermissionGroupByPermissionGroupId.md)(int $permission_group_id) : void

}






Methods
==============

- [UserHasPermissionGroupApiInterface::insertUserHasPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserHasPermissionGroupApiInterface/insertUserHasPermissionGroup.md) &ndash; Inserts the given userHasPermissionGroup in the database.
- [UserHasPermissionGroupApiInterface::getUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserHasPermissionGroupApiInterface/getUserHasPermissionGroupByUserIdAndPermissionGroupId.md) &ndash; Returns the userHasPermissionGroup row identified by the given user_id and permission_group_id.
- [UserHasPermissionGroupApiInterface::getUserHasPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserHasPermissionGroupApiInterface/getUserHasPermissionGroup.md) &ndash; Returns the userHasPermissionGroup row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserHasPermissionGroupApiInterface::getUserHasPermissionGroups](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserHasPermissionGroupApiInterface/getUserHasPermissionGroups.md) &ndash; Returns the userHasPermissionGroup rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserHasPermissionGroupApiInterface::updateUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserHasPermissionGroupApiInterface/updateUserHasPermissionGroupByUserIdAndPermissionGroupId.md) &ndash; Updates the userHasPermissionGroup row identified by the given user_id and permission_group_id.
- [UserHasPermissionGroupApiInterface::deleteUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserHasPermissionGroupApiInterface/deleteUserHasPermissionGroupByUserIdAndPermissionGroupId.md) &ndash; Deletes the userHasPermissionGroup identified by the given user_id and permission_group_id.
- [UserHasPermissionGroupApiInterface::deleteUserHasPermissionGroupByUserId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserHasPermissionGroupApiInterface/deleteUserHasPermissionGroupByUserId.md) &ndash; Deletes the userHasPermissionGroup identified by the given user_id.
- [UserHasPermissionGroupApiInterface::deleteUserHasPermissionGroupByPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserHasPermissionGroupApiInterface/deleteUserHasPermissionGroupByPermissionGroupId.md) &ndash; Deletes the userHasPermissionGroup identified by the given permission_group_id.





Location
=============
Ling\Light_UserDatabase\Api\Mysql\Interfaces\UserHasPermissionGroupApiInterface<br>
See the source code of [Ling\Light_UserDatabase\Api\Mysql\Interfaces\UserHasPermissionGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/Interfaces/UserHasPermissionGroupApiInterface.php)



SeeAlso
==============
Previous class: [UserGroupHasPluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupHasPluginOptionApiInterface.md)<br>Next class: [LightUserDatabaseApiFactory](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/LightUserDatabaseApiFactory.md)<br>
