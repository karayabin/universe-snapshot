[Back to the Ling/Light_UserNotifications api](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications.md)<br>
[Back to the Ling\Light_UserNotifications\Api\Generated\Interfaces\UserNotificationApiInterface class](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface.md)


UserNotificationApiInterface::delete
================



UserNotificationApiInterface::delete — Deletes the userNotification rows matching the given where conditions, and returns the number of deleted rows.




Description
================


abstract public [UserNotificationApiInterface::delete](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int




Deletes the userNotification rows matching the given where conditions, and returns the number of deleted rows.
If where is null, all the rows of the table will be deleted.

False might be returned in case of a problem and if you don't catch db exceptions.




Parameters
================


- where

    

- markers

    


Return values
================

Returns false | int.








Source Code
===========
See the source code for method [UserNotificationApiInterface::delete](https://github.com/lingtalfi/Light_UserNotifications/blob/master/Api/Generated/Interfaces/UserNotificationApiInterface.php#L232-L232)


See Also
================

The [UserNotificationApiInterface](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface.md) class.

Previous method: [updateUserNotification](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/updateUserNotification.md)<br>Next method: [deleteUserNotificationById](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/deleteUserNotificationById.md)<br>

