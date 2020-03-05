[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\UserGroupApiInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupApiInterface.md)


UserGroupApiInterface::getUserGroupIdByName
================



UserGroupApiInterface::getUserGroupIdByName — Returns the id of the user group which name is given.




Description
================


abstract public [UserGroupApiInterface::getUserGroupIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupApiInterface/getUserGroupIdByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed




Returns the id of the user group which name is given.

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
See the source code for method [UserGroupApiInterface::getUserGroupIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/UserGroupApiInterface.php#L138-L138)


See Also
================

The [UserGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupApiInterface.md) class.

Previous method: [deleteUserGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupApiInterface/deleteUserGroupByName.md)<br>

