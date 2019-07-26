[Back to the Ling/MysqlCreateTableUtil api](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil.md)<br>
[Back to the Ling\MysqlCreateTableUtil\MysqlCreateTableUtil class](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil.md)


MysqlCreateTableUtil::checkColumn
================



MysqlCreateTableUtil::checkColumn — Checks that the given column can be rendered, and throws an exception otherwise.




Description
================


protected [MysqlCreateTableUtil::checkColumn](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil/checkColumn.md)([Ling\MysqlCreateTableUtil\Column\Column](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column.md) $column) : void




Checks that the given column can be rendered, and throws an exception otherwise.
A column is valid if it contains at least the following:
- name
- type




Parameters
================


- column

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [MysqlCreateTableUtil::checkColumn](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/MysqlCreateTableUtil.php#L348-L358)


See Also
================

The [MysqlCreateTableUtil](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil.md) class.

Previous method: [render](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil/render.md)<br>Next method: [sanitizeReferentialAction](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil/sanitizeReferentialAction.md)<br>

