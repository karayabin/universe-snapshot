[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The LightWebsiteUserDatabaseInterface class
================
2019-07-19 --> 2020-06-25






Introduction
============

The LightWebsiteUserDatabaseInterface interface.

The info representing the database user are the one that match the [light website user](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md):

- id: int. A unique identifier for the user. This field is created automatically by the concrete class.
- identifier: string. A unique identifier for the user. In most applications, this is the email of the user.
- password: string. The password of the user. Whether it's encrypted is left to the implementor.
- pseudo: string. The pseudo of the user.
- avatar_url: string. The url of the user avatar.
- extra: array. Any other information that you want to attach to the user should be found in this array.


This interface also implements the concept of [user permissions](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/permission-conception-notes.md).



Class synopsis
==============


abstract class <span class="pl-k">LightWebsiteUserDatabaseInterface</span> implements [LightUserDatabaseInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface.md) {

- Methods
    - abstract public [addUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightWebsiteUserDatabaseInterface/addUser.md)(array $userInfo) : int
    - abstract public [getUserInfoById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightWebsiteUserDatabaseInterface/getUserInfoById.md)(int $id) : array | false
    - abstract public [updateUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightWebsiteUserDatabaseInterface/updateUserById.md)(int $id, array $userInfo) : void
    - abstract public [deleteUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightWebsiteUserDatabaseInterface/deleteUserById.md)(int $id) : void
    - abstract public [getAllUserIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightWebsiteUserDatabaseInterface/getAllUserIds.md)() : array

- Inherited methods
    - abstract public [LightUserDatabaseInterface::getUserInfoByCredentials](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface/getUserInfoByCredentials.md)(string $identifier, string $password) : array | false
    - abstract public [LightUserDatabaseInterface::getUserInfoByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface/getUserInfoByIdentifier.md)(string $identifier) : array | false
    - abstract public [LightUserDatabaseInterface::getAllUserInfo](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface/getAllUserInfo.md)() : array
    - abstract public [LightUserDatabaseInterface::updateUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface/updateUser.md)(string $identifier, array $userInfo) : void
    - abstract public [LightUserDatabaseInterface::deleteUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface/deleteUser.md)(string $identifier) : void

}






Methods
==============

- [LightWebsiteUserDatabaseInterface::addUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightWebsiteUserDatabaseInterface/addUser.md) &ndash; Important: this is an override of the parent method.
- [LightWebsiteUserDatabaseInterface::getUserInfoById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightWebsiteUserDatabaseInterface/getUserInfoById.md) &ndash; doesn't match an user.
- [LightWebsiteUserDatabaseInterface::updateUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightWebsiteUserDatabaseInterface/updateUserById.md) &ndash; Updates the user identified by the given id.
- [LightWebsiteUserDatabaseInterface::deleteUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightWebsiteUserDatabaseInterface/deleteUserById.md) &ndash; Deletes the user identified by the given id.
- [LightWebsiteUserDatabaseInterface::getAllUserIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightWebsiteUserDatabaseInterface/getAllUserIds.md) &ndash; Returns an array of all user ids.
- [LightUserDatabaseInterface::getUserInfoByCredentials](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface/getUserInfoByCredentials.md) &ndash; credentials don't match any user.
- [LightUserDatabaseInterface::getUserInfoByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface/getUserInfoByIdentifier.md) &ndash; doesn't match an user.
- [LightUserDatabaseInterface::getAllUserInfo](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface/getAllUserInfo.md) &ndash; Returns an array of user info (one per user).
- [LightUserDatabaseInterface::updateUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface/updateUser.md) &ndash; Updates the user identified by the given identifier.
- [LightUserDatabaseInterface::deleteUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface/deleteUser.md) &ndash; Deletes the user identified by the given identifier.





Location
=============
Ling\Light_UserDatabase\LightWebsiteUserDatabaseInterface<br>
See the source code of [Ling\Light_UserDatabase\LightWebsiteUserDatabaseInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/LightWebsiteUserDatabaseInterface.php)



SeeAlso
==============
Previous class: [LightUserDatabaseInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface.md)<br>Next class: [MysqlLightWebsiteUserDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase.md)<br>
