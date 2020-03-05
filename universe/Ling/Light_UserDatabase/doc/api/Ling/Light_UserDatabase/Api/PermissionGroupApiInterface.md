[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The PermissionGroupApiInterface class
================
2019-07-19 --> 2020-01-31






Introduction
============

The PermissionGroupApiInterface interface.
It implements the [ling standard object methods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-standard-object-methods.md) concept.



Class synopsis
==============


abstract class <span class="pl-k">PermissionGroupApiInterface</span>  {

- Methods
    - abstract public [insertPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupApiInterface/insertPermissionGroup.md)(array $permissionGroup, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [getPermissionGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupApiInterface/getPermissionGroupById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getPermissionGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupApiInterface/getPermissionGroupByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupApiInterface/getAllIds.md)() : array
    - abstract public [updatePermissionGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupApiInterface/updatePermissionGroupById.md)(int $id, array $permissionGroup) : void
    - abstract public [updatePermissionGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupApiInterface/updatePermissionGroupByName.md)(string $name, array $permissionGroup) : void
    - abstract public [deletePermissionGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupApiInterface/deletePermissionGroupById.md)(int $id) : void
    - abstract public [deletePermissionGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupApiInterface/deletePermissionGroupByName.md)(string $name) : void
    - abstract public [getPermissionGroupIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupApiInterface/getPermissionGroupIdByName.md)(string $name) : int | false

}






Methods
==============

- [PermissionGroupApiInterface::insertPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupApiInterface/insertPermissionGroup.md) &ndash; Inserts the given permissionGroup in the database.
- [PermissionGroupApiInterface::getPermissionGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupApiInterface/getPermissionGroupById.md) &ndash; Returns the permissionGroup row identified by the given id.
- [PermissionGroupApiInterface::getPermissionGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupApiInterface/getPermissionGroupByName.md) &ndash; Returns the permissionGroup row identified by the given name.
- [PermissionGroupApiInterface::getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupApiInterface/getAllIds.md) &ndash; Returns an array of all permissionGroup ids.
- [PermissionGroupApiInterface::updatePermissionGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupApiInterface/updatePermissionGroupById.md) &ndash; Updates the permissionGroup row identified by the given id.
- [PermissionGroupApiInterface::updatePermissionGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupApiInterface/updatePermissionGroupByName.md) &ndash; Updates the permissionGroup row identified by the given name.
- [PermissionGroupApiInterface::deletePermissionGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupApiInterface/deletePermissionGroupById.md) &ndash; Deletes the permissionGroup identified by the given id.
- [PermissionGroupApiInterface::deletePermissionGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupApiInterface/deletePermissionGroupByName.md) &ndash; Deletes the permissionGroup identified by the given name.
- [PermissionGroupApiInterface::getPermissionGroupIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupApiInterface/getPermissionGroupIdByName.md) &ndash; or false if the group doesn't exist.





Location
=============
Ling\Light_UserDatabase\Api\PermissionGroupApiInterface<br>
See the source code of [Ling\Light_UserDatabase\Api\PermissionGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/PermissionGroupApiInterface.php)



SeeAlso
==============
Previous class: [PermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionApiInterface.md)<br>Next class: [PermissionGroupHasPermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupHasPermissionApiInterface.md)<br>
