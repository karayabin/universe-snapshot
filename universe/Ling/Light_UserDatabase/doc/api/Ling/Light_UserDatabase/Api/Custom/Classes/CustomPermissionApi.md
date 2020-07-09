[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The CustomPermissionApi class
================
2019-07-19 --> 2020-06-25






Introduction
============

The CustomPermissionApi class.



Class synopsis
==============


class <span class="pl-k">CustomPermissionApi</span> extends [PermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi.md) implements [PermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface.md), [CustomPermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomPermissionApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightUserDatabaseBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightUserDatabaseBaseApi::$container](#property-container) ;
    - protected string [LightUserDatabaseBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Classes/CustomPermissionApi/__construct.md)() : void
    - public [getPermissionNamesByUserId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Classes/CustomPermissionApi/getPermissionNamesByUserId.md)(int $id) : array

- Inherited methods
    - public [PermissionApi::insertPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/insertPermission.md)(array $permission, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [PermissionApi::getPermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/getPermissionById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [PermissionApi::getPermissionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/getPermissionByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [PermissionApi::getPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/getPermission.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [PermissionApi::getPermissions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/getPermissions.md)($where, ?array $markers = []) : array
    - public [PermissionApi::getPermissionsColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/getPermissionsColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [PermissionApi::getPermissionsColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/getPermissionsColumns.md)($columns, $where, ?array $markers = []) : array
    - public [PermissionApi::getPermissionsKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/getPermissionsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [PermissionApi::getPermissionIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/getPermissionIdByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - public [PermissionApi::getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/getAllIds.md)() : array
    - public [PermissionApi::updatePermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/updatePermissionById.md)(int $id, array $permission) : void
    - public [PermissionApi::updatePermissionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/updatePermissionByName.md)(string $name, array $permission) : void
    - public [PermissionApi::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [PermissionApi::deletePermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/deletePermissionById.md)(int $id) : void
    - public [PermissionApi::deletePermissionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/deletePermissionByName.md)(string $name) : void
    - public [PermissionApi::deletePermissionByIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/deletePermissionByIds.md)(array $ids) : void
    - public [PermissionApi::deletePermissionByNames](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/deletePermissionByNames.md)(array $names) : void
    - public [LightUserDatabaseBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/LightUserDatabaseBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightUserDatabaseBaseApi::setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/LightUserDatabaseBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [CustomPermissionApi::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Classes/CustomPermissionApi/__construct.md) &ndash; Builds the CustomPermissionApi instance.
- [CustomPermissionApi::getPermissionNamesByUserId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Classes/CustomPermissionApi/getPermissionNamesByUserId.md) &ndash; Returns the permission names bound to the given user id.
- [PermissionApi::insertPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/insertPermission.md) &ndash; Inserts the given permission in the database.
- [PermissionApi::getPermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/getPermissionById.md) &ndash; Returns the permission row identified by the given id.
- [PermissionApi::getPermissionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/getPermissionByName.md) &ndash; Returns the permission row identified by the given name.
- [PermissionApi::getPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/getPermission.md) &ndash; Returns the permission row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PermissionApi::getPermissions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/getPermissions.md) &ndash; Returns the permission rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PermissionApi::getPermissionsColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/getPermissionsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PermissionApi::getPermissionsColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/getPermissionsColumns.md) &ndash; Returns a subset of the permission rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PermissionApi::getPermissionsKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/getPermissionsKey2Value.md) &ndash; Returns an array of $key => $value from the permission rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PermissionApi::getPermissionIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/getPermissionIdByName.md) &ndash; Returns the id of the lud_permission table.
- [PermissionApi::getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/getAllIds.md) &ndash; Returns an array of all permission ids.
- [PermissionApi::updatePermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/updatePermissionById.md) &ndash; Updates the permission row identified by the given id.
- [PermissionApi::updatePermissionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/updatePermissionByName.md) &ndash; Updates the permission row identified by the given name.
- [PermissionApi::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/delete.md) &ndash; Deletes the permission rows matching the given where conditions, and returns the number of deleted rows.
- [PermissionApi::deletePermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/deletePermissionById.md) &ndash; Deletes the permission identified by the given id.
- [PermissionApi::deletePermissionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/deletePermissionByName.md) &ndash; Deletes the permission identified by the given name.
- [PermissionApi::deletePermissionByIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/deletePermissionByIds.md) &ndash; Deletes the permission rows identified by the given ids.
- [PermissionApi::deletePermissionByNames](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionApi/deletePermissionByNames.md) &ndash; Deletes the permission rows identified by the given names.
- [LightUserDatabaseBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/LightUserDatabaseBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightUserDatabaseBaseApi::setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/LightUserDatabaseBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_UserDatabase\Api\Custom\Classes\CustomPermissionApi<br>
See the source code of [Ling\Light_UserDatabase\Api\Custom\Classes\CustomPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Custom/Classes/CustomPermissionApi.php)



SeeAlso
==============
Previous class: [CustomLightUserDatabaseBaseApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Classes/CustomLightUserDatabaseBaseApi.md)<br>Next class: [CustomPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Classes/CustomPermissionGroupApi.md)<br>
