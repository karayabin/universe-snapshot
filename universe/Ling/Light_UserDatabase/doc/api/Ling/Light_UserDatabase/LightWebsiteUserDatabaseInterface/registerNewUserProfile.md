[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\LightWebsiteUserDatabaseInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightWebsiteUserDatabaseInterface.md)


LightWebsiteUserDatabaseInterface::registerNewUserProfile
================



LightWebsiteUserDatabaseInterface::registerNewUserProfile — When a new user is created, the permissions she will get depends on her profiles.




Description
================


abstract public [LightWebsiteUserDatabaseInterface::registerNewUserProfile](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightWebsiteUserDatabaseInterface/registerNewUserProfile.md)($profile) : void




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
See the source code for method [LightWebsiteUserDatabaseInterface::registerNewUserProfile](https://github.com/lingtalfi/Light_UserDatabase/blob/master/LightWebsiteUserDatabaseInterface.php#L109-L109)


See Also
================

The [LightWebsiteUserDatabaseInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightWebsiteUserDatabaseInterface.md) class.

Previous method: [deleteUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightWebsiteUserDatabaseInterface/deleteUserById.md)<br>Next method: [getPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightWebsiteUserDatabaseInterface/getPermissionApi.md)<br>

