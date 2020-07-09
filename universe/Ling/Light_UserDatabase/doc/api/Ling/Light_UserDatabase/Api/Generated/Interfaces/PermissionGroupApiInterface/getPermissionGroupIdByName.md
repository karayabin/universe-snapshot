[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Generated\Interfaces\PermissionGroupApiInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface.md)


PermissionGroupApiInterface::getPermissionGroupIdByName
================



PermissionGroupApiInterface::getPermissionGroupIdByName — Returns the id of the lud_permission_group table.




Description
================


abstract public [PermissionGroupApiInterface::getPermissionGroupIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/getPermissionGroupIdByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed




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
See the source code for method [PermissionGroupApiInterface::getPermissionGroupIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Generated/Interfaces/PermissionGroupApiInterface.php#L159-L159)


See Also
================

The [PermissionGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface.md) class.

Previous method: [getPermissionGroupsKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/getPermissionGroupsKey2Value.md)<br>Next method: [getPermissionGroupsByPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupApiInterface/getPermissionGroupsByPermissionId.md)<br>

