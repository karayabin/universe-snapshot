[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)



The CustomBlockApi class
================
2021-03-01 --> 2021-08-03






Introduction
============

The CustomBlockApi class.



Class synopsis
==============


class <span class="pl-k">CustomBlockApi</span> extends [BlockApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi.md) implements [BlockApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface.md), [CustomBlockApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Interfaces/CustomBlockApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightKitEditorBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightKitEditorBaseApi::$container](#property-container) ;
    - protected string [LightKitEditorBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Classes/CustomBlockApi/__construct.md)() : void

- Inherited methods
    - public [BlockApi::insertBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/insertBlock.md)(array $block, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [BlockApi::insertBlocks](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/insertBlocks.md)(array $blocks, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [BlockApi::fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/fetchAll.md)(?array $components = []) : array
    - public [BlockApi::fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/fetch.md)(?array $components = []) : array
    - public [BlockApi::getBlockById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/getBlockById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [BlockApi::getBlockByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/getBlockByIdentifier.md)(string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [BlockApi::getBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/getBlock.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [BlockApi::getBlocks](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/getBlocks.md)($where, ?array $markers = []) : array
    - public [BlockApi::getBlocksColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/getBlocksColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [BlockApi::getBlocksColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/getBlocksColumns.md)($columns, $where, ?array $markers = []) : array
    - public [BlockApi::getBlocksKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/getBlocksKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [BlockApi::getBlockIdByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/getBlockIdByIdentifier.md)(string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - public [BlockApi::getBlocksByPageId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/getBlocksByPageId.md)(string $pageId) : array
    - public [BlockApi::getBlocksByPageIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/getBlocksByPageIdentifier.md)(string $pageIdentifier) : array
    - public [BlockApi::getBlockIdsByPageId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/getBlockIdsByPageId.md)(string $pageId) : array
    - public [BlockApi::getBlockIdsByPageIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/getBlockIdsByPageIdentifier.md)(string $pageIdentifier) : array
    - public [BlockApi::getBlockIdentifiersByPageId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/getBlockIdentifiersByPageId.md)(string $pageId) : array
    - public [BlockApi::getBlockIdentifiersByPageIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/getBlockIdentifiersByPageIdentifier.md)(string $pageIdentifier) : array
    - public [BlockApi::getAllIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/getAllIds.md)() : array
    - public [BlockApi::updateBlockById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/updateBlockById.md)(int $id, array $block, ?array $extraWhere = [], ?array $markers = []) : void
    - public [BlockApi::updateBlockByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/updateBlockByIdentifier.md)(string $identifier, array $block, ?array $extraWhere = [], ?array $markers = []) : void
    - public [BlockApi::updateBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/updateBlock.md)(array $block, ?$where = null, ?array $markers = []) : void
    - public [BlockApi::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [BlockApi::deleteBlockById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/deleteBlockById.md)(int $id) : void
    - public [BlockApi::deleteBlockByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/deleteBlockByIdentifier.md)(string $identifier) : void
    - public [BlockApi::deleteBlockByIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/deleteBlockByIds.md)(array $ids) : void
    - public [BlockApi::deleteBlockByIdentifiers](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/deleteBlockByIdentifiers.md)(array $identifiers) : void
    - public [LightKitEditorBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightKitEditorBaseApi::setContainer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [CustomBlockApi::__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Classes/CustomBlockApi/__construct.md) &ndash; Builds the CustomBlockApi instance.
- [BlockApi::insertBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/insertBlock.md) &ndash; Inserts the given block in the database.
- [BlockApi::insertBlocks](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/insertBlocks.md) &ndash; Inserts the given block rows in the database.
- [BlockApi::fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [BlockApi::fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [BlockApi::getBlockById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/getBlockById.md) &ndash; Returns the block row identified by the given id.
- [BlockApi::getBlockByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/getBlockByIdentifier.md) &ndash; Returns the block row identified by the given identifier.
- [BlockApi::getBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/getBlock.md) &ndash; Returns the block row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [BlockApi::getBlocks](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/getBlocks.md) &ndash; Returns the block rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [BlockApi::getBlocksColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/getBlocksColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [BlockApi::getBlocksColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/getBlocksColumns.md) &ndash; Returns a subset of the block rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [BlockApi::getBlocksKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/getBlocksKey2Value.md) &ndash; Returns an array of $key => $value from the block rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [BlockApi::getBlockIdByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/getBlockIdByIdentifier.md) &ndash; Returns the id of the lke_block table.
- [BlockApi::getBlocksByPageId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/getBlocksByPageId.md) &ndash; Returns the rows of the lke_block table bound to the given page id.
- [BlockApi::getBlocksByPageIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/getBlocksByPageIdentifier.md) &ndash; Returns the rows of the lke_block table bound to the given page identifier.
- [BlockApi::getBlockIdsByPageId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/getBlockIdsByPageId.md) &ndash; Returns an array of lke_block.id bound to the given page id.
- [BlockApi::getBlockIdsByPageIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/getBlockIdsByPageIdentifier.md) &ndash; Returns an array of lke_block.id bound to the given page identifier.
- [BlockApi::getBlockIdentifiersByPageId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/getBlockIdentifiersByPageId.md) &ndash; Returns an array of lke_block.identifier bound to the given page id.
- [BlockApi::getBlockIdentifiersByPageIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/getBlockIdentifiersByPageIdentifier.md) &ndash; Returns an array of lke_block.identifier bound to the given page identifier.
- [BlockApi::getAllIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/getAllIds.md) &ndash; Returns an array of all block ids.
- [BlockApi::updateBlockById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/updateBlockById.md) &ndash; Updates the block row identified by the given id.
- [BlockApi::updateBlockByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/updateBlockByIdentifier.md) &ndash; Updates the block row identified by the given identifier.
- [BlockApi::updateBlock](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/updateBlock.md) &ndash; Updates the block row.
- [BlockApi::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/delete.md) &ndash; Deletes the block rows matching the given where conditions, and returns the number of deleted rows.
- [BlockApi::deleteBlockById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/deleteBlockById.md) &ndash; Deletes the block identified by the given id.
- [BlockApi::deleteBlockByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/deleteBlockByIdentifier.md) &ndash; Deletes the block identified by the given identifier.
- [BlockApi::deleteBlockByIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/deleteBlockByIds.md) &ndash; Deletes the block rows identified by the given ids.
- [BlockApi::deleteBlockByIdentifiers](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi/deleteBlockByIdentifiers.md) &ndash; Deletes the block rows identified by the given identifiers.
- [LightKitEditorBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightKitEditorBaseApi::setContainer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_Kit_Editor\Api\Custom\Classes\CustomBlockApi<br>
See the source code of [Ling\Light_Kit_Editor\Api\Custom\Classes\CustomBlockApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Custom/Classes/CustomBlockApi.php)



SeeAlso
==============
Next class: [CustomBlockHasWidgetApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Classes/CustomBlockHasWidgetApi.md)<br>
