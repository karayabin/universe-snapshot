[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)



The CustomItemApiInterface class
================
2021-04-06 --> 2021-08-02






Introduction
============

The CustomItemApiInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">CustomItemApiInterface</span> implements [ItemApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface.md) {

- Methods
    - abstract public [getProductListItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomItemApiInterface/getProductListItems.md)(?array $options = []) : array
    - abstract public [getProductInfoById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomItemApiInterface/getProductInfoById.md)(int $itemId, ?array $options = []) : array

- Inherited methods
    - abstract public [ItemApiInterface::insertItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/insertItem.md)(array $item, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [ItemApiInterface::insertItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/insertItems.md)(array $items, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [ItemApiInterface::fetchAll](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/fetchAll.md)(?array $components = []) : array
    - abstract public [ItemApiInterface::fetch](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/fetch.md)(?array $components = []) : array
    - abstract public [ItemApiInterface::getItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/getItemById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [ItemApiInterface::getItemByProviderAndIdentifier](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/getItemByProviderAndIdentifier.md)(string $provider, string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [ItemApiInterface::getItemByReference](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/getItemByReference.md)(string $reference, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [ItemApiInterface::getItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/getItem.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [ItemApiInterface::getItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/getItems.md)($where, ?array $markers = []) : array
    - abstract public [ItemApiInterface::getItemsColumn](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/getItemsColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [ItemApiInterface::getItemsColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/getItemsColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [ItemApiInterface::getItemsKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/getItemsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [ItemApiInterface::getItemIdByProviderAndIdentifier](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/getItemIdByProviderAndIdentifier.md)(string $provider, string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - abstract public [ItemApiInterface::getItemIdByReference](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/getItemIdByReference.md)(string $reference, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - abstract public [ItemApiInterface::getItemsByAuthorId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/getItemsByAuthorId.md)(string $authorId, ?array $components = []) : array
    - abstract public [ItemApiInterface::getAllIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/getAllIds.md)() : array
    - abstract public [ItemApiInterface::updateItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/updateItemById.md)(int $id, array $item, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [ItemApiInterface::updateItemByProviderAndIdentifier](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/updateItemByProviderAndIdentifier.md)(string $provider, string $identifier, array $item, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [ItemApiInterface::updateItemByReference](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/updateItemByReference.md)(string $reference, array $item, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [ItemApiInterface::updateItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/updateItem.md)(array $item, ?$where = null, ?array $markers = []) : void
    - abstract public [ItemApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [ItemApiInterface::deleteItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/deleteItemById.md)(int $id) : void
    - abstract public [ItemApiInterface::deleteItemByProviderAndIdentifier](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/deleteItemByProviderAndIdentifier.md)(string $provider, string $identifier) : void
    - abstract public [ItemApiInterface::deleteItemByReference](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/deleteItemByReference.md)(string $reference) : void
    - abstract public [ItemApiInterface::deleteItemByIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/deleteItemByIds.md)(array $ids) : void
    - abstract public [ItemApiInterface::deleteItemByProvidersAndIdentifiers](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/deleteItemByProvidersAndIdentifiers.md)(array $providers) : void
    - abstract public [ItemApiInterface::deleteItemByReferences](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/deleteItemByReferences.md)(array $references) : void
    - abstract public [ItemApiInterface::deleteItemByAuthorId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/deleteItemByAuthorId.md)(int $authorId) : void

}






Methods
==============

- [CustomItemApiInterface::getProductListItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomItemApiInterface/getProductListItems.md) &ndash; Returns the [list useful information](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/pages/conception-notes.md#the-list-useful-information) array for a product query, with some extra properties added to it.
- [CustomItemApiInterface::getProductInfoById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomItemApiInterface/getProductInfoById.md) &ndash; Returns information about the product.
- [ItemApiInterface::insertItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/insertItem.md) &ndash; Inserts the given item in the database.
- [ItemApiInterface::insertItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/insertItems.md) &ndash; Inserts the given item rows in the database.
- [ItemApiInterface::fetchAll](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [ItemApiInterface::fetch](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [ItemApiInterface::getItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/getItemById.md) &ndash; Returns the item row identified by the given id.
- [ItemApiInterface::getItemByProviderAndIdentifier](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/getItemByProviderAndIdentifier.md) &ndash; Returns the item row identified by the given provider and identifier.
- [ItemApiInterface::getItemByReference](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/getItemByReference.md) &ndash; Returns the item row identified by the given reference.
- [ItemApiInterface::getItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/getItem.md) &ndash; Returns the item row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ItemApiInterface::getItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/getItems.md) &ndash; Returns the item rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ItemApiInterface::getItemsColumn](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/getItemsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ItemApiInterface::getItemsColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/getItemsColumns.md) &ndash; Returns a subset of the item rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ItemApiInterface::getItemsKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/getItemsKey2Value.md) &ndash; Returns an array of $key => $value from the item rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ItemApiInterface::getItemIdByProviderAndIdentifier](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/getItemIdByProviderAndIdentifier.md) &ndash; Returns the id of the lks_item table.
- [ItemApiInterface::getItemIdByReference](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/getItemIdByReference.md) &ndash; Returns the id of the lks_item table.
- [ItemApiInterface::getItemsByAuthorId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/getItemsByAuthorId.md) &ndash; Returns the rows of the lks_item matching the given authorId.
- [ItemApiInterface::getAllIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/getAllIds.md) &ndash; Returns an array of all item ids.
- [ItemApiInterface::updateItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/updateItemById.md) &ndash; Updates the item row identified by the given id.
- [ItemApiInterface::updateItemByProviderAndIdentifier](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/updateItemByProviderAndIdentifier.md) &ndash; Updates the item row identified by the given provider and identifier.
- [ItemApiInterface::updateItemByReference](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/updateItemByReference.md) &ndash; Updates the item row identified by the given reference.
- [ItemApiInterface::updateItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/updateItem.md) &ndash; Updates the item row.
- [ItemApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/delete.md) &ndash; Deletes the item rows matching the given where conditions, and returns the number of deleted rows.
- [ItemApiInterface::deleteItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/deleteItemById.md) &ndash; Deletes the item identified by the given id.
- [ItemApiInterface::deleteItemByProviderAndIdentifier](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/deleteItemByProviderAndIdentifier.md) &ndash; Deletes the item identified by the given provider and identifier.
- [ItemApiInterface::deleteItemByReference](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/deleteItemByReference.md) &ndash; Deletes the item identified by the given reference.
- [ItemApiInterface::deleteItemByIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/deleteItemByIds.md) &ndash; Deletes the item rows identified by the given ids.
- [ItemApiInterface::deleteItemByProvidersAndIdentifiers](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/deleteItemByProvidersAndIdentifiers.md) &ndash; Deletes the item rows identified by the given providers.
- [ItemApiInterface::deleteItemByReferences](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/deleteItemByReferences.md) &ndash; Deletes the item rows identified by the given references.
- [ItemApiInterface::deleteItemByAuthorId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/deleteItemByAuthorId.md) &ndash; Deletes the item rows having the given author id.





Location
=============
Ling\Light_Kit_Store\Api\Custom\Interfaces\CustomItemApiInterface<br>
See the source code of [Ling\Light_Kit_Store\Api\Custom\Interfaces\CustomItemApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Custom/Interfaces/CustomItemApiInterface.php)



SeeAlso
==============
Previous class: [CustomInvoiceLineApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomInvoiceLineApiInterface.md)<br>Next class: [CustomUserApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomUserApiInterface.md)<br>
