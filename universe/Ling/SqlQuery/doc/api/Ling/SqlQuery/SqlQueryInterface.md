[Back to the Ling/SqlQuery api](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery.md)



The SqlQueryInterface class
================
2019-10-10 --> 2020-12-08






Introduction
============

The SqlQueryInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">SqlQueryInterface</span>  {

- Methods
    - abstract public [getSqlQuery](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/getSqlQuery.md)() : string
    - abstract public [getCountSqlQuery](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/getCountSqlQuery.md)() : string
    - abstract public [getMarkers](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/getMarkers.md)() : array
    - abstract public [getLimit](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/getLimit.md)() : array | null
    - abstract public [addField](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/addField.md)(string $field) : [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)
    - abstract public [setTable](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/setTable.md)(string $table) : [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)
    - abstract public [addJoin](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/addJoin.md)(string $join) : [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)
    - abstract public [addWhere](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/addWhere.md)(string $where) : [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)
    - abstract public [addHaving](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/addHaving.md)(string $having, ?string $groupName = null) : [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)
    - abstract public [setHavingGroupType](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/setHavingGroupType.md)(string $groupName, string $groupType) : [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)
    - abstract public [addGroupBy](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/addGroupBy.md)(string $groupBy) : [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)
    - abstract public [setGroupBy](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/setGroupBy.md)(array $groupBys) : [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)
    - abstract public [addOrderBy](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/addOrderBy.md)(string $orderBy, string $direction) : [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)
    - abstract public [setLimit](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/setLimit.md)(int $offset, int $length) : [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)
    - abstract public [addMarker](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/addMarker.md)(string $key, string $value) : [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)
    - abstract public [addMarkers](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/addMarkers.md)(array $markers) : [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)
    - abstract public [__toString](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/__toString.md)() : string

}






Methods
==============

- [SqlQueryInterface::getSqlQuery](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/getSqlQuery.md) &ndash; Returns the sql query string.
- [SqlQueryInterface::getCountSqlQuery](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/getCountSqlQuery.md) &ndash; Returns the count sql query string.
- [SqlQueryInterface::getMarkers](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/getMarkers.md) &ndash; Returns an array of marker => value.
- [SqlQueryInterface::getLimit](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/getLimit.md) &ndash; Returns the limit array: [offset, length], or null if not set.
- [SqlQueryInterface::addField](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/addField.md) &ndash; Adds a field.
- [SqlQueryInterface::setTable](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/setTable.md) &ndash; Sets the table.
- [SqlQueryInterface::addJoin](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/addJoin.md) &ndash; Adds a join.
- [SqlQueryInterface::addWhere](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/addWhere.md) &ndash; Adds a where item.
- [SqlQueryInterface::addHaving](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/addHaving.md) &ndash; Adds an having item.
- [SqlQueryInterface::setHavingGroupType](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/setHavingGroupType.md) &ndash; Sets the having group type for a given having group.
- [SqlQueryInterface::addGroupBy](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/addGroupBy.md) &ndash; Adds a group by item.
- [SqlQueryInterface::setGroupBy](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/setGroupBy.md) &ndash; Sets the group by array.
- [SqlQueryInterface::addOrderBy](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/addOrderBy.md) &ndash; Adds an order by item.
- [SqlQueryInterface::setLimit](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/setLimit.md) &ndash; 
- [SqlQueryInterface::addMarker](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/addMarker.md) &ndash; Adds a pdo style marker.
- [SqlQueryInterface::addMarkers](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/addMarkers.md) &ndash; Adds markers.
- [SqlQueryInterface::__toString](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/__toString.md) &ndash; Returns the string version of this instance.





Location
=============
Ling\SqlQuery\SqlQueryInterface<br>
See the source code of [Ling\SqlQuery\SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/SqlQueryInterface.php)



SeeAlso
==============
Previous class: [SqlQuery](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery.md)<br>
