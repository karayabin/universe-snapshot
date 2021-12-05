[Back to the Ling/SqlFiddler api](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler.md)<br>
[Back to the Ling\SqlFiddler\SqlFiddlerUtil class](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil.md)


SqlFiddlerUtil::getPageLength
================



SqlFiddlerUtil::getPageLength — Returns the "page length" to insert in your query.




Description
================


public [SqlFiddlerUtil::getPageLength](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil/getPageLength.md)(?string $userPageLength = null) : int




Returns the "page length" to insert in your query.

In Mysql, this corresponds to the row_count component of the limit clause.

If userPageLength is null, the "_default" value from the pageLength map is returned.

Throws an exception if no value matches the given userPageLength.




Parameters
================


- userPageLength

    


Return values
================

Returns int.








Source Code
===========
See the source code for method [SqlFiddlerUtil::getPageLength](https://github.com/lingtalfi/SqlFiddler/blob/master/SqlFiddlerUtil.php#L258-L267)


See Also
================

The [SqlFiddlerUtil](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil.md) class.

Previous method: [getPageOffset](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil/getPageOffset.md)<br>Next method: [fetchAllCount](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil/fetchAllCount.md)<br>

