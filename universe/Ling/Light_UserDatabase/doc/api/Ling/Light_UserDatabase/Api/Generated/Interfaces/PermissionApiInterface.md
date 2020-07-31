[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The PermissionApiInterface class
================
2019-07-19 --> 2020-07-21






Introduction
============

The PermissionApiInterface interface.
It implements the [ling standard object methods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-standard-object-methods.md) concept.



Class synopsis
==============


abstract class <span class="pl-k">PermissionApiInterface</span>  {

- Methods
    - abstract public [insertPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/insertPermission.md)(array $permission, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [insertPermissions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/insertPermissions.md)(array $permissions, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [getPermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getPermissionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermission.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getPermissions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissions.md)($where, ?array $markers = []) : array
    - abstract public [getPermissionsColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionsColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [getPermissionsColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionsColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [getPermissionsKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [getPermissionIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionIdByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - abstract public [getPermissionsByPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionsByPermissionGroupId.md)(string $permissionGroupId) : array
    - abstract public [getPermissionsByPermissionGroupName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionsByPermissionGroupName.md)(string $permissionGroupName) : array
    - abstract public [getPermissionIdsByPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionIdsByPermissionGroupId.md)(string $permissionGroupId) : array
    - abstract public [getPermissionIdsByPermissionGroupName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionIdsByPermissionGroupName.md)(string $permissionGroupName) : array
    - abstract public [getPermissionNamesByPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionNamesByPermissionGroupId.md)(string $permissionGroupId) : array
    - abstract public [getPermissionNamesByPermissionGroupName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionNamesByPermissionGroupName.md)(string $permissionGroupName) : array
    - abstract public [getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getAllIds.md)() : array
    - abstract public [updatePermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/updatePermissionById.md)(int $id, array $permission) : void
    - abstract public [updatePermissionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/updatePermissionByName.md)(string $name, array $permission) : void
    - abstract public [delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [deletePermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/deletePermissionById.md)(int $id) : void
    - abstract public [deletePermissionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/deletePermissionByName.md)(string $name) : void
    - abstract public [deletePermissionByIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/deletePermissionByIds.md)(array $ids) : void
    - abstract public [deletePermissionByNames](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/deletePermissionByNames.md)(array $names) : void

}






Methods
==============

- [PermissionApiInterface::insertPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/insertPermission.md) &ndash; Inserts the given permission in the database.
- [PermissionApiInterface::insertPermissions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/insertPermissions.md) &ndash; Inserts the given permission rows in the database.
- [PermissionApiInterface::getPermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionById.md) &ndash; Returns the permission row identified by the given id.
- [PermissionApiInterface::getPermissionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionByName.md) &ndash; Returns the permission row identified by the given name.
- [PermissionApiInterface::getPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermission.md) &ndash; Returns the permission row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PermissionApiInterface::getPermissions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissions.md) &ndash; Returns the permission rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PermissionApiInterface::getPermissionsColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PermissionApiInterface::getPermissionsColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionsColumns.md) &ndash; Returns a subset of the permission rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PermissionApiInterface::getPermissionsKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionsKey2Value.md) &ndash; Returns an array of $key => $value from the permission rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PermissionApiInterface::getPermissionIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionIdByName.md) &ndash; Returns the id of the lud_permission table.
- [PermissionApiInterface::getPermissionsByPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionsByPermissionGroupId.md) &ndash; Returns the rows of the lud_permission table bound to the given permission_group id.
- [PermissionApiInterface::getPermissionsByPermissionGroupName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionsByPermissionGroupName.md) &ndash; Returns the rows of the lud_permission table bound to the given permission_group name.
- [PermissionApiInterface::getPermissionIdsByPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionIdsByPermissionGroupId.md) &ndash; Returns an array of lud_permission.id bound to the given permission_group id.
- [PermissionApiInterface::getPermissionIdsByPermissionGroupName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionIdsByPermissionGroupName.md) &ndash; Returns an array of lud_permission.id bound to the given permission_group name.
- [PermissionApiInterface::getPermissionNamesByPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionNamesByPermissionGroupId.md) &ndash; Returns an array of lud_permission.name bound to the given permission_group id.
- [PermissionApiInterface::getPermissionNamesByPermissionGroupName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionNamesByPermissionGroupName.md) &ndash; Returns an array of lud_permission.name bound to the given permission_group name.
- [PermissionApiInterface::getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getAllIds.md) &ndash; Returns an array of all permission ids.
- [PermissionApiInterface::updatePermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/updatePermissionById.md) &ndash; Updates the permission row identified by the given id.
- [PermissionApiInterface::updatePermissionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/updatePermissionByName.md) &ndash; Updates the permission row identified by the given name.
- [PermissionApiInterface::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/delete.md) &ndash; Deletes the permission rows matching the given where conditions, and returns the number of deleted rows.
- [PermissionApiInterface::deletePermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/deletePermissionById.md) &ndash; Deletes the permission identified by the given id.
- [PermissionApiInterface::deletePermissionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/deletePermissionByName.md) &ndash; Deletes the permission identified by the given name.
- [PermissionApiInterface::deletePermissionByIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/deletePermissionByIds.md) &ndash; Deletes the permission rows identified by the given ids.
- [PermissionApiInterface::deletePermissionByNames](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/deletePermissionByNames.md) &ndash; Deletes the permission rows identified by the given names.





Location
=============
Ling\Light_UserDatabase\Api\Generated\Interfaces\PermissionApiInterface<br>
See the source code of [Ling\Light_UserDatabase\Api\Generated\Interfaces\PermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Generated/Interfaces/PermissionApiInterface.php)



SeeAlso
==============
Previous class: [UserHasPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi.md)<br>Next class: [PermissionGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface.md)<br>
