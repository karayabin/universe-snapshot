[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)<br>
[Back to the Ling\SimplePdoWrapper\Util\MysqlInfoUtil class](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md)


MysqlInfoUtil::getPotentialTablePrefixes
================



MysqlInfoUtil::getPotentialTablePrefixes — Returns an array containing the potential table prefixes.




Description
================


public [MysqlInfoUtil::getPotentialTablePrefixes](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getPotentialTablePrefixes.md)() : array




Returns an array containing the potential table prefixes.
A prefix is just the string before the first underscore if any.
So for instance if the table name is lud_user, then the prefix is lud.




Parameters
================

This method has no parameters.


Return values
================

Returns array.








Source Code
===========
See the source code for method [MysqlInfoUtil::getPotentialTablePrefixes](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/Util/MysqlInfoUtil.php#L153-L164)


See Also
================

The [MysqlInfoUtil](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md) class.

Previous method: [getTables](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getTables.md)<br>Next method: [hasTable](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/hasTable.md)<br>

