[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)



The LightKitAdminService class
================
2019-05-17 --> 2021-05-31






Introduction
============

The LightKitAdminService class.
This is the main service of the Light_Kit_Admin plugin.

It serves as the holder of all the configuration related to (light) kit admin,
and in general is the central point of many things related to the light kit admin plugin.

For instance, this service holds the notifications.



Class synopsis
==============


class <span class="pl-k">LightKitAdminService</span>  {

- Properties
    - protected [Ling\Light_Kit_Admin\Notification\LightKitAdminNotification[]](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification.md) [$notifications](#property-notifications) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array [$options](#property-options) ;
    - protected [Ling\Light_Kit_Admin\LightKitAdminPlugin\LightKitAdminPluginInterface[]](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/LightKitAdminPlugin/LightKitAdminPluginInterface.md) [$lkaPlugins](#property-lkaPlugins) ;
    - protected array [$lkaPluginOptions](#property-lkaPluginOptions) ;
    - private array [$lateRegister](#property-lateRegister) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setOptions](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/setOptions.md)(array $options) : void
    - public [getOption](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/getOption.md)(string $key, ?$default = null) : mixed
    - public [registerPlugin](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/registerPlugin.md)(string $pluginName, [Ling\Light_Kit_Admin\LightKitAdminPlugin\LightKitAdminPluginInterface](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/LightKitAdminPlugin/LightKitAdminPluginInterface.md) $plugin) : void
    - public [getPluginOption](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/getPluginOption.md)(string $key, ?$default = null) : mixed
    - public [getNotifications](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/getNotifications.md)() : [LightKitAdminNotification](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification.md)
    - public [addNotification](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/addNotification.md)([Ling\Light_Kit_Admin\Notification\LightKitAdminNotification](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification.md) $notif) : void
    - public [getUrlByController](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/getUrlByController.md)(string $controller) : string
    - public [getRedirectResponseByRoute](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/getRedirectResponseByRoute.md)(string $route, ?array $urlParams = []) : [HttpRedirectResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRedirectResponse.md)
    - public [onLightExceptionCaught](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/onLightExceptionCaught.md)(Ling\Light\Events\LightEvent $event) : void
    - public [onWebsiteUserLogin](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/onWebsiteUserLogin.md)(Ling\Light\Events\LightEvent $event) : void
    - public [getDuelistEngine](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/getDuelistEngine.md)() : [DuelistEngineInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DuelistEngine/DuelistEngineInterface.md)
    - public [getKitEditorRealformSuccessHandler](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/getKitEditorRealformSuccessHandler.md)(string $type) : [RealformSuccessHandlerInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/RealformSuccessHandlerInterface.md)
    - public [lateRegistration](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/lateRegistration.md)(string $type, string $identifier) : void
    - public [getJimToolboxItems](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/getJimToolboxItems.md)() : array
    - public [registerJimToolboxItem](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/registerJimToolboxItem.md)(string $key, array $item) : void
    - public [unregisterJimToolboxItem](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/unregisterJimToolboxItem.md)(string $key) : bool
    - private [getJimToolboxItemsFile](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/getJimToolboxItemsFile.md)() : string

}




Properties
=============

- <span id="property-notifications"><b>notifications</b></span>

    This property holds the notifications for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    This array is the configuration of the light kit admin plugin.
    
    

- <span id="property-lkaPlugins"><b>lkaPlugins</b></span>

    This property holds the lkaPlugins for this instance.
    It's an array of pluginName => LightKitAdminPluginInterface.
    
    

- <span id="property-lkaPluginOptions"><b>lkaPluginOptions</b></span>

    This property holds the lkaPluginOptions for this instance.
    
    

- <span id="property-lateRegister"><b>lateRegister</b></span>

    This property holds the array of plugin names dynamically registering to some other services.
    
    



Methods
==============

- [LightKitAdminService::__construct](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/__construct.md) &ndash; Builds the LightKitAdminService instance.
- [LightKitAdminService::setContainer](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/setContainer.md) &ndash; Sets the container.
- [LightKitAdminService::setOptions](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/setOptions.md) &ndash; Set the options for this light kit admin service instance.
- [LightKitAdminService::getOption](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/getOption.md) &ndash; or returns the given $default otherwise (if the key is not found in the options array).
- [LightKitAdminService::registerPlugin](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/registerPlugin.md) &ndash; Registers the given plugin to the light kit admin service.
- [LightKitAdminService::getPluginOption](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/getPluginOption.md) &ndash; or returns the given $default otherwise (if the key is not found).
- [LightKitAdminService::getNotifications](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/getNotifications.md) &ndash; Returns the notifications of this instance.
- [LightKitAdminService::addNotification](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/addNotification.md) &ndash; Adds a notification to this instance.
- [LightKitAdminService::getUrlByController](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/getUrlByController.md) &ndash; Returns the url corresponding to the given controller.
- [LightKitAdminService::getRedirectResponseByRoute](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/getRedirectResponseByRoute.md) &ndash; Creates and returns an HttpRedirectResponse, based on the given arguments.
- [LightKitAdminService::onLightExceptionCaught](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/onLightExceptionCaught.md) &ndash; 
- [LightKitAdminService::onWebsiteUserLogin](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/onWebsiteUserLogin.md) &ndash; This method is called by default when a website user logs in.
- [LightKitAdminService::getDuelistEngine](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/getDuelistEngine.md) &ndash; Returns a [duelist engine](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DuelistEngine/DuelistEngineInterface.md) instance.
- [LightKitAdminService::getKitEditorRealformSuccessHandler](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/getKitEditorRealformSuccessHandler.md) &ndash; Returns the kit editor's realform' success handler instance.
- [LightKitAdminService::lateRegistration](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/lateRegistration.md) &ndash; Allows lka plugins to register their services to some plugins in a dynamic way.
- [LightKitAdminService::getJimToolboxItems](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/getJimToolboxItems.md) &ndash; Returns the array of jim toolbox items.
- [LightKitAdminService::registerJimToolboxItem](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/registerJimToolboxItem.md) &ndash; Registers a jim toolbox item.
- [LightKitAdminService::unregisterJimToolboxItem](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/unregisterJimToolboxItem.md) &ndash; Unregisters a jim toolbox item, and returns whether the given key was actually registered.
- [LightKitAdminService::getJimToolboxItemsFile](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/getJimToolboxItemsFile.md) &ndash; Returns the path to the jim toolbox items file.





Location
=============
Ling\Light_Kit_Admin\Service\LightKitAdminService<br>
See the source code of [Ling\Light_Kit_Admin\Service\LightKitAdminService](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Service/LightKitAdminService.php)



SeeAlso
==============
Previous class: [RightsHelper](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Rights/RightsHelper.md)<br>Next class: [LightKitAdminStandardServicePlugin](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminStandardServicePlugin.md)<br>
