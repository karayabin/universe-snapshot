[Back to the Ling/Light_It4Tools api](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools.md)<br>
[Back to the Ling\Light_It4Tools\SimplePdoWrapper\Util\It42021MysqlInfoUtil class](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/SimplePdoWrapper/Util/It42021MysqlInfoUtil.md)


It42021MysqlInfoUtil::getForeignKeysInfo
================



It42021MysqlInfoUtil::getForeignKeysInfo — Returns an array of  foreignKey => [ referencedDb, referencedTable, referencedColumn ] for the given table.




Description
================


public [It42021MysqlInfoUtil::getForeignKeysInfo](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/SimplePdoWrapper/Util/It42021MysqlInfoUtil/getForeignKeysInfo.md)(string $table) : array




Returns an array of  foreignKey => [ referencedDb, referencedTable, referencedColumn ] for the given table.

It's assumed that the given table exists.




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
See the source code for method [It42021MysqlInfoUtil::getForeignKeysInfo](https://github.com/lingtalfi/Light_It4Tools/blob/master/SimplePdoWrapper/Util/It42021MysqlInfoUtil.php#L58-L73)


See Also
================

The [It42021MysqlInfoUtil](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/SimplePdoWrapper/Util/It42021MysqlInfoUtil.md) class.

Previous method: [setIt4ToolService](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/SimplePdoWrapper/Util/It42021MysqlInfoUtil/setIt4ToolService.md)<br>Next method: [getHasItems](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/SimplePdoWrapper/Util/It42021MysqlInfoUtil/getHasItems.md)<br>

