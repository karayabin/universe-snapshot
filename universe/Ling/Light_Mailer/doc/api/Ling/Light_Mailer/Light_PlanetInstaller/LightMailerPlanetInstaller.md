[Back to the Ling/Light_Mailer api](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer.md)



The LightMailerPlanetInstaller class
================
2020-06-29 --> 2021-06-28






Introduction
============

The LightMailerPlanetInstaller class.



Class synopsis
==============


class <span class="pl-k">LightMailerPlanetInstaller</span> extends [LightBasePlanetInstaller](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightBasePlanetInstaller.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightPlanetInstallerInit2HookInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInit2HookInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightBasePlanetInstaller::$container](#property-container) ;

- Methods
    - public [init2](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Light_PlanetInstaller/LightMailerPlanetInstaller/init2.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output, ?array $options = []) : void
    - public [undoInit2](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Light_PlanetInstaller/LightMailerPlanetInstaller/undoInit2.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output, ?array $options = []) : void

- Inherited methods
    - public LightBasePlanetInstaller::__construct() : void
    - public LightBasePlanetInstaller::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [LightMailerPlanetInstaller::init2](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Light_PlanetInstaller/LightMailerPlanetInstaller/init2.md) &ndash; Executes the init 2 phase of the install command.
- [LightMailerPlanetInstaller::undoInit2](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Light_PlanetInstaller/LightMailerPlanetInstaller/undoInit2.md) &ndash; Undoes the init 2 phase.
- LightBasePlanetInstaller::__construct &ndash; Builds the LightBasePlanetInstaller instance.
- LightBasePlanetInstaller::setContainer &ndash; Sets the light service container interface.





Location
=============
Ling\Light_Mailer\Light_PlanetInstaller\LightMailerPlanetInstaller<br>
See the source code of [Ling\Light_Mailer\Light_PlanetInstaller\LightMailerPlanetInstaller](https://github.com/lingtalfi/Light_Mailer/blob/master/Light_PlanetInstaller/LightMailerPlanetInstaller.php)



SeeAlso
==============
Previous class: [LightMailerException](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Exception/LightMailerException.md)<br>Next class: [LightMailerService](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService.md)<br>
