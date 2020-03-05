[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\PermissionGroupApiInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupApiInterface.md)


PermissionGroupApiInterface::getPermissionGroupById
================



PermissionGroupApiInterface::getPermissionGroupById — Returns the permissionGroup row identified by the given id.




Description
================


abstract public [PermissionGroupApiInterface::getPermissionGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupApiInterface/getPermissionGroupById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the permissionGroup row identified by the given id.

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- id

    

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
See the source code for method [PermissionGroupApiInterface::getPermissionGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/PermissionGroupApiInterface.php#L50-L50)


See Also
================

The [PermissionGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupApiInterface.md) class.

Previous method: [insertPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupApiInterface/insertPermissionGroup.md)<br>Next method: [getPermissionGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupApiInterface/getPermissionGroupByName.md)<br>

