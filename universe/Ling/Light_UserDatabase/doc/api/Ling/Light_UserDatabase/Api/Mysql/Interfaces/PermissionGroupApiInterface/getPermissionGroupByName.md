[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Mysql\Interfaces\PermissionGroupApiInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PermissionGroupApiInterface.md)


PermissionGroupApiInterface::getPermissionGroupByName
================



PermissionGroupApiInterface::getPermissionGroupByName — Returns the permissionGroup row identified by the given name.




Description
================


abstract public [PermissionGroupApiInterface::getPermissionGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PermissionGroupApiInterface/getPermissionGroupByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the permissionGroup row identified by the given name.

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- name

    

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
See the source code for method [PermissionGroupApiInterface::getPermissionGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/Interfaces/PermissionGroupApiInterface.php#L66-L66)


See Also
================

The [PermissionGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PermissionGroupApiInterface.md) class.

Previous method: [getPermissionGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PermissionGroupApiInterface/getPermissionGroupById.md)<br>Next method: [getPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PermissionGroupApiInterface/getPermissionGroup.md)<br>

