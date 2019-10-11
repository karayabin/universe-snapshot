[Back to the Ling/SqlQuery api](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery.md)<br>
[Back to the Ling\SqlQuery\SqlQuery class](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery.md)


SqlQuery::setHavingGroupType
================



SqlQuery::setHavingGroupType — Sets the having group type for a given having group.




Description
================


public [SqlQuery::setHavingGroupType](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/setHavingGroupType.md)(string $groupName, string $groupType) : [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)




Sets the having group type for a given having group.

The available types are:

- orAnd:
     it will be combined with the previous having group (if any) using the "or" keyword.
     Then all inner statements are combined using the "and" keyword.
- andOr:
     it will be combined with the previous having group (if any) using the "and" keyword.
     Then all inner statements are combined using the "or" keyword.




Parameters
================


- groupName

    

- groupType

    


Return values
================

Returns [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md).








Source Code
===========
See the source code for method [SqlQuery::setHavingGroupType](https://github.com/lingtalfi/SqlQuery/blob/master/SqlQuery.php#L330-L334)


See Also
================

The [SqlQuery](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery.md) class.

Previous method: [addHaving](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/addHaving.md)<br>Next method: [addGroupBy](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/addGroupBy.md)<br>

