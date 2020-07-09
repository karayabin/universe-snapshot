[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Generated\Interfaces\UserGroupApiInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupApiInterface.md)


UserGroupApiInterface::getUserGroupIdByName
================



UserGroupApiInterface::getUserGroupIdByName — Returns the id of the lud_user_group table.




Description
================


abstract public [UserGroupApiInterface::getUserGroupIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupApiInterface/getUserGroupIdByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed




Returns the id of the lud_user_group table.

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
See the source code for method [UserGroupApiInterface::getUserGroupIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Generated/Interfaces/UserGroupApiInterface.php#L159-L159)


See Also
================

The [UserGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupApiInterface.md) class.

Previous method: [getUserGroupsKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupApiInterface/getUserGroupsKey2Value.md)<br>Next method: [getUserGroupsByPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupApiInterface/getUserGroupsByPluginOptionId.md)<br>

