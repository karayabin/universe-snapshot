[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\MysqlLightUserDatabase class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase.md)


MysqlLightUserDatabase::getUserInfoByIdentifier
================



MysqlLightUserDatabase::getUserInfoByIdentifier — doesn't match an user.




Description
================


public [MysqlLightUserDatabase::getUserInfoByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/getUserInfoByIdentifier.md)(string $identifier) : array | false




Returns the user info array matching the given user identifier, or false if the identifier
doesn't match an user. The returned array structure depends on your application.
Related: getUserInfo method.




Parameters
================


- identifier

    


Return values
================

Returns array | false.








Source Code
===========
See the source code for method [MysqlLightUserDatabase::getUserInfoByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/MysqlLightUserDatabase.php#L130-L140)


See Also
================

The [MysqlLightUserDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase.md) class.

Previous method: [getUserInfo](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/getUserInfo.md)<br>Next method: [addUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/addUser.md)<br>

