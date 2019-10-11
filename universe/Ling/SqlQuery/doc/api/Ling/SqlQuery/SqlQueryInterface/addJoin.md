[Back to the Ling/SqlQuery api](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery.md)<br>
[Back to the Ling\SqlQuery\SqlQueryInterface class](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)


SqlQueryInterface::addJoin
================



SqlQueryInterface::addJoin — Adds a join.




Description
================


abstract public [SqlQueryInterface::addJoin](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/addJoin.md)(string $join) : [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)




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
See the source code for method [SqlQueryInterface::addJoin](https://github.com/lingtalfi/SqlQuery/blob/master/SqlQueryInterface.php#L84-L84)


See Also
================

The [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md) class.

Previous method: [setTable](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/setTable.md)<br>Next method: [addWhere](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/addWhere.md)<br>

