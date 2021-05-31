[Back to the Ling/Light_UserPreferences api](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences.md)



The LightUserPreferencesPlanetInstaller class
================
2020-07-31 --> 2021-05-31






Introduction
============

The LightUserPreferencesPlanetInstaller class.



Class synopsis
==============


class <span class="pl-k">LightUserPreferencesPlanetInstaller</span> extends [LightUserDatabaseBasePlanetInstaller](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PlanetInstaller/LightUserDatabaseBasePlanetInstaller.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightPlanetInstallerInit3HookInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInit3HookInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightUserDatabaseBasePlanetInstaller::$container](#property-container) ;

- Inherited methods
    - public LightUserDatabaseBasePlanetInstaller::__construct() : void
    - public LightUserDatabaseBasePlanetInstaller::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public LightUserDatabaseBasePlanetInstaller::init3(string $appDir, Ling\CliTools\Output\OutputInterface $output) : void
    - public LightUserDatabaseBasePlanetInstaller::undoInit3(string $appDir, Ling\CliTools\Output\OutputInterface $output) : void
    - protected LightUserDatabaseBasePlanetInstaller::getTableScope() : array | null

}






Methods
==============

- LightUserDatabaseBasePlanetInstaller::__construct &ndash; Builds the LightUserDatabaseBasePlanetInstaller instance.
- LightUserDatabaseBasePlanetInstaller::setContainer &ndash; Sets the container.
- LightUserDatabaseBasePlanetInstaller::init3 &ndash; Executes the init 3 phase of the install command.
- LightUserDatabaseBasePlanetInstaller::undoInit3 &ndash; Undoes the init 3 phase.
- LightUserDatabaseBasePlanetInstaller::getTableScope &ndash; Returns the table scope to use with the Light_DbSynchronizer tool.





Location
=============
Ling\Light_UserPreferences\Light_PlanetInstaller\LightUserPreferencesPlanetInstaller<br>
See the source code of [Ling\Light_UserPreferences\Light_PlanetInstaller\LightUserPreferencesPlanetInstaller](https://github.com/lingtalfi/Light_UserPreferences/blob/master/Light_PlanetInstaller/LightUserPreferencesPlanetInstaller.php)



SeeAlso
==============
Previous class: [LightUserPreferencesException](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Exception/LightUserPreferencesException.md)<br>Next class: [LightUserPreferencesPluginInstaller](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Light_PluginInstaller/LightUserPreferencesPluginInstaller.md)<br>
