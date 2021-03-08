[Back to the Ling/Light_QuickMailAlert api](https://github.com/lingtalfi/Light_QuickMailAlert/blob/master/doc/api/Ling/Light_QuickMailAlert.md)



The LightQuickMailAlertService class
================
2020-08-14 --> 2021-03-05






Introduction
============

The LightQuickMailAlertService class.



Class synopsis
==============


class <span class="pl-k">LightQuickMailAlertService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array [$options](#property-options) ;
    - protected array [$groups](#property-groups) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_QuickMailAlert/blob/master/doc/api/Ling/Light_QuickMailAlert/Service/LightQuickMailAlertService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_QuickMailAlert/blob/master/doc/api/Ling/Light_QuickMailAlert/Service/LightQuickMailAlertService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setGroups](https://github.com/lingtalfi/Light_QuickMailAlert/blob/master/doc/api/Ling/Light_QuickMailAlert/Service/LightQuickMailAlertService/setGroups.md)(array $groups) : void
    - public [setOptions](https://github.com/lingtalfi/Light_QuickMailAlert/blob/master/doc/api/Ling/Light_QuickMailAlert/Service/LightQuickMailAlertService/setOptions.md)(array $options) : void
    - public [sendGroup](https://github.com/lingtalfi/Light_QuickMailAlert/blob/master/doc/api/Ling/Light_QuickMailAlert/Service/LightQuickMailAlertService/sendGroup.md)(string $groupName, ?string $msg = null) : void
    - private [error](https://github.com/lingtalfi/Light_QuickMailAlert/blob/master/doc/api/Ling/Light_QuickMailAlert/Service/LightQuickMailAlertService/error.md)(string $msg) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    
    Available options are:
    - appName: the name of the app, which is used as a variable in some mail templates
    
    
    See the [Light_QuickMailAlert conception notes](https://github.com/lingtalfi/Light_QuickMailAlert/blob/master/doc/pages/conception-notes.md) for more details.
    
    

- <span id="property-groups"><b>groups</b></span>

    This property holds the groups for this instance.
    It's an array of groupName => groupItem,
    with groupItem: an array:
    - template: string, the name of the mail template to use
    - recipients: array, the list of recipients to send the mail to (each recipient must be a valid email address)
    
    



Methods
==============

- [LightQuickMailAlertService::__construct](https://github.com/lingtalfi/Light_QuickMailAlert/blob/master/doc/api/Ling/Light_QuickMailAlert/Service/LightQuickMailAlertService/__construct.md) &ndash; Builds the LightQuickMailAlertService instance.
- [LightQuickMailAlertService::setContainer](https://github.com/lingtalfi/Light_QuickMailAlert/blob/master/doc/api/Ling/Light_QuickMailAlert/Service/LightQuickMailAlertService/setContainer.md) &ndash; Sets the container.
- [LightQuickMailAlertService::setGroups](https://github.com/lingtalfi/Light_QuickMailAlert/blob/master/doc/api/Ling/Light_QuickMailAlert/Service/LightQuickMailAlertService/setGroups.md) &ndash; Sets the groups.
- [LightQuickMailAlertService::setOptions](https://github.com/lingtalfi/Light_QuickMailAlert/blob/master/doc/api/Ling/Light_QuickMailAlert/Service/LightQuickMailAlertService/setOptions.md) &ndash; Sets the options.
- [LightQuickMailAlertService::sendGroup](https://github.com/lingtalfi/Light_QuickMailAlert/blob/master/doc/api/Ling/Light_QuickMailAlert/Service/LightQuickMailAlertService/sendGroup.md) &ndash; Sends an email according to the settings identified by the groupName, and returns the number of successful emails sent.
- [LightQuickMailAlertService::error](https://github.com/lingtalfi/Light_QuickMailAlert/blob/master/doc/api/Ling/Light_QuickMailAlert/Service/LightQuickMailAlertService/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_QuickMailAlert\Service\LightQuickMailAlertService<br>
See the source code of [Ling\Light_QuickMailAlert\Service\LightQuickMailAlertService](https://github.com/lingtalfi/Light_QuickMailAlert/blob/master/Service/LightQuickMailAlertService.php)



SeeAlso
==============
Previous class: [LightQuickMailAlertException](https://github.com/lingtalfi/Light_QuickMailAlert/blob/master/doc/api/Ling/Light_QuickMailAlert/Exception/LightQuickMailAlertException.md)<br>
