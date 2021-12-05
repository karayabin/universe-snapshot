[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)<br>
[Back to the Ling\SimplePdoWrapper\Util\MysqlInfoUtil class](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md)


MysqlInfoUtil::isHasTable
================



MysqlInfoUtil::isHasTable — Returns whether the given table is a **has** table, based on the table name.




Description
================


public [MysqlInfoUtil::isHasTable](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/isHasTable.md)(string $table, ?array $options = []) : bool




Returns whether the given table is a **has** table, based on the table name.
See more details in [the conception notes about has table information](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/pages/conception-notes.md#the-has-table-information).

The available options are:
- hasKeywords: array of potential has keywords. Defaults to an array containing the "has" keyword.




Parameters
================


- table

    

- options

    


Return values
================

Returns bool.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [MysqlInfoUtil::isHasTable](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/Util/MysqlInfoUtil.php#L845-L861)


See Also
================

The [MysqlInfoUtil](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md) class.

Previous method: [getHasItems](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getHasItems.md)<br>Next method: [isManyToManyTable](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/isManyToManyTable.md)<br>

