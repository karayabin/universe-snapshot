[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)<br>
[Back to the Ling\SimplePdoWrapper\Util\MysqlInfoUtil class](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md)


MysqlInfoUtil::getUniqueIndexes
================



MysqlInfoUtil::getUniqueIndexes — Returns the array of unique indexes for the given table.




Description
================


public [MysqlInfoUtil::getUniqueIndexes](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getUniqueIndexes.md)(string $table) : array




Returns the array of unique indexes for the given table.
It's an array of indexName => indexes
With indexes being an array of column names ordered by ascending index sequence.




Parameters
================


- table

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [MysqlInfoUtil::getUniqueIndexes](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/Util/MysqlInfoUtil.php#L294-L314)


See Also
================

The [MysqlInfoUtil](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md) class.

Previous method: [getRic](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getRic.md)<br>Next method: [getUniqueIndexesDetails](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getUniqueIndexesDetails.md)<br>

