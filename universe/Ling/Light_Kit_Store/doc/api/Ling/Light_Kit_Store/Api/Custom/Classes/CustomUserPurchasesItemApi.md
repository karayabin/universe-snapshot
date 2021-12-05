[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)



The CustomUserPurchasesItemApi class
================
2021-04-06 --> 2021-08-02






Introduction
============

The CustomUserPurchasesItemApi class.



Class synopsis
==============


class <span class="pl-k">CustomUserPurchasesItemApi</span> extends [UserPurchasesItemApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi.md) implements [UserPurchasesItemApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface.md), [CustomUserPurchasesItemApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomUserPurchasesItemApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightKitStoreBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightKitStoreBaseApi::$container](#property-container) ;
    - protected string [LightKitStoreBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Classes/CustomUserPurchasesItemApi/__construct.md)() : void

- Inherited methods
    - public [UserPurchasesItemApi::insertUserPurchasesItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/insertUserPurchasesItem.md)(array $userPurchasesItem, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [UserPurchasesItemApi::insertUserPurchasesItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/insertUserPurchasesItems.md)(array $userPurchasesItems, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [UserPurchasesItemApi::fetchAll](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/fetchAll.md)(?array $components = []) : array
    - public [UserPurchasesItemApi::fetch](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/fetch.md)(?array $components = []) : array
    - public [UserPurchasesItemApi::getUserPurchasesItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/getUserPurchasesItemById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [UserPurchasesItemApi::getUserPurchasesItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/getUserPurchasesItem.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [UserPurchasesItemApi::getUserPurchasesItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/getUserPurchasesItems.md)($where, ?array $markers = []) : array
    - public [UserPurchasesItemApi::getUserPurchasesItemsColumn](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/getUserPurchasesItemsColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [UserPurchasesItemApi::getUserPurchasesItemsColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/getUserPurchasesItemsColumns.md)($columns, $where, ?array $markers = []) : array
    - public [UserPurchasesItemApi::getUserPurchasesItemsKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/getUserPurchasesItemsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [UserPurchasesItemApi::getUserPurchasesItemsByUserId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/getUserPurchasesItemsByUserId.md)(string $userId, ?array $components = []) : array
    - public [UserPurchasesItemApi::getUserPurchasesItemsByItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/getUserPurchasesItemsByItemId.md)(string $itemId, ?array $components = []) : array
    - public [UserPurchasesItemApi::getAllIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/getAllIds.md)() : array
    - public [UserPurchasesItemApi::updateUserPurchasesItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/updateUserPurchasesItemById.md)(int $id, array $userPurchasesItem, ?array $extraWhere = [], ?array $markers = []) : void
    - public [UserPurchasesItemApi::updateUserPurchasesItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/updateUserPurchasesItem.md)(array $userPurchasesItem, ?$where = null, ?array $markers = []) : void
    - public [UserPurchasesItemApi::delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [UserPurchasesItemApi::deleteUserPurchasesItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/deleteUserPurchasesItemById.md)(int $id) : void
    - public [UserPurchasesItemApi::deleteUserPurchasesItemByIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/deleteUserPurchasesItemByIds.md)(array $ids) : void
    - public [UserPurchasesItemApi::deleteUserPurchasesItemByUserId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/deleteUserPurchasesItemByUserId.md)(int $userId) : void
    - public [UserPurchasesItemApi::deleteUserPurchasesItemByItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/deleteUserPurchasesItemByItemId.md)(int $itemId) : void
    - protected [UserPurchasesItemApi::getDefaultValues](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/getDefaultValues.md)() : array
    - protected [UserPurchasesItemApi::fetchRoutine](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/fetchRoutine.md)(string &$q, array &$markers, array $components, ?array $options = []) : array
    - public [LightKitStoreBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/LightKitStoreBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightKitStoreBaseApi::setContainer](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/LightKitStoreBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [CustomUserPurchasesItemApi::__construct](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Classes/CustomUserPurchasesItemApi/__construct.md) &ndash; Builds the CustomUserPurchasesItemApi instance.
- [UserPurchasesItemApi::insertUserPurchasesItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/insertUserPurchasesItem.md) &ndash; Inserts the given user purchases item in the database.
- [UserPurchasesItemApi::insertUserPurchasesItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/insertUserPurchasesItems.md) &ndash; Inserts the given user purchases item rows in the database.
- [UserPurchasesItemApi::fetchAll](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [UserPurchasesItemApi::fetch](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [UserPurchasesItemApi::getUserPurchasesItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/getUserPurchasesItemById.md) &ndash; Returns the user purchases item row identified by the given id.
- [UserPurchasesItemApi::getUserPurchasesItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/getUserPurchasesItem.md) &ndash; Returns the userPurchasesItem row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserPurchasesItemApi::getUserPurchasesItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/getUserPurchasesItems.md) &ndash; Returns the userPurchasesItem rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserPurchasesItemApi::getUserPurchasesItemsColumn](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/getUserPurchasesItemsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserPurchasesItemApi::getUserPurchasesItemsColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/getUserPurchasesItemsColumns.md) &ndash; Returns a subset of the userPurchasesItem rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserPurchasesItemApi::getUserPurchasesItemsKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/getUserPurchasesItemsKey2Value.md) &ndash; Returns an array of $key => $value from the userPurchasesItem rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserPurchasesItemApi::getUserPurchasesItemsByUserId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/getUserPurchasesItemsByUserId.md) &ndash; Returns the rows of the lks_user_purchases_item matching the given userId.
- [UserPurchasesItemApi::getUserPurchasesItemsByItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/getUserPurchasesItemsByItemId.md) &ndash; Returns the rows of the lks_user_purchases_item matching the given itemId.
- [UserPurchasesItemApi::getAllIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/getAllIds.md) &ndash; Returns an array of all userPurchasesItem ids.
- [UserPurchasesItemApi::updateUserPurchasesItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/updateUserPurchasesItemById.md) &ndash; Updates the user purchases item row identified by the given id.
- [UserPurchasesItemApi::updateUserPurchasesItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/updateUserPurchasesItem.md) &ndash; Updates the user purchases item row.
- [UserPurchasesItemApi::delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/delete.md) &ndash; Deletes the userPurchasesItem rows matching the given where conditions, and returns the number of deleted rows.
- [UserPurchasesItemApi::deleteUserPurchasesItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/deleteUserPurchasesItemById.md) &ndash; Deletes the user purchases item identified by the given id.
- [UserPurchasesItemApi::deleteUserPurchasesItemByIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/deleteUserPurchasesItemByIds.md) &ndash; Deletes the user purchases item rows identified by the given ids.
- [UserPurchasesItemApi::deleteUserPurchasesItemByUserId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/deleteUserPurchasesItemByUserId.md) &ndash; Deletes the user purchases item rows having the given user id.
- [UserPurchasesItemApi::deleteUserPurchasesItemByItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/deleteUserPurchasesItemByItemId.md) &ndash; Deletes the user purchases item rows having the given item id.
- [UserPurchasesItemApi::getDefaultValues](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/getDefaultValues.md) &ndash; Returns the array of default values for this instance.
- [UserPurchasesItemApi::fetchRoutine](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi/fetchRoutine.md) &ndash; Appends the given components to the given query, and returns an array of options.
- [LightKitStoreBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/LightKitStoreBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightKitStoreBaseApi::setContainer](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/LightKitStoreBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_Kit_Store\Api\Custom\Classes\CustomUserPurchasesItemApi<br>
See the source code of [Ling\Light_Kit_Store\Api\Custom\Classes\CustomUserPurchasesItemApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Custom/Classes/CustomUserPurchasesItemApi.php)



SeeAlso
==============
Previous class: [CustomUserApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Classes/CustomUserApi.md)<br>Next class: [CustomUserRatesItemApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Classes/CustomUserRatesItemApi.md)<br>
