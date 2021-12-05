[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)<br>
[Back to the Ling\SqlWizard\MysqlWizard class](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard.md)


MysqlWizard::getColumnDefaultValues
================



MysqlWizard::getColumnDefaultValues — Returns an array of column_name => default_value.




Description
================


public [MysqlWizard::getColumnDefaultValues](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getColumnDefaultValues.md)($fullTable) : array




Returns an array of column_name => default_value.


The default value for the column is NULL if the column has an explicit default of NULL, or if the column definition includes no DEFAULT clause.




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







Source Code
===========
See the source code for method [MysqlWizard::getColumnDefaultValues](https://github.com/lingtalfi/SqlWizard/blob/master/MysqlWizard.php#L282-L290)


See Also
================

The [MysqlWizard](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard.md) class.

Previous method: [getColumnDataTypes](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getColumnDataTypes.md)<br>Next method: [getColumnDefaultApiValues](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getColumnDefaultApiValues.md)<br>

