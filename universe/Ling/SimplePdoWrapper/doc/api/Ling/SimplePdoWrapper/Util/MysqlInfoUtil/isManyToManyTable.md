[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)<br>
[Back to the Ling\SimplePdoWrapper\Util\MysqlInfoUtil class](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md)


MysqlInfoUtil::isManyToManyTable
================



MysqlInfoUtil::isManyToManyTable — Returns whether the given table is considered a manyToMany table.




Description
================


public [MysqlInfoUtil::isManyToManyTable](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/isManyToManyTable.md)(string $table) : bool




Returns whether the given table is considered a manyToMany table.

We consider that a table is a manyToMany only if all the columns of its primary key are foreign keys.
If there is no primary key at all, it's not a manyToMany table.




Parameters
================


- table

    


Return values
================

Returns bool.








Source Code
===========
See the source code for method [MysqlInfoUtil::isManyToManyTable](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/Util/MysqlInfoUtil.php#L875-L888)


See Also
================

The [MysqlInfoUtil](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md) class.

Previous method: [isHasTable](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/isHasTable.md)<br>Next method: [dQuoteTable](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/dQuoteTable.md)<br>

