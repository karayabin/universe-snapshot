[Back to the Ling/SqlQuery api](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery.md)<br>
[Back to the Ling\SqlQuery\SqlQueryInterface class](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)


SqlQueryInterface::addWhere
================



SqlQueryInterface::addWhere — Adds a where item.




Description
================


abstract public [SqlQueryInterface::addWhere](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/addWhere.md)(string $where) : [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md)




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
See the source code for method [SqlQueryInterface::addWhere](https://github.com/lingtalfi/SqlQuery/blob/master/SqlQueryInterface.php#L102-L102)


See Also
================

The [SqlQueryInterface](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface.md) class.

Previous method: [addJoin](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/addJoin.md)<br>Next method: [addHaving](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery/SqlQueryInterface/addHaving.md)<br>

