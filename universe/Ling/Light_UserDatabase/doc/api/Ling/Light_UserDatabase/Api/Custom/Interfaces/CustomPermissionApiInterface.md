[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The CustomPermissionApiInterface class
================
2019-07-19 --> 2020-06-25






Introduction
============

The CustomPermissionApiInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">CustomPermissionApiInterface</span> implements [PermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface.md) {

- Methods
    - abstract public [getPermissionNamesByUserId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomPermissionApiInterface/getPermissionNamesByUserId.md)(int $id) : array

- Inherited methods
    - abstract public [PermissionApiInterface::insertPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/insertPermission.md)(array $permission, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [PermissionApiInterface::getPermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [PermissionApiInterface::getPermissionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [PermissionApiInterface::getPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermission.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [PermissionApiInterface::getPermissions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissions.md)($where, ?array $markers = []) : array
    - abstract public [PermissionApiInterface::getPermissionsColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionsColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [PermissionApiInterface::getPermissionsColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionsColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [PermissionApiInterface::getPermissionsKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [PermissionApiInterface::getPermissionIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionIdByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - abstract public [PermissionApiInterface::getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getAllIds.md)() : array
    - abstract public [PermissionApiInterface::updatePermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/updatePermissionById.md)(int $id, array $permission) : void
    - abstract public [PermissionApiInterface::updatePermissionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/updatePermissionByName.md)(string $name, array $permission) : void
    - abstract public [PermissionApiInterface::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [PermissionApiInterface::deletePermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/deletePermissionById.md)(int $id) : void
    - abstract public [PermissionApiInterface::deletePermissionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/deletePermissionByName.md)(string $name) : void
    - abstract public [PermissionApiInterface::deletePermissionByIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/deletePermissionByIds.md)(array $ids) : void
    - abstract public [PermissionApiInterface::deletePermissionByNames](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/deletePermissionByNames.md)(array $names) : void

}






Methods
==============

- [CustomPermissionApiInterface::getPermissionNamesByUserId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomPermissionApiInterface/getPermissionNamesByUserId.md) &ndash; Returns the permission names bound to the given user id.
- [PermissionApiInterface::insertPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/insertPermission.md) &ndash; Inserts the given permission in the database.
- [PermissionApiInterface::getPermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionById.md) &ndash; Returns the permission row identified by the given id.
- [PermissionApiInterface::getPermissionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionByName.md) &ndash; Returns the permission row identified by the given name.
- [PermissionApiInterface::getPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermission.md) &ndash; Returns the permission row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PermissionApiInterface::getPermissions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissions.md) &ndash; Returns the permission rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PermissionApiInterface::getPermissionsColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PermissionApiInterface::getPermissionsColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionsColumns.md) &ndash; Returns a subset of the permission rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PermissionApiInterface::getPermissionsKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionsKey2Value.md) &ndash; Returns an array of $key => $value from the permission rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PermissionApiInterface::getPermissionIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionApiInterface/getPermissionIdByName.md) &ndash; Returns the id of the lud_permission table.
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
Ling\Light_UserDatabase\Api\Custom\Interfaces\CustomPermissionApiInterface<br>
See the source code of [Ling\Light_UserDatabase\Api\Custom\Interfaces\CustomPermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Custom/Interfaces/CustomPermissionApiInterface.php)



SeeAlso
==============
Previous class: [CustomLightUserDatabaseApiFactory](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/CustomLightUserDatabaseApiFactory.md)<br>Next class: [CustomPermissionGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomPermissionGroupApiInterface.md)<br>
