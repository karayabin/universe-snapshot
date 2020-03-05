[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The PermissionGroupHasPermissionApiInterface class
================
2019-07-19 --> 2020-01-31






Introduction
============

The PermissionGroupHasPermissionApiInterface interface.
It implements the [ling standard object methods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-standard-object-methods.md) concept.



Class synopsis
==============


abstract class <span class="pl-k">PermissionGroupHasPermissionApiInterface</span>  {

- Methods
    - abstract public [insertPermissionGroupHasPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupHasPermissionApiInterface/insertPermissionGroupHasPermission.md)(array $permissionGroupHasPermission, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [getPermissionGroupHasPermissionByPermissionGroupIdAndPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupHasPermissionApiInterface/getPermissionGroupHasPermissionByPermissionGroupIdAndPermissionId.md)(int $permission_group_id, int $permission_id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [updatePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupHasPermissionApiInterface/updatePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId.md)(int $permission_group_id, int $permission_id, array $permissionGroupHasPermission) : void
    - abstract public [deletePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupHasPermissionApiInterface/deletePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId.md)(int $permission_group_id, int $permission_id) : void

}






Methods
==============

- [PermissionGroupHasPermissionApiInterface::insertPermissionGroupHasPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupHasPermissionApiInterface/insertPermissionGroupHasPermission.md) &ndash; Inserts the given permissionGroupHasPermission in the database.
- [PermissionGroupHasPermissionApiInterface::getPermissionGroupHasPermissionByPermissionGroupIdAndPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupHasPermissionApiInterface/getPermissionGroupHasPermissionByPermissionGroupIdAndPermissionId.md) &ndash; Returns the permissionGroupHasPermission row identified by the given permission_group_id and permission_id.
- [PermissionGroupHasPermissionApiInterface::updatePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupHasPermissionApiInterface/updatePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId.md) &ndash; Updates the permissionGroupHasPermission row identified by the given permission_group_id and permission_id.
- [PermissionGroupHasPermissionApiInterface::deletePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupHasPermissionApiInterface/deletePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId.md) &ndash; Deletes the permissionGroupHasPermission identified by the given permission_group_id and permission_id.





Location
=============
Ling\Light_UserDatabase\Api\PermissionGroupHasPermissionApiInterface<br>
See the source code of [Ling\Light_UserDatabase\Api\PermissionGroupHasPermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/PermissionGroupHasPermissionApiInterface.php)



SeeAlso
==============
Previous class: [PermissionGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupApiInterface.md)<br>Next class: [PluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PluginOptionApiInterface.md)<br>
