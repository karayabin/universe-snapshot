[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)<br>
[Back to the Ling\SimplePdoWrapper\Util\MysqlInfoUtil class](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md)


MysqlInfoUtil::splitTableName
================



MysqlInfoUtil::splitTableName — or just be a single table name.




Description
================


private [MysqlInfoUtil::splitTableName](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/splitTableName.md)(string $table) : array




Returns an array with the following info:
- database: string
- table: string

Those information are extracted from the given table name, which might use the db.table notation,
or just be a single table name. In case of a single table name, the database returned is the current database.




Parameters
================


- table

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [MysqlInfoUtil::splitTableName](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/Util/MysqlInfoUtil.php#L704-L715)


See Also
================

The [MysqlInfoUtil](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md) class.

Previous method: [dQuoteTable](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/dQuoteTable.md)<br>Next method: [getNaturalHandle](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getNaturalHandle.md)<br>

