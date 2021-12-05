[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)



The CustomPageApi class
================
2021-03-01 --> 2021-08-03






Introduction
============

The CustomPageApi class.



Class synopsis
==============


class <span class="pl-k">CustomPageApi</span> extends [PageApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi.md) implements [PageApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageApiInterface.md), [CustomPageApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Interfaces/CustomPageApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightKitEditorBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightKitEditorBaseApi::$container](#property-container) ;
    - protected string [LightKitEditorBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Classes/CustomPageApi/__construct.md)() : void
    - public [getAllWidgetsByPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Classes/CustomPageApi/getAllWidgetsByPage.md)(string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : mixed

- Inherited methods
    - public [PageApi::insertPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/insertPage.md)(array $page, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [PageApi::insertPages](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/insertPages.md)(array $pages, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [PageApi::fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/fetchAll.md)(?array $components = []) : array
    - public [PageApi::fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/fetch.md)(?array $components = []) : array
    - public [PageApi::getPageById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/getPageById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [PageApi::getPageByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/getPageByIdentifier.md)(string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [PageApi::getPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/getPage.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [PageApi::getPages](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/getPages.md)($where, ?array $markers = []) : array
    - public [PageApi::getPagesColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/getPagesColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [PageApi::getPagesColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/getPagesColumns.md)($columns, $where, ?array $markers = []) : array
    - public [PageApi::getPagesKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/getPagesKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [PageApi::getPageIdByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/getPageIdByIdentifier.md)(string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - public [PageApi::getAllIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/getAllIds.md)() : array
    - public [PageApi::updatePageById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/updatePageById.md)(int $id, array $page, ?array $extraWhere = [], ?array $markers = []) : void
    - public [PageApi::updatePageByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/updatePageByIdentifier.md)(string $identifier, array $page, ?array $extraWhere = [], ?array $markers = []) : void
    - public [PageApi::updatePage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/updatePage.md)(array $page, ?$where = null, ?array $markers = []) : void
    - public [PageApi::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [PageApi::deletePageById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/deletePageById.md)(int $id) : void
    - public [PageApi::deletePageByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/deletePageByIdentifier.md)(string $identifier) : void
    - public [PageApi::deletePageByIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/deletePageByIds.md)(array $ids) : void
    - public [PageApi::deletePageByIdentifiers](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/deletePageByIdentifiers.md)(array $identifiers) : void
    - public [PageApi::deletePageBySiteId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/deletePageBySiteId.md)(int $siteId) : void
    - public [LightKitEditorBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightKitEditorBaseApi::setContainer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [CustomPageApi::__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Classes/CustomPageApi/__construct.md) &ndash; Builds the CustomPageApi instance.
- [CustomPageApi::getAllWidgetsByPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Classes/CustomPageApi/getAllWidgetsByPage.md) &ndash; Returns all rows owned by the page identified by the given identifier.
- [PageApi::insertPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/insertPage.md) &ndash; Inserts the given page in the database.
- [PageApi::insertPages](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/insertPages.md) &ndash; Inserts the given page rows in the database.
- [PageApi::fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [PageApi::fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [PageApi::getPageById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/getPageById.md) &ndash; Returns the page row identified by the given id.
- [PageApi::getPageByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/getPageByIdentifier.md) &ndash; Returns the page row identified by the given identifier.
- [PageApi::getPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/getPage.md) &ndash; Returns the page row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PageApi::getPages](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/getPages.md) &ndash; Returns the page rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PageApi::getPagesColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/getPagesColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PageApi::getPagesColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/getPagesColumns.md) &ndash; Returns a subset of the page rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PageApi::getPagesKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/getPagesKey2Value.md) &ndash; Returns an array of $key => $value from the page rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PageApi::getPageIdByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/getPageIdByIdentifier.md) &ndash; Returns the id of the lke_page table.
- [PageApi::getAllIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/getAllIds.md) &ndash; Returns an array of all page ids.
- [PageApi::updatePageById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/updatePageById.md) &ndash; Updates the page row identified by the given id.
- [PageApi::updatePageByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/updatePageByIdentifier.md) &ndash; Updates the page row identified by the given identifier.
- [PageApi::updatePage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/updatePage.md) &ndash; Updates the page row.
- [PageApi::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/delete.md) &ndash; Deletes the page rows matching the given where conditions, and returns the number of deleted rows.
- [PageApi::deletePageById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/deletePageById.md) &ndash; Deletes the page identified by the given id.
- [PageApi::deletePageByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/deletePageByIdentifier.md) &ndash; Deletes the page identified by the given identifier.
- [PageApi::deletePageByIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/deletePageByIds.md) &ndash; Deletes the page rows identified by the given ids.
- [PageApi::deletePageByIdentifiers](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/deletePageByIdentifiers.md) &ndash; Deletes the page rows identified by the given identifiers.
- [PageApi::deletePageBySiteId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi/deletePageBySiteId.md) &ndash; Deletes the page rows having the given site id.
- [LightKitEditorBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightKitEditorBaseApi::setContainer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_Kit_Editor\Api\Custom\Classes\CustomPageApi<br>
See the source code of [Ling\Light_Kit_Editor\Api\Custom\Classes\CustomPageApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Custom/Classes/CustomPageApi.php)



SeeAlso
==============
Previous class: [CustomLightKitEditorBaseApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Classes/CustomLightKitEditorBaseApi.md)<br>Next class: [CustomPageHasBlockApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Classes/CustomPageHasBlockApi.md)<br>
