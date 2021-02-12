[Back to the Ling/Light_UserNotifications api](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications.md)<br>
[Back to the Ling\Light_UserNotifications\Api\Generated\Classes\UserNotificationApi class](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi.md)


UserNotificationApi::getUserNotificationById
================



UserNotificationApi::getUserNotificationById — Returns the user notification row identified by the given id.




Description
================


public [UserNotificationApi::getUserNotificationById](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/getUserNotificationById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the user notification row identified by the given id.

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- id

    

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
See the source code for method [UserNotificationApi::getUserNotificationById](https://github.com/lingtalfi/Light_UserNotifications/blob/master/Api/Generated/Classes/UserNotificationApi.php#L144-L158)


See Also
================

The [UserNotificationApi](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi.md) class.

Previous method: [fetch](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/fetch.md)<br>Next method: [getUserNotification](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/getUserNotification.md)<br>

