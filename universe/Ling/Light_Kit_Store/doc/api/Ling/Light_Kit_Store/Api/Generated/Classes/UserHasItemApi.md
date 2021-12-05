[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)



The UserHasItemApi class
================
2021-04-06 --> 2021-06-24






Introduction
============

The UserHasItemApi class.



Class synopsis
==============


class <span class="pl-k">UserHasItemApi</span> extends [CustomLightKitStoreBaseApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Classes/CustomLightKitStoreBaseApi.md) implements [UserHasItemApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightKitStoreBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightKitStoreBaseApi::$container](#property-container) ;
    - protected string [LightKitStoreBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/__construct.md)() : void
    - public [insertUserHasItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/insertUserHasItem.md)(array $userHasItem, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [insertUserHasItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/insertUserHasItems.md)(array $userHasItems, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [fetchAll](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/fetchAll.md)(?array $components = []) : array
    - public [fetch](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/fetch.md)(?array $components = []) : array
    - public [getUserHasItemByUserIdAndItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/getUserHasItemByUserIdAndItemId.md)(int $user_id, int $item_id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getUserHasItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/getUserHasItem.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getUserHasItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/getUserHasItems.md)($where, ?array $markers = []) : array
    - public [getUserHasItemsColumn](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/getUserHasItemsColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [getUserHasItemsColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/getUserHasItemsColumns.md)($columns, $where, ?array $markers = []) : array
    - public [getUserHasItemsKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/getUserHasItemsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [updateUserHasItemByUserIdAndItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/updateUserHasItemByUserIdAndItemId.md)(int $user_id, int $item_id, array $userHasItem, ?array $extraWhere = [], ?array $markers = []) : void
    - public [updateUserHasItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/updateUserHasItem.md)(array $userHasItem, ?$where = null, ?array $markers = []) : void
    - public [delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [deleteUserHasItemByUserIdAndItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/deleteUserHasItemByUserIdAndItemId.md)(int $user_id, int $item_id) : void
    - public [deleteUserHasItemByUserIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/deleteUserHasItemByUserIds.md)(array $user_ids) : void
    - public [deleteUserHasItemByItemIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/deleteUserHasItemByItemIds.md)(array $item_ids) : void
    - public [deleteUserHasItemByUserId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/deleteUserHasItemByUserId.md)(int $userId) : void
    - public [deleteUserHasItemByItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/deleteUserHasItemByItemId.md)(int $itemId) : void
    - private [fetchRoutine](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/fetchRoutine.md)(string &$q, array &$markers, array $components) : array

- Inherited methods
    - public [LightKitStoreBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/LightKitStoreBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightKitStoreBaseApi::setContainer](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/LightKitStoreBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [UserHasItemApi::__construct](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/__construct.md) &ndash; Builds the UserHasItemApi instance.
- [UserHasItemApi::insertUserHasItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/insertUserHasItem.md) &ndash; Inserts the given user has item in the database.
- [UserHasItemApi::insertUserHasItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/insertUserHasItems.md) &ndash; Inserts the given user has item rows in the database.
- [UserHasItemApi::fetchAll](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [UserHasItemApi::fetch](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [UserHasItemApi::getUserHasItemByUserIdAndItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/getUserHasItemByUserIdAndItemId.md) &ndash; Returns the user has item row identified by the given user_id and item_id.
- [UserHasItemApi::getUserHasItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/getUserHasItem.md) &ndash; Returns the userHasItem row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserHasItemApi::getUserHasItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/getUserHasItems.md) &ndash; Returns the userHasItem rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserHasItemApi::getUserHasItemsColumn](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/getUserHasItemsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserHasItemApi::getUserHasItemsColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/getUserHasItemsColumns.md) &ndash; Returns a subset of the userHasItem rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserHasItemApi::getUserHasItemsKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/getUserHasItemsKey2Value.md) &ndash; Returns an array of $key => $value from the userHasItem rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserHasItemApi::updateUserHasItemByUserIdAndItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/updateUserHasItemByUserIdAndItemId.md) &ndash; Updates the user has item row identified by the given user_id and item_id.
- [UserHasItemApi::updateUserHasItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/updateUserHasItem.md) &ndash; Updates the user has item row.
- [UserHasItemApi::delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/delete.md) &ndash; Deletes the userHasItem rows matching the given where conditions, and returns the number of deleted rows.
- [UserHasItemApi::deleteUserHasItemByUserIdAndItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/deleteUserHasItemByUserIdAndItemId.md) &ndash; Deletes the user has item identified by the given user_id and item_id.
- [UserHasItemApi::deleteUserHasItemByUserIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/deleteUserHasItemByUserIds.md) &ndash; Deletes the user has item rows identified by the given user_ids.
- [UserHasItemApi::deleteUserHasItemByItemIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/deleteUserHasItemByItemIds.md) &ndash; Deletes the user has item rows identified by the given item_ids.
- [UserHasItemApi::deleteUserHasItemByUserId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/deleteUserHasItemByUserId.md) &ndash; Deletes the user has item rows having the given user id.
- [UserHasItemApi::deleteUserHasItemByItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/deleteUserHasItemByItemId.md) &ndash; Deletes the user has item rows having the given item id.
- [UserHasItemApi::fetchRoutine](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserHasItemApi/fetchRoutine.md) &ndash; Appends the given components to the given query, and returns an array of options.
- [LightKitStoreBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/LightKitStoreBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightKitStoreBaseApi::setContainer](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/LightKitStoreBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_Kit_Store\Api\Generated\Classes\UserHasItemApi<br>
See the source code of [Ling\Light_Kit_Store\Api\Generated\Classes\UserHasItemApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Classes/UserHasItemApi.php)



SeeAlso
==============
Previous class: [UserApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi.md)<br>Next class: [InvoiceApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/InvoiceApiInterface.md)<br>
