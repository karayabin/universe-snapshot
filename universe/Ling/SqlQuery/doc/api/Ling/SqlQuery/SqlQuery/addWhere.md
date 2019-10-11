[Back to the Ling/SqlQuery api](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery.md)<br>
[Back to the Ling\SqlQuery\SqlQuery class](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery.md)


SqlQuery::addWhere
================



SqlQuery::addWhere — Adds a where item.




Description
================


public [SqlQuery::addWhere](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/addWhere.md)(string $where) : [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)




Adds a where item.




Parameters
================


- where

    Never include the where keyword, but always
     start with and or or (the concrete class must prefix your clause with
     where 1).


     For instance:

     - and pseudo='michel'
     - and (pseudo='michel' or e.country_id=6)


Return values
================

Returns [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md).








Source Code
===========
See the source code for method [SqlQuery::addWhere](https://github.com/lingtalfi/SqlQuery/blob/master/SqlQuery.php#L269-L273)


See Also
================

The [SqlQuery](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery.md) class.

Previous method: [addJoin](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/addJoin.md)<br>Next method: [addOrderBy](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/addOrderBy.md)<br>

