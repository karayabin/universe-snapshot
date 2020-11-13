[Back to the Ling/ParametrizedSqlQuery api](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery.md)<br>
[Back to the Ling\ParametrizedSqlQuery\ParametrizedSqlQueryUtil class](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil.md)


ParametrizedSqlQueryUtil::resolveInternalMarkerPercent
================



ParametrizedSqlQueryUtil::resolveInternalMarkerPercent — Resolves the percent symbol in internal marker notation, and returns the result.




Description
================


protected [ParametrizedSqlQueryUtil::resolveInternalMarkerPercent](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil/resolveInternalMarkerPercent.md)(string $internalMarkerName, $value, array $tagOptions) : string




Resolves the percent symbol in internal marker notation, and returns the result.
It returns an array with the following entries:

- 0: the sql marker name
- 1: the value to bind to that marker




Parameters
================


- internalMarkerName

    The internal marker without the colon prefix.

- value

    The marker value

- tagOptions

    


Return values
================

Returns string.








Source Code
===========
See the source code for method [ParametrizedSqlQueryUtil::resolveInternalMarkerPercent](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/ParametrizedSqlQueryUtil.php#L624-L651)


See Also
================

The [ParametrizedSqlQueryUtil](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil.md) class.

Previous method: [prepareExpression](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil/prepareExpression.md)<br>Next method: [applyOperatorAndValueRoutine](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil/applyOperatorAndValueRoutine.md)<br>

