[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The CustomPermissionGroupApiInterface class
================
2019-07-19 --> 2021-06-15






Introduction
============

The CustomPermissionGroupApiInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">CustomPermissionGroupApiInterface</span> implements [PermissionGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface.md) {

- Inherited methods
    - abstract public [PermissionGroupApiInterface::insertPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/insertPermissionGroup.md)(array $permissionGroup, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [PermissionGroupApiInterface::insertPermissionGroups](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/insertPermissionGroups.md)(array $permissionGroups, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [PermissionGroupApiInterface::fetchAll](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/fetchAll.md)(?array $components = []) : array
    - abstract public [PermissionGroupApiInterface::fetch](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/fetch.md)(?array $components = []) : array
    - abstract public [PermissionGroupApiInterface::getPermissionGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/getPermissionGroupById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [PermissionGroupApiInterface::getPermissionGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/getPermissionGroupByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [PermissionGroupApiInterface::getPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/getPermissionGroup.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [PermissionGroupApiInterface::getPermissionGroups](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/getPermissionGroups.md)($where, ?array $markers = []) : array
    - abstract public [PermissionGroupApiInterface::getPermissionGroupsColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/getPermissionGroupsColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [PermissionGroupApiInterface::getPermissionGroupsColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/getPermissionGroupsColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [PermissionGroupApiInterface::getPermissionGroupsKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/getPermissionGroupsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [PermissionGroupApiInterface::getPermissionGroupIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/getPermissionGroupIdByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - abstract public [PermissionGroupApiInterface::getPermissionGroupsByPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/getPermissionGroupsByPermissionId.md)(string $permissionId) : array
    - abstract public [PermissionGroupApiInterface::getPermissionGroupsByPermissionName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/getPermissionGroupsByPermissionName.md)(string $permissionName) : array
    - abstract public [PermissionGroupApiInterface::getPermissionGroupIdsByPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/getPermissionGroupIdsByPermissionId.md)(string $permissionId) : array
    - abstract public [PermissionGroupApiInterface::getPermissionGroupIdsByPermissionName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/getPermissionGroupIdsByPermissionName.md)(string $permissionName) : array
    - abstract public [PermissionGroupApiInterface::getPermissionGroupNamesByPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/getPermissionGroupNamesByPermissionId.md)(string $permissionId) : array
    - abstract public [PermissionGroupApiInterface::getPermissionGroupNamesByPermissionName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/getPermissionGroupNamesByPermissionName.md)(string $permissionName) : array
    - abstract public [PermissionGroupApiInterface::getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/getAllIds.md)() : array
    - abstract public [PermissionGroupApiInterface::updatePermissionGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/updatePermissionGroupById.md)(int $id, array $permissionGroup, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [PermissionGroupApiInterface::updatePermissionGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/updatePermissionGroupByName.md)(string $name, array $permissionGroup, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [PermissionGroupApiInterface::updatePermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/updatePermissionGroup.md)(array $permissionGroup, ?$where = null, ?array $markers = []) : void
    - abstract public [PermissionGroupApiInterface::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [PermissionGroupApiInterface::deletePermissionGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/deletePermissionGroupById.md)(int $id) : void
    - abstract public [PermissionGroupApiInterface::deletePermissionGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/deletePermissionGroupByName.md)(string $name) : void
    - abstract public [PermissionGroupApiInterface::deletePermissionGroupByIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/deletePermissionGroupByIds.md)(array $ids) : void
    - abstract public [PermissionGroupApiInterface::deletePermissionGroupByNames](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/deletePermissionGroupByNames.md)(array $names) : void

}






Methods
==============

- [PermissionGroupApiInterface::insertPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/insertPermissionGroup.md) &ndash; Inserts the given permission group in the database.
- [PermissionGroupApiInterface::insertPermissionGroups](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/insertPermissionGroups.md) &ndash; Inserts the given permission group rows in the database.
- [PermissionGroupApiInterface::fetchAll](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [PermissionGroupApiInterface::fetch](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [PermissionGroupApiInterface::getPermissionGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/getPermissionGroupById.md) &ndash; Returns the permission group row identified by the given id.
- [PermissionGroupApiInterface::getPermissionGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/getPermissionGroupByName.md) &ndash; Returns the permission group row identified by the given name.
- [PermissionGroupApiInterface::getPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/getPermissionGroup.md) &ndash; Returns the permissionGroup row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PermissionGroupApiInterface::getPermissionGroups](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/getPermissionGroups.md) &ndash; Returns the permissionGroup rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PermissionGroupApiInterface::getPermissionGroupsColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/getPermissionGroupsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PermissionGroupApiInterface::getPermissionGroupsColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/getPermissionGroupsColumns.md) &ndash; Returns a subset of the permissionGroup rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PermissionGroupApiInterface::getPermissionGroupsKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/getPermissionGroupsKey2Value.md) &ndash; Returns an array of $key => $value from the permissionGroup rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PermissionGroupApiInterface::getPermissionGroupIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/getPermissionGroupIdByName.md) &ndash; Returns the id of the lud_permission_group table.
- [PermissionGroupApiInterface::getPermissionGroupsByPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/getPermissionGroupsByPermissionId.md) &ndash; Returns the rows of the lud_permission_group table bound to the given permission id.
- [PermissionGroupApiInterface::getPermissionGroupsByPermissionName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/getPermissionGroupsByPermissionName.md) &ndash; Returns the rows of the lud_permission_group table bound to the given permission name.
- [PermissionGroupApiInterface::getPermissionGroupIdsByPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/getPermissionGroupIdsByPermissionId.md) &ndash; Returns an array of lud_permission_group.id bound to the given permission id.
- [PermissionGroupApiInterface::getPermissionGroupIdsByPermissionName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/getPermissionGroupIdsByPermissionName.md) &ndash; Returns an array of lud_permission_group.id bound to the given permission name.
- [PermissionGroupApiInterface::getPermissionGroupNamesByPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/getPermissionGroupNamesByPermissionId.md) &ndash; Returns an array of lud_permission_group.name bound to the given permission id.
- [PermissionGroupApiInterface::getPermissionGroupNamesByPermissionName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/getPermissionGroupNamesByPermissionName.md) &ndash; Returns an array of lud_permission_group.name bound to the given permission name.
- [PermissionGroupApiInterface::getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/getAllIds.md) &ndash; Returns an array of all permissionGroup ids.
- [PermissionGroupApiInterface::updatePermissionGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/updatePermissionGroupById.md) &ndash; Updates the permission group row identified by the given id.
- [PermissionGroupApiInterface::updatePermissionGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/updatePermissionGroupByName.md) &ndash; Updates the permission group row identified by the given name.
- [PermissionGroupApiInterface::updatePermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/updatePermissionGroup.md) &ndash; Updates the permission group row.
- [PermissionGroupApiInterface::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/delete.md) &ndash; Deletes the permissionGroup rows matching the given where conditions, and returns the number of deleted rows.
- [PermissionGroupApiInterface::deletePermissionGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/deletePermissionGroupById.md) &ndash; Deletes the permission group identified by the given id.
- [PermissionGroupApiInterface::deletePermissionGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/deletePermissionGroupByName.md) &ndash; Deletes the permission group identified by the given name.
- [PermissionGroupApiInterface::deletePermissionGroupByIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/deletePermissionGroupByIds.md) &ndash; Deletes the permission group rows identified by the given ids.
- [PermissionGroupApiInterface::deletePermissionGroupByNames](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/deletePermissionGroupByNames.md) &ndash; Deletes the permission group rows identified by the given names.





Location
=============
Ling\Light_UserDatabase\Api\Custom\Interfaces\CustomPermissionGroupApiInterface<br>
See the source code of [Ling\Light_UserDatabase\Api\Custom\Interfaces\CustomPermissionGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Custom/Interfaces/CustomPermissionGroupApiInterface.php)



SeeAlso
==============
Previous class: [CustomPermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomPermissionApiInterface.md)<br>Next class: [CustomPermissionGroupHasPermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomPermissionGroupHasPermissionApiInterface.md)<br>
