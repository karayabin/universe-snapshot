[Back to the Ling/SqlFiddler api](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler.md)<br>
[Back to the Ling\SqlFiddler\SqlFiddlerUtil class](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil.md)


SqlFiddlerUtil::getOrderByInfo
================



SqlFiddlerUtil::getOrderByInfo — Returns an array of information related to the orderBy field.




Description
================


public [SqlFiddlerUtil::getOrderByInfo](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil/getOrderByInfo.md)(string $desiredOrderBy) : array




Returns an array of information related to the orderBy field.
The returned array contains the following:
- query: string, the orderBy clause (without the "order by" keyword) to insert in your sql query
- publicMap: array, an array of orderBy key => label, to use in a select on the front website for instance
- real: string, the "order by" key really used by the query (since the user might provide an unexpected value).
     Note: if the user provides a value that doesn't exist in the orderByMap, we use the "_default" orderby key
     by default.




Parameters
================


- desiredOrderBy

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [SqlFiddlerUtil::getOrderByInfo](https://github.com/lingtalfi/SqlFiddler/blob/master/SqlFiddlerUtil.php#L431-L449)


See Also
================

The [SqlFiddlerUtil](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil.md) class.

Previous method: [fetchAllCountInfo](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil/fetchAllCountInfo.md)<br>

