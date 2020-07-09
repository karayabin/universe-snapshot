[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Generated\Classes\PermissionGroupApi class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupApi.md)


PermissionGroupApi::getPermissionGroupById
================



PermissionGroupApi::getPermissionGroupById — Returns the permissionGroup row identified by the given id.




Description
================


public [PermissionGroupApi::getPermissionGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupApi/getPermissionGroupById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




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
See the source code for method [PermissionGroupApi::getPermissionGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Generated/Classes/PermissionGroupApi.php#L78-L92)


See Also
================

The [PermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupApi.md) class.

Previous method: [insertPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupApi/insertPermissionGroup.md)<br>Next method: [getPermissionGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupApi/getPermissionGroupByName.md)<br>

