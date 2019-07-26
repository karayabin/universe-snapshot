[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\MysqlLightUserDatabase class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase.md)


MysqlLightUserDatabase::addUser
================



MysqlLightUserDatabase::addUser — Adds the user info to the database.




Description
================


public [MysqlLightUserDatabase::addUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/addUser.md)(string $identifier, string $password, array $userInfo) : void




Adds the user info to the database.
The user info array depends on the implementor and the application structure.

An LightUserDatabaseException exception is thrown if the identifier already exists in the database.




Parameters
================


- identifier

    

- password

    

- userInfo

    


Return values
================

Returns void.


Exceptions thrown
================

- [LightUserDatabaseException](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Exception/LightUserDatabaseException.md).&nbsp;







Source Code
===========
See the source code for method [MysqlLightUserDatabase::addUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/MysqlLightUserDatabase.php#L130-L152)


See Also
================

The [MysqlLightUserDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase.md) class.

Previous method: [getUserInfo](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/getUserInfo.md)<br>Next method: [updateUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/updateUser.md)<br>

