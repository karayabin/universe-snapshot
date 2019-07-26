[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)<br>
[Back to the Ling\SqlWizard\MysqlWizard class](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard.md)


MysqlWizard::getColumnDataTypes
================



MysqlWizard::getColumnDataTypes — Returns an array of column_name => column_data_type.




Description
================


public [MysqlWizard::getColumnDataTypes](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getColumnDataTypes.md)(?$table, $precision = false) : array




Returns an array of column_name => column_data_type.

With type being the mysql data type for the column, in lower case.
https://dev.mysql.com/doc/refman/8.0/en/data-types.html




Parameters
================


- table

    

- precision

    


Return values
================

Returns array.


Exceptions thrown
================

- [NoConnectionException](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Exception/NoConnectionException.md).&nbsp;

- [PDOException](https://www.php.net/manual/en/class.pdoexception.php).&nbsp;







Source Code
===========
See the source code for method [MysqlWizard::getColumnDataTypes](https://github.com/lingtalfi/SqlWizard/blob/master/MysqlWizard.php#L228-L240)


See Also
================

The [MysqlWizard](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard.md) class.

Previous method: [getAutoIncrementedField](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getAutoIncrementedField.md)<br>Next method: [getColumnDefaultValues](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getColumnDefaultValues.md)<br>

