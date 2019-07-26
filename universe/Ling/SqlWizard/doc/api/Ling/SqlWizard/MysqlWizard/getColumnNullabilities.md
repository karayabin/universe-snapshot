[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)<br>
[Back to the Ling\SqlWizard\MysqlWizard class](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard.md)


MysqlWizard::getColumnNullabilities
================



MysqlWizard::getColumnNullabilities — Returns an array of column_name => is_nullable.




Description
================


public [MysqlWizard::getColumnNullabilities](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getColumnNullabilities.md)(?$table) : array




Returns an array of column_name => is_nullable.

- is_nullable: represents the column nullability.
         The value is true if values can be stored in the column, false if not.




Parameters
================


- table

    


Return values
================

Returns array.


Exceptions thrown
================

- [NoConnectionException](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Exception/NoConnectionException.md).&nbsp;

- [PDOException](https://www.php.net/manual/en/class.pdoexception.php).&nbsp;







Source Code
===========
See the source code for method [MysqlWizard::getColumnNullabilities](https://github.com/lingtalfi/SqlWizard/blob/master/MysqlWizard.php#L299-L307)


See Also
================

The [MysqlWizard](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard.md) class.

Previous method: [getColumnNames](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getColumnNames.md)<br>Next method: [getUniqueIndexes](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getUniqueIndexes.md)<br>

