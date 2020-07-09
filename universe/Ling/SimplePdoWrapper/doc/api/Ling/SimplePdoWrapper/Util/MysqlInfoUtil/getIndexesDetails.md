[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)<br>
[Back to the Ling\SimplePdoWrapper\Util\MysqlInfoUtil class](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md)


MysqlInfoUtil::getIndexesDetails
================



MysqlInfoUtil::getIndexesDetails — Returns an information array about the regular indexes (i.e.




Description
================


public [MysqlInfoUtil::getIndexesDetails](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getIndexesDetails.md)(string $table, ?array $options = []) : array




Returns an information array about the regular indexes (i.e. not unique, and not the index for the primary key) of the given table.

It's an array of indexName => indexDetails
The indexDetails item are ordered by ascending index number.
Each indexDetails item has the following structure:
     - colName: the name of the column
     - ascDesc: null | ASC | DESC, the direction of the index column.



The available options are:

- unique: bool=false. If true, the method returns info about the unique indexes only.




Parameters
================


- table

    

- options

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [MysqlInfoUtil::getIndexesDetails](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/Util/MysqlInfoUtil.php#L361-L410)


See Also
================

The [MysqlInfoUtil](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md) class.

Previous method: [getUniqueIndexesDetails](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getUniqueIndexesDetails.md)<br>Next method: [getColumnTypes](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getColumnTypes.md)<br>

