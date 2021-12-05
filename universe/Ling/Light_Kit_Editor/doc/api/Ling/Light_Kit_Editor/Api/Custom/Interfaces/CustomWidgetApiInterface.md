[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)



The CustomWidgetApiInterface class
================
2021-03-01 --> 2021-08-03






Introduction
============

The CustomWidgetApiInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">CustomWidgetApiInterface</span> implements [WidgetApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface.md) {

- Inherited methods
    - abstract public [WidgetApiInterface::insertWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/insertWidget.md)(array $widget, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [WidgetApiInterface::insertWidgets](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/insertWidgets.md)(array $widgets, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [WidgetApiInterface::fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/fetchAll.md)(?array $components = []) : array
    - abstract public [WidgetApiInterface::fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/fetch.md)(?array $components = []) : array
    - abstract public [WidgetApiInterface::getWidgetById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/getWidgetById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [WidgetApiInterface::getWidgetByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/getWidgetByIdentifier.md)(string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [WidgetApiInterface::getWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/getWidget.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [WidgetApiInterface::getWidgets](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/getWidgets.md)($where, ?array $markers = []) : array
    - abstract public [WidgetApiInterface::getWidgetsColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/getWidgetsColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [WidgetApiInterface::getWidgetsColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/getWidgetsColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [WidgetApiInterface::getWidgetsKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/getWidgetsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [WidgetApiInterface::getWidgetIdByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/getWidgetIdByIdentifier.md)(string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - abstract public [WidgetApiInterface::getWidgetsByBlockId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/getWidgetsByBlockId.md)(string $blockId) : array
    - abstract public [WidgetApiInterface::getWidgetsByBlockIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/getWidgetsByBlockIdentifier.md)(string $blockIdentifier) : array
    - abstract public [WidgetApiInterface::getWidgetIdsByBlockId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/getWidgetIdsByBlockId.md)(string $blockId) : array
    - abstract public [WidgetApiInterface::getWidgetIdsByBlockIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/getWidgetIdsByBlockIdentifier.md)(string $blockIdentifier) : array
    - abstract public [WidgetApiInterface::getWidgetIdentifiersByBlockId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/getWidgetIdentifiersByBlockId.md)(string $blockId) : array
    - abstract public [WidgetApiInterface::getWidgetIdentifiersByBlockIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/getWidgetIdentifiersByBlockIdentifier.md)(string $blockIdentifier) : array
    - abstract public [WidgetApiInterface::getAllIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/getAllIds.md)() : array
    - abstract public [WidgetApiInterface::updateWidgetById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/updateWidgetById.md)(int $id, array $widget, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [WidgetApiInterface::updateWidgetByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/updateWidgetByIdentifier.md)(string $identifier, array $widget, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [WidgetApiInterface::updateWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/updateWidget.md)(array $widget, ?$where = null, ?array $markers = []) : void
    - abstract public [WidgetApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [WidgetApiInterface::deleteWidgetById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/deleteWidgetById.md)(int $id) : void
    - abstract public [WidgetApiInterface::deleteWidgetByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/deleteWidgetByIdentifier.md)(string $identifier) : void
    - abstract public [WidgetApiInterface::deleteWidgetByIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/deleteWidgetByIds.md)(array $ids) : void
    - abstract public [WidgetApiInterface::deleteWidgetByIdentifiers](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/deleteWidgetByIdentifiers.md)(array $identifiers) : void

}






Methods
==============

- [WidgetApiInterface::insertWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/insertWidget.md) &ndash; Inserts the given widget in the database.
- [WidgetApiInterface::insertWidgets](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/insertWidgets.md) &ndash; Inserts the given widget rows in the database.
- [WidgetApiInterface::fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [WidgetApiInterface::fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [WidgetApiInterface::getWidgetById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/getWidgetById.md) &ndash; Returns the widget row identified by the given id.
- [WidgetApiInterface::getWidgetByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/getWidgetByIdentifier.md) &ndash; Returns the widget row identified by the given identifier.
- [WidgetApiInterface::getWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/getWidget.md) &ndash; Returns the widget row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [WidgetApiInterface::getWidgets](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/getWidgets.md) &ndash; Returns the widget rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [WidgetApiInterface::getWidgetsColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/getWidgetsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [WidgetApiInterface::getWidgetsColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/getWidgetsColumns.md) &ndash; Returns a subset of the widget rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [WidgetApiInterface::getWidgetsKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/getWidgetsKey2Value.md) &ndash; Returns an array of $key => $value from the widget rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [WidgetApiInterface::getWidgetIdByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/getWidgetIdByIdentifier.md) &ndash; Returns the id of the lke_widget table.
- [WidgetApiInterface::getWidgetsByBlockId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/getWidgetsByBlockId.md) &ndash; Returns the rows of the lke_widget table bound to the given block id.
- [WidgetApiInterface::getWidgetsByBlockIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/getWidgetsByBlockIdentifier.md) &ndash; Returns the rows of the lke_widget table bound to the given block identifier.
- [WidgetApiInterface::getWidgetIdsByBlockId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/getWidgetIdsByBlockId.md) &ndash; Returns an array of lke_widget.id bound to the given block id.
- [WidgetApiInterface::getWidgetIdsByBlockIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/getWidgetIdsByBlockIdentifier.md) &ndash; Returns an array of lke_widget.id bound to the given block identifier.
- [WidgetApiInterface::getWidgetIdentifiersByBlockId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/getWidgetIdentifiersByBlockId.md) &ndash; Returns an array of lke_widget.identifier bound to the given block id.
- [WidgetApiInterface::getWidgetIdentifiersByBlockIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/getWidgetIdentifiersByBlockIdentifier.md) &ndash; Returns an array of lke_widget.identifier bound to the given block identifier.
- [WidgetApiInterface::getAllIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/getAllIds.md) &ndash; Returns an array of all widget ids.
- [WidgetApiInterface::updateWidgetById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/updateWidgetById.md) &ndash; Updates the widget row identified by the given id.
- [WidgetApiInterface::updateWidgetByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/updateWidgetByIdentifier.md) &ndash; Updates the widget row identified by the given identifier.
- [WidgetApiInterface::updateWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/updateWidget.md) &ndash; Updates the widget row.
- [WidgetApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/delete.md) &ndash; Deletes the widget rows matching the given where conditions, and returns the number of deleted rows.
- [WidgetApiInterface::deleteWidgetById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/deleteWidgetById.md) &ndash; Deletes the widget identified by the given id.
- [WidgetApiInterface::deleteWidgetByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/deleteWidgetByIdentifier.md) &ndash; Deletes the widget identified by the given identifier.
- [WidgetApiInterface::deleteWidgetByIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/deleteWidgetByIds.md) &ndash; Deletes the widget rows identified by the given ids.
- [WidgetApiInterface::deleteWidgetByIdentifiers](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface/deleteWidgetByIdentifiers.md) &ndash; Deletes the widget rows identified by the given identifiers.





Location
=============
Ling\Light_Kit_Editor\Api\Custom\Interfaces\CustomWidgetApiInterface<br>
See the source code of [Ling\Light_Kit_Editor\Api\Custom\Interfaces\CustomWidgetApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Custom/Interfaces/CustomWidgetApiInterface.php)



SeeAlso
==============
Previous class: [CustomSiteApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Interfaces/CustomSiteApiInterface.md)<br>Next class: [BlockApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/BlockApi.md)<br>
