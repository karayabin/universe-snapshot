[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)



The BlockHasWidgetApi class
================
2021-03-01 --> 2021-08-03






Introduction
============

The BlockHasWidgetApi class.



Class synopsis
==============


class <span class="pl-k">BlockHasWidgetApi</span> extends [CustomLightKitEditorBaseApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Classes/CustomLightKitEditorBaseApi.md) implements [BlockHasWidgetApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightKitEditorBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightKitEditorBaseApi::$container](#property-container) ;
    - protected string [LightKitEditorBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/__construct.md)() : void
    - public [insertBlockHasWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/insertBlockHasWidget.md)(array $blockHasWidget, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [insertBlockHasWidgets](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/insertBlockHasWidgets.md)(array $blockHasWidgets, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/fetchAll.md)(?array $components = []) : array
    - public [fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/fetch.md)(?array $components = []) : array
    - public [getBlockHasWidgetById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/getBlockHasWidgetById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getBlockHasWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/getBlockHasWidget.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getBlockHasWidgets](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/getBlockHasWidgets.md)($where, ?array $markers = []) : array
    - public [getBlockHasWidgetsColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/getBlockHasWidgetsColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [getBlockHasWidgetsColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/getBlockHasWidgetsColumns.md)($columns, $where, ?array $markers = []) : array
    - public [getBlockHasWidgetsKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/getBlockHasWidgetsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [getAllIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/getAllIds.md)() : array
    - public [updateBlockHasWidgetById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/updateBlockHasWidgetById.md)(int $id, array $blockHasWidget, ?array $extraWhere = [], ?array $markers = []) : void
    - public [updateBlockHasWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/updateBlockHasWidget.md)(array $blockHasWidget, ?$where = null, ?array $markers = []) : void
    - public [delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [deleteBlockHasWidgetById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/deleteBlockHasWidgetById.md)(int $id) : void
    - public [deleteBlockHasWidgetByIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/deleteBlockHasWidgetByIds.md)(array $ids) : void
    - public [deleteBlockHasWidgetByBlockId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/deleteBlockHasWidgetByBlockId.md)(int $blockId) : void
    - public [deleteBlockHasWidgetByWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/deleteBlockHasWidgetByWidgetId.md)(int $widgetId) : void
    - private [fetchRoutine](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/fetchRoutine.md)(string &$q, array &$markers, array $components) : array

- Inherited methods
    - public [LightKitEditorBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightKitEditorBaseApi::setContainer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [BlockHasWidgetApi::__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/__construct.md) &ndash; Builds the BlockHasWidgetApi instance.
- [BlockHasWidgetApi::insertBlockHasWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/insertBlockHasWidget.md) &ndash; Inserts the given block has widget in the database.
- [BlockHasWidgetApi::insertBlockHasWidgets](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/insertBlockHasWidgets.md) &ndash; Inserts the given block has widget rows in the database.
- [BlockHasWidgetApi::fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [BlockHasWidgetApi::fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [BlockHasWidgetApi::getBlockHasWidgetById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/getBlockHasWidgetById.md) &ndash; Returns the block has widget row identified by the given id.
- [BlockHasWidgetApi::getBlockHasWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/getBlockHasWidget.md) &ndash; Returns the blockHasWidget row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [BlockHasWidgetApi::getBlockHasWidgets](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/getBlockHasWidgets.md) &ndash; Returns the blockHasWidget rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [BlockHasWidgetApi::getBlockHasWidgetsColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/getBlockHasWidgetsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [BlockHasWidgetApi::getBlockHasWidgetsColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/getBlockHasWidgetsColumns.md) &ndash; Returns a subset of the blockHasWidget rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [BlockHasWidgetApi::getBlockHasWidgetsKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/getBlockHasWidgetsKey2Value.md) &ndash; Returns an array of $key => $value from the blockHasWidget rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [BlockHasWidgetApi::getAllIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/getAllIds.md) &ndash; Returns an array of all blockHasWidget ids.
- [BlockHasWidgetApi::updateBlockHasWidgetById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/updateBlockHasWidgetById.md) &ndash; Updates the block has widget row identified by the given id.
- [BlockHasWidgetApi::updateBlockHasWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/updateBlockHasWidget.md) &ndash; Updates the block has widget row.
- [BlockHasWidgetApi::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/delete.md) &ndash; Deletes the blockHasWidget rows matching the given where conditions, and returns the number of deleted rows.
- [BlockHasWidgetApi::deleteBlockHasWidgetById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/deleteBlockHasWidgetById.md) &ndash; Deletes the block has widget identified by the given id.
- [BlockHasWidgetApi::deleteBlockHasWidgetByIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/deleteBlockHasWidgetByIds.md) &ndash; Deletes the block has widget rows identified by the given ids.
- [BlockHasWidgetApi::deleteBlockHasWidgetByBlockId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/deleteBlockHasWidgetByBlockId.md) &ndash; Deletes the block has widget rows having the given block id.
- [BlockHasWidgetApi::deleteBlockHasWidgetByWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/deleteBlockHasWidgetByWidgetId.md) &ndash; Deletes the block has widget rows having the given widget id.
- [BlockHasWidgetApi::fetchRoutine](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockHasWidgetApi/fetchRoutine.md) &ndash; Appends the given components to the given query, and returns an array of options.
- [LightKitEditorBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightKitEditorBaseApi::setContainer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_Kit_Editor\Api\Generated\Classes\BlockHasWidgetApi<br>
See the source code of [Ling\Light_Kit_Editor\Api\Generated\Classes\BlockHasWidgetApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Generated/Classes/BlockHasWidgetApi.php)



SeeAlso
==============
Previous class: [BlockApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi.md)<br>Next class: [LightKitEditorBaseApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi.md)<br>
