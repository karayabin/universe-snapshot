[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)<br>
[Back to the Ling\Light_Kit_Editor\Api\Generated\Interfaces\ZoneHasWidgetApiInterface class](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface.md)


ZoneHasWidgetApiInterface::getZoneHasWidgetByZoneIdAndWidgetId
================



ZoneHasWidgetApiInterface::getZoneHasWidgetByZoneIdAndWidgetId — Returns the zone has widget row identified by the given zone_id and widget_id.




Description
================


abstract public [ZoneHasWidgetApiInterface::getZoneHasWidgetByZoneIdAndWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/getZoneHasWidgetByZoneIdAndWidgetId.md)(int $zone_id, int $widget_id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the zone has widget row identified by the given zone_id and widget_id.

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- zone_id

    

- widget_id

    

- default

    

- throwNotFoundEx

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [ZoneHasWidgetApiInterface::getZoneHasWidgetByZoneIdAndWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Generated/Interfaces/ZoneHasWidgetApiInterface.php#L96-L96)


See Also
================

The [ZoneHasWidgetApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface.md) class.

Previous method: [fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/fetch.md)<br>Next method: [getZoneHasWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/getZoneHasWidget.md)<br>

