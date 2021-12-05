[Back to the Ling/Light_FileWatcher api](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher.md)



The LightFileWatcherPlanetInstaller class
================
2020-06-25 --> 2021-06-28






Introduction
============

The LightFileWatcherPlanetInstaller class.



Class synopsis
==============


class <span class="pl-k">LightFileWatcherPlanetInstaller</span> extends [LightBasePlanetInstaller](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightBasePlanetInstaller.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightPlanetInstallerInit2HookInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInit2HookInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightBasePlanetInstaller::$container](#property-container) ;

- Methods
    - public [init2](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Light_PlanetInstaller/LightFileWatcherPlanetInstaller/init2.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output, ?array $options = []) : void
    - public [undoInit2](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Light_PlanetInstaller/LightFileWatcherPlanetInstaller/undoInit2.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output, ?array $options = []) : void

- Inherited methods
    - public LightBasePlanetInstaller::__construct() : void
    - public LightBasePlanetInstaller::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [LightFileWatcherPlanetInstaller::init2](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Light_PlanetInstaller/LightFileWatcherPlanetInstaller/init2.md) &ndash; Executes the init 2 phase of the install command.
- [LightFileWatcherPlanetInstaller::undoInit2](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Light_PlanetInstaller/LightFileWatcherPlanetInstaller/undoInit2.md) &ndash; Undoes the init 2 phase.
- LightBasePlanetInstaller::__construct &ndash; Builds the LightBasePlanetInstaller instance.
- LightBasePlanetInstaller::setContainer &ndash; Sets the light service container interface.





Location
=============
Ling\Light_FileWatcher\Light_PlanetInstaller\LightFileWatcherPlanetInstaller<br>
See the source code of [Ling\Light_FileWatcher\Light_PlanetInstaller\LightFileWatcherPlanetInstaller](https://github.com/lingtalfi/Light_FileWatcher/blob/master/Light_PlanetInstaller/LightFileWatcherPlanetInstaller.php)



SeeAlso
==============
Previous class: [LightFileWatcherException](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Exception/LightFileWatcherException.md)<br>Next class: [LightFileWatcherService](https://github.com/lingtalfi/Light_FileWatcher/blob/master/doc/api/Ling/Light_FileWatcher/Service/LightFileWatcherService.md)<br>
