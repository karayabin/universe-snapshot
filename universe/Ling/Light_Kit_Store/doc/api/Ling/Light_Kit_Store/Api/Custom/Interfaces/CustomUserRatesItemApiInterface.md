[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)



The CustomUserRatesItemApiInterface class
================
2021-04-06 --> 2021-08-02






Introduction
============

The CustomUserRatesItemApiInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">CustomUserRatesItemApiInterface</span> implements [UserRatesItemApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface.md) {

- Methods
    - abstract public [getCustomUserRatesItemsByItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomUserRatesItemApiInterface/getCustomUserRatesItemsByItemId.md)(string $itemId, ?array $components = []) : array
    - abstract public [getUserRatesItemsListByItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomUserRatesItemApiInterface/getUserRatesItemsListByItemId.md)(string $itemId, ?array $options = []) : array
    - abstract public [countReviewsByItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomUserRatesItemApiInterface/countReviewsByItemId.md)(int $itemId) : int

- Inherited methods
    - abstract public [UserRatesItemApiInterface::insertUserRatesItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/insertUserRatesItem.md)(array $userRatesItem, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [UserRatesItemApiInterface::insertUserRatesItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/insertUserRatesItems.md)(array $userRatesItems, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [UserRatesItemApiInterface::fetchAll](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/fetchAll.md)(?array $components = []) : array
    - abstract public [UserRatesItemApiInterface::fetch](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/fetch.md)(?array $components = []) : array
    - abstract public [UserRatesItemApiInterface::getUserRatesItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/getUserRatesItemById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [UserRatesItemApiInterface::getUserRatesItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/getUserRatesItem.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [UserRatesItemApiInterface::getUserRatesItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/getUserRatesItems.md)($where, ?array $markers = []) : array
    - abstract public [UserRatesItemApiInterface::getUserRatesItemsColumn](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/getUserRatesItemsColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [UserRatesItemApiInterface::getUserRatesItemsColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/getUserRatesItemsColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [UserRatesItemApiInterface::getUserRatesItemsKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/getUserRatesItemsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [UserRatesItemApiInterface::getUserRatesItemsByUserId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/getUserRatesItemsByUserId.md)(string $userId, ?array $components = []) : array
    - abstract public [UserRatesItemApiInterface::getUserRatesItemsByItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/getUserRatesItemsByItemId.md)(string $itemId, ?array $components = []) : array
    - abstract public [UserRatesItemApiInterface::getAllIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/getAllIds.md)() : array
    - abstract public [UserRatesItemApiInterface::updateUserRatesItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/updateUserRatesItemById.md)(int $id, array $userRatesItem, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [UserRatesItemApiInterface::updateUserRatesItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/updateUserRatesItem.md)(array $userRatesItem, ?$where = null, ?array $markers = []) : void
    - abstract public [UserRatesItemApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [UserRatesItemApiInterface::deleteUserRatesItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/deleteUserRatesItemById.md)(int $id) : void
    - abstract public [UserRatesItemApiInterface::deleteUserRatesItemByIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/deleteUserRatesItemByIds.md)(array $ids) : void
    - abstract public [UserRatesItemApiInterface::deleteUserRatesItemByUserId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/deleteUserRatesItemByUserId.md)(int $userId) : void
    - abstract public [UserRatesItemApiInterface::deleteUserRatesItemByItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/deleteUserRatesItemByItemId.md)(int $itemId) : void

}






Methods
==============

- [CustomUserRatesItemApiInterface::getCustomUserRatesItemsByItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomUserRatesItemApiInterface/getCustomUserRatesItemsByItemId.md) &ndash; Returns the rows of the lks_user_rates_item matching the given itemId.
- [CustomUserRatesItemApiInterface::getUserRatesItemsListByItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomUserRatesItemApiInterface/getUserRatesItemsListByItemId.md) &ndash; Returns the [list super useful information](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/pages/conception-notes.md#the-list-super-useful-information) array for item ratings.
- [CustomUserRatesItemApiInterface::countReviewsByItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomUserRatesItemApiInterface/countReviewsByItemId.md) &ndash; Returns the number of reviews written for the given item.
- [UserRatesItemApiInterface::insertUserRatesItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/insertUserRatesItem.md) &ndash; Inserts the given user rates item in the database.
- [UserRatesItemApiInterface::insertUserRatesItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/insertUserRatesItems.md) &ndash; Inserts the given user rates item rows in the database.
- [UserRatesItemApiInterface::fetchAll](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [UserRatesItemApiInterface::fetch](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [UserRatesItemApiInterface::getUserRatesItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/getUserRatesItemById.md) &ndash; Returns the user rates item row identified by the given id.
- [UserRatesItemApiInterface::getUserRatesItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/getUserRatesItem.md) &ndash; Returns the userRatesItem row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserRatesItemApiInterface::getUserRatesItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/getUserRatesItems.md) &ndash; Returns the userRatesItem rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserRatesItemApiInterface::getUserRatesItemsColumn](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/getUserRatesItemsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserRatesItemApiInterface::getUserRatesItemsColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/getUserRatesItemsColumns.md) &ndash; Returns a subset of the userRatesItem rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserRatesItemApiInterface::getUserRatesItemsKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/getUserRatesItemsKey2Value.md) &ndash; Returns an array of $key => $value from the userRatesItem rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserRatesItemApiInterface::getUserRatesItemsByUserId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/getUserRatesItemsByUserId.md) &ndash; Returns the rows of the lks_user_rates_item matching the given userId.
- [UserRatesItemApiInterface::getUserRatesItemsByItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/getUserRatesItemsByItemId.md) &ndash; Returns the rows of the lks_user_rates_item matching the given itemId.
- [UserRatesItemApiInterface::getAllIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/getAllIds.md) &ndash; Returns an array of all userRatesItem ids.
- [UserRatesItemApiInterface::updateUserRatesItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/updateUserRatesItemById.md) &ndash; Updates the user rates item row identified by the given id.
- [UserRatesItemApiInterface::updateUserRatesItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/updateUserRatesItem.md) &ndash; Updates the user rates item row.
- [UserRatesItemApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/delete.md) &ndash; Deletes the userRatesItem rows matching the given where conditions, and returns the number of deleted rows.
- [UserRatesItemApiInterface::deleteUserRatesItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/deleteUserRatesItemById.md) &ndash; Deletes the user rates item identified by the given id.
- [UserRatesItemApiInterface::deleteUserRatesItemByIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/deleteUserRatesItemByIds.md) &ndash; Deletes the user rates item rows identified by the given ids.
- [UserRatesItemApiInterface::deleteUserRatesItemByUserId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/deleteUserRatesItemByUserId.md) &ndash; Deletes the user rates item rows having the given user id.
- [UserRatesItemApiInterface::deleteUserRatesItemByItemId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/deleteUserRatesItemByItemId.md) &ndash; Deletes the user rates item rows having the given item id.





Location
=============
Ling\Light_Kit_Store\Api\Custom\Interfaces\CustomUserRatesItemApiInterface<br>
See the source code of [Ling\Light_Kit_Store\Api\Custom\Interfaces\CustomUserRatesItemApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Custom/Interfaces/CustomUserRatesItemApiInterface.php)



SeeAlso
==============
Previous class: [CustomUserPurchasesItemApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomUserPurchasesItemApiInterface.md)<br>Next class: [AuthorApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/AuthorApi.md)<br>
