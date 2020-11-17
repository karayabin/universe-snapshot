[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)<br>
[Back to the Ling\SimplePdoWrapper\Util\MysqlInfoUtil class](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md)


MysqlInfoUtil::getUniqueIndexesDetails
================



MysqlInfoUtil::getUniqueIndexesDetails — Returns an information array about the unique indexes of the given table.




Description
================


public [MysqlInfoUtil::getUniqueIndexesDetails](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getUniqueIndexesDetails.md)(string $table) : array




Returns an information array about the unique indexes of the given table.
It's an array of indexName => indexDetails
The indexDetails item are ordered by ascending index number.
Each indexDetails item has the following structure:
     - colName: the name of the column
     - ascDesc: null | ASC | DESC, the direction of the unique index column.




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
See the source code for method [MysqlInfoUtil::getUniqueIndexesDetails](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/Util/MysqlInfoUtil.php#L371-L374)


See Also
================

The [MysqlInfoUtil](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md) class.

Previous method: [getUniqueIndexes](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getUniqueIndexes.md)<br>Next method: [getIndexesDetails](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getIndexesDetails.md)<br>

