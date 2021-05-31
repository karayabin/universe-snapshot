[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\MysqlLightWebsiteUserDatabase class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase.md)


MysqlLightWebsiteUserDatabase::updateUser
================



MysqlLightWebsiteUserDatabase::updateUser — Updates the user identified by the given identifier.




Description
================


public [MysqlLightWebsiteUserDatabase::updateUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/updateUser.md)(string $identifier, array $userInfo) : void




Updates the user identified by the given identifier.

The userInfo can contain all the information, or only some of them.
The password should be updated with the key "password".




Parameters
================


- identifier

    

- userInfo

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [MysqlLightWebsiteUserDatabase::updateUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/MysqlLightWebsiteUserDatabase.php#L249-L269)


See Also
================

The [MysqlLightWebsiteUserDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase.md) class.

Previous method: [addUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/addUser.md)<br>Next method: [updateUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/updateUserById.md)<br>

