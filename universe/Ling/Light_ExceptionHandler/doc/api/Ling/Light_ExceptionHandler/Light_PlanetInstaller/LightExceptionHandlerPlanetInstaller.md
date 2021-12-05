[Back to the Ling/Light_ExceptionHandler api](https://github.com/lingtalfi/Light_ExceptionHandler/blob/master/doc/api/Ling/Light_ExceptionHandler.md)



The LightExceptionHandlerPlanetInstaller class
================
2019-11-11 --> 2021-06-28






Introduction
============

The LightExceptionHandlerPlanetInstaller class.



Class synopsis
==============


class <span class="pl-k">LightExceptionHandlerPlanetInstaller</span> extends [LightBasePlanetInstaller](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightBasePlanetInstaller.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightPlanetInstallerInit2HookInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInit2HookInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightBasePlanetInstaller::$container](#property-container) ;

- Methods
    - public [init2](https://github.com/lingtalfi/Light_ExceptionHandler/blob/master/doc/api/Ling/Light_ExceptionHandler/Light_PlanetInstaller/LightExceptionHandlerPlanetInstaller/init2.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output, ?array $options = []) : void
    - public [undoInit2](https://github.com/lingtalfi/Light_ExceptionHandler/blob/master/doc/api/Ling/Light_ExceptionHandler/Light_PlanetInstaller/LightExceptionHandlerPlanetInstaller/undoInit2.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output, ?array $options = []) : void

- Inherited methods
    - public LightBasePlanetInstaller::__construct() : void
    - public LightBasePlanetInstaller::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [LightExceptionHandlerPlanetInstaller::init2](https://github.com/lingtalfi/Light_ExceptionHandler/blob/master/doc/api/Ling/Light_ExceptionHandler/Light_PlanetInstaller/LightExceptionHandlerPlanetInstaller/init2.md) &ndash; Executes the init 2 phase of the install command.
- [LightExceptionHandlerPlanetInstaller::undoInit2](https://github.com/lingtalfi/Light_ExceptionHandler/blob/master/doc/api/Ling/Light_ExceptionHandler/Light_PlanetInstaller/LightExceptionHandlerPlanetInstaller/undoInit2.md) &ndash; Undoes the init 2 phase.
- LightBasePlanetInstaller::__construct &ndash; Builds the LightBasePlanetInstaller instance.
- LightBasePlanetInstaller::setContainer &ndash; Sets the light service container interface.





Location
=============
Ling\Light_ExceptionHandler\Light_PlanetInstaller\LightExceptionHandlerPlanetInstaller<br>
See the source code of [Ling\Light_ExceptionHandler\Light_PlanetInstaller\LightExceptionHandlerPlanetInstaller](https://github.com/lingtalfi/Light_ExceptionHandler/blob/master/Light_PlanetInstaller/LightExceptionHandlerPlanetInstaller.php)



SeeAlso
==============
Next class: [LightExceptionHandlerService](https://github.com/lingtalfi/Light_ExceptionHandler/blob/master/doc/api/Ling/Light_ExceptionHandler/Service/LightExceptionHandlerService.md)<br>
