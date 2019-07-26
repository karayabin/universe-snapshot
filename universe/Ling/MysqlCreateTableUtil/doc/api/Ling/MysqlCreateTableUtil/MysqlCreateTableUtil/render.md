[Back to the Ling/MysqlCreateTableUtil api](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil.md)<br>
[Back to the Ling\MysqlCreateTableUtil\MysqlCreateTableUtil class](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil.md)


MysqlCreateTableUtil::render
================



MysqlCreateTableUtil::render — Returns the create table statement for this instance.




Description
================


public [MysqlCreateTableUtil::render](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil/render.md)() : string




Returns the create table statement for this instance.

Note: the statement is based on my observation of the MysqlWorkBench utility.
So for instance, when you create a foreign key, it also creates an index.




Parameters
================

This method has no parameters.


Return values
================

Returns string.


Exceptions thrown
================

- [MysqlCreateTableUtilException](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Exception/MysqlCreateTableUtilException.md).&nbsp;







Source Code
===========
See the source code for method [MysqlCreateTableUtil::render](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/MysqlCreateTableUtil.php#L143-L335)


See Also
================

The [MysqlCreateTableUtil](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil.md) class.

Previous method: [addColumn](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil/addColumn.md)<br>Next method: [checkColumn](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil/checkColumn.md)<br>

