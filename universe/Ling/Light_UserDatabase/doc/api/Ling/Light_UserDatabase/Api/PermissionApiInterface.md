[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The PermissionApiInterface class
================
2019-07-19 --> 2019-09-18






Introduction
============

The PermissionApiInterface interface.
It implements the [ling standard object methods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-standard-object-methods.md) concept.



Class synopsis
==============


abstract class <span class="pl-k">PermissionApiInterface</span>  {

- Methods
    - abstract public [getPermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionApiInterface/getPermissionById.md)(int $id, $default = null, bool $throwNotFoundEx = false) : mixed
    - abstract public [updatePermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionApiInterface/updatePermissionById.md)(int $id, array $permission) : void
    - abstract public [insertPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionApiInterface/insertPermission.md)(array $permission, bool $ignoreDuplicate = true, bool $returnRic = false) : mixed
    - abstract public [deletePermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionApiInterface/deletePermissionById.md)(int $id) : void
    - abstract public [getPermissionNamesByUserId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionApiInterface/getPermissionNamesByUserId.md)(int $id) : array

}






Methods
==============

- [PermissionApiInterface::getPermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionApiInterface/getPermissionById.md) &ndash; Returns the permission row identified by the given id.
- [PermissionApiInterface::updatePermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionApiInterface/updatePermissionById.md) &ndash; Updates the permission row identified by the given id.
- [PermissionApiInterface::insertPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionApiInterface/insertPermission.md) &ndash; Inserts the given permission in the database.
- [PermissionApiInterface::deletePermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionApiInterface/deletePermissionById.md) &ndash; Deletes the permission identified by the given id.
- [PermissionApiInterface::getPermissionNamesByUserId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionApiInterface/getPermissionNamesByUserId.md) &ndash; Returns all the permission names associated with the given user id.





Location
=============
Ling\Light_UserDatabase\Api\PermissionApiInterface<br>
See the source code of [Ling\Light_UserDatabase\Api\PermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/PermissionApiInterface.php)



SeeAlso
==============
Previous class: [MysqlUserHasPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserHasPermissionGroupApi.md)<br>Next class: [PermissionGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupApiInterface.md)<br>
