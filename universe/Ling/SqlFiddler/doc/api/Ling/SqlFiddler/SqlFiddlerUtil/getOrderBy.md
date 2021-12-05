[Back to the Ling/SqlFiddler api](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler.md)<br>
[Back to the Ling\SqlFiddler\SqlFiddlerUtil class](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil.md)


SqlFiddlerUtil::getOrderBy
================



SqlFiddlerUtil::getOrderBy — Returns the "order by" snippet to insert in your query.




Description
================


public [SqlFiddlerUtil::getOrderBy](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil/getOrderBy.md)(string $userChoice, ?string $default = _default, ?bool $throwEx = false) : string




Returns the "order by" snippet to insert in your query.

If the userChoice is not found in the orderByMap, we use the given default choice, or we throw an exception if the throwEx flag is raised.




Parameters
================


- userChoice

    

- default

    

- throwEx

    


Return values
================

Returns string.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [SqlFiddlerUtil::getOrderBy](https://github.com/lingtalfi/SqlFiddler/blob/master/SqlFiddlerUtil.php#L205-L215)


See Also
================

The [SqlFiddlerUtil](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil.md) class.

Previous method: [getSearchExpression](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil/getSearchExpression.md)<br>Next method: [getPageOffset](https://github.com/lingtalfi/SqlFiddler/blob/master/doc/api/Ling/SqlFiddler/SqlFiddlerUtil/getPageOffset.md)<br>

