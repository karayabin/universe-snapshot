[Back to the Ling/Light_UserNotifications api](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications.md)



The CustomUserNotificationApiInterface class
================
2020-08-13 --> 2021-03-15






Introduction
============

The CustomUserNotificationApiInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">CustomUserNotificationApiInterface</span> implements [UserNotificationApiInterface](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface.md) {

- Inherited methods
    - abstract public [UserNotificationApiInterface::insertUserNotification](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/insertUserNotification.md)(array $userNotification, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [UserNotificationApiInterface::insertUserNotifications](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/insertUserNotifications.md)(array $userNotifications, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [UserNotificationApiInterface::fetchAll](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/fetchAll.md)(?array $components = []) : array
    - abstract public [UserNotificationApiInterface::fetch](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/fetch.md)(?array $components = []) : array
    - abstract public [UserNotificationApiInterface::getUserNotificationById](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/getUserNotificationById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [UserNotificationApiInterface::getUserNotification](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/getUserNotification.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [UserNotificationApiInterface::getUserNotifications](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/getUserNotifications.md)($where, ?array $markers = []) : array
    - abstract public [UserNotificationApiInterface::getUserNotificationsColumn](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/getUserNotificationsColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [UserNotificationApiInterface::getUserNotificationsColumns](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/getUserNotificationsColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [UserNotificationApiInterface::getUserNotificationsKey2Value](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/getUserNotificationsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [UserNotificationApiInterface::getAllIds](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/getAllIds.md)() : array
    - abstract public [UserNotificationApiInterface::updateUserNotificationById](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/updateUserNotificationById.md)(int $id, array $userNotification, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [UserNotificationApiInterface::updateUserNotification](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/updateUserNotification.md)(array $userNotification, ?$where = null, ?array $markers = []) : void
    - abstract public [UserNotificationApiInterface::delete](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [UserNotificationApiInterface::deleteUserNotificationById](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/deleteUserNotificationById.md)(int $id) : void
    - abstract public [UserNotificationApiInterface::deleteUserNotificationByIds](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/deleteUserNotificationByIds.md)(array $ids) : void
    - abstract public [UserNotificationApiInterface::deleteUserNotificationByLudUserId](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/deleteUserNotificationByLudUserId.md)(int $userId) : void

}






Methods
==============

- [UserNotificationApiInterface::insertUserNotification](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/insertUserNotification.md) &ndash; Inserts the given user notification in the database.
- [UserNotificationApiInterface::insertUserNotifications](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/insertUserNotifications.md) &ndash; Inserts the given user notification rows in the database.
- [UserNotificationApiInterface::fetchAll](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [UserNotificationApiInterface::fetch](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [UserNotificationApiInterface::getUserNotificationById](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/getUserNotificationById.md) &ndash; Returns the user notification row identified by the given id.
- [UserNotificationApiInterface::getUserNotification](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/getUserNotification.md) &ndash; Returns the userNotification row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserNotificationApiInterface::getUserNotifications](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/getUserNotifications.md) &ndash; Returns the userNotification rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserNotificationApiInterface::getUserNotificationsColumn](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/getUserNotificationsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserNotificationApiInterface::getUserNotificationsColumns](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/getUserNotificationsColumns.md) &ndash; Returns a subset of the userNotification rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserNotificationApiInterface::getUserNotificationsKey2Value](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/getUserNotificationsKey2Value.md) &ndash; Returns an array of $key => $value from the userNotification rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserNotificationApiInterface::getAllIds](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/getAllIds.md) &ndash; Returns an array of all userNotification ids.
- [UserNotificationApiInterface::updateUserNotificationById](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/updateUserNotificationById.md) &ndash; Updates the user notification row identified by the given id.
- [UserNotificationApiInterface::updateUserNotification](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/updateUserNotification.md) &ndash; Updates the user notification row.
- [UserNotificationApiInterface::delete](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/delete.md) &ndash; Deletes the userNotification rows matching the given where conditions, and returns the number of deleted rows.
- [UserNotificationApiInterface::deleteUserNotificationById](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/deleteUserNotificationById.md) &ndash; Deletes the user notification identified by the given id.
- [UserNotificationApiInterface::deleteUserNotificationByIds](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/deleteUserNotificationByIds.md) &ndash; Deletes the user notification rows identified by the given ids.
- [UserNotificationApiInterface::deleteUserNotificationByLudUserId](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface/deleteUserNotificationByLudUserId.md) &ndash; Deletes the user notification rows having the given user id.





Location
=============
Ling\Light_UserNotifications\Api\Custom\Interfaces\CustomUserNotificationApiInterface<br>
See the source code of [Ling\Light_UserNotifications\Api\Custom\Interfaces\CustomUserNotificationApiInterface](https://github.com/lingtalfi/Light_UserNotifications/blob/master/Api/Custom/Interfaces/CustomUserNotificationApiInterface.php)



SeeAlso
==============
Previous class: [CustomLightUserNotificationsApiFactory](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Custom/CustomLightUserNotificationsApiFactory.md)<br>Next class: [LightUserNotificationsBaseApi](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/LightUserNotificationsBaseApi.md)<br>
