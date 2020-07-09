[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Generated\Classes\PermissionGroupApi class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupApi.md)


PermissionGroupApi::getPermissionGroup
================



PermissionGroupApi::getPermissionGroup — Returns the permissionGroup row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).




Description
================


public [PermissionGroupApi::getPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupApi/getPermissionGroup.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the permissionGroup row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).

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
See the source code for method [PermissionGroupApi::getPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Generated/Classes/PermissionGroupApi.php#L120-L139)


See Also
================

The [PermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupApi.md) class.

Previous method: [getPermissionGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupApi/getPermissionGroupByName.md)<br>Next method: [getPermissionGroups](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupApi/getPermissionGroups.md)<br>

