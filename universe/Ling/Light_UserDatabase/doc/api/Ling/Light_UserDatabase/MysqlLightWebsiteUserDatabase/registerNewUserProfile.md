[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\MysqlLightWebsiteUserDatabase class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase.md)


MysqlLightWebsiteUserDatabase::registerNewUserProfile
================



MysqlLightWebsiteUserDatabase::registerNewUserProfile — When a new user is created, the permissions she will get depends on her profiles.




Description
================


public [MysqlLightWebsiteUserDatabase::registerNewUserProfile](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/registerNewUserProfile.md)($profile) : void




When a new user is created, the permissions she will get depends on her profiles.
A profile is also known as a permission group.
See more details in the [permissions conception notes](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/permission-conception-notes.md).

Plugins can register new profiles using this method.
The profile parameter can be either:

- a string, the profile
- an array of profile strings
- a callable, which returns a profile (string) or an array of profiles.
         The callable has the following signature:
             function ( array user ): array|string

         Note: the "user" parameter is the array containing all the
         newly created light website user info (except for the profiles).




Parameters
================


- profile

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [MysqlLightWebsiteUserDatabase::registerNewUserProfile](https://github.com/lingtalfi/Light_UserDatabase/blob/master/MysqlLightWebsiteUserDatabase.php#L381-L384)


See Also
================

The [MysqlLightWebsiteUserDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase.md) class.

Previous method: [getAllUserInfo](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getAllUserInfo.md)<br>Next method: [initialize](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/initialize.md)<br>

