[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The PermissionGroupHasPermissionApiInterface class
================
2019-07-19 --> 2020-07-21






Introduction
============

The PermissionGroupHasPermissionApiInterface interface.
It implements the [ling standard object methods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-standard-object-methods.md) concept.



Class synopsis
==============


abstract class <span class="pl-k">PermissionGroupHasPermissionApiInterface</span>  {

- Methods
    - abstract public [insertPermissionGroupHasPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/insertPermissionGroupHasPermission.md)(array $permissionGroupHasPermission, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [insertPermissionGroupHasPermissions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/insertPermissionGroupHasPermissions.md)(array $permissionGroupHasPermissions, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [getPermissionGroupHasPermissionByPermissionGroupIdAndPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/getPermissionGroupHasPermissionByPermissionGroupIdAndPermissionId.md)(int $permission_group_id, int $permission_id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getPermissionGroupHasPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/getPermissionGroupHasPermission.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getPermissionGroupHasPermissions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/getPermissionGroupHasPermissions.md)($where, ?array $markers = []) : array
    - abstract public [getPermissionGroupHasPermissionsColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/getPermissionGroupHasPermissionsColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [getPermissionGroupHasPermissionsColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/getPermissionGroupHasPermissionsColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [getPermissionGroupHasPermissionsKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/getPermissionGroupHasPermissionsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [updatePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/updatePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId.md)(int $permission_group_id, int $permission_id, array $permissionGroupHasPermission) : void
    - abstract public [delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [deletePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/deletePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId.md)(int $permission_group_id, int $permission_id) : void
    - abstract public [deletePermissionGroupHasPermissionByPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/deletePermissionGroupHasPermissionByPermissionGroupId.md)(int $permission_group_id) : void
    - abstract public [deletePermissionGroupHasPermissionByPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/deletePermissionGroupHasPermissionByPermissionId.md)(int $permission_id) : void
    - abstract public [deletePermissionGroupHasPermissionByPermissionGroupIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/deletePermissionGroupHasPermissionByPermissionGroupIds.md)(array $permission_group_ids) : void
    - abstract public [deletePermissionGroupHasPermissionByPermissionIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/deletePermissionGroupHasPermissionByPermissionIds.md)(array $permission_ids) : void

}






Methods
==============

- [PermissionGroupHasPermissionApiInterface::insertPermissionGroupHasPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/insertPermissionGroupHasPermission.md) &ndash; Inserts the given permissionGroupHasPermission in the database.
- [PermissionGroupHasPermissionApiInterface::insertPermissionGroupHasPermissions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/insertPermissionGroupHasPermissions.md) &ndash; Inserts the given permissionGroupHasPermission rows in the database.
- [PermissionGroupHasPermissionApiInterface::getPermissionGroupHasPermissionByPermissionGroupIdAndPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/getPermissionGroupHasPermissionByPermissionGroupIdAndPermissionId.md) &ndash; Returns the permissionGroupHasPermission row identified by the given permission_group_id and permission_id.
- [PermissionGroupHasPermissionApiInterface::getPermissionGroupHasPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/getPermissionGroupHasPermission.md) &ndash; Returns the permissionGroupHasPermission row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PermissionGroupHasPermissionApiInterface::getPermissionGroupHasPermissions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/getPermissionGroupHasPermissions.md) &ndash; Returns the permissionGroupHasPermission rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PermissionGroupHasPermissionApiInterface::getPermissionGroupHasPermissionsColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/getPermissionGroupHasPermissionsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PermissionGroupHasPermissionApiInterface::getPermissionGroupHasPermissionsColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/getPermissionGroupHasPermissionsColumns.md) &ndash; Returns a subset of the permissionGroupHasPermission rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PermissionGroupHasPermissionApiInterface::getPermissionGroupHasPermissionsKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/getPermissionGroupHasPermissionsKey2Value.md) &ndash; Returns an array of $key => $value from the permissionGroupHasPermission rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PermissionGroupHasPermissionApiInterface::updatePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/updatePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId.md) &ndash; Updates the permissionGroupHasPermission row identified by the given permission_group_id and permission_id.
- [PermissionGroupHasPermissionApiInterface::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/delete.md) &ndash; Deletes the permissionGroupHasPermission rows matching the given where conditions, and returns the number of deleted rows.
- [PermissionGroupHasPermissionApiInterface::deletePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/deletePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId.md) &ndash; Deletes the permissionGroupHasPermission identified by the given permission_group_id and permission_id.
- [PermissionGroupHasPermissionApiInterface::deletePermissionGroupHasPermissionByPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/deletePermissionGroupHasPermissionByPermissionGroupId.md) &ndash; Deletes the permissionGroupHasPermission identified by the given permission_group_id.
- [PermissionGroupHasPermissionApiInterface::deletePermissionGroupHasPermissionByPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/deletePermissionGroupHasPermissionByPermissionId.md) &ndash; Deletes the permissionGroupHasPermission identified by the given permission_id.
- [PermissionGroupHasPermissionApiInterface::deletePermissionGroupHasPermissionByPermissionGroupIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/deletePermissionGroupHasPermissionByPermissionGroupIds.md) &ndash; Deletes the permissionGroupHasPermission rows identified by the given permission_group_permission_group_ids.
- [PermissionGroupHasPermissionApiInterface::deletePermissionGroupHasPermissionByPermissionIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/deletePermissionGroupHasPermissionByPermissionIds.md) &ndash; Deletes the permissionGroupHasPermission rows identified by the given permission_permission_ids.





Location
=============
Ling\Light_UserDatabase\Api\Generated\Interfaces\PermissionGroupHasPermissionApiInterface<br>
See the source code of [Ling\Light_UserDatabase\Api\Generated\Interfaces\PermissionGroupHasPermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface.php)



SeeAlso
==============
Previous class: [PermissionGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface.md)<br>Next class: [PluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface.md)<br>
