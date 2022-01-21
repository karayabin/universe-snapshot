[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)<br>
[Back to the Ling\SqlWizard\MysqlWizard class](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard.md)


MysqlWizard::getForeignKeysInfo
================



MysqlWizard::getForeignKeysInfo — ).




Description
================


public [MysqlWizard::getForeignKeysInfo](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getForeignKeysInfo.md)($fullTable) : array




Returns an array of $foreignKey => array (
     referenced_schema => $referencedDb,
     referenced_table => $referencedTable,
     referenced_column => $referencedColumn,
).




Parameters
================


- fullTable

    


Return values
================

Returns array.


Exceptions thrown
================

- [NoConnectionException](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Exception/NoConnectionException.md).&nbsp;

- [PDOException](https://www.php.net/manual/en/class.pdoexception.php).&nbsp;

- [InvalidTableNameException](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/InvalidTableNameException.md).&nbsp;







Source Code
===========
See the source code for method [MysqlWizard::getForeignKeysInfo](https://github.com/lingtalfi/SqlWizard/blob/master/MysqlWizard.php#L513-L548)


See Also
================

The [MysqlWizard](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard.md) class.

Previous method: [getUniqueIndexes](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getUniqueIndexes.md)<br>Next method: [getPrimaryKey](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getPrimaryKey.md)<br>

