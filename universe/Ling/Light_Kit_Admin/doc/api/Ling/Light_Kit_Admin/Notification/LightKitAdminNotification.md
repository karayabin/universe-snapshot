[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)



The LightKitAdminNotification class
================
2019-05-17 --> 2020-12-01






Introduction
============

The LightKitAdminNotification class.



Class synopsis
==============


class <span class="pl-k">LightKitAdminNotification</span>  {

- Properties
    - protected string [$type](#property-type) ;
    - protected string [$notifType](#property-notifType) ;
    - protected string [$title](#property-title) ;
    - protected string [$body](#property-body) ;
    - protected string [$cssClass](#property-cssClass) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification/__construct.md)() : void
    - public static [createSuccess](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification/createSuccess.md)() : [LightKitAdminNotification](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification.md)
    - public static [createCustom](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification/createCustom.md)() : [LightKitAdminNotification](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification.md)
    - public static [createInfo](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification/createInfo.md)() : [LightKitAdminNotification](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification.md)
    - public static [createWarning](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification/createWarning.md)() : [LightKitAdminNotification](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification.md)
    - public static [createError](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification/createError.md)() : [LightKitAdminNotification](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification.md)
    - public [title](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification/title.md)(string $title) : [LightKitAdminNotification](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification.md)
    - public [body](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification/body.md)(string $body) : [LightKitAdminNotification](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification.md)
    - public [notifType](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification/notifType.md)(string $notifType) : [LightKitAdminNotification](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification.md)
    - public [cssClass](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification/cssClass.md)(string $cssClass) : [LightKitAdminNotification](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification.md)
    - public [getType](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification/getType.md)() : string | null
    - public [getNotifType](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification/getNotifType.md)() : string | null
    - public [getTitle](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification/getTitle.md)() : string | null
    - public [getBody](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification/getBody.md)() : string | null
    - public [getCssClass](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification/getCssClass.md)() : string | null

}




Properties
=============

- <span id="property-type"><b>type</b></span>

    This property holds the type for this instance.
    The possible types are:
    
    - success (green)
    - info (blue)
    - warning (yellow/orange)
    - error (red)
    
    

- <span id="property-notifType"><b>notifType</b></span>

    This property holds the notifType for this instance.
    The possible values are:
    - alert
    - toast
    
    

- <span id="property-title"><b>title</b></span>

    This property holds the title for this instance.
    
    

- <span id="property-body"><b>body</b></span>

    This property holds the body for this instance.
    
    

- <span id="property-cssClass"><b>cssClass</b></span>

    This property holds the css class for this instance.
    
    



Methods
==============

- [LightKitAdminNotification::__construct](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification/__construct.md) &ndash; Builds the LightKitAdminNotification instance.
- [LightKitAdminNotification::createSuccess](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification/createSuccess.md) &ndash; Creates a notification instance of type success and returns it.
- [LightKitAdminNotification::createCustom](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification/createCustom.md) &ndash; Creates a notification instance of type null and returns it.
- [LightKitAdminNotification::createInfo](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification/createInfo.md) &ndash; Creates a notification instance of type info and returns it.
- [LightKitAdminNotification::createWarning](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification/createWarning.md) &ndash; Creates a notification instance of type warning and returns it.
- [LightKitAdminNotification::createError](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification/createError.md) &ndash; Creates a notification instance of type error and returns it.
- [LightKitAdminNotification::title](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification/title.md) &ndash; Sets the title, and returns the current instance.
- [LightKitAdminNotification::body](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification/body.md) &ndash; Sets the body and returns the current instance.
- [LightKitAdminNotification::notifType](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification/notifType.md) &ndash; Sets the notif type and returns the current instance.
- [LightKitAdminNotification::cssClass](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification/cssClass.md) &ndash; Sets the css class of the notification and returns the current instance.
- [LightKitAdminNotification::getType](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification/getType.md) &ndash; Returns the type of this instance.
- [LightKitAdminNotification::getNotifType](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification/getNotifType.md) &ndash; Returns the notifType of this instance.
- [LightKitAdminNotification::getTitle](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification/getTitle.md) &ndash; Returns the title of this instance.
- [LightKitAdminNotification::getBody](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification/getBody.md) &ndash; Returns the body of this instance.
- [LightKitAdminNotification::getCssClass](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Notification/LightKitAdminNotification/getCssClass.md) &ndash; Returns the cssClass of this instance.





Location
=============
Ling\Light_Kit_Admin\Notification\LightKitAdminNotification<br>
See the source code of [Ling\Light_Kit_Admin\Notification\LightKitAdminNotification](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Notification/LightKitAdminNotification.php)



SeeAlso
==============
Previous class: [LightKitAdminControllerHubHandler](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_ControllerHub/LightKitAdminControllerHubHandler.md)<br>Next class: [LightKitAdminPageConfigurationTransformer](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/PageConfigurationTransformer/LightKitAdminPageConfigurationTransformer.md)<br>
