[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)



The CustomPageHasBlockApi class
================
2021-03-01 --> 2021-08-03






Introduction
============

The CustomPageHasBlockApi class.



Class synopsis
==============


class <span class="pl-k">CustomPageHasBlockApi</span> extends [PageHasBlockApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi.md) implements [PageHasBlockApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface.md), [CustomPageHasBlockApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Interfaces/CustomPageHasBlockApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightKitEditorBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightKitEditorBaseApi::$container](#property-container) ;
    - protected string [LightKitEditorBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Classes/CustomPageHasBlockApi/__construct.md)() : void

- Inherited methods
    - public [PageHasBlockApi::insertPageHasBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/insertPageHasBlock.md)(array $pageHasBlock, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [PageHasBlockApi::insertPageHasBlocks](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/insertPageHasBlocks.md)(array $pageHasBlocks, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [PageHasBlockApi::fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/fetchAll.md)(?array $components = []) : array
    - public [PageHasBlockApi::fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/fetch.md)(?array $components = []) : array
    - public [PageHasBlockApi::getPageHasBlockById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/getPageHasBlockById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [PageHasBlockApi::getPageHasBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/getPageHasBlock.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [PageHasBlockApi::getPageHasBlocks](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/getPageHasBlocks.md)($where, ?array $markers = []) : array
    - public [PageHasBlockApi::getPageHasBlocksColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/getPageHasBlocksColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [PageHasBlockApi::getPageHasBlocksColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/getPageHasBlocksColumns.md)($columns, $where, ?array $markers = []) : array
    - public [PageHasBlockApi::getPageHasBlocksKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/getPageHasBlocksKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [PageHasBlockApi::getAllIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/getAllIds.md)() : array
    - public [PageHasBlockApi::updatePageHasBlockById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/updatePageHasBlockById.md)(int $id, array $pageHasBlock, ?array $extraWhere = [], ?array $markers = []) : void
    - public [PageHasBlockApi::updatePageHasBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/updatePageHasBlock.md)(array $pageHasBlock, ?$where = null, ?array $markers = []) : void
    - public [PageHasBlockApi::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [PageHasBlockApi::deletePageHasBlockById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/deletePageHasBlockById.md)(int $id) : void
    - public [PageHasBlockApi::deletePageHasBlockByIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/deletePageHasBlockByIds.md)(array $ids) : void
    - public [PageHasBlockApi::deletePageHasBlockByPageId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/deletePageHasBlockByPageId.md)(int $pageId) : void
    - public [PageHasBlockApi::deletePageHasBlockByBlockId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/deletePageHasBlockByBlockId.md)(int $blockId) : void
    - public [LightKitEditorBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightKitEditorBaseApi::setContainer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [CustomPageHasBlockApi::__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Classes/CustomPageHasBlockApi/__construct.md) &ndash; Builds the CustomPageHasBlockApi instance.
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
- [LightKitEditorBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightKitEditorBaseApi::setContainer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_Kit_Editor\Api\Custom\Classes\CustomPageHasBlockApi<br>
See the source code of [Ling\Light_Kit_Editor\Api\Custom\Classes\CustomPageHasBlockApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Custom/Classes/CustomPageHasBlockApi.php)



SeeAlso
==============
Previous class: [CustomPageApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Classes/CustomPageApi.md)<br>Next class: [CustomSiteApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Classes/CustomSiteApi.md)<br>
