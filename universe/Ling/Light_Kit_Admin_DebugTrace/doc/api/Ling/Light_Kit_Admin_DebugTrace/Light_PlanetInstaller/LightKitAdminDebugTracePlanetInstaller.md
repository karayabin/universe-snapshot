[Back to the Ling/Light_Kit_Admin_DebugTrace api](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace.md)



The LightKitAdminDebugTracePlanetInstaller class
================
2019-11-07 --> 2021-07-08






Introduction
============

The LightKitAdminDebugTracePlanetInstaller class.



Class synopsis
==============


class <span class="pl-k">LightKitAdminDebugTracePlanetInstaller</span> extends [LightBasePlanetInstaller](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightBasePlanetInstaller.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightPlanetInstallerInit2HookInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInit2HookInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightBasePlanetInstaller::$container](#property-container) ;

- Methods
    - public [init2](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Light_PlanetInstaller/LightKitAdminDebugTracePlanetInstaller/init2.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output, ?array $options = []) : void
    - public [undoInit2](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Light_PlanetInstaller/LightKitAdminDebugTracePlanetInstaller/undoInit2.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output, ?array $options = []) : void

- Inherited methods
    - public LightBasePlanetInstaller::__construct() : void
    - public LightBasePlanetInstaller::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [LightKitAdminDebugTracePlanetInstaller::init2](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Light_PlanetInstaller/LightKitAdminDebugTracePlanetInstaller/init2.md) &ndash; Executes the init 2 phase of the install command.
- [LightKitAdminDebugTracePlanetInstaller::undoInit2](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Light_PlanetInstaller/LightKitAdminDebugTracePlanetInstaller/undoInit2.md) &ndash; Undoes the init 2 phase.
- LightBasePlanetInstaller::__construct &ndash; Builds the LightBasePlanetInstaller instance.
- LightBasePlanetInstaller::setContainer &ndash; Sets the light service container interface.





Location
=============
Ling\Light_Kit_Admin_DebugTrace\Light_PlanetInstaller\LightKitAdminDebugTracePlanetInstaller<br>
See the source code of [Ling\Light_Kit_Admin_DebugTrace\Light_PlanetInstaller\LightKitAdminDebugTracePlanetInstaller](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/Light_PlanetInstaller/LightKitAdminDebugTracePlanetInstaller.php)



SeeAlso
==============
Previous class: [LightKitAdminDebugTraceException](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Exception/LightKitAdminDebugTraceException.md)<br>Next class: [LightKitAdminDebugTraceService](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService.md)<br>
