[Back to the Ling/Light_TaskScheduler api](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler.md)



The LightTaskSchedulerPluginInstaller class
================
2020-06-30 --> 2021-02-11






Introduction
============

The LightTaskSchedulerPluginInstaller class.



Class synopsis
==============


class <span class="pl-k">LightTaskSchedulerPluginInstaller</span> extends [LightUserDatabaseBasePluginInstaller](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PluginInstaller/LightUserDatabaseBasePluginInstaller.md) implements [TableScopeAwareInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/TableScope/TableScopeAwareInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [PluginInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightUserDatabaseBasePluginInstaller::$container](#property-container) ;

- Methods
    - public [getTableScope](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Light_PluginInstaller/LightTaskSchedulerPluginInstaller/getTableScope.md)() : array

- Inherited methods
    - public LightUserDatabaseBasePluginInstaller::__construct() : void
    - public LightUserDatabaseBasePluginInstaller::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public LightUserDatabaseBasePluginInstaller::install() : void
    - public LightUserDatabaseBasePluginInstaller::isInstalled() : bool
    - public LightUserDatabaseBasePluginInstaller::uninstall() : void
    - public LightUserDatabaseBasePluginInstaller::getDependencies() : array
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

- [LightTaskSchedulerPluginInstaller::getTableScope](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Light_PluginInstaller/LightTaskSchedulerPluginInstaller/getTableScope.md) &ndash; Returns the [table scope](https://github.com/lingtalfi/TheBar/blob/master/discussions/table-scope.md) for this planet.
- LightUserDatabaseBasePluginInstaller::__construct &ndash; Builds the LightBasePluginInstaller instance.
- LightUserDatabaseBasePluginInstaller::setContainer &ndash; Sets the container.
- LightUserDatabaseBasePluginInstaller::install &ndash; Installs the plugin in the light application.
- LightUserDatabaseBasePluginInstaller::isInstalled &ndash; Returns whether the core install phase of the plugin is fully completed.
- LightUserDatabaseBasePluginInstaller::uninstall &ndash; Uninstalls the plugin.
- LightUserDatabaseBasePluginInstaller::getDependencies &ndash; Returns the array of dependencies.
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
Ling\Light_TaskScheduler\Light_PluginInstaller\LightTaskSchedulerPluginInstaller<br>
See the source code of [Ling\Light_TaskScheduler\Light_PluginInstaller\LightTaskSchedulerPluginInstaller](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/Light_PluginInstaller/LightTaskSchedulerPluginInstaller.php)



SeeAlso
==============
Previous class: [LightTaskSchedulerException](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Exception/LightTaskSchedulerException.md)<br>Next class: [LightTaskSchedulerService](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService.md)<br>
