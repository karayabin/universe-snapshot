[Back to the Ling/SqlFiddler api](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler.md)<br>
[Back to the Ling\SqlFiddler\SqlFiddlerUtil class](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil.md)


SqlFiddlerUtil::getSearchExpression
================



SqlFiddlerUtil::getSearchExpression — Returns the "search" snippet to insert in your query.




Description
================


public [SqlFiddlerUtil::getSearchExpression](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil/getSearchExpression.md)(?string $userExpression = null, ?array &$markers = []) : string




Returns the "search" snippet to insert in your query.

If the user expression is null (or empty string when trimmed), 1 is returned by default, so that you can do "WHERE 1" in your query.

The markers array is filled with the appropriate marker that you defined when calling the setSearchExpression method.




Parameters
================


- userExpression

    

- markers

    


Return values
================

Returns string.








Source Code
===========
See the source code for method [SqlFiddlerUtil::getSearchExpression](https://github.com/lingtalfi/SqlFiddler/blob/master/SqlFiddlerUtil.php#L155-L190)


See Also
================

The [SqlFiddlerUtil](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil.md) class.

Previous method: [setPageLengthMap](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil/setPageLengthMap.md)<br>Next method: [getOrderBy](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil/getOrderBy.md)<br>

