[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)<br>
[Back to the Ling\Light_Kit_Editor\Api\Generated\Interfaces\ZoneApiInterface class](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface.md)


ZoneApiInterface::getZoneByIdentifier
================



ZoneApiInterface::getZoneByIdentifier — Returns the zone row identified by the given identifier.




Description
================


abstract public [ZoneApiInterface::getZoneByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZoneByIdentifier.md)(string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the zone row identified by the given identifier.

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- identifier

    

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
See the source code for method [ZoneApiInterface::getZoneByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Generated/Interfaces/ZoneApiInterface.php#L111-L111)


See Also
================

The [ZoneApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface.md) class.

Previous method: [getZoneById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZoneById.md)<br>Next method: [getZone](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/ZoneApiInterface/getZone.md)<br>

