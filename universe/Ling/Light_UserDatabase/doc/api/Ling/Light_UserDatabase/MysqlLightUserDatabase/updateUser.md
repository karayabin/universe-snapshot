[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\MysqlLightUserDatabase class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase.md)


MysqlLightUserDatabase::updateUser
================



MysqlLightUserDatabase::updateUser — Updates the user identified by the given identifier.




Description
================


public [MysqlLightUserDatabase::updateUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/updateUser.md)(string $identifier, array $userInfo) : void




Updates the user identified by the given identifier.

The userInfo can contain all the information, or only some of them.
The password should be updated with the key "pass".




Parameters
================


- identifier

    

- userInfo

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [MysqlLightUserDatabase::updateUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/MysqlLightUserDatabase.php#L172-L185)


See Also
================

The [MysqlLightUserDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase.md) class.

Previous method: [addUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/addUser.md)<br>Next method: [deleteUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/deleteUser.md)<br>

