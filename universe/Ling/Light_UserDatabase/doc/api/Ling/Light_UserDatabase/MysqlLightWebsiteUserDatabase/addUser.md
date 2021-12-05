[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\MysqlLightWebsiteUserDatabase class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase.md)


MysqlLightWebsiteUserDatabase::addUser
================



MysqlLightWebsiteUserDatabase::addUser — Important: this is an override of the parent method.




Description
================


public [MysqlLightWebsiteUserDatabase::addUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/addUser.md)(array $userInfo) : int




Important: this is an override of the parent method.

We basically just redefine the return of the method (since the concept
of the id now exists), which is an integer representing the id of the user.




Parameters
================


- userInfo

    


Return values
================

Returns int.


Exceptions thrown
================

- [LightUserDatabaseException](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Exception/LightUserDatabaseException.md).&nbsp;







Source Code
===========
See the source code for method [MysqlLightWebsiteUserDatabase::addUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/MysqlLightWebsiteUserDatabase.php#L190-L233)


See Also
================

The [MysqlLightWebsiteUserDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase.md) class.

Previous method: [getUserInfoById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getUserInfoById.md)<br>Next method: [updateUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/updateUser.md)<br>

