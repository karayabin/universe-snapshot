[Back to the Ling/Light_TaskScheduler api](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler.md)



The LightTaskSchedulerPlanetInstaller class
================
2020-06-30 --> 2021-06-25






Introduction
============

The LightTaskSchedulerPlanetInstaller class.



Class synopsis
==============


class <span class="pl-k">LightTaskSchedulerPlanetInstaller</span> extends [LightDatabaseBasePlanetInstaller](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Light_PlanetInstaller/LightDatabaseBasePlanetInstaller.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightPlanetInstallerInit3HookInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInit3HookInterface.md), [LightPlanetInstallerInit2HookInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInit2HookInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightBasePlanetInstaller::$container](#property-container) ;

- Methods
    - public [init2](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Light_PlanetInstaller/LightTaskSchedulerPlanetInstaller/init2.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output, ?array $options = []) : void
    - public [undoInit2](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Light_PlanetInstaller/LightTaskSchedulerPlanetInstaller/undoInit2.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output, ?array $options = []) : void

- Inherited methods
    - public LightDatabaseBasePlanetInstaller::__construct() : void
    - public LightDatabaseBasePlanetInstaller::init3(string $appDir, Ling\CliTools\Output\OutputInterface $output, ?array $options = []) : void
    - public LightDatabaseBasePlanetInstaller::undoInit3(string $appDir, Ling\CliTools\Output\OutputInterface $output, ?array $options = []) : void
    - public LightBasePlanetInstaller::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [LightTaskSchedulerPlanetInstaller::init2](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Light_PlanetInstaller/LightTaskSchedulerPlanetInstaller/init2.md) &ndash; Executes the init 2 phase of the install command.
- [LightTaskSchedulerPlanetInstaller::undoInit2](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Light_PlanetInstaller/LightTaskSchedulerPlanetInstaller/undoInit2.md) &ndash; Undoes the init 2 phase.
- LightDatabaseBasePlanetInstaller::__construct &ndash; Builds the LightDatabaseBasePlanetInstaller instance.
- LightDatabaseBasePlanetInstaller::init3 &ndash; Executes the init 3 phase of the install command.
- LightDatabaseBasePlanetInstaller::undoInit3 &ndash; Undoes the init 3 phase.
- LightBasePlanetInstaller::setContainer &ndash; Sets the light service container interface.





Location
=============
Ling\Light_TaskScheduler\Light_PlanetInstaller\LightTaskSchedulerPlanetInstaller<br>
See the source code of [Ling\Light_TaskScheduler\Light_PlanetInstaller\LightTaskSchedulerPlanetInstaller](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/Light_PlanetInstaller/LightTaskSchedulerPlanetInstaller.php)



SeeAlso
==============
Previous class: [LightTaskSchedulerException](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Exception/LightTaskSchedulerException.md)<br>Next class: [LightTaskSchedulerService](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService.md)<br>
