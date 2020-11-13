[Back to the Ling/Light_LingHooks api](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks.md)<br>
[Back to the Ling\Light_LingHooks\Service\LightLingHooksService class](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Service/LightLingHooksService.md)


LightLingHooksService::onUserNotificationSendQuickMailAlert
================



LightLingHooksService::onUserNotificationSendQuickMailAlert — When an userNotification is sent, send an email alert to the admin, depending on the configuration.




Description
================


public [LightLingHooksService::onUserNotificationSendQuickMailAlert](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Service/LightLingHooksService/onUserNotificationSendQuickMailAlert.md)(Ling\Light\Events\LightEvent $data) : void




When an userNotification is sent, send an email alert to the admin, depending on the configuration.

The user notifications are handled by [the Light_UserNotifications plugin](https://github.com/lingtalfi/Light_UserNotifications).
The email alert is sent using the [Light_QuickMailAlert plugin](https://github.com/lingtalfi/Light_QuickMailAlert/).

Note: we use the [light dynamic registration event system](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/design/late-service-registration.md).




Parameters
================


- data

    


Return values
================

Returns void.


Exceptions thrown
================

- [/Exception](https://github.com/lingtalfi//blob/master/doc/api//Exception.md).&nbsp;







Source Code
===========
See the source code for method [LightLingHooksService::onUserNotificationSendQuickMailAlert](https://github.com/lingtalfi/Light_LingHooks/blob/master/Service/LightLingHooksService.php#L129-L156)


See Also
================

The [LightLingHooksService](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Service/LightLingHooksService.md) class.

Previous method: [addImportantNotifications](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Service/LightLingHooksService/addImportantNotifications.md)<br>Next method: [error](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Service/LightLingHooksService/error.md)<br>

