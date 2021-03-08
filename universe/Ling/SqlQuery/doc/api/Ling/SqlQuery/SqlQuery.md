[Back to the Ling/SqlQuery api](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery.md)



The SqlQuery class
================
2019-10-10 --> 2021-03-05






Introduction
============

The SqlQuery class.



Class synopsis
==============


class <span class="pl-k">SqlQuery</span> implements [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md), [\Stringable](https://wiki.php.net/rfc/stringable) {

- Properties
    - private array [$fields](#property-fields) ;
    - private string [$table](#property-table) ;
    - private array [$joins](#property-joins) ;
    - private array [$where](#property-where) ;
    - private array [$groupBy](#property-groupBy) ;
    - private array [$having](#property-having) ;
    - private array [$havingGroups](#property-havingGroups) ;
    - private array [$havingGroupTypes](#property-havingGroupTypes) ;
    - private array [$orderBy](#property-orderBy) ;
    - private array [$limit](#property-limit) ;
    - private array [$markers](#property-markers) ;
    - private string [$defaultWhereValue](#property-defaultWhereValue) ;
    - private string [$_query](#property-_query) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/__construct.md)() : void
    - public static [create](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/create.md)() : [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)
    - public [getSqlQuery](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/getSqlQuery.md)() : string
    - public [getCountSqlQuery](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/getCountSqlQuery.md)() : string
    - public [getMarkers](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/getMarkers.md)() : array
    - public [getLimit](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/getLimit.md)() : array | null
    - public [addField](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/addField.md)(string $field) : [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)
    - public [setTable](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/setTable.md)(string $table) : [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)
    - public [addJoin](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/addJoin.md)(string $join) : [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)
    - public [addWhere](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/addWhere.md)(string $where) : [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)
    - public [addOrderBy](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/addOrderBy.md)(string $orderBy, string $direction) : [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)
    - public [setLimit](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/setLimit.md)(int $offset, int $length) : [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)
    - public [addMarker](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/addMarker.md)(string $key, string $value) : [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)
    - public [addMarkers](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/addMarkers.md)(array $markers) : [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)
    - public [addHaving](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/addHaving.md)(string $having, ?string $groupName = null) : [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)
    - public [setHavingGroupType](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/setHavingGroupType.md)(string $groupName, string $groupType) : [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)
    - public [addGroupBy](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/addGroupBy.md)(string $groupBy) : [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)
    - public [setGroupBy](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/setGroupBy.md)(array $groupBys) : [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)
    - public [__toString](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/__toString.md)() : string
    - public [setDefaultWhereValue](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/setDefaultWhereValue.md)(string $defaultWhereValue) : void
    - protected [error](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/error.md)(string $msg) : void
    - private [getBaseRequest](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/getBaseRequest.md)(?$isCount = true) : string

}




Properties
=============

- <span id="property-fields"><b>fields</b></span>

    This property holds the fields for this instance.
    It's an array of strings, for instance:
    
         - pseudo
         - a.pseudo
         - a.pseudo, a.email, b.type
    
    

- <span id="property-table"><b>table</b></span>

    This property holds the table for this instance.
    You can add your aliases too if you want, for instance
         - ek_user
         - ek_user u
    
    

- <span id="property-joins"><b>joins</b></span>

    This property holds the joins for this instance.
    It's an array of strings, for instance:
    
         - inner join table2 t on t.id=p.product_id
    
         -   inner join table2 t on t.id=p.product_id
             inner join table3 t2 on t2.id=h.item_id
    
    

- <span id="property-where"><b>where</b></span>

    This property holds the where for this instance.
    It's an array of strings.
    
    

- <span id="property-groupBy"><b>groupBy</b></span>

    This property holds the array of groupBy items.
    
    

- <span id="property-having"><b>having</b></span>

    This property holds the array of having items for this instance.
    
    

- <span id="property-havingGroups"><b>havingGroups</b></span>

    This property holds the havingGroups for this instance.
    
    

- <span id="property-havingGroupTypes"><b>havingGroupTypes</b></span>

    This property holds the array of having group types for this instance.
    It's an array of having group type => having group name.
    
    

- <span id="property-orderBy"><b>orderBy</b></span>

    This property holds the orderBy for this instance.
    It's an array of [$field, $dir] items
    
    Where:
     - $field is the name of a column
     - $dir is either asc or desc
    
    

- <span id="property-limit"><b>limit</b></span>

    This property holds the limit for this instance.
    It's the array: [offset, length]
    
    

- <span id="property-markers"><b>markers</b></span>

    This property holds the markers for this instance.
    It's an array of marker => value
    
    

- <span id="property-defaultWhereValue"><b>defaultWhereValue</b></span>

    The default value to add next to the where keyword.
    
    Some systems, like phpMyAdmin at some point in time, used a default value of 1 (0 is also possible),
    then allowing you to have consistent where blocks all starting with AND.
    
    For instance:
    
    - where 1
         - and pseudo='michel'
         - and (pseudo='michel' or e.country_id=6)
         - ...
    
    
    When I first created SqlQuery, I used a similar system in my apps, and therefore the default value is 1.
    
    Change it to 0, or empty string if you want.
    
    

- <span id="property-_query"><b>_query</b></span>

    a simple internal cache for the query,
    note that once getSqlQuery is requested,
    it will be frozen...
    
    



Methods
==============

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
- [SqlQuery::setLimit](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/setLimit.md) &ndash; 
- [SqlQuery::addMarker](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/addMarker.md) &ndash; Adds a pdo style marker.
- [SqlQuery::addMarkers](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/addMarkers.md) &ndash; Adds markers.
- [SqlQuery::addHaving](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/addHaving.md) &ndash; Adds an having item.
- [SqlQuery::setHavingGroupType](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/setHavingGroupType.md) &ndash; Sets the having group type for a given having group.
- [SqlQuery::addGroupBy](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/addGroupBy.md) &ndash; Adds a group by item.
- [SqlQuery::setGroupBy](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/setGroupBy.md) &ndash; Sets the group by array.
- [SqlQuery::__toString](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/__toString.md) &ndash; Returns the string version of this instance.
- [SqlQuery::setDefaultWhereValue](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/setDefaultWhereValue.md) &ndash; Sets the defaultWhereValue.
- [SqlQuery::error](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/error.md) &ndash; Throws an exception.
- [SqlQuery::getBaseRequest](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/getBaseRequest.md) &ndash; Returns the base request.





Location
=============
Ling\SqlQuery\SqlQuery<br>
See the source code of [Ling\SqlQuery\SqlQuery](https://github.com/lingtalfi/SqlQuery/blob/master/SqlQuery.php)



SeeAlso
==============
Previous class: [SqlQueryException](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/Exception/SqlQueryException.md)<br>Next class: [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)<br>
