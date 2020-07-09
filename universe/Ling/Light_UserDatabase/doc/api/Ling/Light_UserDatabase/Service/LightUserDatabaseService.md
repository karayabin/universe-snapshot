[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The LightUserDatabaseService class
================
2019-07-19 --> 2020-06-25






Introduction
============

The LightUserDatabaseService class.

Note: we extend the mysql version and not the babyYaml version which was just
used only by me when starting up this project.



Class synopsis
==============


class <span class="pl-k">LightUserDatabaseService</span> extends [MysqlLightWebsiteUserDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase.md) implements [PluginInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface.md), [LightUserDatabaseInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface.md), [LightWebsiteUserDatabaseInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightWebsiteUserDatabaseInterface.md) {

- Inherited properties
    - protected string|null [MysqlLightWebsiteUserDatabase::$database](#property-database) ;
    - protected string [MysqlLightWebsiteUserDatabase::$root_identifier](#property-root_identifier) ;
    - protected string [MysqlLightWebsiteUserDatabase::$root_password](#property-root_password) ;
    - protected string [MysqlLightWebsiteUserDatabase::$root_email](#property-root_email) ;
    - protected string [MysqlLightWebsiteUserDatabase::$root_pseudo](#property-root_pseudo) ;
    - protected string [MysqlLightWebsiteUserDatabase::$root_avatar_url](#property-root_avatar_url) ;
    - protected array [MysqlLightWebsiteUserDatabase::$root_extra](#property-root_extra) ;
    - protected [Ling\Light_PasswordProtector\Service\LightPasswordProtector](https://github.com/lingtalfi/Light_PasswordProtector/blob/master/doc/api/Ling/Light_PasswordProtector/Service/LightPasswordProtector.md)|null [MysqlLightWebsiteUserDatabase::$passwordProtector](#property-passwordProtector) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [MysqlLightWebsiteUserDatabase::$container](#property-container) ;
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [MysqlLightWebsiteUserDatabase::$pdoWrapper](#property-pdoWrapper) ;

- Methods
    - public [onCreateFileChange](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Service/LightUserDatabaseService/onCreateFileChange.md)() : void

- Inherited methods
    - public [MysqlLightWebsiteUserDatabase::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/__construct.md)() : void
    - public [MysqlLightWebsiteUserDatabase::getUserInfoByCredentials](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getUserInfoByCredentials.md)(string $identifier, string $password) : array | false
    - public [MysqlLightWebsiteUserDatabase::getUserInfoByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getUserInfoByIdentifier.md)(string $identifier) : array | false
    - public [MysqlLightWebsiteUserDatabase::getUserInfoById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getUserInfoById.md)(int $id) : array | false
    - public [MysqlLightWebsiteUserDatabase::addUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/addUser.md)(array $userInfo) : mixed
    - public [MysqlLightWebsiteUserDatabase::updateUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/updateUser.md)(string $identifier, array $userInfo) : void
    - public [MysqlLightWebsiteUserDatabase::updateUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/updateUserById.md)(int $id, array $userInfo) : void
    - public [MysqlLightWebsiteUserDatabase::deleteUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/deleteUser.md)(string $identifier) : void
    - public [MysqlLightWebsiteUserDatabase::deleteUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/deleteUserById.md)(int $id) : void
    - public [MysqlLightWebsiteUserDatabase::getAllUserInfo](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getAllUserInfo.md)() : array
    - public [MysqlLightWebsiteUserDatabase::getAllUserIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getAllUserIds.md)() : array
    - public [MysqlLightWebsiteUserDatabase::install](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/install.md)() : void
    - public [MysqlLightWebsiteUserDatabase::uninstall](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/uninstall.md)() : void
    - public [MysqlLightWebsiteUserDatabase::isInstalled](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/isInstalled.md)() : bool
    - public [MysqlLightWebsiteUserDatabase::getDependencies](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getDependencies.md)() : array
    - public [MysqlLightWebsiteUserDatabase::setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [MysqlLightWebsiteUserDatabase::getFactory](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getFactory.md)() : [CustomLightUserDatabaseApiFactory](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/CustomLightUserDatabaseApiFactory.md)
    - public [MysqlLightWebsiteUserDatabase::setDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setDatabase.md)(string $database) : void
    - public [MysqlLightWebsiteUserDatabase::setTable](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setTable.md)(string $table) : void
    - public [MysqlLightWebsiteUserDatabase::setRootIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setRootIdentifier.md)(string $root_identifier) : void
    - public [MysqlLightWebsiteUserDatabase::setRootPassword](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setRootPassword.md)(string $root_password) : void
    - public [MysqlLightWebsiteUserDatabase::setRootPseudo](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setRootPseudo.md)(string $root_pseudo) : void
    - public [MysqlLightWebsiteUserDatabase::setRootEmail](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setRootEmail.md)(string $root_email) : void
    - public [MysqlLightWebsiteUserDatabase::setRootAvatarUrl](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setRootAvatarUrl.md)(string $root_avatar_url) : void
    - public [MysqlLightWebsiteUserDatabase::setRootExtra](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setRootExtra.md)(array $root_extra) : void
    - public [MysqlLightWebsiteUserDatabase::setPasswordProtector](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setPasswordProtector.md)([Ling\Light_PasswordProtector\Service\LightPasswordProtector](https://github.com/lingtalfi/Light_PasswordProtector/blob/master/doc/api/Ling/Light_PasswordProtector/Service/LightPasswordProtector.md) $passwordProtector) : void
    - public [MysqlLightWebsiteUserDatabase::getTable](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getTable.md)() : string
    - protected [MysqlLightWebsiteUserDatabase::dQuoteTable](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/dQuoteTable.md)(string $table) : string
    - protected [MysqlLightWebsiteUserDatabase::unserialize](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/unserialize.md)(array &$array) : void
    - protected [MysqlLightWebsiteUserDatabase::serialize](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/serialize.md)(array &$array) : void
    - protected [MysqlLightWebsiteUserDatabase::getScopeTables](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getScopeTables.md)() : array

}






Methods
==============

- [LightUserDatabaseService::onCreateFileChange](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Service/LightUserDatabaseService/onCreateFileChange.md) &ndash; This method is executed when a change is detected in our createFile.
- [MysqlLightWebsiteUserDatabase::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/__construct.md) &ndash; Builds the MysqlLightUserDatabase instance.
- [MysqlLightWebsiteUserDatabase::getUserInfoByCredentials](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getUserInfoByCredentials.md) &ndash; credentials don't match any user.
- [MysqlLightWebsiteUserDatabase::getUserInfoByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getUserInfoByIdentifier.md) &ndash; doesn't match an user.
- [MysqlLightWebsiteUserDatabase::getUserInfoById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getUserInfoById.md) &ndash; doesn't match an user.
- [MysqlLightWebsiteUserDatabase::addUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/addUser.md) &ndash; Adds the user info to the database.
- [MysqlLightWebsiteUserDatabase::updateUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/updateUser.md) &ndash; Updates the user identified by the given identifier.
- [MysqlLightWebsiteUserDatabase::updateUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/updateUserById.md) &ndash; Updates the user identified by the given id.
- [MysqlLightWebsiteUserDatabase::deleteUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/deleteUser.md) &ndash; Deletes the user identified by the given identifier.
- [MysqlLightWebsiteUserDatabase::deleteUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/deleteUserById.md) &ndash; Deletes the user identified by the given id.
- [MysqlLightWebsiteUserDatabase::getAllUserInfo](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getAllUserInfo.md) &ndash; Returns an array of user info (one per user).
- [MysqlLightWebsiteUserDatabase::getAllUserIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getAllUserIds.md) &ndash; Returns an array of all user ids.
- [MysqlLightWebsiteUserDatabase::install](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/install.md) &ndash; Installs the plugin in the light application.
- [MysqlLightWebsiteUserDatabase::uninstall](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/uninstall.md) &ndash; Uninstalls the plugin.
- [MysqlLightWebsiteUserDatabase::isInstalled](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/isInstalled.md) &ndash; Returns whether the core install phase of the plugin is fully completed.
- [MysqlLightWebsiteUserDatabase::getDependencies](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getDependencies.md) &ndash; Returns the array of dependencies.
- [MysqlLightWebsiteUserDatabase::setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setContainer.md) &ndash; Sets the container.
- [MysqlLightWebsiteUserDatabase::getFactory](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getFactory.md) &ndash; Returns the factory for this plugin's api.
- [MysqlLightWebsiteUserDatabase::setDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setDatabase.md) &ndash; Sets the database.
- [MysqlLightWebsiteUserDatabase::setTable](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setTable.md) &ndash; Sets the table.
- [MysqlLightWebsiteUserDatabase::setRootIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setRootIdentifier.md) &ndash; Sets the root_identifier.
- [MysqlLightWebsiteUserDatabase::setRootPassword](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setRootPassword.md) &ndash; Sets the root_password.
- [MysqlLightWebsiteUserDatabase::setRootPseudo](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setRootPseudo.md) &ndash; Sets the root_pseudo.
- [MysqlLightWebsiteUserDatabase::setRootEmail](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setRootEmail.md) &ndash; Sets the root_email.
- [MysqlLightWebsiteUserDatabase::setRootAvatarUrl](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setRootAvatarUrl.md) &ndash; Sets the root_avatar_url.
- [MysqlLightWebsiteUserDatabase::setRootExtra](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setRootExtra.md) &ndash; Sets the root_extra.
- [MysqlLightWebsiteUserDatabase::setPasswordProtector](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setPasswordProtector.md) &ndash; Sets the passwordProtector.
- [MysqlLightWebsiteUserDatabase::getTable](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getTable.md) &ndash; Returns the table name.
- [MysqlLightWebsiteUserDatabase::dQuoteTable](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/dQuoteTable.md) &ndash; Returns the double quote protected full version of the given table.
- [MysqlLightWebsiteUserDatabase::unserialize](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/unserialize.md) &ndash; Unserializes the relevant keys from the given array (i.e.
- [MysqlLightWebsiteUserDatabase::serialize](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/serialize.md) &ndash; Serializes the relevant keys from the given array (i.e.
- [MysqlLightWebsiteUserDatabase::getScopeTables](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getScopeTables.md) &ndash; Returns the array of tables that this plugin uses.





Location
=============
Ling\Light_UserDatabase\Service\LightUserDatabaseService<br>
See the source code of [Ling\Light_UserDatabase\Service\LightUserDatabaseService](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Service/LightUserDatabaseService.php)



SeeAlso
==============
Previous class: [MysqlLightWebsiteUserDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase.md)<br>
