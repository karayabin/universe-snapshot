[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The PermissionOptionsApiInterface class
================
2019-07-19 --> 2019-12-17






Introduction
============

The PermissionOptionsApiInterface interface.
It implements the [ling standard object methods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-standard-object-methods.md) concept.



Class synopsis
==============


abstract class <span class="pl-k">PermissionOptionsApiInterface</span>  {

- Methods
    - abstract public [insertPermissionOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionOptionsApiInterface/insertPermissionOptions.md)(array $permissionOptions, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [getPermissionOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionOptionsApiInterface/getPermissionOptionsById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [updatePermissionOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionOptionsApiInterface/updatePermissionOptionsById.md)(int $id, array $permissionOptions) : void
    - abstract public [deletePermissionOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionOptionsApiInterface/deletePermissionOptionsById.md)(int $id) : void

}






Methods
==============

- [PermissionOptionsApiInterface::insertPermissionOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionOptionsApiInterface/insertPermissionOptions.md) &ndash; Inserts the given permissionOptions in the database.
- [PermissionOptionsApiInterface::getPermissionOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionOptionsApiInterface/getPermissionOptionsById.md) &ndash; Returns the permissionOptions row identified by the given id.
- [PermissionOptionsApiInterface::updatePermissionOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionOptionsApiInterface/updatePermissionOptionsById.md) &ndash; Updates the permissionOptions row identified by the given id.
- [PermissionOptionsApiInterface::deletePermissionOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionOptionsApiInterface/deletePermissionOptionsById.md) &ndash; Deletes the permissionOptions identified by the given id.





Location
=============
Ling\Light_UserDatabase\Api\PermissionOptionsApiInterface<br>
See the source code of [Ling\Light_UserDatabase\Api\PermissionOptionsApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/PermissionOptionsApiInterface.php)



SeeAlso
==============
Previous class: [PermissionGroupHasPermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupHasPermissionApiInterface.md)<br>Next class: [UserHasPermissionGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserHasPermissionGroupApiInterface.md)<br>
