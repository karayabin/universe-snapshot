[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)



The CustomPageHasBlockApiInterface class
================
2021-03-01 --> 2021-04-09






Introduction
============

The CustomPageHasBlockApiInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">CustomPageHasBlockApiInterface</span> implements [PageHasBlockApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface.md) {

- Inherited methods
    - abstract public [PageHasBlockApiInterface::insertPageHasBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/insertPageHasBlock.md)(array $pageHasBlock, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [PageHasBlockApiInterface::insertPageHasBlocks](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/insertPageHasBlocks.md)(array $pageHasBlocks, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [PageHasBlockApiInterface::fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/fetchAll.md)(?array $components = []) : array
    - abstract public [PageHasBlockApiInterface::fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/fetch.md)(?array $components = []) : array
    - abstract public [PageHasBlockApiInterface::getPageHasBlockById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/getPageHasBlockById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [PageHasBlockApiInterface::getPageHasBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/getPageHasBlock.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [PageHasBlockApiInterface::getPageHasBlocks](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/getPageHasBlocks.md)($where, ?array $markers = []) : array
    - abstract public [PageHasBlockApiInterface::getPageHasBlocksColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/getPageHasBlocksColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [PageHasBlockApiInterface::getPageHasBlocksColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/getPageHasBlocksColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [PageHasBlockApiInterface::getPageHasBlocksKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/getPageHasBlocksKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [PageHasBlockApiInterface::getAllIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/getAllIds.md)() : array
    - abstract public [PageHasBlockApiInterface::updatePageHasBlockById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/updatePageHasBlockById.md)(int $id, array $pageHasBlock, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [PageHasBlockApiInterface::updatePageHasBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/updatePageHasBlock.md)(array $pageHasBlock, ?$where = null, ?array $markers = []) : void
    - abstract public [PageHasBlockApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [PageHasBlockApiInterface::deletePageHasBlockById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/deletePageHasBlockById.md)(int $id) : void
    - abstract public [PageHasBlockApiInterface::deletePageHasBlockByIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/deletePageHasBlockByIds.md)(array $ids) : void
    - abstract public [PageHasBlockApiInterface::deletePageHasBlockByPageId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/deletePageHasBlockByPageId.md)(int $pageId) : void
    - abstract public [PageHasBlockApiInterface::deletePageHasBlockByBlockId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/deletePageHasBlockByBlockId.md)(int $blockId) : void

}






Methods
==============

- [PageHasBlockApiInterface::insertPageHasBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/insertPageHasBlock.md) &ndash; Inserts the given page has block in the database.
- [PageHasBlockApiInterface::insertPageHasBlocks](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/insertPageHasBlocks.md) &ndash; Inserts the given page has block rows in the database.
- [PageHasBlockApiInterface::fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [PageHasBlockApiInterface::fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [PageHasBlockApiInterface::getPageHasBlockById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/getPageHasBlockById.md) &ndash; Returns the page has block row identified by the given id.
- [PageHasBlockApiInterface::getPageHasBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/getPageHasBlock.md) &ndash; Returns the pageHasBlock row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PageHasBlockApiInterface::getPageHasBlocks](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/getPageHasBlocks.md) &ndash; Returns the pageHasBlock rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PageHasBlockApiInterface::getPageHasBlocksColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/getPageHasBlocksColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PageHasBlockApiInterface::getPageHasBlocksColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/getPageHasBlocksColumns.md) &ndash; Returns a subset of the pageHasBlock rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PageHasBlockApiInterface::getPageHasBlocksKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/getPageHasBlocksKey2Value.md) &ndash; Returns an array of $key => $value from the pageHasBlock rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PageHasBlockApiInterface::getAllIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/getAllIds.md) &ndash; Returns an array of all pageHasBlock ids.
- [PageHasBlockApiInterface::updatePageHasBlockById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/updatePageHasBlockById.md) &ndash; Updates the page has block row identified by the given id.
- [PageHasBlockApiInterface::updatePageHasBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/updatePageHasBlock.md) &ndash; Updates the page has block row.
- [PageHasBlockApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/delete.md) &ndash; Deletes the pageHasBlock rows matching the given where conditions, and returns the number of deleted rows.
- [PageHasBlockApiInterface::deletePageHasBlockById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/deletePageHasBlockById.md) &ndash; Deletes the page has block identified by the given id.
- [PageHasBlockApiInterface::deletePageHasBlockByIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/deletePageHasBlockByIds.md) &ndash; Deletes the page has block rows identified by the given ids.
- [PageHasBlockApiInterface::deletePageHasBlockByPageId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/deletePageHasBlockByPageId.md) &ndash; Deletes the page has block rows having the given page id.
- [PageHasBlockApiInterface::deletePageHasBlockByBlockId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasBlockApiInterface/deletePageHasBlockByBlockId.md) &ndash; Deletes the page has block rows having the given block id.





Location
=============
Ling\Light_Kit_Editor\Api\Custom\Interfaces\CustomPageHasBlockApiInterface<br>
See the source code of [Ling\Light_Kit_Editor\Api\Custom\Interfaces\CustomPageHasBlockApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Custom/Interfaces/CustomPageHasBlockApiInterface.php)



SeeAlso
==============
Previous class: [CustomPageApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Interfaces/CustomPageApiInterface.md)<br>Next class: [CustomSiteApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Interfaces/CustomSiteApiInterface.md)<br>
