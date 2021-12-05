[Back to the Ling/Light_Database api](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database.md)



The LightDatabaseBasePlanetInstaller class
================
2019-07-22 --> 2021-06-28






Introduction
============

The LightDatabaseBasePlanetInstaller class.



Class synopsis
==============


class <span class="pl-k">LightDatabaseBasePlanetInstaller</span> extends [LightBasePlanetInstaller](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightBasePlanetInstaller.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightPlanetInstallerInit3HookInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInit3HookInterface.md) {

- Properties
    - private array|null [$planetInfo](#property-planetInfo) ;

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightBasePlanetInstaller::$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Light_PlanetInstaller/LightDatabaseBasePlanetInstaller/__construct.md)() : void
    - public [init3](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Light_PlanetInstaller/LightDatabaseBasePlanetInstaller/init3.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output, ?array $options = []) : void
    - public [undoInit3](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Light_PlanetInstaller/LightDatabaseBasePlanetInstaller/undoInit3.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output, ?array $options = []) : void
    - private [dropTables](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Light_PlanetInstaller/LightDatabaseBasePlanetInstaller/dropTables.md)(array $tables, Ling\CliTools\Output\OutputInterface $output) : void
    - private [extractPlanetInfo](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Light_PlanetInstaller/LightDatabaseBasePlanetInstaller/extractPlanetInfo.md)() : void
    - private [synchronizeDatabaseIfCreateFileByPlanetDotName](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Light_PlanetInstaller/LightDatabaseBasePlanetInstaller/synchronizeDatabaseIfCreateFileByPlanetDotName.md)(Ling\CliTools\Output\OutputInterface $output, string $planetDotName, string $appDir) : void

- Inherited methods
    - public LightBasePlanetInstaller::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}




Properties
=============

- <span id="property-planetInfo"><b>planetInfo</b></span>

    An internal cache for the planet dot name array.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightDatabaseBasePlanetInstaller::__construct](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Light_PlanetInstaller/LightDatabaseBasePlanetInstaller/__construct.md) &ndash; Builds the LightDatabaseBasePlanetInstaller instance.
- [LightDatabaseBasePlanetInstaller::init3](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Light_PlanetInstaller/LightDatabaseBasePlanetInstaller/init3.md) &ndash; Executes the init 3 phase of the install command.
- [LightDatabaseBasePlanetInstaller::undoInit3](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Light_PlanetInstaller/LightDatabaseBasePlanetInstaller/undoInit3.md) &ndash; Undoes the init 3 phase.
- [LightDatabaseBasePlanetInstaller::dropTables](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Light_PlanetInstaller/LightDatabaseBasePlanetInstaller/dropTables.md) &ndash; Drop the given tables, if they exist.
- [LightDatabaseBasePlanetInstaller::extractPlanetInfo](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Light_PlanetInstaller/LightDatabaseBasePlanetInstaller/extractPlanetInfo.md) &ndash; Returns an array containing the galaxy name and the planet name of the current instance.
- [LightDatabaseBasePlanetInstaller::synchronizeDatabaseIfCreateFileByPlanetDotName](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Light_PlanetInstaller/LightDatabaseBasePlanetInstaller/synchronizeDatabaseIfCreateFileByPlanetDotName.md) &ndash; Synchronizes the planet's schema with the existing database.
- LightBasePlanetInstaller::setContainer &ndash; Sets the light service container interface.





Location
=============
Ling\Light_Database\Light_PlanetInstaller\LightDatabaseBasePlanetInstaller<br>
See the source code of [Ling\Light_Database\Light_PlanetInstaller\LightDatabaseBasePlanetInstaller](https://github.com/lingtalfi/Light_Database/blob/master/Light_PlanetInstaller/LightDatabaseBasePlanetInstaller.php)



SeeAlso
==============
Previous class: [LightDatabasePdoWrapper](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md)<br>Next class: [LightDatabasePlanetInstaller](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Light_PlanetInstaller/LightDatabasePlanetInstaller.md)<br>
