[Back to the Ling/Light_Kit_Admin_Generator api](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator.md)



The LightKitAdminGeneratorPlanetInstaller class
================
2019-11-06 --> 2021-06-25






Introduction
============

The LightKitAdminGeneratorPlanetInstaller class.



Class synopsis
==============


class <span class="pl-k">LightKitAdminGeneratorPlanetInstaller</span> extends [LightBasePlanetInstaller](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightBasePlanetInstaller.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightPlanetInstallerInit2HookInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInit2HookInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightBasePlanetInstaller::$container](#property-container) ;

- Methods
    - public [init2](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Light_PlanetInstaller/LightKitAdminGeneratorPlanetInstaller/init2.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output, ?array $options = []) : void
    - public [undoInit2](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Light_PlanetInstaller/LightKitAdminGeneratorPlanetInstaller/undoInit2.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output, ?array $options = []) : void

- Inherited methods
    - public LightBasePlanetInstaller::__construct() : void
    - public LightBasePlanetInstaller::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [LightKitAdminGeneratorPlanetInstaller::init2](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Light_PlanetInstaller/LightKitAdminGeneratorPlanetInstaller/init2.md) &ndash; Executes the init 2 phase of the install command.
- [LightKitAdminGeneratorPlanetInstaller::undoInit2](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Light_PlanetInstaller/LightKitAdminGeneratorPlanetInstaller/undoInit2.md) &ndash; Undoes the init 2 phase.
- LightBasePlanetInstaller::__construct &ndash; Builds the LightBasePlanetInstaller instance.
- LightBasePlanetInstaller::setContainer &ndash; Sets the light service container interface.





Location
=============
Ling\Light_Kit_Admin_Generator\Light_PlanetInstaller\LightKitAdminGeneratorPlanetInstaller<br>
See the source code of [Ling\Light_Kit_Admin_Generator\Light_PlanetInstaller\LightKitAdminGeneratorPlanetInstaller](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/Light_PlanetInstaller/LightKitAdminGeneratorPlanetInstaller.php)



SeeAlso
==============
Previous class: [MenuConfigGenerator](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Generator/MenuConfigGenerator.md)<br>Next class: [LightKitAdminGeneratorService](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Service/LightKitAdminGeneratorService.md)<br>
