[Back to the Ling/Light_PluginInstaller api](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller.md)



The LightBasePluginInstaller class
================
2020-02-07 --> 2021-02-02






Introduction
============

The LightBasePluginInstaller class.

This class provides a default PluginInstallerInterface implementation,

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


class <span class="pl-k">LightBasePluginInstaller</span> implements [PluginInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [TableScopeAwareInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/TableScope/TableScopeAwareInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - private array|null [$dotNameArray](#property-dotNameArray) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [install](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/install.md)() : void
    - public [isInstalled](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/isInstalled.md)() : bool
    - public [uninstall](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/uninstall.md)() : void
    - public [getDependencies](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/getDependencies.md)() : array
    - public [getTableScope](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/getTableScope.md)() : array
    - protected [debugMsg](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/debugMsg.md)(string $msg) : void
    - protected [infoMsg](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/infoMsg.md)(string $msg) : void
    - protected [warningMsg](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/warningMsg.md)(string $msg) : void
    - protected [message](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/message.md)(string $msg, ?string $type = null) : void
    - protected [synchronizeDatabase](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/synchronizeDatabase.md)() : void
    - protected [extractPlanetDotName](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/extractPlanetDotName.md)() : void
    - protected [removeLightStandardPermissions](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/removeLightStandardPermissions.md)() : void
    - protected [dropTables](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/dropTables.md)(array $tables) : void
    - protected [hasTable](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/hasTable.md)(string $table) : bool

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-dotNameArray"><b>dotNameArray</b></span>

    An internal cache for the planet dot name array.
    
    



Methods
==============

- [LightBasePluginInstaller::__construct](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/__construct.md) &ndash; Builds the LightBasePluginInstaller instance.
- [LightBasePluginInstaller::setContainer](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/setContainer.md) &ndash; Sets the container.
- [LightBasePluginInstaller::install](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/install.md) &ndash; Installs the plugin in the light application.
- [LightBasePluginInstaller::isInstalled](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/isInstalled.md) &ndash; Returns whether the core install phase of the plugin is fully completed.
- [LightBasePluginInstaller::uninstall](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/uninstall.md) &ndash; Uninstalls the plugin.
- [LightBasePluginInstaller::getDependencies](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/getDependencies.md) &ndash; Returns the array of dependencies.
- [LightBasePluginInstaller::getTableScope](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/getTableScope.md) &ndash; Returns the [table scope](https://github.com/lingtalfi/TheBar/blob/master/discussions/table-scope.md) for this planet.
- [LightBasePluginInstaller::debugMsg](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/debugMsg.md) &ndash; Writes a message to the debug channel of the plugin installer planet.
- [LightBasePluginInstaller::infoMsg](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/infoMsg.md) &ndash; Writes a message to the info channel of the plugin installer planet.
- [LightBasePluginInstaller::warningMsg](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/warningMsg.md) &ndash; Writes a message to the warning channel of the plugin installer planet.
- [LightBasePluginInstaller::message](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/message.md) &ndash; Writes a message to the channel of the plugin installer planet.
- [LightBasePluginInstaller::synchronizeDatabase](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/synchronizeDatabase.md) &ndash; Synchronizes the database with the create file (if any) of this planet.
- [LightBasePluginInstaller::extractPlanetDotName](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/extractPlanetDotName.md) &ndash; Returns an array containing the galaxy name and the planet name of the current instance.
- [LightBasePluginInstaller::removeLightStandardPermissions](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/removeLightStandardPermissions.md) &ndash; Removes the [light standard permissions](https://github.com/lingtalfi/TheBar/blob/master/discussions/light-standard-permissions.md) for this plugin.
- [LightBasePluginInstaller::dropTables](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/dropTables.md) &ndash; Drop the given tables, if they exist.
- [LightBasePluginInstaller::hasTable](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/hasTable.md) &ndash; Returns whether the given table exists in the database.





Location
=============
Ling\Light_PluginInstaller\PluginInstaller\LightBasePluginInstaller<br>
See the source code of [Ling\Light_PluginInstaller\PluginInstaller\LightBasePluginInstaller](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/PluginInstaller/LightBasePluginInstaller.php)



SeeAlso
==============
Previous class: [PluginInstallerSynchronizerHelper](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Helper/PluginInstallerSynchronizerHelper.md)<br>Next class: [PluginInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface.md)<br>
