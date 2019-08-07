[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The BabyYamlLightUserDatabase class
================
2019-07-19 --> 2019-08-06






Introduction
============

The BabyYamlLightUserDatabase interface.

In this implementation:
- the key for the user identifier is: "id"
- the key for the user password is: "pass"



Class synopsis
==============


class <span class="pl-k">BabyYamlLightUserDatabase</span> implements [LightUserDatabaseInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface.md) {

- Properties
    - protected string [$file](#property-file) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightUserDatabase/__construct.md)() : void
    - public [setFile](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightUserDatabase/setFile.md)(string $file) : void
    - public [getUserInfo](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightUserDatabase/getUserInfo.md)(string $identifier, string $password) : array | false
    - public [getUserInfoByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightUserDatabase/getUserInfoByIdentifier.md)(string $identifier) : array | false
    - public [addUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightUserDatabase/addUser.md)(string $identifier, string $password, array $userInfo) : void
    - public [updateUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightUserDatabase/updateUser.md)(string $identifier, array $userInfo) : void
    - public [deleteUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightUserDatabase/deleteUser.md)(string $identifier) : void
    - protected [getUsers](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightUserDatabase/getUsers.md)() : void
    - protected [updateUsers](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightUserDatabase/updateUsers.md)(array $users) : void

}




Properties
=============

- <span id="property-file"><b>file</b></span>

    This property holds the path to the babyYaml file containing the user database.
    
    



Methods
==============

- [BabyYamlLightUserDatabase::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightUserDatabase/__construct.md) &ndash; Builds the BabyYamlLightUserDatabase instance.
- [BabyYamlLightUserDatabase::setFile](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightUserDatabase/setFile.md) &ndash; Sets the file.
- [BabyYamlLightUserDatabase::getUserInfo](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightUserDatabase/getUserInfo.md) &ndash; credentials don't match any user.
- [BabyYamlLightUserDatabase::getUserInfoByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightUserDatabase/getUserInfoByIdentifier.md) &ndash; doesn't match an user.
- [BabyYamlLightUserDatabase::addUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightUserDatabase/addUser.md) &ndash; Adds the user info to the database.
- [BabyYamlLightUserDatabase::updateUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightUserDatabase/updateUser.md) &ndash; Updates the user identified by the given identifier.
- [BabyYamlLightUserDatabase::deleteUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightUserDatabase/deleteUser.md) &ndash; Deletes the user identified by the given identifier.
- [BabyYamlLightUserDatabase::getUsers](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightUserDatabase/getUsers.md) &ndash; and returns the list of all users.
- [BabyYamlLightUserDatabase::updateUsers](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightUserDatabase/updateUsers.md) &ndash; Update the database with the new given users array.





Location
=============
Ling\Light_UserDatabase\BabyYamlLightUserDatabase<br>
See the source code of [Ling\Light_UserDatabase\BabyYamlLightUserDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/BabyYamlLightUserDatabase.php)



SeeAlso
==============
Next class: [LightUserDatabaseException](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Exception/LightUserDatabaseException.md)<br>
