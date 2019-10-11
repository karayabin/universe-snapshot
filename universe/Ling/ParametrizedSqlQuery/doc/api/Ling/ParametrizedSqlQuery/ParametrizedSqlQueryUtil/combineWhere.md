[Back to the Ling/ParametrizedSqlQuery api](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery.md)<br>
[Back to the Ling\ParametrizedSqlQuery\ParametrizedSqlQueryUtil class](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil.md)


ParametrizedSqlQueryUtil::combineWhere
================



ParametrizedSqlQueryUtil::combineWhere — Combines the where fragment to inject in the sql query (depending on the configuration options), and returns it.




Description
================


protected [ParametrizedSqlQueryUtil::combineWhere](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil/combineWhere.md)(array $whereGroups) : string




Combines the where fragment to inject in the sql query (depending on the configuration options), and returns it.

Note: the returned fragment should be prefixed with WHERE 0 in order for the sql query to work.




Parameters
================


- whereGroups

    An array of tag group => sql valid where fragments


Return values
================

Returns string.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [ParametrizedSqlQueryUtil::combineWhere](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/ParametrizedSqlQueryUtil.php#L763-L858)


See Also
================

The [ParametrizedSqlQueryUtil](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil.md) class.

Previous method: [getNewMarkerName](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil/getNewMarkerName.md)<br>

