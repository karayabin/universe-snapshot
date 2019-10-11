[Back to the Ling/SqlQuery api](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery.md)<br>
[Back to the Ling\SqlQuery\SqlQuery class](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery.md)


SqlQuery::addHaving
================



SqlQuery::addHaving — Adds an having item.




Description
================


public [SqlQuery::addHaving](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/addHaving.md)(string $having, string $groupName = null) : [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)




Adds an having item.




Parameters
================


- having

    The having clause, without the having keyword,
     for instance:
     - sale_price between 10 and 250

- groupName

    You can define a having group or not.
If you define a group, then all having statements inside of it will be combined using rules defined by
the group type, which defaults to "orAnd" (see setHavingGroupType method for more info).
To set the group type use the setHavingGroupType method.

If you don't define a group, then all having statements without a group will be combine as a virtual
group.
This virtual groups is always the first to be written,
and then it is followed by user defined groups to form the final having clause.


Return values
================

Returns [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md).








Source Code
===========
See the source code for method [SqlQuery::addHaving](https://github.com/lingtalfi/SqlQuery/blob/master/SqlQuery.php#L316-L324)


See Also
================

The [SqlQuery](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery.md) class.

Previous method: [addMarkers](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/addMarkers.md)<br>Next method: [setHavingGroupType](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/setHavingGroupType.md)<br>

