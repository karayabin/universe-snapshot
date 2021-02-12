[Back to the Ling/Light_UserNotifications api](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications.md)<br>
[Back to the Ling\Light_UserNotifications\Api\Generated\Classes\UserNotificationApi class](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi.md)


UserNotificationApi::getUserNotification
================



UserNotificationApi::getUserNotification — Returns the userNotification row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).




Description
================


public [UserNotificationApi::getUserNotification](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/getUserNotification.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the userNotification row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- where

    

- markers

    

- default

    

- throwNotFoundEx

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [UserNotificationApi::getUserNotification](https://github.com/lingtalfi/Light_UserNotifications/blob/master/Api/Generated/Classes/UserNotificationApi.php#L166-L185)


See Also
================

The [UserNotificationApi](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi.md) class.

Previous method: [getUserNotificationById](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/getUserNotificationById.md)<br>Next method: [getUserNotifications](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/getUserNotifications.md)<br>

