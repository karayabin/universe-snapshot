[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)



The PageHasBlockApi class
================
2021-03-01 --> 2021-08-03






Introduction
============

The PageHasBlockApi class.



Class synopsis
==============


class <span class="pl-k">PageHasBlockApi</span> extends [CustomLightKitEditorBaseApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Classes/CustomLightKitEditorBaseApi.md) implements [PageHasBlockApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightKitEditorBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightKitEditorBaseApi::$container](#property-container) ;
    - protected string [LightKitEditorBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/__construct.md)() : void
    - public [insertPageHasBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/insertPageHasBlock.md)(array $pageHasBlock, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [insertPageHasBlocks](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/insertPageHasBlocks.md)(array $pageHasBlocks, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/fetchAll.md)(?array $components = []) : array
    - public [fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/fetch.md)(?array $components = []) : array
    - public [getPageHasBlockById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/getPageHasBlockById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getPageHasBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/getPageHasBlock.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getPageHasBlocks](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/getPageHasBlocks.md)($where, ?array $markers = []) : array
    - public [getPageHasBlocksColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/getPageHasBlocksColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [getPageHasBlocksColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/getPageHasBlocksColumns.md)($columns, $where, ?array $markers = []) : array
    - public [getPageHasBlocksKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/getPageHasBlocksKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [getAllIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/getAllIds.md)() : array
    - public [updatePageHasBlockById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/updatePageHasBlockById.md)(int $id, array $pageHasBlock, ?array $extraWhere = [], ?array $markers = []) : void
    - public [updatePageHasBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/updatePageHasBlock.md)(array $pageHasBlock, ?$where = null, ?array $markers = []) : void
    - public [delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [deletePageHasBlockById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/deletePageHasBlockById.md)(int $id) : void
    - public [deletePageHasBlockByIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/deletePageHasBlockByIds.md)(array $ids) : void
    - public [deletePageHasBlockByPageId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/deletePageHasBlockByPageId.md)(int $pageId) : void
    - public [deletePageHasBlockByBlockId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/deletePageHasBlockByBlockId.md)(int $blockId) : void
    - private [fetchRoutine](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/fetchRoutine.md)(string &$q, array &$markers, array $components) : array

- Inherited methods
    - public [LightKitEditorBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightKitEditorBaseApi::setContainer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [PageHasBlockApi::__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/__construct.md) &ndash; Builds the PageHasBlockApi instance.
- [PageHasBlockApi::insertPageHasBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/insertPageHasBlock.md) &ndash; Inserts the given page has block in the database.
- [PageHasBlockApi::insertPageHasBlocks](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/insertPageHasBlocks.md) &ndash; Inserts the given page has block rows in the database.
- [PageHasBlockApi::fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [PageHasBlockApi::fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [PageHasBlockApi::getPageHasBlockById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/getPageHasBlockById.md) &ndash; Returns the page has block row identified by the given id.
- [PageHasBlockApi::getPageHasBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/getPageHasBlock.md) &ndash; Returns the pageHasBlock row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PageHasBlockApi::getPageHasBlocks](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/getPageHasBlocks.md) &ndash; Returns the pageHasBlock rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PageHasBlockApi::getPageHasBlocksColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/getPageHasBlocksColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PageHasBlockApi::getPageHasBlocksColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/getPageHasBlocksColumns.md) &ndash; Returns a subset of the pageHasBlock rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PageHasBlockApi::getPageHasBlocksKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/getPageHasBlocksKey2Value.md) &ndash; Returns an array of $key => $value from the pageHasBlock rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PageHasBlockApi::getAllIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/getAllIds.md) &ndash; Returns an array of all pageHasBlock ids.
- [PageHasBlockApi::updatePageHasBlockById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/updatePageHasBlockById.md) &ndash; Updates the page has block row identified by the given id.
- [PageHasBlockApi::updatePageHasBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/updatePageHasBlock.md) &ndash; Updates the page has block row.
- [PageHasBlockApi::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/delete.md) &ndash; Deletes the pageHasBlock rows matching the given where conditions, and returns the number of deleted rows.
- [PageHasBlockApi::deletePageHasBlockById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/deletePageHasBlockById.md) &ndash; Deletes the page has block identified by the given id.
- [PageHasBlockApi::deletePageHasBlockByIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/deletePageHasBlockByIds.md) &ndash; Deletes the page has block rows identified by the given ids.
- [PageHasBlockApi::deletePageHasBlockByPageId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/deletePageHasBlockByPageId.md) &ndash; Deletes the page has block rows having the given page id.
- [PageHasBlockApi::deletePageHasBlockByBlockId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/deletePageHasBlockByBlockId.md) &ndash; Deletes the page has block rows having the given block id.
- [PageHasBlockApi::fetchRoutine](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/fetchRoutine.md) &ndash; Appends the given components to the given query, and returns an array of options.
- [LightKitEditorBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightKitEditorBaseApi::setContainer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_Kit_Editor\Api\Generated\Classes\PageHasBlockApi<br>
See the source code of [Ling\Light_Kit_Editor\Api\Generated\Classes\PageHasBlockApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Generated/Classes/PageHasBlockApi.php)



SeeAlso
==============
Previous class: [PageApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageApi.md)<br>Next class: [SiteApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/SiteApi.md)<br>
