[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\BabyYamlLightWebsiteUserDatabase class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase.md)


BabyYamlLightWebsiteUserDatabase::addUser
================



BabyYamlLightWebsiteUserDatabase::addUser — Important: this is an override of the parent method.




Description
================


public [BabyYamlLightWebsiteUserDatabase::addUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/addUser.md)(array $userInfo) : int




Important: this is an override of the parent method.

We basically just redefine the return of the method (since the concept
of the id now exists), which is an integer representing the id of the user.




Parameters
================


- userInfo

    


Return values
================

Returns int.


Exceptions thrown
================

- [LightUserDatabaseException](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Exception/LightUserDatabaseException.md).&nbsp;







Source Code
===========
See the source code for method [BabyYamlLightWebsiteUserDatabase::addUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/BabyYamlLightWebsiteUserDatabase.php#L264-L315)


See Also
================

The [BabyYamlLightWebsiteUserDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase.md) class.

Previous method: [getUserInfoById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/getUserInfoById.md)<br>Next method: [updateUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/updateUser.md)<br>

