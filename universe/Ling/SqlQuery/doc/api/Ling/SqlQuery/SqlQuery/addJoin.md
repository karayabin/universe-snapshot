[Back to the Ling/SqlQuery api](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery.md)<br>
[Back to the Ling\SqlQuery\SqlQuery class](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery.md)


SqlQuery::addJoin
================



SqlQuery::addJoin — Adds a join.




Description
================


public [SqlQuery::addJoin](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/addJoin.md)(string $join) : [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)




Adds a join.




Parameters
================


- join

    For instance:

     - inner join table2 t on t.id=p.product_id
     - inner join table2 t on t.id=p.product_id
       inner join table3 t2 on t2.id=h.item_id
     - ...


Return values
================

Returns [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md).








Source Code
===========
See the source code for method [SqlQuery::addJoin](https://github.com/lingtalfi/SqlQuery/blob/master/SqlQuery.php#L260-L264)


See Also
================

The [SqlQuery](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery.md) class.

Previous method: [setTable](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/setTable.md)<br>Next method: [addWhere](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQuery/addWhere.md)<br>

