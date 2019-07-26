[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\LightUserDatabaseInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface.md)


LightUserDatabaseInterface::getUserInfo
================



LightUserDatabaseInterface::getUserInfo — credentials don't match any user.




Description
================


abstract public [LightUserDatabaseInterface::getUserInfo](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface/getUserInfo.md)(string $identifier, string $password) : array | false




Returns the user info array matching the given credentials, or false if the
credentials don't match any user.


The array info structure might be expanded by the implementor,
but usually it contains at least the following:

- rights: the array of rights of the user
- ?pseudo: the pseudo of the user
- ?avatar: the avatar url of the user




Parameters
================


- identifier

    

- password

    


Return values
================

Returns array | false.








Source Code
===========
See the source code for method [LightUserDatabaseInterface::getUserInfo](https://github.com/lingtalfi/Light_UserDatabase/blob/master/LightUserDatabaseInterface.php#L42-L42)


See Also
================

The [LightUserDatabaseInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface.md) class.

Next method: [addUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface/addUser.md)<br>

