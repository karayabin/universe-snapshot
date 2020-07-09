[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)<br>
[Back to the Ling\SimplePdoWrapper\Util\MysqlInfoUtil class](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md)


MysqlInfoUtil::getColumnTypes
================



MysqlInfoUtil::getColumnTypes — Returns an array of columnName => type.




Description
================


public [MysqlInfoUtil::getColumnTypes](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getColumnTypes.md)(string $table, ?bool $precision = false) : array




Returns an array of columnName => type.

The type is the string returned by mysql (such as int(11) or varchar(128) for instance).
If the precision tag is set to false, then the information in parenthesis is dropped.




Parameters
================


- table

    

- precision

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [MysqlInfoUtil::getColumnTypes](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/Util/MysqlInfoUtil.php#L426-L442)


See Also
================

The [MysqlInfoUtil](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md) class.

Previous method: [getIndexesDetails](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getIndexesDetails.md)<br>Next method: [getColumnNullabilities](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getColumnNullabilities.md)<br>

