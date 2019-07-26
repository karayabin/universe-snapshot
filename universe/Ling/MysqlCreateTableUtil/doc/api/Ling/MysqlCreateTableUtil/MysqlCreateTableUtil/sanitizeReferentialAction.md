[Back to the Ling/MysqlCreateTableUtil api](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil.md)<br>
[Back to the Ling\MysqlCreateTableUtil\MysqlCreateTableUtil class](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil.md)


MysqlCreateTableUtil::sanitizeReferentialAction
================



MysqlCreateTableUtil::sanitizeReferentialAction — Returns a proper referential action, valid inside a create table statement.




Description
================


protected [MysqlCreateTableUtil::sanitizeReferentialAction](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil/sanitizeReferentialAction.md)(string $action) : string




Returns a proper referential action, valid inside a create table statement.
Valid referential actions are (https://dev.mysql.com/doc/refman/8.0/en/create-table-foreign-keys.html):

- CASCADE
- SET NULL
- RESTRICT
- NO ACTION
- SET DEFAULT




Parameters
================


- action

    


Return values
================

Returns string.








Source Code
===========
See the source code for method [MysqlCreateTableUtil::sanitizeReferentialAction](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/MysqlCreateTableUtil.php#L374-L392)


See Also
================

The [MysqlCreateTableUtil](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil.md) class.

Previous method: [checkColumn](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil/checkColumn.md)<br>

