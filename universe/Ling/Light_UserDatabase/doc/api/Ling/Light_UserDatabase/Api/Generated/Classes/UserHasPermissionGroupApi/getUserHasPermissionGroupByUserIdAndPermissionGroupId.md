[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Generated\Classes\UserHasPermissionGroupApi class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi.md)


UserHasPermissionGroupApi::getUserHasPermissionGroupByUserIdAndPermissionGroupId
================



UserHasPermissionGroupApi::getUserHasPermissionGroupByUserIdAndPermissionGroupId — Returns the userHasPermissionGroup row identified by the given user_id and permission_group_id.




Description
================


public [UserHasPermissionGroupApi::getUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/getUserHasPermissionGroupByUserIdAndPermissionGroupId.md)(int $user_id, int $permission_group_id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the userHasPermissionGroup row identified by the given user_id and permission_group_id.

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- user_id

    

- permission_group_id

    

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
See the source code for method [UserHasPermissionGroupApi::getUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Generated/Classes/UserHasPermissionGroupApi.php#L80-L95)


See Also
================

The [UserHasPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi.md) class.

Previous method: [insertUserHasPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/insertUserHasPermissionGroup.md)<br>Next method: [getUserHasPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/getUserHasPermissionGroup.md)<br>

