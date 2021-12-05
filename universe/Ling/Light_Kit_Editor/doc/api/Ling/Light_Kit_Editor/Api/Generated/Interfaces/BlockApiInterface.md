[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)



The BlockApiInterface class
================
2021-03-01 --> 2021-08-03






Introduction
============

The BlockApiInterface interface.
It implements the [ling standard object methods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-standard-object-methods.md) concept.



Class synopsis
==============


abstract class <span class="pl-k">BlockApiInterface</span>  {

- Methods
    - abstract public [insertBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/insertBlock.md)(array $block, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [insertBlocks](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/insertBlocks.md)(array $blocks, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/fetchAll.md)(?array $components = []) : array
    - abstract public [fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/fetch.md)(?array $components = []) : array
    - abstract public [getBlockById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/getBlockById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getBlockByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/getBlockByIdentifier.md)(string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/getBlock.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getBlocks](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/getBlocks.md)($where, ?array $markers = []) : array
    - abstract public [getBlocksColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/getBlocksColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [getBlocksColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/getBlocksColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [getBlocksKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/getBlocksKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [getBlockIdByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/getBlockIdByIdentifier.md)(string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - abstract public [getBlocksByPageId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/getBlocksByPageId.md)(string $pageId) : array
    - abstract public [getBlocksByPageIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/getBlocksByPageIdentifier.md)(string $pageIdentifier) : array
    - abstract public [getBlockIdsByPageId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/getBlockIdsByPageId.md)(string $pageId) : array
    - abstract public [getBlockIdsByPageIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/getBlockIdsByPageIdentifier.md)(string $pageIdentifier) : array
    - abstract public [getBlockIdentifiersByPageId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/getBlockIdentifiersByPageId.md)(string $pageId) : array
    - abstract public [getBlockIdentifiersByPageIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/getBlockIdentifiersByPageIdentifier.md)(string $pageIdentifier) : array
    - abstract public [getAllIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/getAllIds.md)() : array
    - abstract public [updateBlockById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/updateBlockById.md)(int $id, array $block, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [updateBlockByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/updateBlockByIdentifier.md)(string $identifier, array $block, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [updateBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/updateBlock.md)(array $block, ?$where = null, ?array $markers = []) : void
    - abstract public [delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [deleteBlockById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/deleteBlockById.md)(int $id) : void
    - abstract public [deleteBlockByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/deleteBlockByIdentifier.md)(string $identifier) : void
    - abstract public [deleteBlockByIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/deleteBlockByIds.md)(array $ids) : void
    - abstract public [deleteBlockByIdentifiers](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/deleteBlockByIdentifiers.md)(array $identifiers) : void

}






Methods
==============

- [BlockApiInterface::insertBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/insertBlock.md) &ndash; Inserts the given block in the database.
- [BlockApiInterface::insertBlocks](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/insertBlocks.md) &ndash; Inserts the given block rows in the database.
- [BlockApiInterface::fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [BlockApiInterface::fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [BlockApiInterface::getBlockById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/getBlockById.md) &ndash; Returns the block row identified by the given id.
- [BlockApiInterface::getBlockByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/getBlockByIdentifier.md) &ndash; Returns the block row identified by the given identifier.
- [BlockApiInterface::getBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/getBlock.md) &ndash; Returns the block row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [BlockApiInterface::getBlocks](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/getBlocks.md) &ndash; Returns the block rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [BlockApiInterface::getBlocksColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/getBlocksColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [BlockApiInterface::getBlocksColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/getBlocksColumns.md) &ndash; Returns a subset of the block rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [BlockApiInterface::getBlocksKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/getBlocksKey2Value.md) &ndash; Returns an array of $key => $value from the block rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [BlockApiInterface::getBlockIdByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/getBlockIdByIdentifier.md) &ndash; Returns the id of the lke_block table.
- [BlockApiInterface::getBlocksByPageId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/getBlocksByPageId.md) &ndash; Returns the rows of the lke_block table bound to the given page id.
- [BlockApiInterface::getBlocksByPageIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/getBlocksByPageIdentifier.md) &ndash; Returns the rows of the lke_block table bound to the given page identifier.
- [BlockApiInterface::getBlockIdsByPageId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/getBlockIdsByPageId.md) &ndash; Returns an array of lke_block.id bound to the given page id.
- [BlockApiInterface::getBlockIdsByPageIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/getBlockIdsByPageIdentifier.md) &ndash; Returns an array of lke_block.id bound to the given page identifier.
- [BlockApiInterface::getBlockIdentifiersByPageId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/getBlockIdentifiersByPageId.md) &ndash; Returns an array of lke_block.identifier bound to the given page id.
- [BlockApiInterface::getBlockIdentifiersByPageIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/getBlockIdentifiersByPageIdentifier.md) &ndash; Returns an array of lke_block.identifier bound to the given page identifier.
- [BlockApiInterface::getAllIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/getAllIds.md) &ndash; Returns an array of all block ids.
- [BlockApiInterface::updateBlockById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/updateBlockById.md) &ndash; Updates the block row identified by the given id.
- [BlockApiInterface::updateBlockByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/updateBlockByIdentifier.md) &ndash; Updates the block row identified by the given identifier.
- [BlockApiInterface::updateBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/updateBlock.md) &ndash; Updates the block row.
- [BlockApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/delete.md) &ndash; Deletes the block rows matching the given where conditions, and returns the number of deleted rows.
- [BlockApiInterface::deleteBlockById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/deleteBlockById.md) &ndash; Deletes the block identified by the given id.
- [BlockApiInterface::deleteBlockByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/deleteBlockByIdentifier.md) &ndash; Deletes the block identified by the given identifier.
- [BlockApiInterface::deleteBlockByIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/deleteBlockByIds.md) &ndash; Deletes the block rows identified by the given ids.
- [BlockApiInterface::deleteBlockByIdentifiers](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface/deleteBlockByIdentifiers.md) &ndash; Deletes the block rows identified by the given identifiers.





Location
=============
Ling\Light_Kit_Editor\Api\Generated\Interfaces\BlockApiInterface<br>
See the source code of [Ling\Light_Kit_Editor\Api\Generated\Interfaces\BlockApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Generated/Interfaces/BlockApiInterface.php)



SeeAlso
==============
Previous class: [WidgetApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi.md)<br>Next class: [BlockHasWidgetApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface.md)<br>
