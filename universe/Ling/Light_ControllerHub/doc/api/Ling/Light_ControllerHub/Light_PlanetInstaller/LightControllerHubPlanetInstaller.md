[Back to the Ling/Light_ControllerHub api](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub.md)



The LightControllerHubPlanetInstaller class
================
2019-10-28 --> 2021-05-31






Introduction
============

The LightControllerHubPlanetInstaller class.



Class synopsis
==============


class <span class="pl-k">LightControllerHubPlanetInstaller</span> extends [LightBasePlanetInstaller](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightBasePlanetInstaller.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightPlanetInstallerInit2HookInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInit2HookInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightBasePlanetInstaller::$container](#property-container) ;

- Methods
    - public [init2](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/Light_PlanetInstaller/LightControllerHubPlanetInstaller/init2.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output) : void
    - public [undoInit2](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/Light_PlanetInstaller/LightControllerHubPlanetInstaller/undoInit2.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output) : void

- Inherited methods
    - public LightBasePlanetInstaller::__construct() : void
    - public LightBasePlanetInstaller::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [LightControllerHubPlanetInstaller::init2](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/Light_PlanetInstaller/LightControllerHubPlanetInstaller/init2.md) &ndash; Executes the init 2 phase of the install command.
- [LightControllerHubPlanetInstaller::undoInit2](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/Light_PlanetInstaller/LightControllerHubPlanetInstaller/undoInit2.md) &ndash; Undoes the init 2 phase.
- LightBasePlanetInstaller::__construct &ndash; Builds the LightBasePlanetInstaller instance.
- LightBasePlanetInstaller::setContainer &ndash; Sets the light service container interface.





Location
=============
Ling\Light_ControllerHub\Light_PlanetInstaller\LightControllerHubPlanetInstaller<br>
See the source code of [Ling\Light_ControllerHub\Light_PlanetInstaller\LightControllerHubPlanetInstaller](https://github.com/lingtalfi/Light_ControllerHub/blob/master/Light_PlanetInstaller/LightControllerHubPlanetInstaller.php)



SeeAlso
==============
Previous class: [LightControllerHubException](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/Exception/LightControllerHubException.md)<br>Next class: [LightControllerHubService](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/Service/LightControllerHubService.md)<br>
