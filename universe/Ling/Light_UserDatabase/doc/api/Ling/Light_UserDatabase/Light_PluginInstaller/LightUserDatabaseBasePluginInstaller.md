[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The LightUserDatabaseBasePluginInstaller class
================
2019-07-19 --> 2021-03-15






Introduction
============

The LightUserDatabaseBasePluginInstaller class.

This class provides a default PluginInstallerInterface implementation for plugin which use our service,

with methods based around various concepts:

- [Light standard permissions](https://github.com/lingtalfi/TheBar/blob/master/discussions/light-standard-permissions.md).
- [create file](https://github.com/lingtalfi/TheBar/blob/master/discussions/create-file.md)


Here is what the default implementation provided by this class will do:

Install
---------
So when a plugin is installed, if it has a **create file**, then the tables listed in the create file are installed.
Also, we insert the **light standard permissions** for this plugin in the database.

Uninstall
---------
When the plugin is uninstalled, if it has a **create file**, the tables listed in the create file are removed.
Also, we remove the **light standard permissions** for this plugin from the database.


IsInstalled
---------
We detect whether the plugin is installed by looking at the **light standard permissions**.
If those permissions exist for the plugin, then we consider it's installed, otherwise we consider it's not installed.



Class synopsis
==============


class <span class="pl-k">LightUserDatabaseBasePluginInstaller</span> implements [PluginInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [TableScopeAwareInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/TableScope/TableScopeAwareInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - private array|null [$dotNameArray](#property-dotNameArray) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [install](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/install.md)() : void
    - public [isInstalled](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/isInstalled.md)() : bool
    - public [uninstall](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/uninstall.md)() : void
    - public [getDependencies](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/getDependencies.md)() : array
    - public [getTableScope](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/getTableScope.md)() : array
    - protected [debugMsg](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/debugMsg.md)(string $msg) : void
    - protected [infoMsg](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/infoMsg.md)(string $msg) : void
    - protected [warningMsg](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/warningMsg.md)(string $msg) : void
    - protected [message](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/message.md)(string $msg, ?string $type = null) : void
    - protected [synchronizeDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/synchronizeDatabase.md)() : void
    - protected [extractPlanetDotName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/extractPlanetDotName.md)() : void
    - protected [removeLightStandardPermissions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/removeLightStandardPermissions.md)() : void
    - protected [dropTables](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/dropTables.md)(array $tables) : void
    - protected [hasTable](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/hasTable.md)(string $table) : bool

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-dotNameArray"><b>dotNameArray</b></span>

    An internal cache for the planet dot name array.
    
    



Methods
==============

- [LightUserDatabaseBasePluginInstaller::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/__construct.md) &ndash; Builds the LightBasePluginInstaller instance.
- [LightUserDatabaseBasePluginInstaller::setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/setContainer.md) &ndash; Sets the container.
- [LightUserDatabaseBasePluginInstaller::install](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/install.md) &ndash; Installs the plugin in the light application.
- [LightUserDatabaseBasePluginInstaller::isInstalled](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/isInstalled.md) &ndash; Returns whether the core install phase of the plugin is fully completed.
- [LightUserDatabaseBasePluginInstaller::uninstall](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/uninstall.md) &ndash; Uninstalls the plugin.
- [LightUserDatabaseBasePluginInstaller::getDependencies](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/getDependencies.md) &ndash; Returns the array of dependencies.
- [LightUserDatabaseBasePluginInstaller::getTableScope](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller/getTableScope.md) &ndash; Returns the [table scope](https://github.com/lingtalfi/TheBar/blob/master/discussions/table-scope.md) for this planet.
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
Ling\Light_UserDatabase\Light_PluginInstaller\LightUserDatabaseBasePluginInstaller<br>
See the source code of [Ling\Light_UserDatabase\Light_PluginInstaller\LightUserDatabaseBasePluginInstaller](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller.php)



SeeAlso
==============
Previous class: [LightWebsiteUserDatabaseInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightWebsiteUserDatabaseInterface.md)<br>Next class: [LightUserDatabasePluginInstaller](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabasePluginInstaller.md)<br>
