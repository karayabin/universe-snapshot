[Back to the Ling/Light_UserNotifications api](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications.md)



The LightUserNotificationsPlanetInstaller class
================
2020-08-13 --> 2021-05-31






Introduction
============

The LightUserNotificationsPlanetInstaller class.



Class synopsis
==============


class <span class="pl-k">LightUserNotificationsPlanetInstaller</span> extends [LightUserDatabaseBasePlanetInstaller](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Light_PlanetInstaller/LightUserDatabaseBasePlanetInstaller.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightPlanetInstallerInit3HookInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInit3HookInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightUserDatabaseBasePlanetInstaller::$container](#property-container) ;

- Inherited methods
    - public LightUserDatabaseBasePlanetInstaller::__construct() : void
    - public LightUserDatabaseBasePlanetInstaller::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public LightUserDatabaseBasePlanetInstaller::init3(string $appDir, Ling\CliTools\Output\OutputInterface $output) : void
    - public LightUserDatabaseBasePlanetInstaller::undoInit3(string $appDir, Ling\CliTools\Output\OutputInterface $output) : void
    - protected LightUserDatabaseBasePlanetInstaller::getTableScope() : array | null

}






Methods
==============

- LightUserDatabaseBasePlanetInstaller::__construct &ndash; Builds the LightUserDatabaseBasePlanetInstaller instance.
- LightUserDatabaseBasePlanetInstaller::setContainer &ndash; Sets the container.
- LightUserDatabaseBasePlanetInstaller::init3 &ndash; Executes the init 3 phase of the install command.
- LightUserDatabaseBasePlanetInstaller::undoInit3 &ndash; Undoes the init 3 phase.
- LightUserDatabaseBasePlanetInstaller::getTableScope &ndash; Returns the table scope to use with the Light_DbSynchronizer tool.





Location
=============
Ling\Light_UserNotifications\Light_PlanetInstaller\LightUserNotificationsPlanetInstaller<br>
See the source code of [Ling\Light_UserNotifications\Light_PlanetInstaller\LightUserNotificationsPlanetInstaller](https://github.com/lingtalfi/Light_UserNotifications/blob/master/Light_PlanetInstaller/LightUserNotificationsPlanetInstaller.php)



SeeAlso
==============
Previous class: [LightUserNotificationsException](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Exception/LightUserNotificationsException.md)<br>Next class: [LightUserNotificationsPluginInstaller](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Light_PluginInstaller/LightUserNotificationsPluginInstaller.md)<br>
