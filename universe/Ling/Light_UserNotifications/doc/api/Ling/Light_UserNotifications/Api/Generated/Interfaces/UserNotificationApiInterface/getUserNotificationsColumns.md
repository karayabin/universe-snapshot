[Back to the Ling/Light_UserNotifications api](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications.md)<br>
[Back to the Ling\Light_UserNotifications\Api\Generated\Interfaces\UserNotificationApiInterface class](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface.md)


UserNotificationApiInterface::getUserNotificationsColumns
================



UserNotificationApiInterface::getUserNotificationsColumns — Returns a subset of the userNotification rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).




Description
================


abstract public [UserNotificationApiInterface::getUserNotificationsColumns](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/getUserNotificationsColumns.md)($columns, $where, ?array $markers = []) : array




Returns a subset of the userNotification rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
That subset is an array containing the given $columns.
The columns parameter can be either an array or a string.
If it's an array, the column names will be escaped with back ticks.
If it's a string, no escaping will be done. This lets you write custom expression, such as using aliases for instance.

In both cases, you shall pass the pdo markers when necessary.




Parameters
================


- columns

    

- where

    

- markers

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [UserNotificationApiInterface::getUserNotificationsColumns](https://github.com/lingtalfi/Light_UserNotifications/blob/master/Api/Generated/Interfaces/UserNotificationApiInterface.php#L159-L159)


See Also
================

The [UserNotificationApiInterface](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface.md) class.

Previous method: [getUserNotificationsColumn](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/getUserNotificationsColumn.md)<br>Next method: [getUserNotificationsKey2Value](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/getUserNotificationsKey2Value.md)<br>

