[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)



The CustomItemApi class
================
2021-04-06 --> 2021-08-02






Introduction
============

The CustomItemApi class.



Class synopsis
==============


class <span class="pl-k">CustomItemApi</span> extends [ItemApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi.md) implements [ItemApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface.md), [CustomItemApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomItemApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightKitStoreBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightKitStoreBaseApi::$container](#property-container) ;
    - protected string [LightKitStoreBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Classes/CustomItemApi/__construct.md)() : void
    - public [getProductListItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Classes/CustomItemApi/getProductListItems.md)(?array $options = []) : array
    - public [getProductInfoById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Classes/CustomItemApi/getProductInfoById.md)(int $itemId, ?array $options = []) : array

- Inherited methods
    - public [ItemApi::insertItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/insertItem.md)(array $item, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [ItemApi::insertItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/insertItems.md)(array $items, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [ItemApi::fetchAll](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/fetchAll.md)(?array $components = []) : array
    - public [ItemApi::fetch](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/fetch.md)(?array $components = []) : array
    - public [ItemApi::getItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/getItemById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [ItemApi::getItemByProviderAndIdentifier](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/getItemByProviderAndIdentifier.md)(string $provider, string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [ItemApi::getItemByReference](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/getItemByReference.md)(string $reference, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [ItemApi::getItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/getItem.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [ItemApi::getItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/getItems.md)($where, ?array $markers = []) : array
    - public [ItemApi::getItemsColumn](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/getItemsColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [ItemApi::getItemsColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/getItemsColumns.md)($columns, $where, ?array $markers = []) : array
    - public [ItemApi::getItemsKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/getItemsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [ItemApi::getItemIdByProviderAndIdentifier](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/getItemIdByProviderAndIdentifier.md)(string $provider, string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - public [ItemApi::getItemIdByReference](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/getItemIdByReference.md)(string $reference, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - public [ItemApi::getItemsByAuthorId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/getItemsByAuthorId.md)(string $authorId, ?array $components = []) : array
    - public [ItemApi::getAllIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/getAllIds.md)() : array
    - public [ItemApi::updateItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/updateItemById.md)(int $id, array $item, ?array $extraWhere = [], ?array $markers = []) : void
    - public [ItemApi::updateItemByProviderAndIdentifier](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/updateItemByProviderAndIdentifier.md)(string $provider, string $identifier, array $item, ?array $extraWhere = [], ?array $markers = []) : void
    - public [ItemApi::updateItemByReference](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/updateItemByReference.md)(string $reference, array $item, ?array $extraWhere = [], ?array $markers = []) : void
    - public [ItemApi::updateItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/updateItem.md)(array $item, ?$where = null, ?array $markers = []) : void
    - public [ItemApi::delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [ItemApi::deleteItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/deleteItemById.md)(int $id) : void
    - public [ItemApi::deleteItemByProviderAndIdentifier](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/deleteItemByProviderAndIdentifier.md)(string $provider, string $identifier) : void
    - public [ItemApi::deleteItemByReference](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/deleteItemByReference.md)(string $reference) : void
    - public [ItemApi::deleteItemByIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/deleteItemByIds.md)(array $ids) : void
    - public [ItemApi::deleteItemByProvidersAndIdentifiers](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/deleteItemByProvidersAndIdentifiers.md)(array $providers) : void
    - public [ItemApi::deleteItemByReferences](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/deleteItemByReferences.md)(array $references) : void
    - public [ItemApi::deleteItemByAuthorId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/deleteItemByAuthorId.md)(int $authorId) : void
    - protected [ItemApi::getDefaultValues](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/getDefaultValues.md)() : array
    - protected [ItemApi::fetchRoutine](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/fetchRoutine.md)(string &$q, array &$markers, array $components, ?array $options = []) : array
    - public [LightKitStoreBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/LightKitStoreBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightKitStoreBaseApi::setContainer](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/LightKitStoreBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [CustomItemApi::__construct](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Classes/CustomItemApi/__construct.md) &ndash; Builds the CustomItemApi instance.
- [CustomItemApi::getProductListItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Classes/CustomItemApi/getProductListItems.md) &ndash; Returns the [list useful information](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/pages/conception-notes.md#the-list-useful-information) array for a product query, with some extra properties added to it.
- [CustomItemApi::getProductInfoById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Classes/CustomItemApi/getProductInfoById.md) &ndash; Returns information about the product.
- [ItemApi::insertItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/insertItem.md) &ndash; Inserts the given item in the database.
- [ItemApi::insertItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/insertItems.md) &ndash; Inserts the given item rows in the database.
- [ItemApi::fetchAll](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [ItemApi::fetch](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [ItemApi::getItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/getItemById.md) &ndash; Returns the item row identified by the given id.
- [ItemApi::getItemByProviderAndIdentifier](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/getItemByProviderAndIdentifier.md) &ndash; Returns the item row identified by the given provider and identifier.
- [ItemApi::getItemByReference](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/getItemByReference.md) &ndash; Returns the item row identified by the given reference.
- [ItemApi::getItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/getItem.md) &ndash; Returns the item row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ItemApi::getItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/getItems.md) &ndash; Returns the item rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ItemApi::getItemsColumn](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/getItemsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ItemApi::getItemsColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/getItemsColumns.md) &ndash; Returns a subset of the item rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ItemApi::getItemsKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/getItemsKey2Value.md) &ndash; Returns an array of $key => $value from the item rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ItemApi::getItemIdByProviderAndIdentifier](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/getItemIdByProviderAndIdentifier.md) &ndash; Returns the id of the lks_item table.
- [ItemApi::getItemIdByReference](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/getItemIdByReference.md) &ndash; Returns the id of the lks_item table.
- [ItemApi::getItemsByAuthorId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/getItemsByAuthorId.md) &ndash; Returns the rows of the lks_item matching the given authorId.
- [ItemApi::getAllIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/getAllIds.md) &ndash; Returns an array of all item ids.
- [ItemApi::updateItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/updateItemById.md) &ndash; Updates the item row identified by the given id.
- [ItemApi::updateItemByProviderAndIdentifier](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/updateItemByProviderAndIdentifier.md) &ndash; Updates the item row identified by the given provider and identifier.
- [ItemApi::updateItemByReference](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/updateItemByReference.md) &ndash; Updates the item row identified by the given reference.
- [ItemApi::updateItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/updateItem.md) &ndash; Updates the item row.
- [ItemApi::delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/delete.md) &ndash; Deletes the item rows matching the given where conditions, and returns the number of deleted rows.
- [ItemApi::deleteItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/deleteItemById.md) &ndash; Deletes the item identified by the given id.
- [ItemApi::deleteItemByProviderAndIdentifier](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/deleteItemByProviderAndIdentifier.md) &ndash; Deletes the item identified by the given provider and identifier.
- [ItemApi::deleteItemByReference](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/deleteItemByReference.md) &ndash; Deletes the item identified by the given reference.
- [ItemApi::deleteItemByIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/deleteItemByIds.md) &ndash; Deletes the item rows identified by the given ids.
- [ItemApi::deleteItemByProvidersAndIdentifiers](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/deleteItemByProvidersAndIdentifiers.md) &ndash; Deletes the item rows identified by the given providers.
- [ItemApi::deleteItemByReferences](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/deleteItemByReferences.md) &ndash; Deletes the item rows identified by the given references.
- [ItemApi::deleteItemByAuthorId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/deleteItemByAuthorId.md) &ndash; Deletes the item rows having the given author id.
- [ItemApi::getDefaultValues](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/getDefaultValues.md) &ndash; Returns the array of default values for this instance.
- [ItemApi::fetchRoutine](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/fetchRoutine.md) &ndash; Appends the given components to the given query, and returns an array of options.
- [LightKitStoreBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/LightKitStoreBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightKitStoreBaseApi::setContainer](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/LightKitStoreBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_Kit_Store\Api\Custom\Classes\CustomItemApi<br>
See the source code of [Ling\Light_Kit_Store\Api\Custom\Classes\CustomItemApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Custom/Classes/CustomItemApi.php)



SeeAlso
==============
Previous class: [CustomInvoiceLineApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Classes/CustomInvoiceLineApi.md)<br>Next class: [CustomLightKitStoreBaseApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Classes/CustomLightKitStoreBaseApi.md)<br>
