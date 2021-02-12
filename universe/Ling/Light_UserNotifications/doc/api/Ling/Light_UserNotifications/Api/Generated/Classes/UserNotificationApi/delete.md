[Back to the Ling/Light_UserNotifications api](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications.md)<br>
[Back to the Ling\Light_UserNotifications\Api\Generated\Classes\UserNotificationApi class](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi.md)


UserNotificationApi::delete
================



UserNotificationApi::delete — Deletes the userNotification rows matching the given where conditions, and returns the number of deleted rows.




Description
================


public [UserNotificationApi::delete](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/delete.md)(?$where = null, ?array $markers = []) : false | int




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
See the source code for method [UserNotificationApi::delete](https://github.com/lingtalfi/Light_UserNotifications/blob/master/Api/Generated/Classes/UserNotificationApi.php#L277-L281)


See Also
================

The [UserNotificationApi](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi.md) class.

Previous method: [updateUserNotification](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/updateUserNotification.md)<br>Next method: [deleteUserNotificationById](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/deleteUserNotificationById.md)<br>

