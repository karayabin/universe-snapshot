[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)<br>
[Back to the Ling\Light_Kit_Editor\Api\Generated\Interfaces\PageHasZoneApiInterface class](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface.md)


PageHasZoneApiInterface::insertPageHasZones
================



PageHasZoneApiInterface::insertPageHasZones — Inserts the given page has zone rows in the database.




Description
================


abstract public [PageHasZoneApiInterface::insertPageHasZones](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/insertPageHasZones.md)(array $pageHasZones, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




Inserts the given page has zone rows in the database.
By default, it returns an array of the result of the PDO::lastInsertId method for each insert.
If the returnRic flag is set to true, the method will return an array of the ric array (for each insert) instead of the lastInsertId.


If the rows you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the return of the method is not affected
- if false, the error will not be caught, and depending on your configuration, it might either
         trigger an exception, or fail silently in which case this method returns false.




Parameters
================


- pageHasZones

    

- ignoreDuplicate

    

- returnRic

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [PageHasZoneApiInterface::insertPageHasZones](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Generated/Interfaces/PageHasZoneApiInterface.php#L57-L57)


See Also
================

The [PageHasZoneApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface.md) class.

Previous method: [insertPageHasZone](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/insertPageHasZone.md)<br>Next method: [fetchAll](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Interfaces/PageHasZoneApiInterface/fetchAll.md)<br>

