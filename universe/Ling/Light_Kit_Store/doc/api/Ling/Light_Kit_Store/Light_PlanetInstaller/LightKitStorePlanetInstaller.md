[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)



The LightKitStorePlanetInstaller class
================
2021-04-06 --> 2021-08-02






Introduction
============

The LightKitStorePlanetInstaller class.



Class synopsis
==============


class <span class="pl-k">LightKitStorePlanetInstaller</span> extends [LightDatabaseBasePlanetInstaller](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Light_PlanetInstaller/LightDatabaseBasePlanetInstaller.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightPlanetInstallerInit3HookInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInit3HookInterface.md), [LightPlanetInstallerInit2HookInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInit2HookInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightBasePlanetInstaller::$container](#property-container) ;

- Methods
    - public [init2](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Light_PlanetInstaller/LightKitStorePlanetInstaller/init2.md)(string $appDir, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output, ?array $options = []) : void
    - public [undoInit2](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Light_PlanetInstaller/LightKitStorePlanetInstaller/undoInit2.md)(string $appDir, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output, ?array $options = []) : void
    - public [init3](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Light_PlanetInstaller/LightKitStorePlanetInstaller/init3.md)(string $appDir, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output, ?array $options = []) : void

- Inherited methods
    - public LightDatabaseBasePlanetInstaller::__construct() : void
    - public LightDatabaseBasePlanetInstaller::undoInit3(string $appDir, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output, ?array $options = []) : void
    - public LightBasePlanetInstaller::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [LightKitStorePlanetInstaller::init2](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Light_PlanetInstaller/LightKitStorePlanetInstaller/init2.md) &ndash; Executes the init 2 phase of the install command.
- [LightKitStorePlanetInstaller::undoInit2](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Light_PlanetInstaller/LightKitStorePlanetInstaller/undoInit2.md) &ndash; Undoes the init 2 phase.
- [LightKitStorePlanetInstaller::init3](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Light_PlanetInstaller/LightKitStorePlanetInstaller/init3.md) &ndash; Executes the init 3 phase of the install command.
- LightDatabaseBasePlanetInstaller::__construct &ndash; Builds the LightDatabaseBasePlanetInstaller instance.
- LightDatabaseBasePlanetInstaller::undoInit3 &ndash; Undoes the init 3 phase.
- LightBasePlanetInstaller::setContainer &ndash; Sets the light service container interface.





Location
=============
Ling\Light_Kit_Store\Light_PlanetInstaller\LightKitStorePlanetInstaller<br>
See the source code of [Ling\Light_Kit_Store\Light_PlanetInstaller\LightKitStorePlanetInstaller](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Light_PlanetInstaller/LightKitStorePlanetInstaller.php)



SeeAlso
==============
Previous class: [LightKitStoreUserRatesItemFakeGenerator](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Light_DatabaseFakeDataMaker/Generator/LightKitStoreUserRatesItemFakeGenerator.md)<br>Next class: [LightKitStoreService](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService.md)<br>
