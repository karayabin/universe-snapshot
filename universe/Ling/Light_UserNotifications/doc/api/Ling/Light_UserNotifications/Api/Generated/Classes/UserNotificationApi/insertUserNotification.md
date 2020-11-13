[Back to the Ling/Light_UserNotifications api](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications.md)<br>
[Back to the Ling\Light_UserNotifications\Api\Generated\Classes\UserNotificationApi class](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi.md)


UserNotificationApi::insertUserNotification
================



UserNotificationApi::insertUserNotification — Inserts the given userNotification in the database.




Description
================


public [UserNotificationApi::insertUserNotification](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/insertUserNotification.md)(array $userNotification, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




Inserts the given userNotification in the database.
By default, it returns the result of the PDO::lastInsertId method.
If the returnRic flag is set to true, the method will return the ric array instead of the lastInsertId.


If the row you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the return of the method is not affected
- if false, the error will not be caught, and depending on your configuration, it might either
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
See the source code for method [UserNotificationApi::insertUserNotification](https://github.com/lingtalfi/Light_UserNotifications/blob/master/Api/Generated/Classes/UserNotificationApi.php#L42-L93)


See Also
================

The [UserNotificationApi](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/__construct.md)<br>Next method: [insertUserNotifications](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/insertUserNotifications.md)<br>

