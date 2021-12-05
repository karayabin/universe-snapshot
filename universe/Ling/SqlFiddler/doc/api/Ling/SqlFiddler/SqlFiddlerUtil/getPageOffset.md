[Back to the Ling/SqlFiddler api](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler.md)<br>
[Back to the Ling\SqlFiddler\SqlFiddlerUtil class](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil.md)


SqlFiddlerUtil::getPageOffset
================



SqlFiddlerUtil::getPageOffset — Returns the page offset to insert in your query.




Description
================


public [SqlFiddlerUtil::getPageOffset](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil/getPageOffset.md)(int $userPage, int $pageLength) : int




Returns the page offset to insert in your query.

In Mysql, this corresponds to the offset component of the limit clause.

If the given page is null, 0 is returned by default.
Otherwise, it returns the given page number minus 1.

If the result is below 0, it returns 0.




Parameters
================


- userPage

    

- pageLength

    


Return values
================

Returns int.








Source Code
===========
See the source code for method [SqlFiddlerUtil::getPageOffset](https://github.com/lingtalfi/SqlFiddler/blob/master/SqlFiddlerUtil.php#L233-L242)


See Also
================

The [SqlFiddlerUtil](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil.md) class.

Previous method: [getOrderBy](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil/getOrderBy.md)<br>Next method: [getPageLength](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil/getPageLength.md)<br>

