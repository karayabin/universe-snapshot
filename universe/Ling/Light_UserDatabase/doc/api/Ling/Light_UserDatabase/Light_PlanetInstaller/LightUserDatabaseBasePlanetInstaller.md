[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The LightUserDatabaseBasePlanetInstaller class
================
2019-07-19 --> 2021-06-01






Introduction
============

The LightUserDatabaseBasePlanetInstaller class.

This class provides a default LightPlanetInstallerInit3HookInterface.init3 implementation for planets which use our service.

Our methods are based around various concepts:

- [Light standard permissions](https://github.com/lingtalfi/TheBar/blob/master/discussions/light-standard-permissions.md).
- [create file](https://github.com/lingtalfi/TheBar/blob/master/discussions/create-file.md)



Basically, our default implementation automatically installs the tables of the client planet (via create file system).
It also inserts the **light standard permissions** automatically.



Class synopsis
==============


class <span class="pl-k">LightUserDatabaseBasePlanetInstaller</span> implements [LightPlanetInstallerInit3HookInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInit3HookInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - private array|null [$planetInfo](#property-planetInfo) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PlanetInstaller/LightUserDatabaseBasePlanetInstaller/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PlanetInstaller/LightUserDatabaseBasePlanetInstaller/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [init3](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PlanetInstaller/LightUserDatabaseBasePlanetInstaller/init3.md)(string $appDir, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void
    - public [undoInit3](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PlanetInstaller/LightUserDatabaseBasePlanetInstaller/undoInit3.md)(string $appDir, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void
    - protected [getTableScope](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PlanetInstaller/LightUserDatabaseBasePlanetInstaller/getTableScope.md)() : array | null
    - private [synchronizeDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PlanetInstaller/LightUserDatabaseBasePlanetInstaller/synchronizeDatabase.md)([Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void
    - private [removeLightStandardPermissions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PlanetInstaller/LightUserDatabaseBasePlanetInstaller/removeLightStandardPermissions.md)([Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void
    - private [dropTables](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PlanetInstaller/LightUserDatabaseBasePlanetInstaller/dropTables.md)(array $tables, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void
    - private [hasTable](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PlanetInstaller/LightUserDatabaseBasePlanetInstaller/hasTable.md)(string $table) : bool
    - private [extractPlanetInfo](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PlanetInstaller/LightUserDatabaseBasePlanetInstaller/extractPlanetInfo.md)() : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-planetInfo"><b>planetInfo</b></span>

    An internal cache for the planet dot name array.
    
    



Methods
==============

- [LightUserDatabaseBasePlanetInstaller::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PlanetInstaller/LightUserDatabaseBasePlanetInstaller/__construct.md) &ndash; Builds the LightUserDatabaseBasePlanetInstaller instance.
- [LightUserDatabaseBasePlanetInstaller::setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PlanetInstaller/LightUserDatabaseBasePlanetInstaller/setContainer.md) &ndash; Sets the container.
- [LightUserDatabaseBasePlanetInstaller::init3](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PlanetInstaller/LightUserDatabaseBasePlanetInstaller/init3.md) &ndash; Executes the init 3 phase of the install command.
- [LightUserDatabaseBasePlanetInstaller::undoInit3](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PlanetInstaller/LightUserDatabaseBasePlanetInstaller/undoInit3.md) &ndash; Undoes the init 3 phase.
- [LightUserDatabaseBasePlanetInstaller::getTableScope](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PlanetInstaller/LightUserDatabaseBasePlanetInstaller/getTableScope.md) &ndash; Returns the table scope to use with the Light_DbSynchronizer tool.
- [LightUserDatabaseBasePlanetInstaller::synchronizeDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PlanetInstaller/LightUserDatabaseBasePlanetInstaller/synchronizeDatabase.md) &ndash; Synchronizes the database with the create file (if any) of this planet.
- [LightUserDatabaseBasePlanetInstaller::removeLightStandardPermissions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PlanetInstaller/LightUserDatabaseBasePlanetInstaller/removeLightStandardPermissions.md) &ndash; Removes the [light standard permissions](https://github.com/lingtalfi/TheBar/blob/master/discussions/light-standard-permissions.md) for this plugin.
- [LightUserDatabaseBasePlanetInstaller::dropTables](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PlanetInstaller/LightUserDatabaseBasePlanetInstaller/dropTables.md) &ndash; Drop the given tables, if they exist.
- [LightUserDatabaseBasePlanetInstaller::hasTable](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PlanetInstaller/LightUserDatabaseBasePlanetInstaller/hasTable.md) &ndash; Returns whether the given table exists in the database.
- [LightUserDatabaseBasePlanetInstaller::extractPlanetInfo](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PlanetInstaller/LightUserDatabaseBasePlanetInstaller/extractPlanetInfo.md) &ndash; Returns an array containing the galaxy name and the planet name of the current instance.





Location
=============
Ling\Light_UserDatabase\Light_PlanetInstaller\LightUserDatabaseBasePlanetInstaller<br>
See the source code of [Ling\Light_UserDatabase\Light_PlanetInstaller\LightUserDatabaseBasePlanetInstaller](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Light_PlanetInstaller/LightUserDatabaseBasePlanetInstaller.php)



SeeAlso
==============
Previous class: [LightWebsiteUserDatabaseInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightWebsiteUserDatabaseInterface.md)<br>Next class: [LightUserDatabasePlanetInstaller](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PlanetInstaller/LightUserDatabasePlanetInstaller.md)<br>
