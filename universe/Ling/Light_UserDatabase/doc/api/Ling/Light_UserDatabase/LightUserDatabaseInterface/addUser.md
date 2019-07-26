[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\LightUserDatabaseInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface.md)


LightUserDatabaseInterface::addUser
================



LightUserDatabaseInterface::addUser — Adds the user info to the database.




Description
================


abstract public [LightUserDatabaseInterface::addUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface/addUser.md)(string $identifier, string $password, array $userInfo) : void




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
See the source code for method [LightUserDatabaseInterface::addUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/LightUserDatabaseInterface.php#L59-L59)


See Also
================

The [LightUserDatabaseInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface.md) class.

Previous method: [getUserInfo](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface/getUserInfo.md)<br>Next method: [updateUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface/updateUser.md)<br>

