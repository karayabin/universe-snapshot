[Back to the Ling/SqlQuery api](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery.md)<br>
[Back to the Ling\SqlQuery\SqlQueryInterface class](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)


SqlQueryInterface::setHavingGroupType
================



SqlQueryInterface::setHavingGroupType — Sets the having group type for a given having group.




Description
================


abstract public [SqlQueryInterface::setHavingGroupType](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/setHavingGroupType.md)(string $groupName, string $groupType) : [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)




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
See the source code for method [SqlQueryInterface::setHavingGroupType](https://github.com/lingtalfi/SqlQuery/blob/master/SqlQueryInterface.php#L149-L149)


See Also
================

The [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md) class.

Previous method: [addHaving](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/addHaving.md)<br>Next method: [addGroupBy](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/addGroupBy.md)<br>

