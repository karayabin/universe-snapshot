[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\BabyYamlLightUserDatabase class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightUserDatabase.md)


BabyYamlLightUserDatabase::addUser
================



BabyYamlLightUserDatabase::addUser — Adds the user info to the database.




Description
================


public [BabyYamlLightUserDatabase::addUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightUserDatabase/addUser.md)(string $identifier, string $password, array $userInfo) : void




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
See the source code for method [BabyYamlLightUserDatabase::addUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/BabyYamlLightUserDatabase.php#L70-L87)


See Also
================

The [BabyYamlLightUserDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightUserDatabase.md) class.

Previous method: [getUserInfo](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightUserDatabase/getUserInfo.md)<br>Next method: [updateUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightUserDatabase/updateUser.md)<br>

