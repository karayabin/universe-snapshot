[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)<br>
[Back to the Ling\Light_Kit_Editor\Api\Generated\Interfaces\PageHasZoneApiInterface class](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface.md)


PageHasZoneApiInterface::getPageHasZoneByPageIdAndZoneId
================



PageHasZoneApiInterface::getPageHasZoneByPageIdAndZoneId — Returns the page has zone row identified by the given page_id and zone_id.




Description
================


abstract public [PageHasZoneApiInterface::getPageHasZoneByPageIdAndZoneId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/getPageHasZoneByPageIdAndZoneId.md)(int $page_id, int $zone_id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the page has zone row identified by the given page_id and zone_id.

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- page_id

    

- zone_id

    

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
See the source code for method [PageHasZoneApiInterface::getPageHasZoneByPageIdAndZoneId](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Generated/Interfaces/PageHasZoneApiInterface.php#L96-L96)


See Also
================

The [PageHasZoneApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface.md) class.

Previous method: [fetch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/fetch.md)<br>Next method: [getPageHasZone](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/getPageHasZone.md)<br>

