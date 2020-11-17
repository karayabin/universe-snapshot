[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)<br>
[Back to the Ling\SimplePdoWrapper\Util\MysqlInfoUtil class](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md)


MysqlInfoUtil::getReferencedByTables
================



MysqlInfoUtil::getReferencedByTables — Returns the array of tables having a foreign key referencing the given table.




Description
================


public [MysqlInfoUtil::getReferencedByTables](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getReferencedByTables.md)(string $table, ?array $databases = null) : array




Returns the array of tables having a foreign key referencing the given table.
It's an array of full table names (i.e. $db.$table notation).

The databases argument is the set of databases to search inside of.
If null (by default), the current database only will be used.

The table argument can use the full notation (i.e. $db.$table) or be just the single table name.
If it uses the full notation, make sure to pass the database of the table to the databases argument.




Parameters
================


- table

    

- databases

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [MysqlInfoUtil::getReferencedByTables](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/Util/MysqlInfoUtil.php#L647-L660)


See Also
================

The [MysqlInfoUtil](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md) class.

Previous method: [getReverseForeignKeyMap](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getReverseForeignKeyMap.md)<br>Next method: [getHasItems](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getHasItems.md)<br>

