[Back to the Ling/Light_Events api](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events.md)



The LightEventsPlanetInstaller class
================
2019-10-31 --> 2021-06-28






Introduction
============

The LightEventsPlanetInstaller class.



Class synopsis
==============


class <span class="pl-k">LightEventsPlanetInstaller</span> extends [LightBasePlanetInstaller](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightBasePlanetInstaller.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightPlanetInstallerInit2HookInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInit2HookInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightBasePlanetInstaller::$container](#property-container) ;

- Methods
    - public [init2](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Light_PlanetInstaller/LightEventsPlanetInstaller/init2.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output, ?array $options = []) : void
    - public [undoInit2](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Light_PlanetInstaller/LightEventsPlanetInstaller/undoInit2.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output, ?array $options = []) : void

- Inherited methods
    - public LightBasePlanetInstaller::__construct() : void
    - public LightBasePlanetInstaller::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [LightEventsPlanetInstaller::init2](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Light_PlanetInstaller/LightEventsPlanetInstaller/init2.md) &ndash; Executes the init 2 phase of the install command.
- [LightEventsPlanetInstaller::undoInit2](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Light_PlanetInstaller/LightEventsPlanetInstaller/undoInit2.md) &ndash; Undoes the init 2 phase.
- LightBasePlanetInstaller::__construct &ndash; Builds the LightBasePlanetInstaller instance.
- LightBasePlanetInstaller::setContainer &ndash; Sets the light service container interface.





Location
=============
Ling\Light_Events\Light_PlanetInstaller\LightEventsPlanetInstaller<br>
See the source code of [Ling\Light_Events\Light_PlanetInstaller\LightEventsPlanetInstaller](https://github.com/lingtalfi/Light_Events/blob/master/Light_PlanetInstaller/LightEventsPlanetInstaller.php)



SeeAlso
==============
Previous class: [LightEventsHelper](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Helper/LightEventsHelper.md)<br>Next class: [LightEventsListenerInterface](https://github.com/lingtalfi/Light_Events/blob/master/doc/api/Ling/Light_Events/Listener/LightEventsListenerInterface.md)<br>
