[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)



The LightKitAdminBasePortPluginInstallerWithDatabase class
================
2019-05-17 --> 2021-03-05






Introduction
============

The LightKitAdminBasePluginInstallerWithDatabase class.
This class was designed to help you if you create a port plugin from a plugin with database.



Class synopsis
==============


abstract class <span class="pl-k">LightKitAdminBasePortPluginInstallerWithDatabase</span> extends [LightUserDatabaseBasePluginInstaller](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller.md) implements [TableScopeAwareInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/TableScope/TableScopeAwareInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [PluginInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface.md) {

- Properties
    - private string [$_exceptionClassName](#property-_exceptionClassName) ;
    - private string [$_sourcePluginName](#property-_sourcePluginName) ;
    - private string [$_galaxy](#property-_galaxy) ;

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightUserDatabaseBasePluginInstaller::$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_PluginInstaller/LightKitAdminBasePortPluginInstallerWithDatabase/__construct.md)() : void
    - public [install](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_PluginInstaller/LightKitAdminBasePortPluginInstallerWithDatabase/install.md)() : void
    - public [isInstalled](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_PluginInstaller/LightKitAdminBasePortPluginInstallerWithDatabase/isInstalled.md)() : bool
    - public [uninstall](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_PluginInstaller/LightKitAdminBasePortPluginInstallerWithDatabase/uninstall.md)() : void
    - public [getDependencies](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_PluginInstaller/LightKitAdminBasePortPluginInstallerWithDatabase/getDependencies.md)() : array
    - protected [error](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_PluginInstaller/LightKitAdminBasePortPluginInstallerWithDatabase/error.md)(string $msg) : void
    - private [prepareTheNames](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_PluginInstaller/LightKitAdminBasePortPluginInstallerWithDatabase/prepareTheNames.md)() : void

- Inherited methods
    - public LightUserDatabaseBasePluginInstaller::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public LightUserDatabaseBasePluginInstaller::getTableScope() : array
    - protected LightUserDatabaseBasePluginInstaller::debugMsg(string $msg) : void
    - protected LightUserDatabaseBasePluginInstaller::infoMsg(string $msg) : void
    - protected LightUserDatabaseBasePluginInstaller::warningMsg(string $msg) : void
    - protected LightUserDatabaseBasePluginInstaller::message(string $msg, ?string $type = null) : void
    - protected LightUserDatabaseBasePluginInstaller::synchronizeDatabase() : void
    - protected LightUserDatabaseBasePluginInstaller::extractPlanetDotName() : void
    - protected LightUserDatabaseBasePluginInstaller::removeLightStandardPermissions() : void
    - protected LightUserDatabaseBasePluginInstaller::dropTables(array $tables) : void
    - protected LightUserDatabaseBasePluginInstaller::hasTable(string $table) : bool

}




Properties
=============

- <span id="property-_exceptionClassName"><b>_exceptionClassName</b></span>

    The exception class name.
    This is only available after a call to the prepareTheNames method.
    
    

- <span id="property-_sourcePluginName"><b>_sourcePluginName</b></span>

    This property holds the _sourcePluginName for this instance.
    
    

- <span id="property-_galaxy"><b>_galaxy</b></span>

    This property holds the _galaxy for this instance.
    We assume that both the port and source plugins come from the same galaxy.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightKitAdminBasePortPluginInstallerWithDatabase::__construct](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_PluginInstaller/LightKitAdminBasePortPluginInstallerWithDatabase/__construct.md) &ndash; Builds the LightKitAdminBasePluginInstallerWithDatabase instance.
- [LightKitAdminBasePortPluginInstallerWithDatabase::install](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_PluginInstaller/LightKitAdminBasePortPluginInstallerWithDatabase/install.md) &ndash; Installs the plugin in the light application.
- [LightKitAdminBasePortPluginInstallerWithDatabase::isInstalled](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_PluginInstaller/LightKitAdminBasePortPluginInstallerWithDatabase/isInstalled.md) &ndash; Returns whether the core install phase of the plugin is fully completed.
- [LightKitAdminBasePortPluginInstallerWithDatabase::uninstall](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_PluginInstaller/LightKitAdminBasePortPluginInstallerWithDatabase/uninstall.md) &ndash; Uninstalls the plugin.
- [LightKitAdminBasePortPluginInstallerWithDatabase::getDependencies](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_PluginInstaller/LightKitAdminBasePortPluginInstallerWithDatabase/getDependencies.md) &ndash; Returns the array of dependencies.
- [LightKitAdminBasePortPluginInstallerWithDatabase::error](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_PluginInstaller/LightKitAdminBasePortPluginInstallerWithDatabase/error.md) &ndash; Throws an exception.
- [LightKitAdminBasePortPluginInstallerWithDatabase::prepareTheNames](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_PluginInstaller/LightKitAdminBasePortPluginInstallerWithDatabase/prepareTheNames.md) &ndash; prepareTheNames names used by this class.
- LightUserDatabaseBasePluginInstaller::setContainer &ndash; Sets the container.
- LightUserDatabaseBasePluginInstaller::getTableScope &ndash; Returns the [table scope](https://github.com/lingtalfi/TheBar/blob/master/discussions/table-scope.md) for this planet.
- LightUserDatabaseBasePluginInstaller::debugMsg &ndash; Writes a message to the debug channel of the plugin installer planet.
- LightUserDatabaseBasePluginInstaller::infoMsg &ndash; Writes a message to the info channel of the plugin installer planet.
- LightUserDatabaseBasePluginInstaller::warningMsg &ndash; Writes a message to the warning channel of the plugin installer planet.
- LightUserDatabaseBasePluginInstaller::message &ndash; Writes a message to the channel of the plugin installer planet.
- LightUserDatabaseBasePluginInstaller::synchronizeDatabase &ndash; Synchronizes the database with the create file (if any) of this planet.
- LightUserDatabaseBasePluginInstaller::extractPlanetDotName &ndash; Returns an array containing the galaxy name and the planet name of the current instance.
- LightUserDatabaseBasePluginInstaller::removeLightStandardPermissions &ndash; Removes the [light standard permissions](https://github.com/lingtalfi/TheBar/blob/master/discussions/light-standard-permissions.md) for this plugin.
- LightUserDatabaseBasePluginInstaller::dropTables &ndash; Drop the given tables, if they exist.
- LightUserDatabaseBasePluginInstaller::hasTable &ndash; Returns whether the given table exists in the database.





Location
=============
Ling\Light_Kit_Admin\Light_PluginInstaller\LightKitAdminBasePortPluginInstallerWithDatabase<br>
See the source code of [Ling\Light_Kit_Admin\Light_PluginInstaller\LightKitAdminBasePortPluginInstallerWithDatabase](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Light_PluginInstaller/LightKitAdminBasePortPluginInstallerWithDatabase.php)



SeeAlso
==============
Previous class: [LightKitAdminPlanetInstaller](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_PlanetInstaller/LightKitAdminPlanetInstaller.md)<br>Next class: [LightKitAdminPluginInstaller](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_PluginInstaller/LightKitAdminPluginInstaller.md)<br>
