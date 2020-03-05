[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Mysql\Classes\UserGroupApi class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupApi.md)


UserGroupApi::getUserGroupIdByName
================



UserGroupApi::getUserGroupIdByName — Returns the id of the lud_user_group table.




Description
================


public [UserGroupApi::getUserGroupIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupApi/getUserGroupIdByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed




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
See the source code for method [UserGroupApi::getUserGroupIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/Classes/UserGroupApi.php#L155-L170)


See Also
================

The [UserGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupApi.md) class.

Previous method: [getUserGroups](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupApi/getUserGroups.md)<br>Next method: [getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupApi/getAllIds.md)<br>

