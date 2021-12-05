[Back to the Ling/Light_404Logger api](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger.md)



The Light404LoggerPlanetInstaller class
================
2019-12-12 --> 2021-06-28






Introduction
============

The Light404LoggerPlanetInstaller class.



Class synopsis
==============


class <span class="pl-k">Light404LoggerPlanetInstaller</span> extends [LightBasePlanetInstaller](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightBasePlanetInstaller.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightPlanetInstallerInit2HookInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInit2HookInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightBasePlanetInstaller::$container](#property-container) ;

- Methods
    - public [init2](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger/Light_PlanetInstaller/Light404LoggerPlanetInstaller/init2.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output, ?array $options = []) : void
    - public [undoInit2](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger/Light_PlanetInstaller/Light404LoggerPlanetInstaller/undoInit2.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output, ?array $options = []) : void

- Inherited methods
    - public LightBasePlanetInstaller::__construct() : void
    - public LightBasePlanetInstaller::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [Light404LoggerPlanetInstaller::init2](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger/Light_PlanetInstaller/Light404LoggerPlanetInstaller/init2.md) &ndash; Executes the init 2 phase of the install command.
- [Light404LoggerPlanetInstaller::undoInit2](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger/Light_PlanetInstaller/Light404LoggerPlanetInstaller/undoInit2.md) &ndash; Undoes the init 2 phase.
- LightBasePlanetInstaller::__construct &ndash; Builds the LightBasePlanetInstaller instance.
- LightBasePlanetInstaller::setContainer &ndash; Sets the light service container interface.





Location
=============
Ling\Light_404Logger\Light_PlanetInstaller\Light404LoggerPlanetInstaller<br>
See the source code of [Ling\Light_404Logger\Light_PlanetInstaller\Light404LoggerPlanetInstaller](https://github.com/lingtalfi/Light_404Logger/blob/master/Light_PlanetInstaller/Light404LoggerPlanetInstaller.php)



SeeAlso
==============
Previous class: [Light404LoggerException](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger/Exception/Light404LoggerException.md)<br>Next class: [Light404LoggerListener](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger/Logger/Light404LoggerListener.md)<br>
