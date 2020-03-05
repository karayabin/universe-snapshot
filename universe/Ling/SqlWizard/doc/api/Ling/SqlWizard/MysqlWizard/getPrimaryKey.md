[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)<br>
[Back to the Ling\SqlWizard\MysqlWizard class](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard.md)


MysqlWizard::getPrimaryKey
================



MysqlWizard::getPrimaryKey — Returns the primary key of the given $table.




Description
================


public [MysqlWizard::getPrimaryKey](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getPrimaryKey.md)($table) : array | false




Returns the primary key of the given $table.




Parameters
================


- table

    


Return values
================

Returns array | false.
False is returned if there is no primary key defined on this table.

Exceptions thrown
================

- [NoConnectionException](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Exception/NoConnectionException.md).&nbsp;







Source Code
===========
See the source code for method [MysqlWizard::getPrimaryKey](https://github.com/lingtalfi/SqlWizard/blob/master/MysqlWizard.php#L408-L421)


See Also
================

The [MysqlWizard](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard.md) class.

Previous method: [getForeignKeysInfo](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getForeignKeysInfo.md)<br>Next method: [getRic](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getRic.md)<br>

