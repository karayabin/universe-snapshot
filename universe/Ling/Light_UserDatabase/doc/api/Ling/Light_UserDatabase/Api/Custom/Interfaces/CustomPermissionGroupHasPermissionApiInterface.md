[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The CustomPermissionGroupHasPermissionApiInterface class
================
2019-07-19 --> 2020-11-09






Introduction
============

The CustomPermissionGroupHasPermissionApiInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">CustomPermissionGroupHasPermissionApiInterface</span> implements [PermissionGroupHasPermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface.md) {

- Inherited methods
    - abstract public [PermissionGroupHasPermissionApiInterface::insertPermissionGroupHasPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/insertPermissionGroupHasPermission.md)(array $permissionGroupHasPermission, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [PermissionGroupHasPermissionApiInterface::insertPermissionGroupHasPermissions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/insertPermissionGroupHasPermissions.md)(array $permissionGroupHasPermissions, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [PermissionGroupHasPermissionApiInterface::getPermissionGroupHasPermissionByPermissionGroupIdAndPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/getPermissionGroupHasPermissionByPermissionGroupIdAndPermissionId.md)(int $permission_group_id, int $permission_id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [PermissionGroupHasPermissionApiInterface::getPermissionGroupHasPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/getPermissionGroupHasPermission.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [PermissionGroupHasPermissionApiInterface::getPermissionGroupHasPermissions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/getPermissionGroupHasPermissions.md)($where, ?array $markers = []) : array
    - abstract public [PermissionGroupHasPermissionApiInterface::getPermissionGroupHasPermissionsColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/getPermissionGroupHasPermissionsColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [PermissionGroupHasPermissionApiInterface::getPermissionGroupHasPermissionsColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/getPermissionGroupHasPermissionsColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [PermissionGroupHasPermissionApiInterface::getPermissionGroupHasPermissionsKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/getPermissionGroupHasPermissionsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [PermissionGroupHasPermissionApiInterface::updatePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/updatePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId.md)(int $permission_group_id, int $permission_id, array $permissionGroupHasPermission) : void
    - abstract public [PermissionGroupHasPermissionApiInterface::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [PermissionGroupHasPermissionApiInterface::deletePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/deletePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId.md)(int $permission_group_id, int $permission_id) : void
    - abstract public [PermissionGroupHasPermissionApiInterface::deletePermissionGroupHasPermissionByPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/deletePermissionGroupHasPermissionByPermissionGroupId.md)(int $permission_group_id) : void
    - abstract public [PermissionGroupHasPermissionApiInterface::deletePermissionGroupHasPermissionByPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/deletePermissionGroupHasPermissionByPermissionId.md)(int $permission_id) : void
    - abstract public [PermissionGroupHasPermissionApiInterface::deletePermissionGroupHasPermissionByPermissionGroupIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/deletePermissionGroupHasPermissionByPermissionGroupIds.md)(array $permission_group_ids) : void
    - abstract public [PermissionGroupHasPermissionApiInterface::deletePermissionGroupHasPermissionByPermissionIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/deletePermissionGroupHasPermissionByPermissionIds.md)(array $permission_ids) : void

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
Ling\Light_UserDatabase\Api\Custom\Interfaces\CustomPermissionGroupHasPermissionApiInterface<br>
See the source code of [Ling\Light_UserDatabase\Api\Custom\Interfaces\CustomPermissionGroupHasPermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Custom/Interfaces/CustomPermissionGroupHasPermissionApiInterface.php)



SeeAlso
==============
Previous class: [CustomPermissionGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomPermissionGroupApiInterface.md)<br>Next class: [CustomPluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomPluginOptionApiInterface.md)<br>
