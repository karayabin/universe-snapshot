[Back to the Ling/Light_UserNotifications api](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications.md)<br>
[Back to the Ling\Light_UserNotifications\Api\Generated\Interfaces\UserNotificationApiInterface class](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface.md)


UserNotificationApiInterface::insertUserNotification
================



UserNotificationApiInterface::insertUserNotification — Inserts the given user notification in the database.




Description
================


abstract public [UserNotificationApiInterface::insertUserNotification](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/insertUserNotification.md)(array $userNotification, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




Inserts the given user notification in the database.
By default, it returns the result of the PDO::lastInsertId method.
If the returnRic flag is set to true, the method will return the ric array instead of the lastInsertId.


If the row you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the return of the method is not affected
- if false, the error will not be caught, and depending on your pdo configuration, it might either
         trigger an exception, or fail silently in which case this method returns false.




Parameters
================


- userNotification

    

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
See the source code for method [UserNotificationApiInterface::insertUserNotification](https://github.com/lingtalfi/Light_UserNotifications/blob/master/Api/Generated/Interfaces/UserNotificationApiInterface.php#L35-L35)


See Also
================

The [UserNotificationApiInterface](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface.md) class.

Next method: [insertUserNotifications](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/insertUserNotifications.md)<br>

