[Back to the Ling/Light_MailStats api](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats.md)



The LightMailStatsPlanetInstaller class
================
2021-06-18 --> 2021-06-25






Introduction
============

The LightMailStatsPlanetInstaller class.



Class synopsis
==============


class <span class="pl-k">LightMailStatsPlanetInstaller</span> extends [LightDatabaseBasePlanetInstaller](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Light_PlanetInstaller/LightDatabaseBasePlanetInstaller.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightPlanetInstallerInit3HookInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInit3HookInterface.md), [LightPlanetInstallerInit2HookInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInit2HookInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightBasePlanetInstaller::$container](#property-container) ;

- Methods
    - public [init2](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Light_PlanetInstaller/LightMailStatsPlanetInstaller/init2.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output, ?array $options = []) : void
    - public [undoInit2](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Light_PlanetInstaller/LightMailStatsPlanetInstaller/undoInit2.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output, ?array $options = []) : void

- Inherited methods
    - public LightDatabaseBasePlanetInstaller::__construct() : void
    - public LightDatabaseBasePlanetInstaller::init3(string $appDir, Ling\CliTools\Output\OutputInterface $output, ?array $options = []) : void
    - public LightDatabaseBasePlanetInstaller::undoInit3(string $appDir, Ling\CliTools\Output\OutputInterface $output, ?array $options = []) : void
    - public LightBasePlanetInstaller::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [LightMailStatsPlanetInstaller::init2](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Light_PlanetInstaller/LightMailStatsPlanetInstaller/init2.md) &ndash; Executes the init 2 phase of the install command.
- [LightMailStatsPlanetInstaller::undoInit2](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Light_PlanetInstaller/LightMailStatsPlanetInstaller/undoInit2.md) &ndash; Undoes the init 2 phase.
- LightDatabaseBasePlanetInstaller::__construct &ndash; Builds the LightDatabaseBasePlanetInstaller instance.
- LightDatabaseBasePlanetInstaller::init3 &ndash; Executes the init 3 phase of the install command.
- LightDatabaseBasePlanetInstaller::undoInit3 &ndash; Undoes the init 3 phase.
- LightBasePlanetInstaller::setContainer &ndash; Sets the light service container interface.





Location
=============
Ling\Light_MailStats\Light_PlanetInstaller\LightMailStatsPlanetInstaller<br>
See the source code of [Ling\Light_MailStats\Light_PlanetInstaller\LightMailStatsPlanetInstaller](https://github.com/lingtalfi/Light_MailStats/blob/master/Light_PlanetInstaller/LightMailStatsPlanetInstaller.php)



SeeAlso
==============
Previous class: [LightMailStatsException](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Exception/LightMailStatsException.md)<br>Next class: [LightMailStatsService](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Service/LightMailStatsService.md)<br>
