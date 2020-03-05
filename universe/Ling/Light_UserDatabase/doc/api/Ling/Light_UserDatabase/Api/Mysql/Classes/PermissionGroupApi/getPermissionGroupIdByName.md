[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Mysql\Classes\PermissionGroupApi class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/PermissionGroupApi.md)


PermissionGroupApi::getPermissionGroupIdByName
================



PermissionGroupApi::getPermissionGroupIdByName — Returns the id of the lud_permission_group table.




Description
================


public [PermissionGroupApi::getPermissionGroupIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/PermissionGroupApi/getPermissionGroupIdByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed




Returns the id of the lud_permission_group table.

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

Returns string | mixed.








Source Code
===========
See the source code for method [PermissionGroupApi::getPermissionGroupIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/Classes/PermissionGroupApi.php#L155-L170)


See Also
================

The [PermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/PermissionGroupApi.md) class.

Previous method: [getPermissionGroups](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/PermissionGroupApi/getPermissionGroups.md)<br>Next method: [getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/PermissionGroupApi/getAllIds.md)<br>

