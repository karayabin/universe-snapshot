[Back to the Ling/Light_UserNotifications api](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications.md)



The LightUserNotificationsService class
================
2020-08-13 --> 2021-02-11






Introduction
============

The LightUserNotificationsService class.



Class synopsis
==============


class <span class="pl-k">LightUserNotificationsService</span> extends [LightLingStandardService01](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService01.md) implements [PluginInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface.md) {

- Properties
    - protected int [$options](#property-options) ;
    - protected [Ling\Light_UserNotifications\Api\Custom\CustomLightUserNotificationsApiFactory](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Custom/CustomLightUserNotificationsApiFactory.md) [$factory](#property-factory) ;

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightLingStandardService01::$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Service/LightUserNotificationsService/__construct.md)() : void
    - public [getFactory](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Service/LightUserNotificationsService/getFactory.md)() : [CustomLightUserNotificationsApiFactory](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Custom/CustomLightUserNotificationsApiFactory.md)
    - public [executeCleaningRoutine](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Service/LightUserNotificationsService/executeCleaningRoutine.md)() : void

- Inherited methods
    - public LightLingStandardService01::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public LightLingStandardService01::setOptions(array $options) : void
    - public LightLingStandardService01::install() : void
    - public LightLingStandardService01::isInstalled() : bool
    - public LightLingStandardService01::uninstall() : void
    - public LightLingStandardService01::getDependencies() : array
    - public LightLingStandardService01::logDebug($msg) : void
    - protected LightLingStandardService01::error(string $msg) : void

}




Properties
=============

- <span id="property-options"><b>options</b></span>

    In addition to the parent class' options,
    the following options are available:
    - messageArchiveTime: int, The theoretical number of days a message stays in the database, once it's deleted by the user.
    
    

- <span id="property-factory"><b>factory</b></span>

    This property holds the factory for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightUserNotificationsService::__construct](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Service/LightUserNotificationsService/__construct.md) &ndash; Builds the LightUserNotificationsService instance.
- [LightUserNotificationsService::getFactory](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Service/LightUserNotificationsService/getFactory.md) &ndash; Returns the factory for this plugin's api.
- [LightUserNotificationsService::executeCleaningRoutine](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Service/LightUserNotificationsService/executeCleaningRoutine.md) &ndash; Removes the notifications marked as deleted by the user, which are older than x=messageArchiveTime days.
- LightLingStandardService01::setContainer &ndash; Sets the container.
- LightLingStandardService01::setOptions &ndash; Sets the options.
- LightLingStandardService01::install &ndash; Installs the plugin in the light application.
- LightLingStandardService01::isInstalled &ndash; Returns whether the core install phase of the plugin is fully completed.
- LightLingStandardService01::uninstall &ndash; Uninstalls the plugin.
- LightLingStandardService01::getDependencies &ndash; Returns the array of dependencies.
- LightLingStandardService01::logDebug &ndash; Sends a message to the debug log, only if the useDebug option is set to true.
- LightLingStandardService01::error &ndash; Throws an exception.





Location
=============
Ling\Light_UserNotifications\Service\LightUserNotificationsService<br>
See the source code of [Ling\Light_UserNotifications\Service\LightUserNotificationsService](https://github.com/lingtalfi/Light_UserNotifications/blob/master/Service/LightUserNotificationsService.php)



SeeAlso
==============
Previous class: [LightUserNotificationsPluginInstaller](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Light_PluginInstaller/LightUserNotificationsPluginInstaller.md)<br>
