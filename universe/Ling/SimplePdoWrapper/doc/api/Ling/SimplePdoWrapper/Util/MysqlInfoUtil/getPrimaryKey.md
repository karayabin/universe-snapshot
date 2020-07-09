[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)<br>
[Back to the Ling\SimplePdoWrapper\Util\MysqlInfoUtil class](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md)


MysqlInfoUtil::getPrimaryKey
================



MysqlInfoUtil::getPrimaryKey — Returns the array of columns composing the primary key.




Description
================


public [MysqlInfoUtil::getPrimaryKey](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getPrimaryKey.md)(string $table, ?bool $returnAllIfEmpty = false, ?bool &$hasPrimaryKey = true) : array




Returns the array of columns composing the primary key.
If there is no primary key:
- it returns an empty array if the $returnAllIfEmpty is set to false (default)
- it returns all the columns of the table if the $returnAllIfEmpty is set to true

The flag $hasPrimaryKey is set to whether the table has a primary key.




Parameters
================


- table

    

- returnAllIfEmpty

    

- hasPrimaryKey

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [MysqlInfoUtil::getPrimaryKey](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/Util/MysqlInfoUtil.php#L237-L253)


See Also
================

The [MysqlInfoUtil](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md) class.

Previous method: [getCreateStatement](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getCreateStatement.md)<br>Next method: [getRic](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getRic.md)<br>

