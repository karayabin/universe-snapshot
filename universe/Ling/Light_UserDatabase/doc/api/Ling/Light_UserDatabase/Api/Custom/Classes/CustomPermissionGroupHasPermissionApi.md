[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The CustomPermissionGroupHasPermissionApi class
================
2019-07-19 --> 2021-02-11






Introduction
============

The CustomPermissionGroupHasPermissionApi class.



Class synopsis
==============


class <span class="pl-k">CustomPermissionGroupHasPermissionApi</span> extends [PermissionGroupHasPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi.md) implements [PermissionGroupHasPermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface.md), [CustomPermissionGroupHasPermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomPermissionGroupHasPermissionApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightUserDatabaseBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightUserDatabaseBaseApi::$container](#property-container) ;
    - protected string [LightUserDatabaseBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Classes/CustomPermissionGroupHasPermissionApi/__construct.md)() : void

- Inherited methods
    - public [PermissionGroupHasPermissionApi::insertPermissionGroupHasPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/insertPermissionGroupHasPermission.md)(array $permissionGroupHasPermission, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [PermissionGroupHasPermissionApi::insertPermissionGroupHasPermissions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/insertPermissionGroupHasPermissions.md)(array $permissionGroupHasPermissions, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [PermissionGroupHasPermissionApi::fetchAll](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/fetchAll.md)(?array $components = []) : array
    - public [PermissionGroupHasPermissionApi::fetch](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/fetch.md)(?array $components = []) : array
    - public [PermissionGroupHasPermissionApi::getPermissionGroupHasPermissionByPermissionGroupIdAndPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/getPermissionGroupHasPermissionByPermissionGroupIdAndPermissionId.md)(int $permission_group_id, int $permission_id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [PermissionGroupHasPermissionApi::getPermissionGroupHasPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/getPermissionGroupHasPermission.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [PermissionGroupHasPermissionApi::getPermissionGroupHasPermissions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/getPermissionGroupHasPermissions.md)($where, ?array $markers = []) : array
    - public [PermissionGroupHasPermissionApi::getPermissionGroupHasPermissionsColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/getPermissionGroupHasPermissionsColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [PermissionGroupHasPermissionApi::getPermissionGroupHasPermissionsColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/getPermissionGroupHasPermissionsColumns.md)($columns, $where, ?array $markers = []) : array
    - public [PermissionGroupHasPermissionApi::getPermissionGroupHasPermissionsKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/getPermissionGroupHasPermissionsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [PermissionGroupHasPermissionApi::updatePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/updatePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId.md)(int $permission_group_id, int $permission_id, array $permissionGroupHasPermission, ?array $extraWhere = [], ?array $markers = []) : void
    - public [PermissionGroupHasPermissionApi::updatePermissionGroupHasPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/updatePermissionGroupHasPermission.md)(array $permissionGroupHasPermission, ?$where = null, ?array $markers = []) : void
    - public [PermissionGroupHasPermissionApi::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [PermissionGroupHasPermissionApi::deletePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/deletePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId.md)(int $permission_group_id, int $permission_id) : void
    - public [PermissionGroupHasPermissionApi::deletePermissionGroupHasPermissionByPermissionGroupIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/deletePermissionGroupHasPermissionByPermissionGroupIds.md)(array $permission_group_ids) : void
    - public [PermissionGroupHasPermissionApi::deletePermissionGroupHasPermissionByPermissionIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/deletePermissionGroupHasPermissionByPermissionIds.md)(array $permission_ids) : void
    - public [PermissionGroupHasPermissionApi::deletePermissionGroupHasPermissionByPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/deletePermissionGroupHasPermissionByPermissionGroupId.md)(int $permissionGroupId) : void
    - public [PermissionGroupHasPermissionApi::deletePermissionGroupHasPermissionByPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/deletePermissionGroupHasPermissionByPermissionId.md)(int $permissionId) : void
    - public [LightUserDatabaseBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/LightUserDatabaseBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightUserDatabaseBaseApi::setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/LightUserDatabaseBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [CustomPermissionGroupHasPermissionApi::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Classes/CustomPermissionGroupHasPermissionApi/__construct.md) &ndash; Builds the CustomPermissionGroupHasPermissionApi instance.
- [PermissionGroupHasPermissionApi::insertPermissionGroupHasPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/insertPermissionGroupHasPermission.md) &ndash; Inserts the given permission group has permission in the database.
- [PermissionGroupHasPermissionApi::insertPermissionGroupHasPermissions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/insertPermissionGroupHasPermissions.md) &ndash; Inserts the given permission group has permission rows in the database.
- [PermissionGroupHasPermissionApi::fetchAll](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [PermissionGroupHasPermissionApi::fetch](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [PermissionGroupHasPermissionApi::getPermissionGroupHasPermissionByPermissionGroupIdAndPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/getPermissionGroupHasPermissionByPermissionGroupIdAndPermissionId.md) &ndash; Returns the permission group has permission row identified by the given permission_group_id and permission_id.
- [PermissionGroupHasPermissionApi::getPermissionGroupHasPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/getPermissionGroupHasPermission.md) &ndash; Returns the permissionGroupHasPermission row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PermissionGroupHasPermissionApi::getPermissionGroupHasPermissions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/getPermissionGroupHasPermissions.md) &ndash; Returns the permissionGroupHasPermission rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PermissionGroupHasPermissionApi::getPermissionGroupHasPermissionsColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/getPermissionGroupHasPermissionsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PermissionGroupHasPermissionApi::getPermissionGroupHasPermissionsColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/getPermissionGroupHasPermissionsColumns.md) &ndash; Returns a subset of the permissionGroupHasPermission rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PermissionGroupHasPermissionApi::getPermissionGroupHasPermissionsKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/getPermissionGroupHasPermissionsKey2Value.md) &ndash; Returns an array of $key => $value from the permissionGroupHasPermission rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PermissionGroupHasPermissionApi::updatePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/updatePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId.md) &ndash; Updates the permission group has permission row identified by the given permission_group_id and permission_id.
- [PermissionGroupHasPermissionApi::updatePermissionGroupHasPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/updatePermissionGroupHasPermission.md) &ndash; Updates the permission group has permission row.
- [PermissionGroupHasPermissionApi::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/delete.md) &ndash; Deletes the permissionGroupHasPermission rows matching the given where conditions, and returns the number of deleted rows.
- [PermissionGroupHasPermissionApi::deletePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/deletePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId.md) &ndash; Deletes the permission group has permission identified by the given permission_group_id and permission_id.
- [PermissionGroupHasPermissionApi::deletePermissionGroupHasPermissionByPermissionGroupIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/deletePermissionGroupHasPermissionByPermissionGroupIds.md) &ndash; Deletes the permission group has permission rows identified by the given permission_group_ids.
- [PermissionGroupHasPermissionApi::deletePermissionGroupHasPermissionByPermissionIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/deletePermissionGroupHasPermissionByPermissionIds.md) &ndash; Deletes the permission group has permission rows identified by the given permission_ids.
- [PermissionGroupHasPermissionApi::deletePermissionGroupHasPermissionByPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/deletePermissionGroupHasPermissionByPermissionGroupId.md) &ndash; Deletes the permission group has permission rows having the given permission group id.
- [PermissionGroupHasPermissionApi::deletePermissionGroupHasPermissionByPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/deletePermissionGroupHasPermissionByPermissionId.md) &ndash; Deletes the permission group has permission rows having the given permission id.
- [LightUserDatabaseBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/LightUserDatabaseBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightUserDatabaseBaseApi::setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/LightUserDatabaseBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_UserDatabase\Api\Custom\Classes\CustomPermissionGroupHasPermissionApi<br>
See the source code of [Ling\Light_UserDatabase\Api\Custom\Classes\CustomPermissionGroupHasPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Custom/Classes/CustomPermissionGroupHasPermissionApi.php)



SeeAlso
==============
Previous class: [CustomPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Classes/CustomPermissionGroupApi.md)<br>Next class: [CustomPluginOptionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Classes/CustomPluginOptionApi.md)<br>
