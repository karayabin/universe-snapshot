[Back to the Ling/Light_LoginNotifier api](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier.md)



The LightLoginNotifierPlanetInstaller class
================
2020-11-27 --> 2021-06-25






Introduction
============

The LightLoginNotifierPlanetInstaller class.



Class synopsis
==============


class <span class="pl-k">LightLoginNotifierPlanetInstaller</span> extends [LightDatabaseBasePlanetInstaller](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Light_PlanetInstaller/LightDatabaseBasePlanetInstaller.md) implements [LightPlanetInstallerInit3HookInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInit3HookInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightBasePlanetInstaller::$container](#property-container) ;

- Inherited methods
    - public LightDatabaseBasePlanetInstaller::__construct() : void
    - public LightDatabaseBasePlanetInstaller::init3(string $appDir, Ling\CliTools\Output\OutputInterface $output, ?array $options = []) : void
    - public LightDatabaseBasePlanetInstaller::undoInit3(string $appDir, Ling\CliTools\Output\OutputInterface $output, ?array $options = []) : void
    - public LightBasePlanetInstaller::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- LightDatabaseBasePlanetInstaller::__construct &ndash; Builds the LightDatabaseBasePlanetInstaller instance.
- LightDatabaseBasePlanetInstaller::init3 &ndash; Executes the init 3 phase of the install command.
- LightDatabaseBasePlanetInstaller::undoInit3 &ndash; Undoes the init 3 phase.
- LightBasePlanetInstaller::setContainer &ndash; Sets the light service container interface.





Location
=============
Ling\Light_LoginNotifier\Light_PlanetInstaller\LightLoginNotifierPlanetInstaller<br>
See the source code of [Ling\Light_LoginNotifier\Light_PlanetInstaller\LightLoginNotifierPlanetInstaller](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/Light_PlanetInstaller/LightLoginNotifierPlanetInstaller.php)



SeeAlso
==============
Previous class: [LightLoginNotifierException](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Exception/LightLoginNotifierException.md)<br>Next class: [LightLoginNotifierService](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Service/LightLoginNotifierService.md)<br>
