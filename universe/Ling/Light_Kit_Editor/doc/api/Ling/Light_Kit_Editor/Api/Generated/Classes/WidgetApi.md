[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)



The WidgetApi class
================
2021-03-01 --> 2021-08-03






Introduction
============

The WidgetApi class.



Class synopsis
==============


class <span class="pl-k">WidgetApi</span> extends [CustomLightKitEditorBaseApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Classes/CustomLightKitEditorBaseApi.md) implements [WidgetApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/WidgetApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightKitEditorBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightKitEditorBaseApi::$container](#property-container) ;
    - protected string [LightKitEditorBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/__construct.md)() : void
    - public [insertWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/insertWidget.md)(array $widget, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [insertWidgets](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/insertWidgets.md)(array $widgets, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/fetchAll.md)(?array $components = []) : array
    - public [fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/fetch.md)(?array $components = []) : array
    - public [getWidgetById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/getWidgetById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getWidgetByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/getWidgetByIdentifier.md)(string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/getWidget.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getWidgets](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/getWidgets.md)($where, ?array $markers = []) : array
    - public [getWidgetsColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/getWidgetsColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [getWidgetsColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/getWidgetsColumns.md)($columns, $where, ?array $markers = []) : array
    - public [getWidgetsKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/getWidgetsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [getWidgetIdByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/getWidgetIdByIdentifier.md)(string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - public [getWidgetsByBlockId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/getWidgetsByBlockId.md)(string $blockId) : array
    - public [getWidgetsByBlockIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/getWidgetsByBlockIdentifier.md)(string $blockIdentifier) : array
    - public [getWidgetIdsByBlockId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/getWidgetIdsByBlockId.md)(string $blockId) : array
    - public [getWidgetIdsByBlockIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/getWidgetIdsByBlockIdentifier.md)(string $blockIdentifier) : array
    - public [getWidgetIdentifiersByBlockId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/getWidgetIdentifiersByBlockId.md)(string $blockId) : array
    - public [getWidgetIdentifiersByBlockIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/getWidgetIdentifiersByBlockIdentifier.md)(string $blockIdentifier) : array
    - public [getAllIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/getAllIds.md)() : array
    - public [updateWidgetById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/updateWidgetById.md)(int $id, array $widget, ?array $extraWhere = [], ?array $markers = []) : void
    - public [updateWidgetByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/updateWidgetByIdentifier.md)(string $identifier, array $widget, ?array $extraWhere = [], ?array $markers = []) : void
    - public [updateWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/updateWidget.md)(array $widget, ?$where = null, ?array $markers = []) : void
    - public [delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [deleteWidgetById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/deleteWidgetById.md)(int $id) : void
    - public [deleteWidgetByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/deleteWidgetByIdentifier.md)(string $identifier) : void
    - public [deleteWidgetByIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/deleteWidgetByIds.md)(array $ids) : void
    - public [deleteWidgetByIdentifiers](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/deleteWidgetByIdentifiers.md)(array $identifiers) : void
    - private [fetchRoutine](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/fetchRoutine.md)(string &$q, array &$markers, array $components) : array

- Inherited methods
    - public [LightKitEditorBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightKitEditorBaseApi::setContainer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [WidgetApi::__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/__construct.md) &ndash; Builds the WidgetApi instance.
- [WidgetApi::insertWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/insertWidget.md) &ndash; Inserts the given widget in the database.
- [WidgetApi::insertWidgets](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/insertWidgets.md) &ndash; Inserts the given widget rows in the database.
- [WidgetApi::fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [WidgetApi::fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [WidgetApi::getWidgetById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/getWidgetById.md) &ndash; Returns the widget row identified by the given id.
- [WidgetApi::getWidgetByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/getWidgetByIdentifier.md) &ndash; Returns the widget row identified by the given identifier.
- [WidgetApi::getWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/getWidget.md) &ndash; Returns the widget row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [WidgetApi::getWidgets](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/getWidgets.md) &ndash; Returns the widget rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [WidgetApi::getWidgetsColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/getWidgetsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [WidgetApi::getWidgetsColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/getWidgetsColumns.md) &ndash; Returns a subset of the widget rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [WidgetApi::getWidgetsKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/getWidgetsKey2Value.md) &ndash; Returns an array of $key => $value from the widget rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [WidgetApi::getWidgetIdByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/getWidgetIdByIdentifier.md) &ndash; Returns the id of the lke_widget table.
- [WidgetApi::getWidgetsByBlockId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/getWidgetsByBlockId.md) &ndash; Returns the rows of the lke_widget table bound to the given block id.
- [WidgetApi::getWidgetsByBlockIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/getWidgetsByBlockIdentifier.md) &ndash; Returns the rows of the lke_widget table bound to the given block identifier.
- [WidgetApi::getWidgetIdsByBlockId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/getWidgetIdsByBlockId.md) &ndash; Returns an array of lke_widget.id bound to the given block id.
- [WidgetApi::getWidgetIdsByBlockIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/getWidgetIdsByBlockIdentifier.md) &ndash; Returns an array of lke_widget.id bound to the given block identifier.
- [WidgetApi::getWidgetIdentifiersByBlockId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/getWidgetIdentifiersByBlockId.md) &ndash; Returns an array of lke_widget.identifier bound to the given block id.
- [WidgetApi::getWidgetIdentifiersByBlockIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/getWidgetIdentifiersByBlockIdentifier.md) &ndash; Returns an array of lke_widget.identifier bound to the given block identifier.
- [WidgetApi::getAllIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/getAllIds.md) &ndash; Returns an array of all widget ids.
- [WidgetApi::updateWidgetById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/updateWidgetById.md) &ndash; Updates the widget row identified by the given id.
- [WidgetApi::updateWidgetByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/updateWidgetByIdentifier.md) &ndash; Updates the widget row identified by the given identifier.
- [WidgetApi::updateWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/updateWidget.md) &ndash; Updates the widget row.
- [WidgetApi::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/delete.md) &ndash; Deletes the widget rows matching the given where conditions, and returns the number of deleted rows.
- [WidgetApi::deleteWidgetById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/deleteWidgetById.md) &ndash; Deletes the widget identified by the given id.
- [WidgetApi::deleteWidgetByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/deleteWidgetByIdentifier.md) &ndash; Deletes the widget identified by the given identifier.
- [WidgetApi::deleteWidgetByIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/deleteWidgetByIds.md) &ndash; Deletes the widget rows identified by the given ids.
- [WidgetApi::deleteWidgetByIdentifiers](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/deleteWidgetByIdentifiers.md) &ndash; Deletes the widget rows identified by the given identifiers.
- [WidgetApi::fetchRoutine](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/WidgetApi/fetchRoutine.md) &ndash; Appends the given components to the given query, and returns an array of options.
- [LightKitEditorBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightKitEditorBaseApi::setContainer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_Kit_Editor\Api\Generated\Classes\WidgetApi<br>
See the source code of [Ling\Light_Kit_Editor\Api\Generated\Classes\WidgetApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Generated/Classes/WidgetApi.php)



SeeAlso
==============
Previous class: [SiteApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/SiteApi.md)<br>Next class: [BlockApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/BlockApiInterface.md)<br>
