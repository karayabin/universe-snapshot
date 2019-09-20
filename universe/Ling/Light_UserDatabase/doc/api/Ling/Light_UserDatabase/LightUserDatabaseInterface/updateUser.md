[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\LightUserDatabaseInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface.md)


LightUserDatabaseInterface::updateUser
================



LightUserDatabaseInterface::updateUser — Updates the user identified by the given identifier.




Description
================


abstract public [LightUserDatabaseInterface::updateUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface/updateUser.md)(string $identifier, array $userInfo) : void




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
See the source code for method [LightUserDatabaseInterface::updateUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/LightUserDatabaseInterface.php#L85-L85)


See Also
================

The [LightUserDatabaseInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface.md) class.

Previous method: [addUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface/addUser.md)<br>Next method: [deleteUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface/deleteUser.md)<br>

