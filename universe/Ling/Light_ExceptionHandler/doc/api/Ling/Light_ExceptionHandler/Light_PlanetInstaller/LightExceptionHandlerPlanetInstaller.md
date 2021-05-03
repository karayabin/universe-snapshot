[Back to the Ling/Light_ExceptionHandler api](https://github.com/lingtalfi/Light_ExceptionHandler/blob/master/doc/api/Ling/Light_ExceptionHandler.md)



The LightExceptionHandlerPlanetInstaller class
================
2019-11-11 --> 2021-03-22






Introduction
============

The LightExceptionHandlerPlanetInstaller class.



Class synopsis
==============


class <span class="pl-k">LightExceptionHandlerPlanetInstaller</span> extends [LightBasePlanetInstaller](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightBasePlanetInstaller.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightPlanetInstallerInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightBasePlanetInstaller::$container](#property-container) ;

- Methods
    - public [onMapCopyAfter](https://github.com/lingtalfi/Light_ExceptionHandler/blob/master/doc/api/Ling/Light_ExceptionHandler/Light_PlanetInstaller/LightExceptionHandlerPlanetInstaller/onMapCopyAfter.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output) : void

- Inherited methods
    - public LightBasePlanetInstaller::__construct() : void
    - public LightBasePlanetInstaller::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [LightExceptionHandlerPlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_ExceptionHandler/blob/master/doc/api/Ling/Light_ExceptionHandler/Light_PlanetInstaller/LightExceptionHandlerPlanetInstaller/onMapCopyAfter.md) &ndash; This hook is executed during an [install](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary).
- LightBasePlanetInstaller::__construct &ndash; Builds the LightBasePlanetInstaller instance.
- LightBasePlanetInstaller::setContainer &ndash; Sets the light service container interface.





Location
=============
Ling\Light_ExceptionHandler\Light_PlanetInstaller\LightExceptionHandlerPlanetInstaller<br>
See the source code of [Ling\Light_ExceptionHandler\Light_PlanetInstaller\LightExceptionHandlerPlanetInstaller](https://github.com/lingtalfi/Light_ExceptionHandler/blob/master/Light_PlanetInstaller/LightExceptionHandlerPlanetInstaller.php)



SeeAlso
==============
Next class: [LightExceptionHandlerService](https://github.com/lingtalfi/Light_ExceptionHandler/blob/master/doc/api/Ling/Light_ExceptionHandler/Service/LightExceptionHandlerService.md)<br>
