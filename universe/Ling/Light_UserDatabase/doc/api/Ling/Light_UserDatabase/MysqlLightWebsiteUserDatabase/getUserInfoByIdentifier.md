[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\MysqlLightWebsiteUserDatabase class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase.md)


MysqlLightWebsiteUserDatabase::getUserInfoByIdentifier
================



MysqlLightWebsiteUserDatabase::getUserInfoByIdentifier — doesn't match an user.




Description
================


public [MysqlLightWebsiteUserDatabase::getUserInfoByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getUserInfoByIdentifier.md)(string $identifier) : array | false




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
See the source code for method [MysqlLightWebsiteUserDatabase::getUserInfoByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/MysqlLightWebsiteUserDatabase.php#L208-L218)


See Also
================

The [MysqlLightWebsiteUserDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase.md) class.

Previous method: [getUserInfoByCredentials](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getUserInfoByCredentials.md)<br>Next method: [getUserInfoById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getUserInfoById.md)<br>

