[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)<br>
[Back to the Ling\SqlWizard\MysqlWizard class](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard.md)


MysqlWizard::getAutoIncrementedField
================



MysqlWizard::getAutoIncrementedField — Returns the name of the auto-incremented field, or false if there is none.




Description
================


public [MysqlWizard::getAutoIncrementedField](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getAutoIncrementedField.md)($fullTable) : false | string




Returns the name of the auto-incremented field, or false if there is none.




Parameters
================


- fullTable

    


Return values
================

Returns false | string.


Exceptions thrown
================

- [NoConnectionException](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Exception/NoConnectionException.md).&nbsp;

- [PDOException](https://www.php.net/manual/en/class.pdoexception.php).&nbsp;







Source Code
===========
See the source code for method [MysqlWizard::getAutoIncrementedField](https://github.com/lingtalfi/SqlWizard/blob/master/MysqlWizard.php#L220-L231)


See Also
================

The [MysqlWizard](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard.md) class.

Previous method: [count](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/count.md)<br>Next method: [getColumnDataTypes](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getColumnDataTypes.md)<br>

