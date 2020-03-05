[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Mysql\Interfaces\PermissionApiInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PermissionApiInterface.md)


PermissionApiInterface::getPermissionByName
================



PermissionApiInterface::getPermissionByName — Returns the permission row identified by the given name.




Description
================


abstract public [PermissionApiInterface::getPermissionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PermissionApiInterface/getPermissionByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the permission row identified by the given name.

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
See the source code for method [PermissionApiInterface::getPermissionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/Interfaces/PermissionApiInterface.php#L66-L66)


See Also
================

The [PermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PermissionApiInterface.md) class.

Previous method: [getPermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PermissionApiInterface/getPermissionById.md)<br>Next method: [getPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PermissionApiInterface/getPermission.md)<br>

