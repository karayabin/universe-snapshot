[Back to the Ling/Light_LingHooks api](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks.md)



The LightLingHooksService class
================
2020-08-17 --> 2020-08-18






Introduction
============

The LightLingHooksService class.



Class synopsis
==============


class <span class="pl-k">LightLingHooksService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array [$options](#property-options) ;
    - protected array [$inotifications](#property-inotifications) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Service/LightLingHooksService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Service/LightLingHooksService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setOptions](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Service/LightLingHooksService/setOptions.md)(array $options) : void
    - public [addImportantNotifications](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Service/LightLingHooksService/addImportantNotifications.md)(array $notifications) : void
    - public [onUserNotificationSendQuickMailAlert](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Service/LightLingHooksService/onUserNotificationSendQuickMailAlert.md)(Ling\Light\Events\LightEvent $data) : void
    - private [error](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Service/LightLingHooksService/error.md)(string $msg) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    
    Available options are:
    
    
    
    See the [Light_LingHooks conception notes](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/pages/conception-notes.md) for more details.
    
    

- <span id="property-inotifications"><b>inotifications</b></span>

    This property holds the inotifications for this instance.
    It's an array of feeder => feederItem,
    with
    - feeder: string, the feeder name
    - feederItem: array of type => groups
    - type: string, the message type, or the asterisk (to match all message types)
    - groups: array of group
    - group: string, the name of the quick mail alert group to send the email to
    
    



Methods
==============

- [LightLingHooksService::__construct](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Service/LightLingHooksService/__construct.md) &ndash; Builds the LightLingHooksService instance.
- [LightLingHooksService::setContainer](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Service/LightLingHooksService/setContainer.md) &ndash; Sets the container.
- [LightLingHooksService::setOptions](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Service/LightLingHooksService/setOptions.md) &ndash; Sets the options.
- [LightLingHooksService::addImportantNotifications](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Service/LightLingHooksService/addImportantNotifications.md) &ndash; Adds important notifications.
- [LightLingHooksService::onUserNotificationSendQuickMailAlert](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Service/LightLingHooksService/onUserNotificationSendQuickMailAlert.md) &ndash; When an userNotification is sent, send an email alert to the admin, depending on the configuration.
- [LightLingHooksService::error](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Service/LightLingHooksService/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_LingHooks\Service\LightLingHooksService<br>
See the source code of [Ling\Light_LingHooks\Service\LightLingHooksService](https://github.com/lingtalfi/Light_LingHooks/blob/master/Service/LightLingHooksService.php)



SeeAlso
==============
Previous class: [LightLingHooksException](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Exception/LightLingHooksException.md)<br>
