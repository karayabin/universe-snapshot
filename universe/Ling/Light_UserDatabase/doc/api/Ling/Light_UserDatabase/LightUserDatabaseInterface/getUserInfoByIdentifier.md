[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\LightUserDatabaseInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface.md)


LightUserDatabaseInterface::getUserInfoByIdentifier
================



LightUserDatabaseInterface::getUserInfoByIdentifier — doesn't match an user.




Description
================


abstract public [LightUserDatabaseInterface::getUserInfoByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface/getUserInfoByIdentifier.md)(string $identifier) : array | false




Returns the user info array matching the given user identifier, or false if the identifier
doesn't match an user. The returned array structure depends on your application.
Related: getUserInfo method.


Note: this method will not return the related "rights" of the user.




Parameters
================


- identifier

    


Return values
================

Returns array | false.








Source Code
===========
See the source code for method [LightUserDatabaseInterface::getUserInfoByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/LightUserDatabaseInterface.php#L55-L55)


See Also
================

The [LightUserDatabaseInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface.md) class.

Previous method: [getUserInfoByCredentials](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface/getUserInfoByCredentials.md)<br>Next method: [addUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface/addUser.md)<br>

