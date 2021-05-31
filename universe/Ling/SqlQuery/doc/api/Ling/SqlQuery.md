Ling/SqlQuery
================
2019-10-10 --> 2021-05-31




Table of contents
===========

- [SqlQueryException](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/Exception/SqlQueryException.md) &ndash; The SqlQueryException class.
- [SqlQuery](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery.md) &ndash; The SqlQuery class.
    - [SqlQuery::__construct](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/__construct.md) &ndash; Builds the SqlQuery instance.
    - [SqlQuery::create](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/create.md) &ndash; Returns an instance of this class.
    - [SqlQuery::getSqlQuery](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/getSqlQuery.md) &ndash; Returns the sql query string.
    - [SqlQuery::getCountSqlQuery](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/getCountSqlQuery.md) &ndash; Returns the count sql query string.
    - [SqlQuery::getMarkers](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/getMarkers.md) &ndash; Returns an array of marker => value.
    - [SqlQuery::getLimit](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/getLimit.md) &ndash; Returns the limit array: [offset, length], or null if not set.
    - [SqlQuery::addField](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/addField.md) &ndash; Adds a field.
    - [SqlQuery::setTable](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/setTable.md) &ndash; Sets the table.
    - [SqlQuery::addJoin](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/addJoin.md) &ndash; Adds a join.
    - [SqlQuery::addWhere](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/addWhere.md) &ndash; Adds a where item.
    - [SqlQuery::addOrderBy](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/addOrderBy.md) &ndash; Adds an order by item.
    - [SqlQuery::setLimit](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/setLimit.md) &ndash; The setLimit method
    - [SqlQuery::addMarker](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/addMarker.md) &ndash; Adds a pdo style marker.
    - [SqlQuery::addMarkers](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/addMarkers.md) &ndash; Adds markers.
    - [SqlQuery::addHaving](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/addHaving.md) &ndash; Adds an having item.
    - [SqlQuery::setHavingGroupType](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/setHavingGroupType.md) &ndash; Sets the having group type for a given having group.
    - [SqlQuery::addGroupBy](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/addGroupBy.md) &ndash; Adds a group by item.
    - [SqlQuery::setGroupBy](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/setGroupBy.md) &ndash; Sets the group by array.
    - [SqlQuery::__toString](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/__toString.md) &ndash; Returns the string version of this instance.
    - [SqlQuery::setDefaultWhereValue](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/setDefaultWhereValue.md) &ndash; Sets the defaultWhereValue.
- [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md) &ndash; The SqlQueryInterface interface.
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
    - [SqlQueryInterface::setLimit](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/setLimit.md) &ndash; The setLimit method
    - [SqlQueryInterface::addMarker](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/addMarker.md) &ndash; Adds a pdo style marker.
    - [SqlQueryInterface::addMarkers](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/addMarkers.md) &ndash; Adds markers.
    - [SqlQueryInterface::__toString](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/__toString.md) &ndash; Returns the string version of this instance.




