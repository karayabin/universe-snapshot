[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\LightWebsiteUserDatabaseInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightWebsiteUserDatabaseInterface.md)


LightWebsiteUserDatabaseInterface::addUser
================



LightWebsiteUserDatabaseInterface::addUser — Important: this is an override of the parent method.




Description
================


abstract public [LightWebsiteUserDatabaseInterface::addUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightWebsiteUserDatabaseInterface/addUser.md)(array $userInfo) : int




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
See the source code for method [LightWebsiteUserDatabaseInterface::addUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/LightWebsiteUserDatabaseInterface.php#L45-L45)


See Also
================

The [LightWebsiteUserDatabaseInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightWebsiteUserDatabaseInterface.md) class.

Next method: [getUserInfoById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightWebsiteUserDatabaseInterface/getUserInfoById.md)<br>

