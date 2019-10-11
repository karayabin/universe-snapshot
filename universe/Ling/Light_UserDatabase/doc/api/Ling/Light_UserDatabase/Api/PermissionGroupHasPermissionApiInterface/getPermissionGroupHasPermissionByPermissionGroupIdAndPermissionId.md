[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\PermissionGroupHasPermissionApiInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupHasPermissionApiInterface.md)


PermissionGroupHasPermissionApiInterface::getPermissionGroupHasPermissionByPermissionGroupIdAndPermissionId
================



PermissionGroupHasPermissionApiInterface::getPermissionGroupHasPermissionByPermissionGroupIdAndPermissionId — Returns the permissionGroupHasPermission row identified by the given permission_group_id and permission_id.




Description
================


abstract public [PermissionGroupHasPermissionApiInterface::getPermissionGroupHasPermissionByPermissionGroupIdAndPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupHasPermissionApiInterface/getPermissionGroupHasPermissionByPermissionGroupIdAndPermissionId.md)(int $permission_group_id, int $permission_id, $default = null, bool $throwNotFoundEx = false) : mixed




Returns the permissionGroupHasPermission row identified by the given permission_group_id and permission_id.

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- permission_group_id

    

- permission_id

    

- default

    

- throwNotFoundEx

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [PermissionGroupHasPermissionApiInterface::getPermissionGroupHasPermissionByPermissionGroupIdAndPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/PermissionGroupHasPermissionApiInterface.php#L29-L29)


See Also
================

The [PermissionGroupHasPermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupHasPermissionApiInterface.md) class.

Next method: [updatePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupHasPermissionApiInterface/updatePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId.md)<br>
