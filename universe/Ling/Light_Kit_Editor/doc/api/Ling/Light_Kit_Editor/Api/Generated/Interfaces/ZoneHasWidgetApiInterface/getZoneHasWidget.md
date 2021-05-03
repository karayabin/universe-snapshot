[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)<br>
[Back to the Ling\Light_Kit_Editor\Api\Generated\Interfaces\ZoneHasWidgetApiInterface class](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface.md)


ZoneHasWidgetApiInterface::getZoneHasWidget
================



ZoneHasWidgetApiInterface::getZoneHasWidget — Returns the zoneHasWidget row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).




Description
================


abstract public [ZoneHasWidgetApiInterface::getZoneHasWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/getZoneHasWidget.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the zoneHasWidget row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- where

    

- markers

    

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
See the source code for method [ZoneHasWidgetApiInterface::getZoneHasWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Generated/Interfaces/ZoneHasWidgetApiInterface.php#L115-L115)


See Also
================

The [ZoneHasWidgetApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface.md) class.

Previous method: [getZoneHasWidgetByZoneIdAndWidgetId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/getZoneHasWidgetByZoneIdAndWidgetId.md)<br>Next method: [getZoneHasWidgets](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneHasWidgetApiInterface/getZoneHasWidgets.md)<br>

