[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)



The UserPurchasesItemApiInterface class
================
2021-04-06 --> 2021-08-02






Introduction
============

The UserPurchasesItemApiInterface interface.
It implements the [ling standard object methods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-standard-object-methods.md) concept.



Class synopsis
==============


abstract class <span class="pl-k">UserPurchasesItemApiInterface</span>  {

- Methods
    - abstract public [insertUserPurchasesItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/insertUserPurchasesItem.md)(array $userPurchasesItem, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [insertUserPurchasesItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/insertUserPurchasesItems.md)(array $userPurchasesItems, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [fetchAll](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/fetchAll.md)(?array $components = []) : array
    - abstract public [fetch](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/fetch.md)(?array $components = []) : array
    - abstract public [getUserPurchasesItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/getUserPurchasesItemById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getUserPurchasesItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/getUserPurchasesItem.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getUserPurchasesItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/getUserPurchasesItems.md)($where, ?array $markers = []) : array
    - abstract public [getUserPurchasesItemsColumn](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/getUserPurchasesItemsColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [getUserPurchasesItemsColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/getUserPurchasesItemsColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [getUserPurchasesItemsKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/getUserPurchasesItemsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [getUserPurchasesItemsByUserId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/getUserPurchasesItemsByUserId.md)(string $userId, ?array $components = []) : array
    - abstract public [getUserPurchasesItemsByItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/getUserPurchasesItemsByItemId.md)(string $itemId, ?array $components = []) : array
    - abstract public [getAllIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/getAllIds.md)() : array
    - abstract public [updateUserPurchasesItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/updateUserPurchasesItemById.md)(int $id, array $userPurchasesItem, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [updateUserPurchasesItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/updateUserPurchasesItem.md)(array $userPurchasesItem, ?$where = null, ?array $markers = []) : void
    - abstract public [delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [deleteUserPurchasesItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/deleteUserPurchasesItemById.md)(int $id) : void
    - abstract public [deleteUserPurchasesItemByIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/deleteUserPurchasesItemByIds.md)(array $ids) : void
    - abstract public [deleteUserPurchasesItemByUserId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/deleteUserPurchasesItemByUserId.md)(int $userId) : void
    - abstract public [deleteUserPurchasesItemByItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/deleteUserPurchasesItemByItemId.md)(int $itemId) : void

}






Methods
==============

- [UserPurchasesItemApiInterface::insertUserPurchasesItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/insertUserPurchasesItem.md) &ndash; Inserts the given user purchases item in the database.
- [UserPurchasesItemApiInterface::insertUserPurchasesItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/insertUserPurchasesItems.md) &ndash; Inserts the given user purchases item rows in the database.
- [UserPurchasesItemApiInterface::fetchAll](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [UserPurchasesItemApiInterface::fetch](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [UserPurchasesItemApiInterface::getUserPurchasesItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/getUserPurchasesItemById.md) &ndash; Returns the user purchases item row identified by the given id.
- [UserPurchasesItemApiInterface::getUserPurchasesItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/getUserPurchasesItem.md) &ndash; Returns the userPurchasesItem row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserPurchasesItemApiInterface::getUserPurchasesItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/getUserPurchasesItems.md) &ndash; Returns the userPurchasesItem rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserPurchasesItemApiInterface::getUserPurchasesItemsColumn](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/getUserPurchasesItemsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserPurchasesItemApiInterface::getUserPurchasesItemsColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/getUserPurchasesItemsColumns.md) &ndash; Returns a subset of the userPurchasesItem rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserPurchasesItemApiInterface::getUserPurchasesItemsKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/getUserPurchasesItemsKey2Value.md) &ndash; Returns an array of $key => $value from the userPurchasesItem rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserPurchasesItemApiInterface::getUserPurchasesItemsByUserId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/getUserPurchasesItemsByUserId.md) &ndash; Returns the rows of the lks_user_purchases_item matching the given userId.
- [UserPurchasesItemApiInterface::getUserPurchasesItemsByItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/getUserPurchasesItemsByItemId.md) &ndash; Returns the rows of the lks_user_purchases_item matching the given itemId.
- [UserPurchasesItemApiInterface::getAllIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/getAllIds.md) &ndash; Returns an array of all userPurchasesItem ids.
- [UserPurchasesItemApiInterface::updateUserPurchasesItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/updateUserPurchasesItemById.md) &ndash; Updates the user purchases item row identified by the given id.
- [UserPurchasesItemApiInterface::updateUserPurchasesItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/updateUserPurchasesItem.md) &ndash; Updates the user purchases item row.
- [UserPurchasesItemApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/delete.md) &ndash; Deletes the userPurchasesItem rows matching the given where conditions, and returns the number of deleted rows.
- [UserPurchasesItemApiInterface::deleteUserPurchasesItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/deleteUserPurchasesItemById.md) &ndash; Deletes the user purchases item identified by the given id.
- [UserPurchasesItemApiInterface::deleteUserPurchasesItemByIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/deleteUserPurchasesItemByIds.md) &ndash; Deletes the user purchases item rows identified by the given ids.
- [UserPurchasesItemApiInterface::deleteUserPurchasesItemByUserId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/deleteUserPurchasesItemByUserId.md) &ndash; Deletes the user purchases item rows having the given user id.
- [UserPurchasesItemApiInterface::deleteUserPurchasesItemByItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserPurchasesItemApiInterface/deleteUserPurchasesItemByItemId.md) &ndash; Deletes the user purchases item rows having the given item id.





Location
=============
Ling\Light_Kit_Store\Api\Generated\Interfaces\UserPurchasesItemApiInterface<br>
See the source code of [Ling\Light_Kit_Store\Api\Generated\Interfaces\UserPurchasesItemApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Interfaces/UserPurchasesItemApiInterface.php)



SeeAlso
==============
Previous class: [UserApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface.md)<br>Next class: [UserRatesItemApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface.md)<br>
