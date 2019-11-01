[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)



The LightKitAdminService class
================
2019-05-17 --> 2019-10-25






Introduction
============

The LightKitAdminService class.
This is the main service of the Light_Kit_Admin plugin.

It serves as the holder of all the configuration related to (light) kit admin,
and in general is the central point of many things related to the light kit admin plugin.

For instance, this service holds the notifications.



Class synopsis
==============


class <span class="pl-k">LightKitAdminService</span> implements [LightInitializerInterface](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Initializer/LightInitializerInterface.md) {

- Properties
    - protected [Ling\Light_Kit_Admin\Notification\LightKitAdminNotification[]](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification.md) [$notifications](#property-notifications) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array [$options](#property-options) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setOptions](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/setOptions.md)(array $options) : void
    - public [getOption](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/getOption.md)(string $key, ?$default = null) : mixed
    - public [getNotifications](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/getNotifications.md)() : [LightKitAdminNotification[]](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification.md)
    - public [addNotification](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/addNotification.md)([Ling\Light_Kit_Admin\Notification\LightKitAdminNotification](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification.md) $notif) : void
    - public [initialize](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/initialize.md)([Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) $light, Ling\Light\Http\HttpRequestInterface $httpRequest) : mixed
    - public [installDatabase](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/installDatabase.md)() : void
    - public [uninstallDatabase](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/uninstallDatabase.md)() : void

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
    
    



Methods
==============

- [LightKitAdminService::__construct](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/__construct.md) &ndash; Builds the LightKitAdminService instance.
- [LightKitAdminService::setContainer](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/setContainer.md) &ndash; Sets the container.
- [LightKitAdminService::setOptions](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/setOptions.md) &ndash; Set the options for this light kit admin service instance.
- [LightKitAdminService::getOption](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/getOption.md) &ndash; or returns the given $default otherwise (if the key is not found in the options array).
- [LightKitAdminService::getNotifications](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/getNotifications.md) &ndash; Returns the notifications of this instance.
- [LightKitAdminService::addNotification](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/addNotification.md) &ndash; Adds a notification to this instance.
- [LightKitAdminService::initialize](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/initialize.md) &ndash; Initializes a service with the given Light instance and HttpRequestInterface instance.
- [LightKitAdminService::installDatabase](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/installDatabase.md) &ndash; Installs the database part of this planet.
- [LightKitAdminService::uninstallDatabase](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService/uninstallDatabase.md) &ndash; Uninstalls the database part of this planet.





Location
=============
Ling\Light_Kit_Admin\Service\LightKitAdminService<br>
See the source code of [Ling\Light_Kit_Admin\Service\LightKitAdminService](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Service/LightKitAdminService.php)



SeeAlso
==============
Previous class: [RightsHelper](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Rights/RightsHelper.md)<br>Next class: [LightKitAdminChloroformWidget](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Widget/Picasso/LightKitAdminChloroformWidget.md)<br>
