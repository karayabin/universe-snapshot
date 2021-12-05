[Back to the Ling/Light_DebugTrace api](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace.md)



The LightDebugTracePlanetInstaller class
================
2020-06-25 --> 2021-06-03






Introduction
============

The LightDebugTracePlanetInstaller class.



Class synopsis
==============


class <span class="pl-k">LightDebugTracePlanetInstaller</span> extends [LightBasePlanetInstaller](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightBasePlanetInstaller.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightPlanetInstallerInit2HookInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInit2HookInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightBasePlanetInstaller::$container](#property-container) ;

- Methods
    - public [init2](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Light_PlanetInstaller/LightDebugTracePlanetInstaller/init2.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output, ?array $options = []) : void
    - public [undoInit2](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Light_PlanetInstaller/LightDebugTracePlanetInstaller/undoInit2.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output, ?array $options = []) : void

- Inherited methods
    - public LightBasePlanetInstaller::__construct() : void
    - public LightBasePlanetInstaller::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [LightDebugTracePlanetInstaller::init2](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Light_PlanetInstaller/LightDebugTracePlanetInstaller/init2.md) &ndash; Executes the init 2 phase of the install command.
- [LightDebugTracePlanetInstaller::undoInit2](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Light_PlanetInstaller/LightDebugTracePlanetInstaller/undoInit2.md) &ndash; Undoes the init 2 phase.
- LightBasePlanetInstaller::__construct &ndash; Builds the LightBasePlanetInstaller instance.
- LightBasePlanetInstaller::setContainer &ndash; Sets the light service container interface.





Location
=============
Ling\Light_DebugTrace\Light_PlanetInstaller\LightDebugTracePlanetInstaller<br>
See the source code of [Ling\Light_DebugTrace\Light_PlanetInstaller\LightDebugTracePlanetInstaller](https://github.com/lingtalfi/Light_DebugTrace/blob/master/Light_PlanetInstaller/LightDebugTracePlanetInstaller.php)



SeeAlso
==============
Next class: [LightDebugTraceService](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService.md)<br>
