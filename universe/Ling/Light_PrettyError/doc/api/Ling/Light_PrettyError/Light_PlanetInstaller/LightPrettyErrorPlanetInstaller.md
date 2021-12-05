[Back to the Ling/Light_PrettyError api](https://github.com/lingtalfi/Light_PrettyError/blob/master/doc/api/Ling/Light_PrettyError.md)



The LightPrettyErrorPlanetInstaller class
================
2019-04-05 --> 2021-08-10






Introduction
============

The LightPrettyErrorPlanetInstaller class.



Class synopsis
==============


class <span class="pl-k">LightPrettyErrorPlanetInstaller</span> extends [LightBasePlanetInstaller](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightBasePlanetInstaller.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightPlanetInstallerInit2HookInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInit2HookInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightBasePlanetInstaller::$container](#property-container) ;

- Methods
    - public [init2](https://github.com/lingtalfi/Light_PrettyError/blob/master/doc/api/Ling/Light_PrettyError/Light_PlanetInstaller/LightPrettyErrorPlanetInstaller/init2.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output, ?array $options = []) : void
    - public [undoInit2](https://github.com/lingtalfi/Light_PrettyError/blob/master/doc/api/Ling/Light_PrettyError/Light_PlanetInstaller/LightPrettyErrorPlanetInstaller/undoInit2.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output, ?array $options = []) : void

- Inherited methods
    - public LightBasePlanetInstaller::__construct() : void
    - public LightBasePlanetInstaller::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [LightPrettyErrorPlanetInstaller::init2](https://github.com/lingtalfi/Light_PrettyError/blob/master/doc/api/Ling/Light_PrettyError/Light_PlanetInstaller/LightPrettyErrorPlanetInstaller/init2.md) &ndash; Executes the init 2 phase of the install command.
- [LightPrettyErrorPlanetInstaller::undoInit2](https://github.com/lingtalfi/Light_PrettyError/blob/master/doc/api/Ling/Light_PrettyError/Light_PlanetInstaller/LightPrettyErrorPlanetInstaller/undoInit2.md) &ndash; Undoes the init 2 phase.
- LightBasePlanetInstaller::__construct &ndash; Builds the LightBasePlanetInstaller instance.
- LightBasePlanetInstaller::setContainer &ndash; Sets the light service container interface.





Location
=============
Ling\Light_PrettyError\Light_PlanetInstaller\LightPrettyErrorPlanetInstaller<br>
See the source code of [Ling\Light_PrettyError\Light_PlanetInstaller\LightPrettyErrorPlanetInstaller](https://github.com/lingtalfi/Light_PrettyError/blob/master/Light_PlanetInstaller/LightPrettyErrorPlanetInstaller.php)



SeeAlso
==============
Previous class: [LightPrettyErrorException](https://github.com/lingtalfi/Light_PrettyError/blob/master/doc/api/Ling/Light_PrettyError/Exception/LightPrettyErrorException.md)<br>Next class: [LightPrettyErrorService](https://github.com/lingtalfi/Light_PrettyError/blob/master/doc/api/Ling/Light_PrettyError/Service/LightPrettyErrorService.md)<br>
