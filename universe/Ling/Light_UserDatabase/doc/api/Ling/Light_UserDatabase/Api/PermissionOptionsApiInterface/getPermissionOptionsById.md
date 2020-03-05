[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\PermissionOptionsApiInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionOptionsApiInterface.md)


PermissionOptionsApiInterface::getPermissionOptionsById
================



PermissionOptionsApiInterface::getPermissionOptionsById — Returns the permissionOptions row identified by the given id.




Description
================


abstract public [PermissionOptionsApiInterface::getPermissionOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionOptionsApiInterface/getPermissionOptionsById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the permissionOptions row identified by the given id.

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
See the source code for method [PermissionOptionsApiInterface::getPermissionOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/PermissionOptionsApiInterface.php#L50-L50)


See Also
================

The [PermissionOptionsApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionOptionsApiInterface.md) class.

Previous method: [insertPermissionOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionOptionsApiInterface/insertPermissionOptions.md)<br>Next method: [updatePermissionOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionOptionsApiInterface/updatePermissionOptionsById.md)<br>

