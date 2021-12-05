[Back to the Ling/Light_DbSynchronizer api](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer.md)



The LightDbSynchronizerPlanetInstaller class
================
2020-06-19 --> 2021-06-28






Introduction
============

The LightDbSynchronizerPlanetInstaller class.



Class synopsis
==============


class <span class="pl-k">LightDbSynchronizerPlanetInstaller</span> extends [LightBasePlanetInstaller](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightBasePlanetInstaller.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightPlanetInstallerInit2HookInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInit2HookInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightBasePlanetInstaller::$container](#property-container) ;

- Methods
    - public [init2](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Light_PlanetInstaller/LightDbSynchronizerPlanetInstaller/init2.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output, ?array $options = []) : void
    - public [undoInit2](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Light_PlanetInstaller/LightDbSynchronizerPlanetInstaller/undoInit2.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output, ?array $options = []) : void

- Inherited methods
    - public LightBasePlanetInstaller::__construct() : void
    - public LightBasePlanetInstaller::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [LightDbSynchronizerPlanetInstaller::init2](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Light_PlanetInstaller/LightDbSynchronizerPlanetInstaller/init2.md) &ndash; Executes the init 2 phase of the install command.
- [LightDbSynchronizerPlanetInstaller::undoInit2](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Light_PlanetInstaller/LightDbSynchronizerPlanetInstaller/undoInit2.md) &ndash; Undoes the init 2 phase.
- LightBasePlanetInstaller::__construct &ndash; Builds the LightBasePlanetInstaller instance.
- LightBasePlanetInstaller::setContainer &ndash; Sets the light service container interface.





Location
=============
Ling\Light_DbSynchronizer\Light_PlanetInstaller\LightDbSynchronizerPlanetInstaller<br>
See the source code of [Ling\Light_DbSynchronizer\Light_PlanetInstaller\LightDbSynchronizerPlanetInstaller](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/Light_PlanetInstaller/LightDbSynchronizerPlanetInstaller.php)



SeeAlso
==============
Previous class: [LightDbSynchronizerHelper](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Helper/LightDbSynchronizerHelper.md)<br>Next class: [LightDbSynchronizerService](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/api/Ling/Light_DbSynchronizer/Service/LightDbSynchronizerService.md)<br>
