[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The UserHasPermissionGroupApiInterface class
================
2019-07-19 --> 2021-06-15






Introduction
============

The UserHasPermissionGroupApiInterface interface.
It implements the [ling standard object methods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-standard-object-methods.md) concept.



Class synopsis
==============


abstract class <span class="pl-k">UserHasPermissionGroupApiInterface</span>  {

- Methods
    - abstract public [insertUserHasPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/insertUserHasPermissionGroup.md)(array $userHasPermissionGroup, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [insertUserHasPermissionGroups](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/insertUserHasPermissionGroups.md)(array $userHasPermissionGroups, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [fetchAll](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/fetchAll.md)(?array $components = []) : array
    - abstract public [fetch](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/fetch.md)(?array $components = []) : array
    - abstract public [getUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/getUserHasPermissionGroupByUserIdAndPermissionGroupId.md)(int $user_id, int $permission_group_id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getUserHasPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/getUserHasPermissionGroup.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getUserHasPermissionGroups](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/getUserHasPermissionGroups.md)($where, ?array $markers = []) : array
    - abstract public [getUserHasPermissionGroupsColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/getUserHasPermissionGroupsColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [getUserHasPermissionGroupsColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/getUserHasPermissionGroupsColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [getUserHasPermissionGroupsKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/getUserHasPermissionGroupsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [updateUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/updateUserHasPermissionGroupByUserIdAndPermissionGroupId.md)(int $user_id, int $permission_group_id, array $userHasPermissionGroup, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [updateUserHasPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/updateUserHasPermissionGroup.md)(array $userHasPermissionGroup, ?$where = null, ?array $markers = []) : void
    - abstract public [delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [deleteUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/deleteUserHasPermissionGroupByUserIdAndPermissionGroupId.md)(int $user_id, int $permission_group_id) : void
    - abstract public [deleteUserHasPermissionGroupByUserIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/deleteUserHasPermissionGroupByUserIds.md)(array $user_ids) : void
    - abstract public [deleteUserHasPermissionGroupByPermissionGroupIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/deleteUserHasPermissionGroupByPermissionGroupIds.md)(array $permission_group_ids) : void
    - abstract public [deleteUserHasPermissionGroupByUserId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/deleteUserHasPermissionGroupByUserId.md)(int $userId) : void
    - abstract public [deleteUserHasPermissionGroupByPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/deleteUserHasPermissionGroupByPermissionGroupId.md)(int $permissionGroupId) : void

}






Methods
==============

- [UserHasPermissionGroupApiInterface::insertUserHasPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/insertUserHasPermissionGroup.md) &ndash; Inserts the given user has permission group in the database.
- [UserHasPermissionGroupApiInterface::insertUserHasPermissionGroups](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/insertUserHasPermissionGroups.md) &ndash; Inserts the given user has permission group rows in the database.
- [UserHasPermissionGroupApiInterface::fetchAll](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [UserHasPermissionGroupApiInterface::fetch](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [UserHasPermissionGroupApiInterface::getUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/getUserHasPermissionGroupByUserIdAndPermissionGroupId.md) &ndash; Returns the user has permission group row identified by the given user_id and permission_group_id.
- [UserHasPermissionGroupApiInterface::getUserHasPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/getUserHasPermissionGroup.md) &ndash; Returns the userHasPermissionGroup row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserHasPermissionGroupApiInterface::getUserHasPermissionGroups](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/getUserHasPermissionGroups.md) &ndash; Returns the userHasPermissionGroup rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserHasPermissionGroupApiInterface::getUserHasPermissionGroupsColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/getUserHasPermissionGroupsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserHasPermissionGroupApiInterface::getUserHasPermissionGroupsColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/getUserHasPermissionGroupsColumns.md) &ndash; Returns a subset of the userHasPermissionGroup rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserHasPermissionGroupApiInterface::getUserHasPermissionGroupsKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/getUserHasPermissionGroupsKey2Value.md) &ndash; Returns an array of $key => $value from the userHasPermissionGroup rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserHasPermissionGroupApiInterface::updateUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/updateUserHasPermissionGroupByUserIdAndPermissionGroupId.md) &ndash; Updates the user has permission group row identified by the given user_id and permission_group_id.
- [UserHasPermissionGroupApiInterface::updateUserHasPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/updateUserHasPermissionGroup.md) &ndash; Updates the user has permission group row.
- [UserHasPermissionGroupApiInterface::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/delete.md) &ndash; Deletes the userHasPermissionGroup rows matching the given where conditions, and returns the number of deleted rows.
- [UserHasPermissionGroupApiInterface::deleteUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/deleteUserHasPermissionGroupByUserIdAndPermissionGroupId.md) &ndash; Deletes the user has permission group identified by the given user_id and permission_group_id.
- [UserHasPermissionGroupApiInterface::deleteUserHasPermissionGroupByUserIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/deleteUserHasPermissionGroupByUserIds.md) &ndash; Deletes the user has permission group rows identified by the given user_ids.
- [UserHasPermissionGroupApiInterface::deleteUserHasPermissionGroupByPermissionGroupIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/deleteUserHasPermissionGroupByPermissionGroupIds.md) &ndash; Deletes the user has permission group rows identified by the given permission_group_ids.
- [UserHasPermissionGroupApiInterface::deleteUserHasPermissionGroupByUserId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/deleteUserHasPermissionGroupByUserId.md) &ndash; Deletes the user has permission group rows having the given user id.
- [UserHasPermissionGroupApiInterface::deleteUserHasPermissionGroupByPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface/deleteUserHasPermissionGroupByPermissionGroupId.md) &ndash; Deletes the user has permission group rows having the given permission group id.





Location
=============
Ling\Light_UserDatabase\Api\Generated\Interfaces\UserHasPermissionGroupApiInterface<br>
See the source code of [Ling\Light_UserDatabase\Api\Generated\Interfaces\UserHasPermissionGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface.php)



SeeAlso
==============
Previous class: [UserGroupHasPluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface.md)<br>Next class: [LightUserDatabaseApiFactory](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory.md)<br>
