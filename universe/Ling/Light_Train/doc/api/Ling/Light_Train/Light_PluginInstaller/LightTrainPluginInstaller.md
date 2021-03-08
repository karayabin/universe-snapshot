[Back to the Ling/Light_Train api](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train.md)



The LightTrainPluginInstaller class
================
2021-02-01 --> 2021-03-05






Introduction
============

The LightTrainPluginInstaller class.



Class synopsis
==============


class <span class="pl-k">LightTrainPluginInstaller</span> extends LightUserDatabaseBasePluginInstaller implements TableScopeAwareInterface, LightServiceContainerAwareInterface, PluginInstallerInterface {

- Inherited properties
    - protected Ling\Light\ServiceContainer\LightServiceContainerInterface [LightUserDatabaseBasePluginInstaller::$container](#property-container) ;

- Methods
    - public [getDependencies](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Light_PluginInstaller/LightTrainPluginInstaller/getDependencies.md)() : void
    - public [getTableScope](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Light_PluginInstaller/LightTrainPluginInstaller/getTableScope.md)() : array

- Inherited methods
    - public LightUserDatabaseBasePluginInstaller::__construct() : void
    - public LightUserDatabaseBasePluginInstaller::setContainer(Ling\Light\ServiceContainer\LightServiceContainerInterface $container) : void
    - public LightUserDatabaseBasePluginInstaller::install() : void
    - public LightUserDatabaseBasePluginInstaller::isInstalled() : bool
    - public LightUserDatabaseBasePluginInstaller::uninstall() : void
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






Methods
==============

- [LightTrainPluginInstaller::getDependencies](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Light_PluginInstaller/LightTrainPluginInstaller/getDependencies.md) &ndash; 
- [LightTrainPluginInstaller::getTableScope](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Light_PluginInstaller/LightTrainPluginInstaller/getTableScope.md) &ndash; Returns the [table scope](https://github.com/lingtalfi/TheBar/blob/master/discussions/table-scope.md) for this planet.
- LightUserDatabaseBasePluginInstaller::__construct &ndash; Builds the LightBasePluginInstaller instance.
- LightUserDatabaseBasePluginInstaller::setContainer &ndash; Sets the container.
- LightUserDatabaseBasePluginInstaller::install &ndash; Installs the plugin in the light application.
- LightUserDatabaseBasePluginInstaller::isInstalled &ndash; Returns whether the core install phase of the plugin is fully completed.
- LightUserDatabaseBasePluginInstaller::uninstall &ndash; Uninstalls the plugin.
- LightUserDatabaseBasePluginInstaller::debugMsg &ndash; Writes a message to the debug channel of the plugin installer planet.
- LightUserDatabaseBasePluginInstaller::infoMsg &ndash; Writes a message to the info channel of the plugin installer planet.
- LightUserDatabaseBasePluginInstaller::warningMsg &ndash; Writes a message to the warning channel of the plugin installer planet.
- LightUserDatabaseBasePluginInstaller::message &ndash; Writes a message to the channel of the plugin installer planet.
- LightUserDatabaseBasePluginInstaller::synchronizeDatabase &ndash; Synchronizes the database with the create file (if any) of this planet.
- LightUserDatabaseBasePluginInstaller::extractPlanetDotName &ndash; Returns an array containing the galaxy name and the planet name of the current instance.
- LightUserDatabaseBasePluginInstaller::removeLightStandardPermissions &ndash; Removes the light standard permissions for this plugin.
- LightUserDatabaseBasePluginInstaller::dropTables &ndash; Drop the given tables, if they exist.
- LightUserDatabaseBasePluginInstaller::hasTable &ndash; Returns whether the given table exists in the database.





Location
=============
Ling\Light_Train\Light_PluginInstaller\LightTrainPluginInstaller<br>
See the source code of [Ling\Light_Train\Light_PluginInstaller\LightTrainPluginInstaller](https://github.com/lingtalfi/Light_Train/blob/master/Light_PluginInstaller/LightTrainPluginInstaller.php)



SeeAlso
==============
Previous class: [LightTrainException](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Exception/LightTrainException.md)<br>Next class: [LightTrainService](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Service/LightTrainService.md)<br>
