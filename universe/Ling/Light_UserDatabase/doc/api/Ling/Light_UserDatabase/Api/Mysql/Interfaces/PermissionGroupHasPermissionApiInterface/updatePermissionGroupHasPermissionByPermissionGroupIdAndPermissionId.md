[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Mysql\Interfaces\PermissionGroupHasPermissionApiInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PermissionGroupHasPermissionApiInterface.md)


PermissionGroupHasPermissionApiInterface::updatePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId
================



PermissionGroupHasPermissionApiInterface::updatePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId — Updates the permissionGroupHasPermission row identified by the given permission_group_id and permission_id.




Description
================


abstract public [PermissionGroupHasPermissionApiInterface::updatePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PermissionGroupHasPermissionApiInterface/updatePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId.md)(int $permission_group_id, int $permission_id, array $permissionGroupHasPermission) : void




Updates the permissionGroupHasPermission row identified by the given permission_group_id and permission_id.




Parameters
================


- permission_group_id

    

- permission_id

    

- permissionGroupHasPermission

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [PermissionGroupHasPermissionApiInterface::updatePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/Interfaces/PermissionGroupHasPermissionApiInterface.php#L99-L99)


See Also
================

The [PermissionGroupHasPermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PermissionGroupHasPermissionApiInterface.md) class.

Previous method: [getPermissionGroupHasPermissions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PermissionGroupHasPermissionApiInterface/getPermissionGroupHasPermissions.md)<br>Next method: [deletePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PermissionGroupHasPermissionApiInterface/deletePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId.md)<br>

