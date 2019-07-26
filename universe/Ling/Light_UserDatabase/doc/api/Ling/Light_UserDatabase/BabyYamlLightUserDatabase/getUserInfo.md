[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\BabyYamlLightUserDatabase class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightUserDatabase.md)


BabyYamlLightUserDatabase::getUserInfo
================



BabyYamlLightUserDatabase::getUserInfo — credentials don't match any user.




Description
================


public [BabyYamlLightUserDatabase::getUserInfo](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightUserDatabase/getUserInfo.md)(string $identifier, string $password) : array | false




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
See the source code for method [BabyYamlLightUserDatabase::getUserInfo](https://github.com/lingtalfi/Light_UserDatabase/blob/master/BabyYamlLightUserDatabase.php#L56-L65)


See Also
================

The [BabyYamlLightUserDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightUserDatabase.md) class.

Previous method: [setFile](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightUserDatabase/setFile.md)<br>Next method: [addUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightUserDatabase/addUser.md)<br>

