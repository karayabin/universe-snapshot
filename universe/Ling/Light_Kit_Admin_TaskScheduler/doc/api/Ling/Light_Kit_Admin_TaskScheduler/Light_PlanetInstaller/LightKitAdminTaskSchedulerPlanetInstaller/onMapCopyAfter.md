[Back to the Ling/Light_Kit_Admin_TaskScheduler api](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/doc/api/Ling/Light_Kit_Admin_TaskScheduler.md)<br>
[Back to the Ling\Light_Kit_Admin_TaskScheduler\Light_PlanetInstaller\LightKitAdminTaskSchedulerPlanetInstaller class](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/doc/api/Ling/Light_Kit_Admin_TaskScheduler/Light_PlanetInstaller/LightKitAdminTaskSchedulerPlanetInstaller.md)


LightKitAdminTaskSchedulerPlanetInstaller::onMapCopyAfter
================



LightKitAdminTaskSchedulerPlanetInstaller::onMapCopyAfter — This hook is executed during an [install](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary).




Description
================


public [LightKitAdminTaskSchedulerPlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/doc/api/Ling/Light_Kit_Admin_TaskScheduler/Light_PlanetInstaller/LightKitAdminTaskSchedulerPlanetInstaller/onMapCopyAfter.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output) : void




This hook is executed during an [install](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary).
It was first designed to allow  plugin authors to configure their light's service's conf file before the "logic installs" starts.

Note: This method was written with the intent to be overridden by the user (i.e you should override this method in a sub-class).



Parameters
================


- appDir

    

- output

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightKitAdminTaskSchedulerPlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/Light_PlanetInstaller/LightKitAdminTaskSchedulerPlanetInstaller.php#L22-L38)


See Also
================

The [LightKitAdminTaskSchedulerPlanetInstaller](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/doc/api/Ling/Light_Kit_Admin_TaskScheduler/Light_PlanetInstaller/LightKitAdminTaskSchedulerPlanetInstaller.md) class.



