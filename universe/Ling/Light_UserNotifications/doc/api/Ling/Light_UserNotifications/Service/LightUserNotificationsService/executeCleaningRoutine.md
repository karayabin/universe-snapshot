[Back to the Ling/Light_UserNotifications api](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications.md)<br>
[Back to the Ling\Light_UserNotifications\Service\LightUserNotificationsService class](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Service/LightUserNotificationsService.md)


LightUserNotificationsService::executeCleaningRoutine
================



LightUserNotificationsService::executeCleaningRoutine — Removes the notifications marked as deleted by the user, which are older than x=messageArchiveTime days.




Description
================


public [LightUserNotificationsService::executeCleaningRoutine](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Service/LightUserNotificationsService/executeCleaningRoutine.md)() : void




Removes the notifications marked as deleted by the user, which are older than x=messageArchiveTime days.

With messageArchiveTime being defined in the options of this service.




Parameters
================

This method has no parameters.


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightUserNotificationsService::executeCleaningRoutine](https://github.com/lingtalfi/Light_UserNotifications/blob/master/Service/LightUserNotificationsService.php#L67-L76)


See Also
================

The [LightUserNotificationsService](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Service/LightUserNotificationsService.md) class.

Previous method: [getFactory](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Service/LightUserNotificationsService/getFactory.md)<br>

