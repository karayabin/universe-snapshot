[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\LightUserDatabaseInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface.md)


LightUserDatabaseInterface::getUserInfoByCredentials
================



LightUserDatabaseInterface::getUserInfoByCredentials — credentials don't match any user.




Description
================


abstract public [LightUserDatabaseInterface::getUserInfoByCredentials](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface/getUserInfoByCredentials.md)(string $identifier, string $password) : array | false




Returns the user info array matching the given credentials, or false if the
credentials don't match any user.

This method will also return the "rights" key populated with the rights
according to the user "profiles".
See more details in the [Light_UserDatabase conception notes](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/pages/conception-notes.md).




Parameters
================


- identifier

    

- password

    


Return values
================

Returns array | false.








Source Code
===========
See the source code for method [LightUserDatabaseInterface::getUserInfoByCredentials](https://github.com/lingtalfi/Light_UserDatabase/blob/master/LightUserDatabaseInterface.php#L41-L41)


See Also
================

The [LightUserDatabaseInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface.md) class.

Next method: [getUserInfoByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface/getUserInfoByIdentifier.md)<br>

