[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\MysqlLightUserDatabase class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase.md)


MysqlLightUserDatabase::getUserInfo
================



MysqlLightUserDatabase::getUserInfo — credentials don't match any user.




Description
================


public [MysqlLightUserDatabase::getUserInfo](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/getUserInfo.md)(string $identifier, string $password) : array | false




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
See the source code for method [MysqlLightUserDatabase::getUserInfo](https://github.com/lingtalfi/Light_UserDatabase/blob/master/MysqlLightUserDatabase.php#L114-L125)


See Also
================

The [MysqlLightUserDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase.md) class.

Previous method: [setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/setPdoWrapper.md)<br>Next method: [getUserInfoByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase/getUserInfoByIdentifier.md)<br>

