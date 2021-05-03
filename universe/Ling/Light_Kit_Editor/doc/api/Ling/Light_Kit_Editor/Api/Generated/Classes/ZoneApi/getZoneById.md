[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)<br>
[Back to the Ling\Light_Kit_Editor\Api\Generated\Classes\ZoneApi class](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi.md)


ZoneApi::getZoneById
================



ZoneApi::getZoneById — Returns the zone row identified by the given id.




Description
================


public [ZoneApi::getZoneById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZoneById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the zone row identified by the given id.

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- id

    

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
See the source code for method [ZoneApi::getZoneById](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Generated/Classes/ZoneApi.php#L144-L158)


See Also
================

The [ZoneApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi.md) class.

Previous method: [fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/fetch.md)<br>Next method: [getZoneByIdentifier](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/ZoneApi/getZoneByIdentifier.md)<br>

