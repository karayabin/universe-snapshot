[Back to the Ling/ParametrizedSqlQuery api](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery.md)<br>
[Back to the Ling\ParametrizedSqlQuery\ParametrizedSqlQueryUtil class](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil.md)


ParametrizedSqlQueryUtil::prepareExpression
================



ParametrizedSqlQueryUtil::prepareExpression — and stores the markers (if any) in the _markers array.




Description
================


protected [ParametrizedSqlQueryUtil::prepareExpression](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil/prepareExpression.md)(string $expr, string $tagName, array $tagVariables, array $tagOptions) : string




Returns the sql expression to inject in a sql query,
and stores the markers (if any) in the _markers array.

This method also:
- resolves the $variables
- resolves the inner marker notation




Parameters
================


- expr

    

- tagName

    

- tagVariables

    

- tagOptions

    


Return values
================

Returns string.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [ParametrizedSqlQueryUtil::prepareExpression](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/ParametrizedSqlQueryUtil.php#L419-L551)


See Also
================

The [ParametrizedSqlQueryUtil](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil.md) class.

Previous method: [error](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil/error.md)<br>Next method: [resolveInternalMarkerPercent](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil/resolveInternalMarkerPercent.md)<br>

