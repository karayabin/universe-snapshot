[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The LightUserDatabasePluginInstaller class
================
2019-07-19 --> 2021-03-05






Introduction
============

The LightUserDatabasePluginInstaller class.



Class synopsis
==============


class <span class="pl-k">LightUserDatabasePluginInstaller</span> extends [LightUserDatabaseBasePluginInstaller](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller.md) implements [TableScopeAwareInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/TableScope/TableScopeAwareInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [PluginInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightUserDatabaseBasePluginInstaller::$container](#property-container) ;

- Methods
    - public [install](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabasePluginInstaller/install.md)() : void
    - public [getDependencies](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabasePluginInstaller/getDependencies.md)() : array
    - public [getTableScope](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabasePluginInstaller/getTableScope.md)() : array

- Inherited methods
    - public [LightUserDatabaseBasePluginInstaller::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/__construct.md)() : void
    - public [LightUserDatabaseBasePluginInstaller::setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [LightUserDatabaseBasePluginInstaller::isInstalled](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/isInstalled.md)() : bool
    - public [LightUserDatabaseBasePluginInstaller::uninstall](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/uninstall.md)() : void
    - protected [LightUserDatabaseBasePluginInstaller::debugMsg](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/debugMsg.md)(string $msg) : void
    - protected [LightUserDatabaseBasePluginInstaller::infoMsg](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/infoMsg.md)(string $msg) : void
    - protected [LightUserDatabaseBasePluginInstaller::warningMsg](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/warningMsg.md)(string $msg) : void
    - protected [LightUserDatabaseBasePluginInstaller::message](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/message.md)(string $msg, ?string $type = null) : void
    - protected [LightUserDatabaseBasePluginInstaller::synchronizeDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/synchronizeDatabase.md)() : void
    - protected [LightUserDatabaseBasePluginInstaller::extractPlanetDotName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/extractPlanetDotName.md)() : void
    - protected [LightUserDatabaseBasePluginInstaller::removeLightStandardPermissions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/removeLightStandardPermissions.md)() : void
    - protected [LightUserDatabaseBasePluginInstaller::dropTables](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/dropTables.md)(array $tables) : void
    - protected [LightUserDatabaseBasePluginInstaller::hasTable](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/hasTable.md)(string $table) : bool

}






Methods
==============

- [LightUserDatabasePluginInstaller::install](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabasePluginInstaller/install.md) &ndash; Installs the plugin in the light application.
- [LightUserDatabasePluginInstaller::getDependencies](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabasePluginInstaller/getDependencies.md) &ndash; Returns the array of dependencies.
- [LightUserDatabasePluginInstaller::getTableScope](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabasePluginInstaller/getTableScope.md) &ndash; Returns the [table scope](https://github.com/lingtalfi/TheBar/blob/master/discussions/table-scope.md) for this planet.
- [LightUserDatabaseBasePluginInstaller::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/__construct.md) &ndash; Builds the LightBasePluginInstaller instance.
- [LightUserDatabaseBasePluginInstaller::setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/setContainer.md) &ndash; Sets the container.
- [LightUserDatabaseBasePluginInstaller::isInstalled](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/isInstalled.md) &ndash; Returns whether the core install phase of the plugin is fully completed.
- [LightUserDatabaseBasePluginInstaller::uninstall](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/uninstall.md) &ndash; Uninstalls the plugin.
- [LightUserDatabaseBasePluginInstaller::debugMsg](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/debugMsg.md) &ndash; Writes a message to the debug channel of the plugin installer planet.
- [LightUserDatabaseBasePluginInstaller::infoMsg](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/infoMsg.md) &ndash; Writes a message to the info channel of the plugin installer planet.
- [LightUserDatabaseBasePluginInstaller::warningMsg](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/warningMsg.md) &ndash; Writes a message to the warning channel of the plugin installer planet.
- [LightUserDatabaseBasePluginInstaller::message](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/message.md) &ndash; Writes a message to the channel of the plugin installer planet.
- [LightUserDatabaseBasePluginInstaller::synchronizeDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/synchronizeDatabase.md) &ndash; Synchronizes the database with the create file (if any) of this planet.
- [LightUserDatabaseBasePluginInstaller::extractPlanetDotName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/extractPlanetDotName.md) &ndash; Returns an array containing the galaxy name and the planet name of the current instance.
- [LightUserDatabaseBasePluginInstaller::removeLightStandardPermissions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/removeLightStandardPermissions.md) &ndash; Removes the [light standard permissions](https://github.com/lingtalfi/TheBar/blob/master/discussions/light-standard-permissions.md) for this plugin.
- [LightUserDatabaseBasePluginInstaller::dropTables](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/dropTables.md) &ndash; Drop the given tables, if they exist.
- [LightUserDatabaseBasePluginInstaller::hasTable](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/hasTable.md) &ndash; Returns whether the given table exists in the database.





Location
=============
Ling\Light_UserDatabase\Light_PluginInstaller\LightUserDatabasePluginInstaller<br>
See the source code of [Ling\Light_UserDatabase\Light_PluginInstaller\LightUserDatabasePluginInstaller](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Light_PluginInstaller/LightUserDatabasePluginInstaller.php)



SeeAlso
==============
Previous class: [LightUserDatabaseBasePluginInstaller](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller.md)<br>Next class: [MysqlLightWebsiteUserDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase.md)<br>
