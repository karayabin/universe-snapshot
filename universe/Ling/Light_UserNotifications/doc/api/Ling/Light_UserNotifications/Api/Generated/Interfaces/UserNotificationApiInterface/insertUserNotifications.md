[Back to the Ling/Light_UserNotifications api](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications.md)<br>
[Back to the Ling\Light_UserNotifications\Api\Generated\Interfaces\UserNotificationApiInterface class](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface.md)


UserNotificationApiInterface::insertUserNotifications
================



UserNotificationApiInterface::insertUserNotifications — Inserts the given user notification rows in the database.




Description
================


abstract public [UserNotificationApiInterface::insertUserNotifications](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/insertUserNotifications.md)(array $userNotifications, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




Inserts the given user notification rows in the database.
By default, it returns an array of the result of the PDO::lastInsertId method for each insert.
If the returnRic flag is set to true, the method will return an array of the ric array (for each insert) instead of the lastInsertId.


If the rows you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the return of the method is not affected
- if false, the error will not be caught, and depending on your configuration, it might either
         trigger an exception, or fail silently in which case this method returns false.




Parameters
================


- userNotifications

    

- ignoreDuplicate

    

- returnRic

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [UserNotificationApiInterface::insertUserNotifications](https://github.com/lingtalfi/Light_UserNotifications/blob/master/Api/Generated/Interfaces/UserNotificationApiInterface.php#L57-L57)


See Also
================

The [UserNotificationApiInterface](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface.md) class.

Previous method: [insertUserNotification](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/insertUserNotification.md)<br>Next method: [fetchAll](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/fetchAll.md)<br>

