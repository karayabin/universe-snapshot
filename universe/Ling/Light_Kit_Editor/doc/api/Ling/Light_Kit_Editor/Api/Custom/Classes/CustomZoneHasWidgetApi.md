[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)



The CustomZoneHasWidgetApi class
================
2021-03-01 --> 2021-03-09






Introduction
============

The CustomZoneHasWidgetApi class.



Class synopsis
==============


class <span class="pl-k">CustomZoneHasWidgetApi</span> extends [ZoneHasWidgetApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi.md) implements [ZoneHasWidgetApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface.md), [CustomZoneHasWidgetApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Interfaces/CustomZoneHasWidgetApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightKitEditorBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightKitEditorBaseApi::$container](#property-container) ;
    - protected string [LightKitEditorBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Classes/CustomZoneHasWidgetApi/__construct.md)() : void

- Inherited methods
    - public [ZoneHasWidgetApi::insertZoneHasWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/insertZoneHasWidget.md)(array $zoneHasWidget, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [ZoneHasWidgetApi::insertZoneHasWidgets](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/insertZoneHasWidgets.md)(array $zoneHasWidgets, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [ZoneHasWidgetApi::fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/fetchAll.md)(?array $components = []) : array
    - public [ZoneHasWidgetApi::fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/fetch.md)(?array $components = []) : array
    - public [ZoneHasWidgetApi::getZoneHasWidgetByZoneIdAndWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/getZoneHasWidgetByZoneIdAndWidgetId.md)(int $zone_id, int $widget_id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [ZoneHasWidgetApi::getZoneHasWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/getZoneHasWidget.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [ZoneHasWidgetApi::getZoneHasWidgets](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/getZoneHasWidgets.md)($where, ?array $markers = []) : array
    - public [ZoneHasWidgetApi::getZoneHasWidgetsColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/getZoneHasWidgetsColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [ZoneHasWidgetApi::getZoneHasWidgetsColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/getZoneHasWidgetsColumns.md)($columns, $where, ?array $markers = []) : array
    - public [ZoneHasWidgetApi::getZoneHasWidgetsKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/getZoneHasWidgetsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [ZoneHasWidgetApi::updateZoneHasWidgetByZoneIdAndWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/updateZoneHasWidgetByZoneIdAndWidgetId.md)(int $zone_id, int $widget_id, array $zoneHasWidget, ?array $extraWhere = [], ?array $markers = []) : void
    - public [ZoneHasWidgetApi::updateZoneHasWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/updateZoneHasWidget.md)(array $zoneHasWidget, ?$where = null, ?array $markers = []) : void
    - public [ZoneHasWidgetApi::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [ZoneHasWidgetApi::deleteZoneHasWidgetByZoneIdAndWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/deleteZoneHasWidgetByZoneIdAndWidgetId.md)(int $zone_id, int $widget_id) : void
    - public [ZoneHasWidgetApi::deleteZoneHasWidgetByZoneIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/deleteZoneHasWidgetByZoneIds.md)(array $zone_ids) : void
    - public [ZoneHasWidgetApi::deleteZoneHasWidgetByWidgetIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/deleteZoneHasWidgetByWidgetIds.md)(array $widget_ids) : void
    - public [ZoneHasWidgetApi::deleteZoneHasWidgetByZoneId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/deleteZoneHasWidgetByZoneId.md)(int $zoneId) : void
    - public [ZoneHasWidgetApi::deleteZoneHasWidgetByWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/deleteZoneHasWidgetByWidgetId.md)(int $widgetId) : void
    - public [LightKitEditorBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightKitEditorBaseApi::setContainer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [CustomZoneHasWidgetApi::__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Classes/CustomZoneHasWidgetApi/__construct.md) &ndash; Builds the CustomZoneHasWidgetApi instance.
- [ZoneHasWidgetApi::insertZoneHasWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/insertZoneHasWidget.md) &ndash; Inserts the given zone has widget in the database.
- [ZoneHasWidgetApi::insertZoneHasWidgets](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/insertZoneHasWidgets.md) &ndash; Inserts the given zone has widget rows in the database.
- [ZoneHasWidgetApi::fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [ZoneHasWidgetApi::fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [ZoneHasWidgetApi::getZoneHasWidgetByZoneIdAndWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/getZoneHasWidgetByZoneIdAndWidgetId.md) &ndash; Returns the zone has widget row identified by the given zone_id and widget_id.
- [ZoneHasWidgetApi::getZoneHasWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/getZoneHasWidget.md) &ndash; Returns the zoneHasWidget row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ZoneHasWidgetApi::getZoneHasWidgets](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/getZoneHasWidgets.md) &ndash; Returns the zoneHasWidget rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ZoneHasWidgetApi::getZoneHasWidgetsColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/getZoneHasWidgetsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ZoneHasWidgetApi::getZoneHasWidgetsColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/getZoneHasWidgetsColumns.md) &ndash; Returns a subset of the zoneHasWidget rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ZoneHasWidgetApi::getZoneHasWidgetsKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/getZoneHasWidgetsKey2Value.md) &ndash; Returns an array of $key => $value from the zoneHasWidget rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ZoneHasWidgetApi::updateZoneHasWidgetByZoneIdAndWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/updateZoneHasWidgetByZoneIdAndWidgetId.md) &ndash; Updates the zone has widget row identified by the given zone_id and widget_id.
- [ZoneHasWidgetApi::updateZoneHasWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/updateZoneHasWidget.md) &ndash; Updates the zone has widget row.
- [ZoneHasWidgetApi::delete](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/delete.md) &ndash; Deletes the zoneHasWidget rows matching the given where conditions, and returns the number of deleted rows.
- [ZoneHasWidgetApi::deleteZoneHasWidgetByZoneIdAndWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/deleteZoneHasWidgetByZoneIdAndWidgetId.md) &ndash; Deletes the zone has widget identified by the given zone_id and widget_id.
- [ZoneHasWidgetApi::deleteZoneHasWidgetByZoneIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/deleteZoneHasWidgetByZoneIds.md) &ndash; Deletes the zone has widget rows identified by the given zone_ids.
- [ZoneHasWidgetApi::deleteZoneHasWidgetByWidgetIds](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/deleteZoneHasWidgetByWidgetIds.md) &ndash; Deletes the zone has widget rows identified by the given widget_ids.
- [ZoneHasWidgetApi::deleteZoneHasWidgetByZoneId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/deleteZoneHasWidgetByZoneId.md) &ndash; Deletes the zone has widget rows having the given zone id.
- [ZoneHasWidgetApi::deleteZoneHasWidgetByWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneHasWidgetApi/deleteZoneHasWidgetByWidgetId.md) &ndash; Deletes the zone has widget rows having the given widget id.
- [LightKitEditorBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightKitEditorBaseApi::setContainer](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/LightKitEditorBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_Kit_Editor\Api\Custom\Classes\CustomZoneHasWidgetApi<br>
See the source code of [Ling\Light_Kit_Editor\Api\Custom\Classes\CustomZoneHasWidgetApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Custom/Classes/CustomZoneHasWidgetApi.php)



SeeAlso
==============
Previous class: [CustomZoneApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Classes/CustomZoneApi.md)<br>Next class: [CustomLightKitEditorApiFactory](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/CustomLightKitEditorApiFactory.md)<br>
