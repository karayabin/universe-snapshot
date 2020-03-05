[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Mysql\Interfaces\UserHasPermissionGroupApiInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserHasPermissionGroupApiInterface.md)


UserHasPermissionGroupApiInterface::getUserHasPermissionGroup
================



UserHasPermissionGroupApiInterface::getUserHasPermissionGroup — Returns the userHasPermissionGroup row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).




Description
================


abstract public [UserHasPermissionGroupApiInterface::getUserHasPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserHasPermissionGroupApiInterface/getUserHasPermissionGroup.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the userHasPermissionGroup row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- where

    

- markers

    

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
See the source code for method [UserHasPermissionGroupApiInterface::getUserHasPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/Interfaces/UserHasPermissionGroupApiInterface.php#L70-L70)


See Also
================

The [UserHasPermissionGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserHasPermissionGroupApiInterface.md) class.

Previous method: [getUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserHasPermissionGroupApiInterface/getUserHasPermissionGroupByUserIdAndPermissionGroupId.md)<br>Next method: [getUserHasPermissionGroups](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserHasPermissionGroupApiInterface/getUserHasPermissionGroups.md)<br>

