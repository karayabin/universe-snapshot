[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)



The CustomBlockHasWidgetApiInterface class
================
2021-03-01 --> 2021-05-31






Introduction
============

The CustomBlockHasWidgetApiInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">CustomBlockHasWidgetApiInterface</span> implements [BlockHasWidgetApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface.md) {

- Inherited methods
    - abstract public [BlockHasWidgetApiInterface::insertBlockHasWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/insertBlockHasWidget.md)(array $blockHasWidget, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [BlockHasWidgetApiInterface::insertBlockHasWidgets](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/insertBlockHasWidgets.md)(array $blockHasWidgets, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [BlockHasWidgetApiInterface::fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/fetchAll.md)(?array $components = []) : array
    - abstract public [BlockHasWidgetApiInterface::fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/fetch.md)(?array $components = []) : array
    - abstract public [BlockHasWidgetApiInterface::getBlockHasWidgetById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/getBlockHasWidgetById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [BlockHasWidgetApiInterface::getBlockHasWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/getBlockHasWidget.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [BlockHasWidgetApiInterface::getBlockHasWidgets](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/getBlockHasWidgets.md)($where, ?array $markers = []) : array
    - abstract public [BlockHasWidgetApiInterface::getBlockHasWidgetsColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/getBlockHasWidgetsColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [BlockHasWidgetApiInterface::getBlockHasWidgetsColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/getBlockHasWidgetsColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [BlockHasWidgetApiInterface::getBlockHasWidgetsKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/getBlockHasWidgetsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [BlockHasWidgetApiInterface::getAllIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/getAllIds.md)() : array
    - abstract public [BlockHasWidgetApiInterface::updateBlockHasWidgetById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/updateBlockHasWidgetById.md)(int $id, array $blockHasWidget, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [BlockHasWidgetApiInterface::updateBlockHasWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/updateBlockHasWidget.md)(array $blockHasWidget, ?$where = null, ?array $markers = []) : void
    - abstract public [BlockHasWidgetApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [BlockHasWidgetApiInterface::deleteBlockHasWidgetById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/deleteBlockHasWidgetById.md)(int $id) : void
    - abstract public [BlockHasWidgetApiInterface::deleteBlockHasWidgetByIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/deleteBlockHasWidgetByIds.md)(array $ids) : void
    - abstract public [BlockHasWidgetApiInterface::deleteBlockHasWidgetByBlockId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/deleteBlockHasWidgetByBlockId.md)(int $blockId) : void
    - abstract public [BlockHasWidgetApiInterface::deleteBlockHasWidgetByWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/deleteBlockHasWidgetByWidgetId.md)(int $widgetId) : void

}






Methods
==============

- [BlockHasWidgetApiInterface::insertBlockHasWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/insertBlockHasWidget.md) &ndash; Inserts the given block has widget in the database.
- [BlockHasWidgetApiInterface::insertBlockHasWidgets](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/insertBlockHasWidgets.md) &ndash; Inserts the given block has widget rows in the database.
- [BlockHasWidgetApiInterface::fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [BlockHasWidgetApiInterface::fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [BlockHasWidgetApiInterface::getBlockHasWidgetById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/getBlockHasWidgetById.md) &ndash; Returns the block has widget row identified by the given id.
- [BlockHasWidgetApiInterface::getBlockHasWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/getBlockHasWidget.md) &ndash; Returns the blockHasWidget row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [BlockHasWidgetApiInterface::getBlockHasWidgets](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/getBlockHasWidgets.md) &ndash; Returns the blockHasWidget rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [BlockHasWidgetApiInterface::getBlockHasWidgetsColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/getBlockHasWidgetsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [BlockHasWidgetApiInterface::getBlockHasWidgetsColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/getBlockHasWidgetsColumns.md) &ndash; Returns a subset of the blockHasWidget rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [BlockHasWidgetApiInterface::getBlockHasWidgetsKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/getBlockHasWidgetsKey2Value.md) &ndash; Returns an array of $key => $value from the blockHasWidget rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [BlockHasWidgetApiInterface::getAllIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/getAllIds.md) &ndash; Returns an array of all blockHasWidget ids.
- [BlockHasWidgetApiInterface::updateBlockHasWidgetById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/updateBlockHasWidgetById.md) &ndash; Updates the block has widget row identified by the given id.
- [BlockHasWidgetApiInterface::updateBlockHasWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/updateBlockHasWidget.md) &ndash; Updates the block has widget row.
- [BlockHasWidgetApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/delete.md) &ndash; Deletes the blockHasWidget rows matching the given where conditions, and returns the number of deleted rows.
- [BlockHasWidgetApiInterface::deleteBlockHasWidgetById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/deleteBlockHasWidgetById.md) &ndash; Deletes the block has widget identified by the given id.
- [BlockHasWidgetApiInterface::deleteBlockHasWidgetByIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/deleteBlockHasWidgetByIds.md) &ndash; Deletes the block has widget rows identified by the given ids.
- [BlockHasWidgetApiInterface::deleteBlockHasWidgetByBlockId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/deleteBlockHasWidgetByBlockId.md) &ndash; Deletes the block has widget rows having the given block id.
- [BlockHasWidgetApiInterface::deleteBlockHasWidgetByWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockHasWidgetApiInterface/deleteBlockHasWidgetByWidgetId.md) &ndash; Deletes the block has widget rows having the given widget id.





Location
=============
Ling\Light_Kit_Editor\Api\Custom\Interfaces\CustomBlockHasWidgetApiInterface<br>
See the source code of [Ling\Light_Kit_Editor\Api\Custom\Interfaces\CustomBlockHasWidgetApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Custom/Interfaces/CustomBlockHasWidgetApiInterface.php)



SeeAlso
==============
Previous class: [CustomBlockApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Interfaces/CustomBlockApiInterface.md)<br>Next class: [CustomPageApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Interfaces/CustomPageApiInterface.md)<br>
