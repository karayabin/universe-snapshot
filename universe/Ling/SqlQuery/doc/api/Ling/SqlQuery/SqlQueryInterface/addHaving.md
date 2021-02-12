[Back to the Ling/SqlQuery api](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery.md)<br>
[Back to the Ling\SqlQuery\SqlQueryInterface class](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)


SqlQueryInterface::addHaving
================



SqlQueryInterface::addHaving — Adds an having item.




Description
================


abstract public [SqlQueryInterface::addHaving](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/addHaving.md)(string $having, ?string $groupName = null) : [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)




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
See the source code for method [SqlQueryInterface::addHaving](https://github.com/lingtalfi/SqlQuery/blob/master/SqlQueryInterface.php#L129-L129)


See Also
================

The [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md) class.

Previous method: [addWhere](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/addWhere.md)<br>Next method: [setHavingGroupType](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/setHavingGroupType.md)<br>

