[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)



The UserHasItemApiInterface class
================
2021-04-06 --> 2021-06-24






Introduction
============

The UserHasItemApiInterface interface.
It implements the [ling standard object methods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-standard-object-methods.md) concept.



Class synopsis
==============


abstract class <span class="pl-k">UserHasItemApiInterface</span>  {

- Methods
    - abstract public [insertUserHasItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/insertUserHasItem.md)(array $userHasItem, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [insertUserHasItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/insertUserHasItems.md)(array $userHasItems, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [fetchAll](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/fetchAll.md)(?array $components = []) : array
    - abstract public [fetch](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/fetch.md)(?array $components = []) : array
    - abstract public [getUserHasItemByUserIdAndItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/getUserHasItemByUserIdAndItemId.md)(int $user_id, int $item_id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getUserHasItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/getUserHasItem.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getUserHasItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/getUserHasItems.md)($where, ?array $markers = []) : array
    - abstract public [getUserHasItemsColumn](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/getUserHasItemsColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [getUserHasItemsColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/getUserHasItemsColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [getUserHasItemsKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/getUserHasItemsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [updateUserHasItemByUserIdAndItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/updateUserHasItemByUserIdAndItemId.md)(int $user_id, int $item_id, array $userHasItem, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [updateUserHasItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/updateUserHasItem.md)(array $userHasItem, ?$where = null, ?array $markers = []) : void
    - abstract public [delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [deleteUserHasItemByUserIdAndItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/deleteUserHasItemByUserIdAndItemId.md)(int $user_id, int $item_id) : void
    - abstract public [deleteUserHasItemByUserIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/deleteUserHasItemByUserIds.md)(array $user_ids) : void
    - abstract public [deleteUserHasItemByItemIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/deleteUserHasItemByItemIds.md)(array $item_ids) : void
    - abstract public [deleteUserHasItemByUserId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/deleteUserHasItemByUserId.md)(int $userId) : void
    - abstract public [deleteUserHasItemByItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/deleteUserHasItemByItemId.md)(int $itemId) : void

}






Methods
==============

- [UserHasItemApiInterface::insertUserHasItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/insertUserHasItem.md) &ndash; Inserts the given user has item in the database.
- [UserHasItemApiInterface::insertUserHasItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/insertUserHasItems.md) &ndash; Inserts the given user has item rows in the database.
- [UserHasItemApiInterface::fetchAll](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [UserHasItemApiInterface::fetch](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [UserHasItemApiInterface::getUserHasItemByUserIdAndItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/getUserHasItemByUserIdAndItemId.md) &ndash; Returns the user has item row identified by the given user_id and item_id.
- [UserHasItemApiInterface::getUserHasItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/getUserHasItem.md) &ndash; Returns the userHasItem row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserHasItemApiInterface::getUserHasItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/getUserHasItems.md) &ndash; Returns the userHasItem rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserHasItemApiInterface::getUserHasItemsColumn](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/getUserHasItemsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserHasItemApiInterface::getUserHasItemsColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/getUserHasItemsColumns.md) &ndash; Returns a subset of the userHasItem rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserHasItemApiInterface::getUserHasItemsKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/getUserHasItemsKey2Value.md) &ndash; Returns an array of $key => $value from the userHasItem rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserHasItemApiInterface::updateUserHasItemByUserIdAndItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/updateUserHasItemByUserIdAndItemId.md) &ndash; Updates the user has item row identified by the given user_id and item_id.
- [UserHasItemApiInterface::updateUserHasItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/updateUserHasItem.md) &ndash; Updates the user has item row.
- [UserHasItemApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/delete.md) &ndash; Deletes the userHasItem rows matching the given where conditions, and returns the number of deleted rows.
- [UserHasItemApiInterface::deleteUserHasItemByUserIdAndItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/deleteUserHasItemByUserIdAndItemId.md) &ndash; Deletes the user has item identified by the given user_id and item_id.
- [UserHasItemApiInterface::deleteUserHasItemByUserIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/deleteUserHasItemByUserIds.md) &ndash; Deletes the user has item rows identified by the given user_ids.
- [UserHasItemApiInterface::deleteUserHasItemByItemIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/deleteUserHasItemByItemIds.md) &ndash; Deletes the user has item rows identified by the given item_ids.
- [UserHasItemApiInterface::deleteUserHasItemByUserId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/deleteUserHasItemByUserId.md) &ndash; Deletes the user has item rows having the given user id.
- [UserHasItemApiInterface::deleteUserHasItemByItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserHasItemApiInterface/deleteUserHasItemByItemId.md) &ndash; Deletes the user has item rows having the given item id.





Location
=============
Ling\Light_Kit_Store\Api\Generated\Interfaces\UserHasItemApiInterface<br>
See the source code of [Ling\Light_Kit_Store\Api\Generated\Interfaces\UserHasItemApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Interfaces/UserHasItemApiInterface.php)



SeeAlso
==============
Previous class: [UserApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface.md)<br>Next class: [LightKitStoreApiFactory](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/LightKitStoreApiFactory.md)<br>
