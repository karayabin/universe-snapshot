[Back to the Ling/Light_UserNotifications api](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications.md)



The CustomUserNotificationApi class
================
2020-08-13 --> 2021-03-15






Introduction
============

The CustomUserNotificationApi class.



Class synopsis
==============


class <span class="pl-k">CustomUserNotificationApi</span> extends [UserNotificationApi](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi.md) implements [UserNotificationApiInterface](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Interfaces/UserNotificationApiInterface.md), [CustomUserNotificationApiInterface](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Custom/Interfaces/CustomUserNotificationApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightUserNotificationsBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightUserNotificationsBaseApi::$container](#property-container) ;
    - protected string [LightUserNotificationsBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Custom/Classes/CustomUserNotificationApi/__construct.md)() : void

- Inherited methods
    - public [UserNotificationApi::insertUserNotification](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/insertUserNotification.md)(array $userNotification, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [UserNotificationApi::insertUserNotifications](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/insertUserNotifications.md)(array $userNotifications, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [UserNotificationApi::fetchAll](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/fetchAll.md)(?array $components = []) : array
    - public [UserNotificationApi::fetch](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/fetch.md)(?array $components = []) : array
    - public [UserNotificationApi::getUserNotificationById](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/getUserNotificationById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [UserNotificationApi::getUserNotification](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/getUserNotification.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [UserNotificationApi::getUserNotifications](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/getUserNotifications.md)($where, ?array $markers = []) : array
    - public [UserNotificationApi::getUserNotificationsColumn](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/getUserNotificationsColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [UserNotificationApi::getUserNotificationsColumns](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/getUserNotificationsColumns.md)($columns, $where, ?array $markers = []) : array
    - public [UserNotificationApi::getUserNotificationsKey2Value](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/getUserNotificationsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [UserNotificationApi::getAllIds](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/getAllIds.md)() : array
    - public [UserNotificationApi::updateUserNotificationById](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/updateUserNotificationById.md)(int $id, array $userNotification, ?array $extraWhere = [], ?array $markers = []) : void
    - public [UserNotificationApi::updateUserNotification](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/updateUserNotification.md)(array $userNotification, ?$where = null, ?array $markers = []) : void
    - public [UserNotificationApi::delete](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [UserNotificationApi::deleteUserNotificationById](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/deleteUserNotificationById.md)(int $id) : void
    - public [UserNotificationApi::deleteUserNotificationByIds](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/deleteUserNotificationByIds.md)(array $ids) : void
    - public [UserNotificationApi::deleteUserNotificationByLudUserId](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/deleteUserNotificationByLudUserId.md)(int $userId) : void
    - public [LightUserNotificationsBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/LightUserNotificationsBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightUserNotificationsBaseApi::setContainer](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/LightUserNotificationsBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [CustomUserNotificationApi::__construct](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Custom/Classes/CustomUserNotificationApi/__construct.md) &ndash; Builds the CustomUserNotificationApi instance.
- [UserNotificationApi::insertUserNotification](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/insertUserNotification.md) &ndash; Inserts the given user notification in the database.
- [UserNotificationApi::insertUserNotifications](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/insertUserNotifications.md) &ndash; Inserts the given user notification rows in the database.
- [UserNotificationApi::fetchAll](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [UserNotificationApi::fetch](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [UserNotificationApi::getUserNotificationById](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/getUserNotificationById.md) &ndash; Returns the user notification row identified by the given id.
- [UserNotificationApi::getUserNotification](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/getUserNotification.md) &ndash; Returns the userNotification row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserNotificationApi::getUserNotifications](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/getUserNotifications.md) &ndash; Returns the userNotification rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserNotificationApi::getUserNotificationsColumn](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/getUserNotificationsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserNotificationApi::getUserNotificationsColumns](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/getUserNotificationsColumns.md) &ndash; Returns a subset of the userNotification rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserNotificationApi::getUserNotificationsKey2Value](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/getUserNotificationsKey2Value.md) &ndash; Returns an array of $key => $value from the userNotification rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserNotificationApi::getAllIds](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/getAllIds.md) &ndash; Returns an array of all userNotification ids.
- [UserNotificationApi::updateUserNotificationById](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/updateUserNotificationById.md) &ndash; Updates the user notification row identified by the given id.
- [UserNotificationApi::updateUserNotification](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/updateUserNotification.md) &ndash; Updates the user notification row.
- [UserNotificationApi::delete](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/delete.md) &ndash; Deletes the userNotification rows matching the given where conditions, and returns the number of deleted rows.
- [UserNotificationApi::deleteUserNotificationById](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/deleteUserNotificationById.md) &ndash; Deletes the user notification identified by the given id.
- [UserNotificationApi::deleteUserNotificationByIds](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/deleteUserNotificationByIds.md) &ndash; Deletes the user notification rows identified by the given ids.
- [UserNotificationApi::deleteUserNotificationByLudUserId](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/UserNotificationApi/deleteUserNotificationByLudUserId.md) &ndash; Deletes the user notification rows having the given user id.
- [LightUserNotificationsBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/LightUserNotificationsBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightUserNotificationsBaseApi::setContainer](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Generated/Classes/LightUserNotificationsBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_UserNotifications\Api\Custom\Classes\CustomUserNotificationApi<br>
See the source code of [Ling\Light_UserNotifications\Api\Custom\Classes\CustomUserNotificationApi](https://github.com/lingtalfi/Light_UserNotifications/blob/master/Api/Custom/Classes/CustomUserNotificationApi.php)



SeeAlso
==============
Previous class: [CustomLightUserNotificationsBaseApi](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Custom/Classes/CustomLightUserNotificationsBaseApi.md)<br>Next class: [CustomLightUserNotificationsApiFactory](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications/Api/Custom/CustomLightUserNotificationsApiFactory.md)<br>
