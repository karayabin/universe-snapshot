[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The CustomUserHasPermissionGroupApi class
================
2019-07-19 --> 2020-06-25






Introduction
============

The CustomUserHasPermissionGroupApi class.



Class synopsis
==============


class <span class="pl-k">CustomUserHasPermissionGroupApi</span> extends [UserHasPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi.md) implements [UserHasPermissionGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserHasPermissionGroupApiInterface.md), [CustomUserHasPermissionGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomUserHasPermissionGroupApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightUserDatabaseBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightUserDatabaseBaseApi::$container](#property-container) ;
    - protected string [LightUserDatabaseBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Classes/CustomUserHasPermissionGroupApi/__construct.md)() : void

- Inherited methods
    - public [UserHasPermissionGroupApi::insertUserHasPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/insertUserHasPermissionGroup.md)(array $userHasPermissionGroup, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [UserHasPermissionGroupApi::getUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/getUserHasPermissionGroupByUserIdAndPermissionGroupId.md)(int $user_id, int $permission_group_id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [UserHasPermissionGroupApi::getUserHasPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/getUserHasPermissionGroup.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [UserHasPermissionGroupApi::getUserHasPermissionGroups](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/getUserHasPermissionGroups.md)($where, ?array $markers = []) : array
    - public [UserHasPermissionGroupApi::getUserHasPermissionGroupsColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/getUserHasPermissionGroupsColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [UserHasPermissionGroupApi::getUserHasPermissionGroupsColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/getUserHasPermissionGroupsColumns.md)($columns, $where, ?array $markers = []) : array
    - public [UserHasPermissionGroupApi::getUserHasPermissionGroupsKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/getUserHasPermissionGroupsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [UserHasPermissionGroupApi::updateUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/updateUserHasPermissionGroupByUserIdAndPermissionGroupId.md)(int $user_id, int $permission_group_id, array $userHasPermissionGroup) : void
    - public [UserHasPermissionGroupApi::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [UserHasPermissionGroupApi::deleteUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/deleteUserHasPermissionGroupByUserIdAndPermissionGroupId.md)(int $user_id, int $permission_group_id) : void
    - public [UserHasPermissionGroupApi::deleteUserHasPermissionGroupByUserId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/deleteUserHasPermissionGroupByUserId.md)(int $user_id) : void
    - public [UserHasPermissionGroupApi::deleteUserHasPermissionGroupByPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/deleteUserHasPermissionGroupByPermissionGroupId.md)(int $permission_group_id) : void
    - public [UserHasPermissionGroupApi::deleteUserHasPermissionGroupByUserIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/deleteUserHasPermissionGroupByUserIds.md)(array $user_ids) : void
    - public [UserHasPermissionGroupApi::deleteUserHasPermissionGroupByPermissionGroupIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/deleteUserHasPermissionGroupByPermissionGroupIds.md)(array $permission_group_ids) : void
    - public [LightUserDatabaseBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/LightUserDatabaseBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightUserDatabaseBaseApi::setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/LightUserDatabaseBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [CustomUserHasPermissionGroupApi::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Classes/CustomUserHasPermissionGroupApi/__construct.md) &ndash; Builds the CustomUserHasPermissionGroupApi instance.
- [UserHasPermissionGroupApi::insertUserHasPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/insertUserHasPermissionGroup.md) &ndash; Inserts the given userHasPermissionGroup in the database.
- [UserHasPermissionGroupApi::getUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/getUserHasPermissionGroupByUserIdAndPermissionGroupId.md) &ndash; Returns the userHasPermissionGroup row identified by the given user_id and permission_group_id.
- [UserHasPermissionGroupApi::getUserHasPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/getUserHasPermissionGroup.md) &ndash; Returns the userHasPermissionGroup row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserHasPermissionGroupApi::getUserHasPermissionGroups](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/getUserHasPermissionGroups.md) &ndash; Returns the userHasPermissionGroup rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserHasPermissionGroupApi::getUserHasPermissionGroupsColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/getUserHasPermissionGroupsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserHasPermissionGroupApi::getUserHasPermissionGroupsColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/getUserHasPermissionGroupsColumns.md) &ndash; Returns a subset of the userHasPermissionGroup rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserHasPermissionGroupApi::getUserHasPermissionGroupsKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/getUserHasPermissionGroupsKey2Value.md) &ndash; Returns an array of $key => $value from the userHasPermissionGroup rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserHasPermissionGroupApi::updateUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/updateUserHasPermissionGroupByUserIdAndPermissionGroupId.md) &ndash; Updates the userHasPermissionGroup row identified by the given user_id and permission_group_id.
- [UserHasPermissionGroupApi::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/delete.md) &ndash; Deletes the userHasPermissionGroup rows matching the given where conditions, and returns the number of deleted rows.
- [UserHasPermissionGroupApi::deleteUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/deleteUserHasPermissionGroupByUserIdAndPermissionGroupId.md) &ndash; Deletes the userHasPermissionGroup identified by the given user_id and permission_group_id.
- [UserHasPermissionGroupApi::deleteUserHasPermissionGroupByUserId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/deleteUserHasPermissionGroupByUserId.md) &ndash; Deletes the userHasPermissionGroup identified by the given user_id.
- [UserHasPermissionGroupApi::deleteUserHasPermissionGroupByPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/deleteUserHasPermissionGroupByPermissionGroupId.md) &ndash; Deletes the userHasPermissionGroup identified by the given permission_group_id.
- [UserHasPermissionGroupApi::deleteUserHasPermissionGroupByUserIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/deleteUserHasPermissionGroupByUserIds.md) &ndash; Deletes the userHasPermissionGroup rows identified by the given user_user_ids.
- [UserHasPermissionGroupApi::deleteUserHasPermissionGroupByPermissionGroupIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/deleteUserHasPermissionGroupByPermissionGroupIds.md) &ndash; Deletes the userHasPermissionGroup rows identified by the given permission_group_permission_group_ids.
- [LightUserDatabaseBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/LightUserDatabaseBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightUserDatabaseBaseApi::setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/LightUserDatabaseBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_UserDatabase\Api\Custom\Classes\CustomUserHasPermissionGroupApi<br>
See the source code of [Ling\Light_UserDatabase\Api\Custom\Classes\CustomUserHasPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Custom/Classes/CustomUserHasPermissionGroupApi.php)



SeeAlso
==============
Previous class: [CustomUserGroupHasPluginOptionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Classes/CustomUserGroupHasPluginOptionApi.md)<br>Next class: [CustomLightUserDatabaseApiFactory](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/CustomLightUserDatabaseApiFactory.md)<br>
