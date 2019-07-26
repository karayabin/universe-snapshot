[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The LightUserDatabaseInterface class
================
2019-07-19 --> 2019-07-23






Introduction
============

The LightUserDatabaseInterface interface.


The identifier of an user identifies an user uniquely.
This means the same identifier cannot be found more than once in the database.

An user identifier cannot be updated (you have to delete the user and create another one instead),
for security reason.



Class synopsis
==============


abstract class <span class="pl-k">LightUserDatabaseInterface</span>  {

- Methods
    - abstract public [getUserInfo](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface/getUserInfo.md)(string $identifier, string $password) : array | false
    - abstract public [addUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface/addUser.md)(string $identifier, string $password, array $userInfo) : void
    - abstract public [updateUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface/updateUser.md)(string $identifier, array $userInfo) : void
    - abstract public [deleteUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface/deleteUser.md)(string $identifier) : void

}






Methods
==============

- [LightUserDatabaseInterface::getUserInfo](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface/getUserInfo.md) &ndash; credentials don't match any user.
- [LightUserDatabaseInterface::addUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface/addUser.md) &ndash; Adds the user info to the database.
- [LightUserDatabaseInterface::updateUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface/updateUser.md) &ndash; Updates the user identified by the given identifier.
- [LightUserDatabaseInterface::deleteUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface/deleteUser.md) &ndash; Deletes the user identified by the given identifier.





Location
=============
Ling\Light_UserDatabase\LightUserDatabaseInterface<br>
See the source code of [Ling\Light_UserDatabase\LightUserDatabaseInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/LightUserDatabaseInterface.php)



SeeAlso
==============
Previous class: [LightUserDatabaseException](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Exception/LightUserDatabaseException.md)<br>Next class: [MysqlLightUserDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightUserDatabase.md)<br>
