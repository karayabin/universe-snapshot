[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The BabyYamlLightWebsiteUserDatabase class
================
2019-07-19 --> 2019-08-14






Introduction
============

The BabyYamlLightWebsiteUserDatabase interface.

In this implementation, we are using a babyYaml file to store the users.
There is no default location (i.e. you must set it yourself), but we recommend the following path:
- $app_dir/config/user_database/database.byml


The file is created if it doesn't exist (provided that you have set the file location), using the [initializer service](https://github.com/lingtalfi/Light_Initializer/).

Also, a root user is created along with the file, so that the maintainer can connect directly to the gui
when this plugin is first installed, and without having to create the user manually.



Class synopsis
==============


class <span class="pl-k">BabyYamlLightWebsiteUserDatabase</span> implements [LightWebsiteUserDatabaseInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightWebsiteUserDatabaseInterface.md), [LightUserDatabaseInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface.md), [LightInitializerInterface](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Initializer/LightInitializerInterface.md) {

- Properties
    - protected string [$file](#property-file) ;
    - protected string [$root_identifier](#property-root_identifier) ;
    - protected string [$root_password](#property-root_password) ;
    - protected string [$root_pseudo](#property-root_pseudo) ;
    - protected string [$root_avatar_url](#property-root_avatar_url) ;
    - protected array [$root_extra](#property-root_extra) ;
    - protected [Ling\Light_PasswordProtector\Service\LightPasswordProtector](https://github.com/lingtalfi/Light_PasswordProtector/blob/master/doc/api/Ling/Light_PasswordProtector/Service/LightPasswordProtector.md)|null [$passwordProtector](#property-passwordProtector) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/__construct.md)() : void
    - public [setFile](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/setFile.md)(string $file) : void
    - public [getUserInfoByCredentials](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/getUserInfoByCredentials.md)(string $identifier, string $password) : array | false
    - public [getUserInfoByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/getUserInfoByIdentifier.md)(string $identifier) : array | false
    - public [getUserInfoById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/getUserInfoById.md)(int $id) : array | false
    - public [addUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/addUser.md)(array $userInfo) : void
    - public [updateUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/updateUser.md)(string $identifier, array $userInfo) : void
    - public [updateUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/updateUserById.md)(int $id, array $userInfo) : void
    - public [deleteUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/deleteUser.md)(string $identifier) : void
    - public [deleteUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/deleteUserById.md)(int $id) : void
    - public [initialize](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/initialize.md)(Ling\Light\Core\Light $light, Ling\Light\Http\HttpRequestInterface $httpRequest) : mixed
    - public [setRootIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/setRootIdentifier.md)(string $root_identifier) : void
    - public [setRootPassword](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/setRootPassword.md)(string $root_password) : void
    - public [setRootPseudo](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/setRootPseudo.md)(string $root_pseudo) : void
    - public [setRootAvatarUrl](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/setRootAvatarUrl.md)(string $root_avatar_url) : void
    - public [setRootExtra](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/setRootExtra.md)(array $root_extra) : void
    - public [setPasswordProtector](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/setPasswordProtector.md)([Ling\Light_PasswordProtector\Service\LightPasswordProtector](https://github.com/lingtalfi/Light_PasswordProtector/blob/master/doc/api/Ling/Light_PasswordProtector/Service/LightPasswordProtector.md) $passwordProtector) : void
    - protected [getUsers](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/getUsers.md)() : void
    - protected [updateUsers](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/updateUsers.md)(array $users) : void

}




Properties
=============

- <span id="property-file"><b>file</b></span>

    This property holds the path to the babyYaml file containing the user database.
    
    

- <span id="property-root_identifier"><b>root_identifier</b></span>

    This property holds the identifier for the default root user.
    
    

- <span id="property-root_password"><b>root_password</b></span>

    This property holds the password for the default root user.
    
    

- <span id="property-root_pseudo"><b>root_pseudo</b></span>

    This property holds the pseudo for the default root user.
    
    

- <span id="property-root_avatar_url"><b>root_avatar_url</b></span>

    This property holds the avatar_url for the default root user.
    
    

- <span id="property-root_extra"><b>root_extra</b></span>

    This property holds the extra array for the default root user.
    
    

- <span id="property-passwordProtector"><b>passwordProtector</b></span>

    This property holds the [passwordProtector](https://github.com/lingtalfi/Light_PasswordProtector/) for this instance.
    If set, the password will automatically be hashed when necessary, which concerns the following methods:
    - getUserInfoByCredentials
    - addUser
    - updateUser
    - updateUserById
    
    



Methods
==============

- [BabyYamlLightWebsiteUserDatabase::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/__construct.md) &ndash; Builds the BabyYamlLightUserDatabase instance.
- [BabyYamlLightWebsiteUserDatabase::setFile](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/setFile.md) &ndash; Sets the file.
- [BabyYamlLightWebsiteUserDatabase::getUserInfoByCredentials](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/getUserInfoByCredentials.md) &ndash; credentials don't match any user.
- [BabyYamlLightWebsiteUserDatabase::getUserInfoByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/getUserInfoByIdentifier.md) &ndash; doesn't match an user.
- [BabyYamlLightWebsiteUserDatabase::getUserInfoById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/getUserInfoById.md) &ndash; doesn't match an user.
- [BabyYamlLightWebsiteUserDatabase::addUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/addUser.md) &ndash; Adds the user info to the database.
- [BabyYamlLightWebsiteUserDatabase::updateUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/updateUser.md) &ndash; Updates the user identified by the given identifier.
- [BabyYamlLightWebsiteUserDatabase::updateUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/updateUserById.md) &ndash; Updates the user identified by the given id.
- [BabyYamlLightWebsiteUserDatabase::deleteUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/deleteUser.md) &ndash; Deletes the user identified by the given identifier.
- [BabyYamlLightWebsiteUserDatabase::deleteUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/deleteUserById.md) &ndash; Deletes the user identified by the given id.
- [BabyYamlLightWebsiteUserDatabase::initialize](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/initialize.md) &ndash; Initializes a service with the given Light instance and HttpRequestInterface instance.
- [BabyYamlLightWebsiteUserDatabase::setRootIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/setRootIdentifier.md) &ndash; Sets the root_identifier.
- [BabyYamlLightWebsiteUserDatabase::setRootPassword](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/setRootPassword.md) &ndash; Sets the root_password.
- [BabyYamlLightWebsiteUserDatabase::setRootPseudo](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/setRootPseudo.md) &ndash; Sets the root_pseudo.
- [BabyYamlLightWebsiteUserDatabase::setRootAvatarUrl](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/setRootAvatarUrl.md) &ndash; Sets the root_avatar_url.
- [BabyYamlLightWebsiteUserDatabase::setRootExtra](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/setRootExtra.md) &ndash; Sets the root_extra.
- [BabyYamlLightWebsiteUserDatabase::setPasswordProtector](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/setPasswordProtector.md) &ndash; Sets the passwordProtector.
- [BabyYamlLightWebsiteUserDatabase::getUsers](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/getUsers.md) &ndash; and returns the list of all users.
- [BabyYamlLightWebsiteUserDatabase::updateUsers](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/updateUsers.md) &ndash; Update the database with the new given users array.





Location
=============
Ling\Light_UserDatabase\BabyYamlLightWebsiteUserDatabase<br>
See the source code of [Ling\Light_UserDatabase\BabyYamlLightWebsiteUserDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/BabyYamlLightWebsiteUserDatabase.php)



SeeAlso
==============
Next class: [LightWebsiteUserDatabaseBullsheeter](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Bullsheet/LightWebsiteUserDatabaseBullsheeter.md)<br>
