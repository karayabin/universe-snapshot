[Back to the Ling/Light_Kit_Admin_TaskScheduler api](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/doc/api/Ling/Light_Kit_Admin_TaskScheduler.md)



The LightKitAdminTaskSchedulerPlanetInstaller class
================
2020-07-31 --> 2021-03-23






Introduction
============

The LightKitAdminTaskSchedulerPlanetInstaller class.



Class synopsis
==============


class <span class="pl-k">LightKitAdminTaskSchedulerPlanetInstaller</span> extends [LightKitAdminBasePlanetInstaller](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_PlanetInstaller/LightKitAdminBasePlanetInstaller.md) implements [LightPlanetInstallerInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightBasePlanetInstaller::$container](#property-container) ;

- Inherited methods
    - public LightKitAdminBasePlanetInstaller::onMapCopyAfter(string $appDir, Ling\CliTools\Output\OutputInterface $output) : void
    - public LightBasePlanetInstaller::__construct() : void
    - public LightBasePlanetInstaller::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- LightKitAdminBasePlanetInstaller::onMapCopyAfter &ndash; This hook is executed during an [install](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary).
- LightBasePlanetInstaller::__construct &ndash; Builds the LightBasePlanetInstaller instance.
- LightBasePlanetInstaller::setContainer &ndash; Sets the light service container interface.





Location
=============
Ling\Light_Kit_Admin_TaskScheduler\Light_PlanetInstaller\LightKitAdminTaskSchedulerPlanetInstaller<br>
See the source code of [Ling\Light_Kit_Admin_TaskScheduler\Light_PlanetInstaller\LightKitAdminTaskSchedulerPlanetInstaller](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/Light_PlanetInstaller/LightKitAdminTaskSchedulerPlanetInstaller.php)



SeeAlso
==============
Previous class: [LightKitAdminTaskSchedulerControllerHubHandler](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/doc/api/Ling/Light_Kit_Admin_TaskScheduler/Light_ControllerHub/Generated/LightKitAdminTaskSchedulerControllerHubHandler.md)<br>Next class: [LightKitAdminTaskSchedulerPluginInstaller](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/doc/api/Ling/Light_Kit_Admin_TaskScheduler/Light_PluginInstaller/LightKitAdminTaskSchedulerPluginInstaller.md)<br>
