[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)<br>
[Back to the Ling\SimplePdoWrapper\Util\MysqlInfoUtil class](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md)


MysqlInfoUtil::getReverseForeignKeyMap
================



MysqlInfoUtil::getReverseForeignKeyMap — Returns an array of tableId  => referencedByTableIds for the given databases.




Description
================


public [MysqlInfoUtil::getReverseForeignKeyMap](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getReverseForeignKeyMap.md)(?array $databases = null, ?array $options = []) : array




Returns an array of tableId  => referencedByTableIds for the given databases.
If no database is given, the current database will be used.

With:

- tableId: string, the full table name, using the notation $db.$table
- referencedByTableIds: array of referencedByTableId items, each of which being a full table name using the notation $db.$table.

Available options are:

- useDbPrefix: bool=true. Whether to prefix the table names with the database name.




Parameters
================


- databases

    

- options

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [MysqlInfoUtil::getReverseForeignKeyMap](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/Util/MysqlInfoUtil.php#L561-L586)


See Also
================

The [MysqlInfoUtil](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md) class.

Previous method: [getForeignKeysInfo](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getForeignKeysInfo.md)<br>Next method: [getReferencedByTables](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getReferencedByTables.md)<br>

